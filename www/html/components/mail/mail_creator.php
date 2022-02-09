<?php

if (isset($_COOKIE['language'])) $languageCode = $_COOKIE['language'];
else {
  $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
  $acceptLang = ['tr', 'en', 'de'];
  if (in_array($lang, $acceptLang)) $languageCode = $lang;
  else $languageCode = "en";
}
include "languages/$languageCode/header.php";
include "languages/$languageCode/footer.php";
?>


<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8" />
  <style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');

    html>* {
      font-family: 'Open-Sans', sans-serif;
      color: #fbfbfb !important;
    }

    .corner-top {
      box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset !important;
      background-color: #26292a !important;
      border-radius: 0px 0px 25px 25px !important;
      margin: 0% 0% 2% 0% !important;
      padding: 2% 2% 2% 2% !important;
    }

    .corner-bottom {
      box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset !important;
      background-color: #26292a !important;
      border-radius: 25px 25px 0px 0px !important;
      margin: 2% 0% 0% 0% !important;
      padding: 2% 2% 2% 2% !important;
    }

    .pt-md-5 {
      padding-top: 3rem !important;
    }

    .text-center {
      text-align: center !important;
    }

    .pt-4 {
      padding-top: 1.5rem !important;
    }

    .py-5 {
      padding-top: 3rem !important;
      padding-bottom: 3rem !important;
    }

    .justify-content-center {
      justify-content: center !important;
    }

    .d-flex {
      display: flex !important;
    }

    .col-md-3 {
      flex: 0 0 auto;
      width: 25%;
    }
  </style>
</head>

<body style="text-align: center;">
  <article class="corner-top corner-bottom text-center">
    <h1> <a href="https://<?php echo $_SERVER['HTTP_HOST']; ?>/forgot.php?token=<?php echo $token; ?>">Click</a> for check your account</h1>
    <h4>https://<?php echo $_SERVER['HTTP_HOST']; ?>/forgot.php?token=<?php echo $token; ?></h1>
  </article>
  <footer class="pt-4 pt-md-5 corner-bottom">
    <div class="container py-5">
      <div class="d-flex justify-content-center">
        <div class="col-md-3 text-center">
          <span class="display-6"><?php echo $GLOBALS['messages_footer']['FOOTER_COPYRIGHT_UP_ROW']; ?></span><br>
          <a class="display-7" href="http://localhost/pakettakip/"><?php echo $GLOBALS['messages_footer']['FOOTER_COPYRIGHT_DOWN_ROW']; ?></span>
        </div>
      </div>
    </div>
  </footer>
</body>

</html>