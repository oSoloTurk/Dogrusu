<?php 
  require_once("connection/session.php");
  requiredLogin(true);


function createCard($word, $time, $description, $suggester, $id) {
  echo ' <div class="card text-center">';
  echo '<div class="card-header">';
  echo '  '. $suggester .' Tarafından tartışmaya açıldı.';
  echo '</div>';
  echo '<div class="card-body">';
  echo '  <h5 class="card-title">'. $word .'</h5>';
  echo '  <p class="card-text">'. $description .'</p>';
  echo '  <a href="vote.php?id='. $id .'" class="btn btn-primary">Tavsiye ver</a>';
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

    <?php require_once("styles.php"); ?>
    
</head>

<body>

    <?php 
  require_once("header.php");
  ?>
    <?php
    $cursor = $db->suggestions->find(
      ["root" => null,
        "\$or" => [
          ["suggester" => $_SESSION["user"]["_id"]],
          ["status" => 1]
        ]
      ]);

  ?>
    <article>
        <div class="container">
        <?php 
            if($_SESSION["user"]["point"] < 0) {
              echo '<div title="Tavsiye vermek için en az 10 puana sahip olmalısın." >';
              echo '<a href="#" class="disabled btn btn-outline-primary btn-block m-4">';
              echo 'Doğrusu Nedir?';
              echo '</a>'; 
              echo '</div>';
            }else {
              echo '<a href="suggestion.php" class="btn btn-outline-primary btn-block m-4">';
              echo 'Doğrusu Nedir?';
              echo '</a>'; 
            }
          ?> 
            <div class="container">
                <ul class="list-group">
                    <?php
                      require_once("utils/utils.php");
                      $cache = [];
                      $now = time();
                      foreach($cursor as $item) {
                        $id = strval($item["suggester"]);
                        if(!isset($cache[$id])) {
                          $cache[$id] = $db->users->findOne(['_id' => $item["suggester"]], ["username" => 1, "_id" => 0])["username"];
                        }
                        echo '<li class="list-group-item">'. createCard($item["word"], timeSpace(new DateTime($item["time"]), current_time()), $item["description"], $cache[$id], $item["_id"]) .'</li>'; 
                      }
                    ?>
                </ul>
            </div>
        </div>
    </article>


    <?php include("footer.php"); ?>
    <?php include("scripts.php"); ?>
</body>

</html>