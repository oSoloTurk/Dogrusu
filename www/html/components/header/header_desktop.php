<?php 
if(isset($_SESSION['user'])) {

?>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid container-sm justify-content-around">
            <ul class="navbar-nav">
                <a class="navbar-brand" href="#">
                    <div class="d-flex flex-column">
                        <img src="https://st2.depositphotos.com/1385144/11058/v/950/depositphotos_110586344-stock-illustration-dynamic-logo-letter-d-logo.jpg"
                            alt="brand" width="64" height="64" class="d-inline-block align-text-top ml-2">
                        <span><span class="text-white bg-dark">En</span> Doğrusu</span>

                    </div>
                </a>
                <li class="nav-item mt-4" id="suggestions">
                    <a class="nav-link" href="suggestions.php">Tavsiye Ver</a>
                </li>
                <li class="nav-item mt-4" id="leaderboard">
                    <a class="nav-link" href="leaderboard.php">Liderlik Tablosu</a>
                </li>
                <li class="nav-item mt-4" id="profile">
                    <a class="nav-link" href="profile.php">Profil</a>
                </li>
                <li class="nav-item mt-4">
                    <a class="nav-link" href="logout.php">Çıkış Yap</a>
                </li>
            </ul>
        </div>
    </nav>

<?php } else { ?>

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
<?php } ?>