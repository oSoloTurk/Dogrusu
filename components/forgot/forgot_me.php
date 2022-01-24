<article>
    <div class="container-md">
      <p class="display-5 text-center" id="page-title"><?php echo $GLOBALS['messages_article']['TITLE']; ?></p>
      <div class="container d-flex align-items-center flex-column">
        <form class="col-md-5" method="post">
          <div class="form-group mb-2">
            <label for="formGroupEmailInput"><?php echo $GLOBALS['messages_article']['EMAIL']; ?></label>
            <input name="email" id="formGroupEmailInput" type="text" class="form-control" required />
            <small class="form-text text-muted deactive" id="vld-email"><span class="text-danger">X</span> <?php echo $GLOBALS['messages_article']['INVALID_EMAIL']; ?></small>
          </div>
          <div class="row">
            <input type="submit" name="submit" class="btn theme-button-success" id="btn-forgot" value="<?php echo $GLOBALS['messages_article']['FORGOT']; ?>">
          </div>
        </form>
      </div>
  </article>

<?php

    if (isset($_POST['submit'])) {
    $mail = htmlspecialchars($_POST['email'], ENT_QUOTES, 'utf-8');
    $error = false;
    try {
      //$sourceData = executeQuery($GLOBALS['SQL_COMMANDS']['SELECT_USER_WITH_EMAIL'], "s", $mail);
    } catch (Exception $e) {
      $error = true;
    }
    if (!$error) {
        $_POST['toMail'] = $mail;
        $data = mysqli_fetch_array($sourceData);
        require_once "components/mail/mail.php";
    }
    sendToPage("login.php?msg=forgot");
    }

?>