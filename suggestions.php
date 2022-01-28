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
  echo '  '. $time .'';
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
            foreach($cursor as $item) {
              echo '<li class="list-group-item">'. createCard($item["word"], $item["time"], $item["description"], $item["suggester"]) .'</li>'; 
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