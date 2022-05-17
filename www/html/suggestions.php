<?php 
  require_once("connection/session.php");
  requiredLogin(true);


function createCard($word, $time, $description, $suggester, $id) {
  echo ' <div class="card text-center w-25 m-5 btn">';
  echo '<div class="card-header">';
  echo '  <u>'. $suggester .'</u> Tarafından tartışmaya açıldı.';
  echo '</div>';
  echo '<div class="card-body">';
  echo '  <h5 class="card-title" title="Karşılık aranan kelime">'. $word .'</h5>';
  echo '  <p class="card-text" title="Önerenin Açıklaması">'. $description .'</p>';
  echo '  <a href="vote.php?id='. $id .'" class="btn button text-center m-4">Tavsiye ver</a>';
  echo '</div>';
  echo '<div class="card-footer text-muted">';
  echo '  '. $time .' önce tartışmaya açıldı.';
  echo '</div>';
  echo '</div>';
}
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content= "width=device-width, initial-scale=1.0">

    <?php require_once("styles.php"); ?>
    <link rel="stylesheet" href="styles/suggestions.css">

</head>

<body>

    <?php 
  require_once("header.php");
  ?>
    <?php
    $cursor = $db->suggestions->find(
      ["root" => null,
        "\$or" => [
          ["suggester.\$oid" => $_SESSION["user"]["_id"]],
          ["status" => 1]
        ]
      ]);

  ?>
    <article>
        <div class="container">
          <div class="row justify-content-center">
            <?php 
              if($_SESSION["user"]["point"] < 0) {
                echo '<div title="Tavsiye vermek için en az 10 puana sahip olmalısın." >';
                echo '<a href="#" class="disabled btn btn-outline-primary btn-block m-4">';
                echo 'Doğrusu Nedir?';
                echo '</a>'; 
                echo '</div>';
              }else {
                echo '<a href="suggestion.php" class="btn button text-center w-25 btn-block m-4">';
                echo 'Doğrusu Nedir?';
                echo '</a>'; 
              }
            ?>
          </div>
            <div class="container">
                    <?php
                      require_once("utils/utils.php");
                      $cache = [];
                      $now = time();
                      $counter = 0;
                      foreach($cursor as $item) {
                        if($counter % 3 == 0) {
                          echo '<div class="d-flex justify-content-start">';
                        }
                        $id = strval($item["suggester"]);
                        if(!isset($cache[$id])) {
                          $cache[$id] = $db->users->findOne(['_id' => $item["suggester"]], ["username" => 1, "_id" => 0])["username"];
                        }
                        echo createCard($item["word"], timeSpace(new DateTime($item["time"]), current_time()), $item["description"], $cache[$id], $item["_id"]); 
                        if($counter % 3 == 2) {
                          echo '</div>';
                        }
                        $counter++;
                      }
                      
                      if($counter != 0) {
                        echo '</div>';
                      }
                    ?>
            </div>
        </div>
    </article>


    <?php include("footer.php"); ?>
    <?php include("scripts.php"); ?>
</body>

</html>