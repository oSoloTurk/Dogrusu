<div class="float-child">
	<p class="fs-3"><?php echo $GLOBALS['messages_article']['PROFILE_TITLE'] ?></p>
	<form class="ml-2" method="post">
		<fieldset disabled>
			<div class="form-group">
				<label for="formGroupProfileEmailInput"><?php echo $GLOBALS['messages_article']['PROFILE_ENTER_USERNAME'] ?></label>
				<input name="username" id="formGroupProfileEmailInput" type="text" class="form-control" value="<?php echo $_SESSION['username'] ?>" disabled>
			</div>
		</fieldset>
		<div class="form-group">
			<label for="formGroupPhoneInput"><?php echo $GLOBALS['messages_article']['PROFILE_ENTER_PHONE'] ?></label>
			<input name="phone" id="formGroupPhoneInput" type="tel" class="form-control">
			<small class="form-text text-muted deactive" id="vld-profile-phone">
				<span class="text-danger">X</span> <?php echo $GLOBALS['messages_article']['PROFILE_ENTER_PHONE_TIP'] ?>
			</small>
			<br />
		</div>
		<div class="modal" tabindex="-1" id="saveProfile">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title"><?php echo $GLOBALS['messages_article']['SAVE_CHANGES'] ?></h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<p><?php echo $GLOBALS['messages_article']['PROFILE_CHANGE_TIP'] ?></p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn theme-button-warning" data-bs-dismiss="modal"><?php echo $GLOBALS['messages_article']['CANCEL'] ?></button>
						<input name="profile" class="btn theme-button-success" type="submit" value="<?php echo $GLOBALS['messages_article']['OK'] ?>">
					</div>
				</div>
			</div>
		</div>
	</form>
	<button type="button" class="btn theme-button-success" id="btn-saveprofile" data-bs-toggle="modal" data-bs-target="#saveProfile">
		<?php echo $GLOBALS['messages_article']['OK'] ?>
	</button>
</div>
<script src="components/profile/profile-tab.js"></script>

<?php

if (isset($_POST['profile']) && isset($_POST['phone'])) {
	$tel = $_POST['phone'];
	$error = false;
	try {
		//$result = executeQuery($GLOBALS['SQL_COMMANDS']['UPDATE_USER_PHONE'], "si", $tel, $_SESSION['id']);
	} catch (Exception $e) {
		$error = true;
	}
	if ($error) $URL = 'profil.php?tab=btn-profile&msg=error';
	else $URL = 'profil.php?tab=btn-profile&msg=success';
	sendToPage($URL);
}

?>