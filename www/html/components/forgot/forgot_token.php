<?php

if(!isset($_GET['token']) || strlen($_GET['token']) != 64) sendToPage("index.php?msg=manipulation");
//$data = executeQuery($GLOBALS['SQL_COMMANDS']['SELECT_USER_WITH_EMAIL_CODE'], "s", $_GET['token']);
if($data->num_rows != 1) sendToPage("index.php?msg=manipulation");

if (isset($_POST['newAgainPassword']) && isset($_POST['newPassword']) && isset($_GET['token'])) {
	$newPassword = htmlspecialchars($_POST['newPassword'], ENT_QUOTES, 'utf-8');
	$newAgainPassword = htmlspecialchars($_POST['newAgainPassword'], ENT_QUOTES, 'utf-8');
	if ($newPassword == $newAgainPassword) {
        //$result = executeQuery($GLOBALS['SQL_COMMANDS']['UPDATE_USER_EMAIL_CODE_PASSWORD'], "sss", hash('sha256', htmlspecialchars($newPassword, ENT_QUOTES, 'utf-8')), "", $_GET['token']);
        $URL = 'index.php?msg=success';
	} else $URL = "index.php?msg=manipulation";

	sendToPage($URL);
	exit;
}
?>

<article>
    <div class="container-md">
      <p class="display-5 text-center" id="page-title"><?php echo $GLOBALS['messages_article']['TITLE']; ?></p>
      <div class="container d-flex align-items-center flex-column">
      <form class="ml-2" method="post">
        <div class="form-group">
            <label for="formGroupNewPasswordInput"><?php echo $GLOBALS['messages_article']['PASSWORD_ENTER_NEW'] ?></label>
            <input name="newPassword" id="formGroupNewPasswordInput" type="password" class="form-control" required>
            <small class="form-text text-muted deactive" id="vld-password-match">
                <span class="text-danger">X</span> <?php echo $GLOBALS['messages_article']['PASSWORD_TIPS_1'] ?><br/>
            </small>
            <small class="form-text text-muted deactive" id="vld-password-length">
                <span class="text-danger">X</span>  <?php echo $GLOBALS['messages_article']['PASSWORD_TIPS_2'] ?><br/>
            </small>
            <small class="form-text text-muted deactive" id="vld-password-char">
                <span class="text-danger">X</span>  <?php echo $GLOBALS['messages_article']['PASSWORD_TIPS_3'] ?><br/>
            </small>
        </div>
        <div class="form-group">
            <label for="formGroupNewPasswordAgainInput"><?php echo $GLOBALS['messages_article']['PASWORD_ENTER_NEW_AGAIN'] ?></label>
            <input name="newAgainPassword" id="formGroupNewPasswordAgainInput" type="password" class="form-control" required>
        </div>
        <input id="btn-execute" name="password" class="btn theme-button-success disabled" type="submit" value="<?php echo $GLOBALS['messages_article']['OK'] ?>">
    </form>
      </div>
  </article>
  <script src="components/forgot/forgot_token.js"></script>
