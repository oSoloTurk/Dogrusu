<?php 
  include("connection/session.php");
  requiredLogin();

  function createPicker($id, $word) {
      echo '<div class="form-check mean-checkbox" id="form-control-'. $id .'">';
      echo '<input class="form-check-input" type="checkbox" name="'. $id .'" id="'. $id .'">';
      echo '<label class="form-check-label" for="'.$id.'">';
      echo '  '. $word .'';
      echo '</label>';
      echo '</div>';
  }

  function createSuggestionBubble($id, $word, $isVoted) {
    echo 
      '<div id="'.$id.'" class="bubble '. 
        ($isVoted
          ? 'bg-success" title="Senin Cevabın"' 
          : 'bg-light" title="Diğer Öneriler"'
        ).
        '><span class="text-center '.
        ($isVoted
          ? 'text-white'
          : 'text-dark'
        ) .' m-3">'.
          $word
        .'</span>'.
      '</div>';
  }
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />

    <?php require_once("styles.php"); ?>
    <link rel="stylesheet" href="styles/vote.css">
</head>

<body>

    <?php 
      require_once("header.php");

  ?>
    <?php

      require_once("models/Suggestion.php");
      $word = null;
      try {
        $word = new Suggestion(
          $db->suggestions->findOne(
            ["_id" => new MongoDB\BSON\ObjectID($_GET["id"])], 
            ["suggester" => 1, 
            "word" => 1,
            "normalized_word" => 1,
            "description" => 1,
            "time" => 1,
            "root" => 1,
            "status" => 1]
          ));
      } catch (Exception $e) {
        $word = null;
      }

      if($word == null) {
        sendToPage("suggestions.php?msg=wrong-word");
        return;
      } 

      if(isset($_POST["suggest"])) {
        require_once("models/Suggestion.php");
        require_once("utils/utils.php");

        $votes = [];
        $customVote = null;
        if(isset($_POST["custom_suggestion"])) {
          $customVote = $_POST["custom_suggestion"];
        }

        foreach($_POST as $data => $value) {
          if($value == "on" && $data != "custom_suggest") {
            array_push($votes, $data);
          }
        }

        if($customVote != null) {
          $customSuggestion = new Suggestion(
            ["word" => $customVote,
             "normalized_word" => strtoupper($customVote),
             "status" => 1, //for the only demo, if you using on prod then change this with 0
             "suggester" => $_SESSION["user"]["_id"],
             "root" => $word->normalized_word
            ]);
            $result =$db->suggestions->findOne($customSuggestion->toJSONAsIdentity());
          if($result == null) {
            $db->suggestions->insertOne($customSuggestion->toJSON());
          } else {
            array_push($votes, $result["_id"]);
          }
        }
        foreach($votes as $vote) {
          $suggestionVote = null;
          try {
            $db->suggestions->updateOne(
              ["\$eq"=> 
                ["_id" => new MongoDB/BSON/ObjectID($vote)]
              ], 
              ["\$push" => 
                ["votes" => $_SESSION["user"]["_id"]]
              ]);
          } catch (Exception $e) {
            sendToPage("vote.php?id=" . $_GET["id"] . "&msg=something-wrong");
            return;
          }
        }
        $db->users->updateOne(
          ["_id" => $_SESSION["user"]["_id"]], 
          ["\$inc" => ["point"=>1]]);
      }


      $alreadyVoted = $db->suggestions->findOne(
        ["\$and" => 
          [["root" => $word->normalized_word], 
          ["\$or" => [
            ["votes.voter" => $_SESSION["user"]["_id"]], 
            ["suggester" => $_SESSION["user"]["_id"]]
          ]]
        ]]
      );

      $cursor = $db->suggestions->find(
        ["root" => $word->normalized_word, "status" => 1]
      );

      sendToPage("vote.php?id=" . $_GET["id"] . "&msg=sended-verify");
      ?>
    <article>
        <div class="container">
            <div class="text-center"><i>Karşılık aranan kelime: <span
                        id="word"><u><?php echo $word->word ?></u></span></i></div>
            <hr />
            <div class="text-center"><i>Yazarın Açıklaması: <u><?php echo $word->description ?></u></i></div>
            <hr />
            <div id="meanings"></div>
            <?php

            if($alreadyVoted == null) {
               
            ?>
            <form action="" method="post">
                <div class="container">
                    <ul class="list-group">
                        <?php
                          if($cursor->isDead()) {
                            echo '<i id="meanings_empty">Daha önce hiçkimse bu kelime için tavsiye vermedi.</i>';
                          } else {
                            echo '<i class="text-center">Anlamını karşıladığını düşündüğün seçenekleri işaretle.</i>';
                            echo '<hr class="w-25"/>';
                            foreach($cursor as $item) {
                              createPicker($item["_id"], $item["word"]); 
                            }
                            createPicker("custom_suggest", "Daha iyi bir fikrim var!");
                          }
                          ?>
                    </ul>
                    <hr />
                    <label for="custom_suggestion">Senin Tavsiyen</label>
                    <input class="form-control" type="text" name="custom_suggestion" id="custom_suggestion" disabled>
                </div>
                <div class="row justify-content-center m-3">
                    <button class="btn btn-success" name="suggest">Tavsiyemi Gönder</button>
                </div>
            </form>
            <?php 
              } else { 
                echo '<script>markup('. $alreadyVoted['word']  .')</script>';
            ?>
            <div class="container">
                  <?php
                    if($cursor->isDead()) {
                      echo '<i id="meanings_empty">Daha önce hiçkimse bu kelime için tavsiye vermedi.</i>';
                    } else {
                      foreach($cursor as $item) {
                        createSuggestionBubble($item["_id"], $item["word"], $item["_id"] == $alreadyVoted["_id"]); 
                      }
                    }
                  ?>
                <hr />
            </div>
            <?php } ?>
        </div>
    </article>


    <?php require_once("footer.php"); ?>
    <?php require_once("scripts.php"); ?>
    <script src=" scripts/tdk.js"></script>
    <script src="scripts/vote.js"></script>
</body>

</html>