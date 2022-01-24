<?php 
  if($GLOBALS['login']) {

?>

<?php

  } else {
?>
  <nav class="navbar navbar-expand-lg navbar-light bg-light center">
    <div class="navbar-inner"> 
      <ul class="navbar-nav">
          <li class="nav-item active">
              <a class="nav-link" href="play.php">oyna</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="suggestions.php">tavsiye ver</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="leaderboard.php">liderlik tablosu</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="profile.php">profil</a>
          </li>
      </ul>
    </div>
  </nav>
<?php
  }
?>