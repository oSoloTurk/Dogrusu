<?php 
  include("connection/session.php");


function createCard($word, $href, $time, $meaning, $suggester) {
  echo ' <div class="card text-center">';
  echo '<div class="card-header">';
  echo '  '. $suggester .' Tarafından tartışmaya açıldı.';
  echo '</div>';
  echo '<div class="card-body">';
  echo '  <h5 class="card-title">'. $word .'</h5>';
  echo '  <p class="card-text">'. $meaning .'</p>';
  echo '  <a href="'. $href .'" class="btn btn-primary">Tavsiye ver</a>';
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

    $data = [
      ["Araba", "araba.com", "3 Gün önce", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed odio vehicula, varius mauris a, molestie dui. Nam ut nibh orci. Ut vitae laoreet dolor. Fusce nulla augue, faucibus in nibh quis, eleifend mollis dolor.", "Hakkı Ceylan"],
      ["Ev", "ev.com", "5 Gün önce", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed odio vehicula, varius mauris a, molestie dui. Nam ut nibh orci. Ut vitae laoreet dolor. Fusce nulla augue, faucibus in nibh quis, eleifend mollis dolor.", "Hakkı Ceylan"]
    ];
  ?>
    <article>
        <div class="container">
            <button class="btn btn-outline-primary btn-block">
                Doğrusu Nedir?
            </button>
            <div class="container">
                <ul class="list-group">
                    <?php
            foreach($data as $item) {
              echo '<li class="list-group-item">'. createCard($item[0], $item[1], $item[2], $item[3], $item[4]) .'</li>'; 
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