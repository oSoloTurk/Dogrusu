<?php 
  include("connection/session.php");

  function createPicker($id, $word) {
    echo '<div class="form-check" id="form-control-'. $id .'">';
    echo '<input class="form-check-input" type="radio" name="correctPicker" id="'. $id .'">';
    echo '<label class="form-check-label" for="'. $id .'">';
    echo '  '. $word .'';
    echo '</label>';
    echo '</div>';
  }
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />

    <?php require_once("styles.php"); ?>
    <link rel="stylesheet" href="styles/play.css"> 
</head>

<body>

    <?php 
  require_once("header.php");
  ?>
    <?php

    $data = [["0", "Oturgaçlı Götürgeç"], ["1", "Götürgeç"], ["2", "Taşıt"], ["3", "Götürgeçli Oturgaç"]];
  ?>
    <article>
        <div class="container">
            <div class="row text-center">
                <div id="word">Araba</div>
            </div>
            <hr />
            <div id="meanings"></div>
            <hr/>
            <div class="container">
                <form action="" method="post">
                    <ul class="list-group">
                        <?php
                          foreach($data as $item) {
                            createPicker($item[0], $item[1]); 
                          }
                        ?>
                    </ul>
                </form>
            </div>
        </div>
    </article>


    <?php require_once("footer.php"); ?>
    <?php require_once("scripts.php"); ?>
    <script src="scripts/play.js"></script>
</body>

</html>