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

  ?>

  <article>
  <?php 
      if(isset($_SESSION['user'])) {
        sendToPage("suggestions.php");
      }
    ?>
    <div class="container-md">
      <h1>
        <div class="d-flex flex-column">
          <img src="https://st2.depositphotos.com/1385144/11058/v/950/depositphotos_110586344-stock-illustration-dynamic-logo-letter-d-logo.jpg" alt="brand" width="256" height="256" class="d-inline-block align-text-top ml-2 align-self-center">
          <span class="text-center"><span class="text-white bg-dark">En</span> Doğrusu</span>
        </div>
      </h1>
      <div class="text-block align-self-start">
        <h2>
          Biz Kimiz?
        </h2>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc volutpat urna nec justo vestibulum lobortis. Donec et libero scelerisque, sollicitudin est in, condimentum quam. Mauris vulputate nisl dictum enim gravida. Suspendisse scelerisque convallis diam, in finibus sapien semper sodales. Mauris quis est vel elit rhoncus varius. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Etiam vel sodales neque.
        </p>
      </div>
      <div class="text-block text-right">
        <h2>
          Amacımız
        </h2>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc volutpat urna nec justo vestibulum lobortis. Donec et libero scelerisque, sollicitudin est in, condimentum quam. Mauris vulputate nisl dictum enim gravida. Suspendisse scelerisque convallis diam, in finibus sapien semper sodales. Mauris quis est vel elit rhoncus varius. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Etiam vel sodales neque..
        </p>
      </div>
      <div class="text-block text-left">
        <h2>
          Aramıza Katıl!
        </h2>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc volutpat urna nec justo vestibulum lobortis. Donec et libero scelerisque, sollicitudin est in, condimentum quam. Mauris vulputate nisl dictum enim gravida. Suspendisse scelerisque convallis diam, in finibus sapien semper sodales. Mauris quis est vel elit rhoncus varius. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Etiam vel sodales neque..
        </p>
      </div>
    </div>
  </article>

  <?php include("footer.php"); ?>
  <?php include("scripts.php"); ?>
</body>

</html>