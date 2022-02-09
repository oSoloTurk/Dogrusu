<?php 
  include("connection/session.php");  
  requiredLogin(false);

?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />

    <?php require_once("styles.php"); ?>
    <link rel="stylesheet" href="styles/profile.css">
</head>

<body>

    <?php 
    require_once("header.php");
    require_once("models/User.php");
    if(!isset($_GET["username"])) {
        sendToPage("profile.php?username=".$_SESSION["user"]["username"]."&msg=user_not_found");
        return;
    }
    $user = new User($db->users->findOne(["normalized_username" => strtoupper($_GET["username"])]));
    if($user == null) {        
        sendToPage("profile.php?username=".$_SESSION["user"]["username"]."&msg=user_not_found");
        return;
    }
  ?>
    <article>
        <div class="container mt-5 mb-5 d-flex justify-content-center">
            <div class="card rounded">
                <div class=" d-block justify-content-center">
                    <div class="area1 p-3 py-5"> </div>
                    <div class="area2 p- text-center px-3">
                        <div class="image mr-3">
                            <?php
                                require_once("utils/gravatar.php");
                                echo '<img src="'.get_gravatar($user->email, 100).'" class="rounded-circle" width="100" />';
                            ?>
                            <h4 class=" name mt-3 "><?php echo $user->name . ' ' . $user->surname; ?></h4>
                            <p class="information mt-3 text-justify">About user</p>
                            <div class="d-flex justify-content-center mt-5">
                                <ul class="list-icons">
                                    <li class="facebook"> <i class="fab fa-facebook"></i></li>
                                    <li class="youtube"> <i class="fab fa-youtube"></i></li>
                                    <li class="instagram"> <i class="fab fa-instagram"></i></li>
                                    <li class="whatsapp"> <i class="fab fa-whatsapp"></i></li>
                                    <li class="pinterest"> <i class="fab fa-pinterest"></i></li>
                                </ul>
                            </div>
                            <hr />
                            <span>Puan: <?php echo $user->point ?> </span>
                        </div>
                        <div> </div>
                    </div>
                </div>
            </div>
        </div>
    </article>


    <?php include("footer.php"); ?>
    <?php include("scripts.php"); ?>
</body>

</html>