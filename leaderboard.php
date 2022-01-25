<?php 
  include("connection/session.php");

  function createListElement($rank, $name, $profileUrl, $point) {
    echo '<a class="pretty" href="'.$profileUrl.'">';
    echo '  <li class="clickeable list-group-item justify-content-between d-flex" id="rank-'.$rank.'">';
    echo '      <span>'.$rank.'</span>';
    echo '      <span>'.$name.'</span>';
    echo '      <span>'.$point.'</span>';
    echo '  </li>';
    echo '</a>';
  }
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />

    <?php require_once("styles.php"); ?>
    <link rel="stylesheet" href="styles/leaderboard.css">
</head>

<body>

    <?php 
  require_once("header.php");
  ?>
    <?php
    $currentPage = 1;
    $maxPage = 3;
    $data = [
        ["1", "Hakkı Ceylan", "profile.php?id=hakki", 1500],
     ["2", "Yasin Subaşı", "profile.php?id=yasin", 1000],
    ["3", "Irfan DarmaDuman", "profile.php?id=irfan", 500]
];
  ?>
    <article>
            <div class="container">
                <ul class="list-group" id="leaderboard">
            <?php
                foreach($data as $item) {
                    createListElement($item[0], $item[1], $item[2], $item[3]);
                }
            ?>
            </ul>
            <div class="row">
                <button class="btn btn-primary">
                    Önceki Sayfa
                </button>
                <?php
                    for($index = 1; $index < $currentPage + 3 && $index <= $maxPage;$index++) {
                        echo '<a class="btn btn-primary" href="leaderboard.php?page='.$index.'">'.$index.'</a>';
                    }
                ?>
                <button class="btn btn-primary">
                    Sonraki Sayfa
                </button>
            </div>
            
        </div>
    </article>


    <?php require_once("footer.php"); ?>
    <?php require_once("scripts.php"); ?>
</body>

</html>