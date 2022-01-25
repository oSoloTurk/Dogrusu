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
  if (isset($_POST['submit'])) {
    $mail = htmlspecialchars($_POST['email'], ENT_QUOTES, 'utf-8');
    $pwd = hash('sha256', htmlspecialchars($_POST['password'], ENT_QUOTES, 'utf-8'));
    //$data = executeQuery($GLOBALS['SQL_COMMANDS']['SELECT_USER_WITH_EMAIL_AND_PASSWORD'], "ss", $mail, $pwd);
    
    if ($data->num_rows == 1) {
      $userData = mysqli_fetch_array($data);
      $access_hash = hash('sha256', $mail);

      $_SESSION['token'] = $access_hash;
      $_SESSION['id'] = $userData['id'];
      $_SESSION['username'] = $userData['username'];
      
      //$insert = executeQuery($GLOBALS['SQL_COMMANDS']['INSERT_ACCESS_TOKEN'], "iss", $userData['id'], $access_hash, $access_hash);

      if (isset($_POST['remember']) && (($_POST['remember'] == 1) || ($_POST['remember'] == 'on'))) {
        setcookie("token", $access_hash, time() + 3600 * 24 * 365, '/');
        setcookie("id", $userData['id'], time() + 3600 * 24 * 365, '/');
      }
      sendToPage("index.php?msg=logged");
    } else {
      sendToPage("login.php?msg=wrong_input");
    }
  } ?>

    <article>
        <div class="container-md row">
            <div class="col-md-4"></div>
            <div class="col-md-6">
                <div class="mt-5 border">
                    <div>
                        <center>Kayıt Ol</center>
                    </div>
                    <form method="post">
                        <div class="row justify-content-center">
                            <div class="mt-3">
                                <label class="form-label" for="username">Kullanıcı Adı</label>
                                <input class="form-control" type="text" name="username" id="username">
                            </div>
                            <div class="mt-3">
                                
                                <label class="form-label" for="email">E-Postan</label>
                                <input class="form-control" type="email" id="email" pattern=".+@gmail\.com" name="email">
                            </div>
                        </div>
                        <hr />
                        <div class="row justify-content-center">
                            <div class="mt-3">
                                <label class="form-label" for="name">Ad</label>
                                <input class="form-control" type="text" name="name" id="name">
                            </div>
                            <div class="mt-3">
                                <label class="form-label" for="surname">Soyad</label>
                                <input class="form-control" type="text" name="surname" id="surname">
                            </div>
                        </div>
                        <hr />
                        <div class="row justify-content-center">
                            <div class="mt-3">
                                <label class="form-label" for="password">Şifren</label>
                                <input class="form-control" type="password" name="password" id="password">
                            </div>
                            <div class="mt-3">
                                <label class="form-label" for="repassword">Tekrar şifre</label>
                                <input class="form-control" type="text" name="repassword" id="repassword">
                            </div>
                        </div>
                        <hr />
                        <div class="row justify-content-center">
                            <button class="btn btn-outline-primary" type="submit">Kayıt Ol</button>
                        </div>
                        <hr />
                        <p class="text-justify text-center">
                            <a class="clickable pretty" href="login.php">Zaten bir hesabım var, giriş yapmak
                                istiyorum</a>
                        </p>
                    </form>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </article>

    <?php include("footer.php"); ?>
    <?php include("scripts.php"); ?>

</body>

</html>