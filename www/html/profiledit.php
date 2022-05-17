<?php 
  include("connection/session.php");
  requiredLogin();

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
  ?>
    <article>
        <div class="container">
            <div class="row justify-content-center m-3">
              <?php
                require_once("utils/gravatar.php");
                echo '<img src="'.get_gravatar($_SESSION["user"]["email"], 1024).'" alt="Avatar" class="avatar" width="20%" height="20%" title="Gravatar tarafından sağlanmaktadır.">';
              ?>
            </div>
            <div class="row justify-content-center">
                <div class="form-group col-4">
                    <label for="name">Ad</label>
                    <input type="name" class="form-control" id="name" placeholder="İsmin"
                        value="<?php echo $_SESSION["user"]["name"]; ?>">
                </div>
                <div class="form-group col-4">
                    <label for="surname">Soyad</label>
                    <input type="surname" class="form-control" id="surname" placeholder="Soyadın"
                        value="<?php echo $_SESSION["user"]["surname"]; ?>">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="form-group col-4">
                    <label for="email">Email</label>
                    <input type="email" class="form-control disabled" id="email" placeholder="Soyadın"
                        value="<?php echo $_SESSION["user"]["email"]; ?>" disabled>
                </div>
                <div class="form-group col-4">
                    <label for="point">Puanın</label>
                    <input type="point" class="form-control disabled" id="point" placeholder="Soyadın"
                        value="<?php echo $_SESSION["user"]["point"]; ?>" disabled>
                </div>
            </div>
            <div class="row justify-content-center">
                <button class="btn btn-outline-primary" type="submit" value="Değişiklikleri Kaydet"
                    disabled>Değişiklikleri Kaydet</button>
            </div>
        </div>
    </article>


    <?php include("footer.php"); ?>
    <?php include("scripts.php"); ?>
</body>

</html>