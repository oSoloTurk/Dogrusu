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
                        <center>Giriş Yap</center>
                    </div>
                    <form method="post">
                        <div class="mt-3">
                            <label class="form-label" for="username">Kullanıcı Adı</label>
                            <input class="form-control" type="text" name="username" id="username">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" for="password">Şifren</label>

                            <input class="form-control" type="text" name="password" id="password">
                        </div>
                        <div class="mt-3">
                            <div class="row d-flex justify-content-between">
                                <button class="btn btn-outline-primary ml-4" name="login" type="submit">Giriş
                                    Yap</button>
                                <button class="btn btn-outline-primary mr-4" name="forgot" type="submit">Şifremi
                                    Unuttum</button>
                            </div>
                        </div>
                        <hr />
                        <p class="text-justify text-center">
                          <a class="clickable pretty " href="register.php">Henüz üye değilseniz kayıt olmak için tıklayın</a></p>
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