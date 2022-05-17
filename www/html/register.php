<?php

include("connection/session.php");
requiredLogin(false);

?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content= "width=device-width, initial-scale=1.0">

    <?php require_once("styles.php"); ?>

</head>

<body>
    <?php
    require_once("header.php");

    require_once("models/User.php");
    if (isset($_POST['register'])) {

        $mail = htmlspecialchars($_POST['email'], ENT_QUOTES, 'utf-8');
        $pwd = hash('sha256', htmlspecialchars($_POST['password'], ENT_QUOTES, 'utf-8'));

        $user = new User($_POST);

        $user->password_hash = $pwd;
        $user->normalized_email = strtoupper($_POST["email"]);
        $user->normalized_username = strtoupper($_POST["username"]);
        $user->email_status = 0;

        $alreadyExist = $db->users->findOne($user->toJSONAsIdentitiy(false));

        if ($alreadyExist == null) {
            $data = $db->users->insertOne($user->toJSON(false));
            sendToPage("login.php?msg=success-registered");
        } else {
            sendToPage("register.php?msg=already-registered");
        }
    }
    ?>

    <article>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="mt-5 border">
                    <div class="m-2">
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
                                <input class="form-control" type="password" name="repassword" id="repassword">
                            </div>
                        </div>
                        <hr />
                        <div class="row justify-content-center">
                            <button class="btn btn-outline-primary" name="register" type="submit">Kayıt Ol</button>
                        </div>
                        <hr />
                        <p class="text-justify text-center">
                            <a class="clickable pretty" href="login.php">Zaten bir hesabım var, giriş yapmak
                                istiyorum</a>
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