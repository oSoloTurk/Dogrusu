<?php

include("connection/session.php");
requiredLogin(false);

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

    require_once("models/User.php");

    if (isset($_POST['login'])) {
        $mail = htmlspecialchars($_POST['email'], ENT_QUOTES, 'utf-8');
        $pwd = hash('sha256', htmlspecialchars($_POST['password'], ENT_QUOTES, 'utf-8'));
        $user = new User(["email" => $mail, "passwordhash" => $pwd]);

        $user->password_hash = $pwd;
        $result = $db->users->findOne($user->toJSONAsIdentitiy());

        if ($result != null) {
            $user = new User($result, true);
            sendToPage("index.php?msg=logged");
        } else {
            sendToPage("login.php?msg=wrong_input");
        }
    } ?>

    <article>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="mt-5 border">
                    <div class="m-2">
                        <center>Giriş Yap</center>
                    </div>
                    <form method="post">
                        <div class="ml-3 mr-3">
                            <div class="mt-3">
                                <label class="form-label" for="email">E-Postan</label>
                                <input class="form-control" type="text" name="email" id="email">
                            </div>
                            <div class="mt-3">
                                <label class="form-label" for="password">Şifren</label>

                                <input class="form-control" type="password" name="password" id="password">
                            </div>
                            <div class="mt-3">
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember">Beni Hatırla</label>
                            </div>
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
                            <a class="clickable pretty " href="register.php">Henüz üye değilseniz kayıt olmak için tıklayın</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </article>

    <?php include("footer.php"); ?>
    <?php include("scripts.php"); ?>

</body>

</html>