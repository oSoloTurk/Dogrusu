<?php

include("connection/session.php");
  
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

  
  if (isset($_POST['suggest'])) {
    require_once("models/Suggestion.php");

    $suggestion = new Suggestion($_POST);
    $suggestion->normalized_word = strtoupper($_POST["word"]);
    $suggestion->suggester = $_SESSION['user']->id;
    $suggestion->time = time() + 3600;

    if($db->suggestions->findOne($suggestion->toJSONAsIdentity()) == null) {
      $db->suggestions->insertOne($suggestion->toJSON());
      sendToPage("suggestions.php?msg=sended-verify");
    } else sendToPage("vote.php?msg=already-have&word=" . $_POST["word"]);
  } 

  ?>
    <?php
  ?>
    <article>
        <div class="container">
            <p class="h-1 text-center">Tavsiye Ver</p>
            <hr />
            <form action="" method="post">
                <div class="container-fluid">
                    <div class="row">
                        <label class="form-label" for="word">Türkçe karşılığını aramak istediğin kelime
                            nedir?</label>
                        <input class="form-control" type="text" name="word" id="word">
                    </div>
                    <div class="row justify-content-center m-3">
                        <a href="#" class="btn btn-outline-primary" id="check">Kelimenin anlamını kontrol et</a>
                    </div>
                    <div id="meanings"></div>
                    <div class="row">
                      <label for="description" class="form-label">Bu Kelimenin Anlamı Nedir?</label>
                      <input disabled class="form-control" type="textarea" name="description" id="description">
                    </div>
                    <div class="row justify-content-center m-3">
                        <button class="btn btn-outline-primary" type="submit" name="suggest">Hadi Türkçe Karşılığını Bulalım!</button>
                    </div>
                </div>
            </form>
        </div>
    </article>


    <?php include("footer.php"); ?>
    <?php include("scripts.php"); ?>
    <script src="scripts/tdk.js"></script>
    <script src="scripts/suggestion.js"></script>
</body>

</html>