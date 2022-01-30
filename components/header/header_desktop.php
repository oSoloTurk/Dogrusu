<?php 
  if(isset($_SESSION['token'])) {

?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light center">
        <div class="navbar-inner"> 
          <ul class="navbar-nav">
              <li class="nav-item" id="suggestions">
                  <a class="nav-link" href="suggestions.php">Tavsiye Ver</a>
              </li>
              <li class="nav-item" id="leaderboard">
                  <a class="nav-link" href="leaderboard.php">Liderlik Tablosu</a>
              </li>
              <li class="nav-item" id="profile">
                  <a class="nav-link" href="profile.php">Profil</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="logout.php">Çıkış Yap</a>
              </li>
          </ul>
        </div>
      </nav>
<?php

  } else {
?>
      <nav class="navbar navbar-expand-lg navbar-light bg-light text-right">
        <div class="navbar-inner"> 
          <ul class="navbar-nav">
              <li class="nav-item" id="login">
                  <a class="nav-link" href="login.php">Giriş Yap</a>
              </li>
              <li class="nav-item" id="register">
                  <a class="nav-link" href="register.php">Kayıt Ol</a>
              </li>
          </ul>
        </div>
      </nav>
<?php
  }
?>