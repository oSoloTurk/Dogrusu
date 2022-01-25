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
            <div class="d-flex row justify-content-center">
                <img src="https://previews.123rf.com/images/anatolir/anatolir1712/anatolir171201477/91833942-man-avatar-icon-flat-illustration-of-man-avatar-vector-icon-isolated-on-white-background.jpg"
                    alt="Avatar" class="avatar" width="20%" height="20%">
            </div>
            <div class="">
                <div class="form-group">
                    <label for="name">Ad</label>
                    <input type="name" class="form-control" id="name" placeholder="İsmin">
                </div>
                <div class="form-group">
                    <label for="surname">Soyad</label>
                    <input type="surname" class="form-control" id="surname" placeholder="Soyadın">
                </div>
            </div>
        </div>
    </article>


    <?php include("footer.php"); ?>
    <?php include("scripts.php"); ?>
</body>

</html>