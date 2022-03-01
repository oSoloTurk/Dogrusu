<?php

include("connection/session.php");
requiredLogin();
if($_SESSION["user"]["permission_level"] <= 0) {
    header("Location:index.php?msg=permission-denied", true, 200);
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

    <article>
        <?php 
            $path = "./admin/".$_GET["page"].".php";
            if(file_exists($path))
                require_once($path);
            else
                require_once("./admin/404.php");
        ?>
    </article>

    <?php include("footer.php"); ?>
    <?php include("scripts.php"); ?>

</body>

</html>