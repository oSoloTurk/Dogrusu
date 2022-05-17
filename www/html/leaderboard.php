<?php 
  include("connection/session.php");
  requiredLogin(false);

  require_once("utils/gravatar.php");
  function createListElement($rank, $name, $profileUrl, $mail, $point) {
    echo '<a class="pretty" <!--href="'.$profileUrl.'"--> ';
    echo '  <li class="clickeable list-group-item row d-flex" id="rank-'.$rank.'">';
    echo '      <span class="col-4">#'.$rank.'';
    echo '          <img src="'.get_gravatar($mail, 128).'" alt="Avatar" class="avatar" width="30%" height="100%" title="Gravatar tarafından sağlanmaktadır.">';
    echo '      </span>';
    echo '      <span class="align-self-center text-center col-4">'.$name.'</span>';
    echo '      <span class="align-self-center text-center col-4">'.$point.'</span>';
    echo '  </li>';
    echo '</a>';
  }

  $settingSource = $db->config->findOne(["normalized_settings_name" => "LEADERBOARD"]);
  $setting = null;

  require_once("models/Setting.php");
  require_once("utils/utils.php");

  $reset = true;
  if($settingSource == null) {
    $setting = new Setting([
        "settings_name" => "leaderboard", 
        "normalized_settings_name" => "LEADERBOARD",
        "value" => current_time()->format('Y-m-d H:i:s')
    ]);
    $db->config->insertOne($setting->toJSON());
    $reset = true;
    $timeDiff = DateInterval::createFromDateString("1 second");
  } else {
      $setting = new Setting($settingSource);     
      $timeDiff = current_time()->diff(new DateTime($setting->value));  
      $diffAsHour = $timeDiff->m * 30 * 24 + $timeDiff->h;
      if($diffAsHour <= 6) { //6 hours
        $reset = false;
      }
  }
  if($reset) {
    $setting->value = current_time()->format('Y-m-d H:i:s');
    $db->config->updateOne($setting->toJSONAsIdentity(), ['$set' => $setting->toJSON()]);
    $db->leaderboard->deleteMany([]);
    $db->users->aggregate(
      [
          [
              '$sort'=> [
                  'point'=> -1
              ]
          ], 
          [
              '$project'=> [
                  'username'=> 1,
                  'point'=> 1,
                  'email'=> 1
              ]
          ], 
          [
              '$out'=> 'leaderboard'
          ]
      ]
    );
  }
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content= "width=device-width, initial-scale=1.0">

    <?php require_once("styles.php"); ?>
    <link rel="stylesheet" href="styles/leaderboard.css">
</head>

<body>

    <?php 
  require_once("header.php");
  ?>
    <?php
    $currentPage = max($_GET["page"] ?? 1, 1);
    $cursor = $db->leaderboard->find([], ["limit" => ($currentPage - 1) * 20, "take" => $currentPage * 20]);
    $maxPage = (int)(1 + $db->leaderboard->count() / 20);

  ?>
    <article>
        <div class="container">
            <div class="row justify-content-center">
                <ul class="list-group mt-3 w-50" id="leaderboard">
                    <?php
                            $counter = 1 + ($currentPage - 1) * 20;
                            foreach($cursor as $item) {
                                createListElement($counter++, $item["username"], "profile.php?username=".$item["username"], $item["email"],$item["point"] ?? 0);
                            }
                        ?>
                    <div class="text-right mt-2">
                        <i>Son Güncellenme: <?php echo format_interval($timeDiff); ?> önce,</i>
                    </div>
                </ul>
            </div>
            <div class="row justify-content-center mt-3">
                <?php if($currentPage > 1) { ?>
                <a class="btn btn-outline-primary m-1" href="leaderboard.php?page=" . $currentPage - 1>
                    Önceki Sayfa
                </a>
                <?php } else { ?>
                <a class="btn btn-outline-primary disabled m-1">
                    Önceki Sayfa
                </a>
                <?php }?>
                <?php
                        for($index = 1; $index < $currentPage + 3 && $index <= $maxPage;$index++) {
                            echo '<a class="btn btn-'. ($index == $currentPage ? "primary" : "outline-primary") .' m-1" href="leaderboard.php?page='.$index.'">'.$index.'</a>';
                        }
                    ?>

                <?php if($currentPage < $maxPage) { ?>
                <a class="btn btn-outline-primary m-1" href="leaderboard.php?page=" . $currentPage + 1>
                    Sonraki Sayfa
                </a>
                <?php } else { ?>
                <a class="btn btn-outline-primary disabled m-1">
                    Sonraki Sayfa
                </a>
                <?php }?>
            </div>

        </div>
    </article>


    <?php require_once("footer.php"); ?>
    <?php require_once("scripts.php"); ?>
</body>

</html>