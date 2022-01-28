<?php 
  include("connection/session.php");


function createCard($word, $time, $description, $suggester) {
  echo ' <div class="card text-center">';
  echo '<div class="card-header">';
  echo '  '. $suggester .' Tarafından tartışmaya açıldı.';
  echo '</div>';
  echo '<div class="card-body">';
  echo '  <h5 class="card-title">'. $word .'</h5>';
  echo '  <p class="card-text">'. $description .'</p>';
  echo '  <a href="vote.php?word='. $word .'" class="btn btn-primary">Tavsiye ver</a>';
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

    $cursor = $db->suggestions->find(["root" => null]);

  ?>
    <article>
        <div class="container">
        <a href="suggestion.php" class="btn btn-outline-primary btn-block m-4">
                Doğrusu Nedir?
        </a>
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
                        echo '<li class="list-group-item">'. createCard($item["word"], timeSpace(new DateTime($item["time"]), current_time()), $item["description"], $cache[$id]) .'</li>'; 
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