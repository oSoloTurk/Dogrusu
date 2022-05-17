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
          Bizler, Türkçe'nin günümüz dinamizinde asimile olmaması için çaba gösteren ve bunu kâr amacı gütmeden yapan gönüllü kişileriz.<br>
          <span class="text-white bg-dark">Dogrusu.org</span> olarak amacımız bu süreci aramızdaki bir oyun haline getirmek ve eğlenmek!
        </p>
      </div>
      <div class="text-block text-right">
        <h2>
          Amacımız
        </h2>
        <p>
          Türkçenin yazılı ve sözlü kaynakları üzerine bilime dayalı araştırmalar yapmak; Türkçenin bilim, sanat, edebiyat ve öğretim dili olarak  gelişmesini ve her alanda doğru  kullanılmasını sağlamaktır.        
          Türk dilinin zenginliğini meydana çıkarıp onu yeryüzü dilleri arasında değerine yaraşır yüksekliğe eriştirmek ve Türk dünyasında ortak anlaşma dili, dünyada ise yaygın ve geçerli bir dil konumuna getirmektir.
        </p>
      </div>
      <div class="text-block text-left">
        <h2>
          Aramıza Katıl!
        </h2>
        <p>
          <span class="text-white bg-dark">Dogrusu.org</span> tamamen açık kaynaklı olarak geliştirildi ve yönetiliyor.<br>
          Bunun anlami ise şöyle; istersen aramıza bir yazılımcı olarak, istersen bir yönetici olarak veya kelimeler öneren bir üye olarak katılabilirsin! <br>
          Sana İhtiyacımız Var!
        </p>
      </div>
    </div>
  </article>

  <?php include("footer.php"); ?>
  <?php include("scripts.php"); ?>
</body>

</html>