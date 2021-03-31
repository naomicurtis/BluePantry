<?php
function echoError($errMsg, $jsFile, $cssFile) {
require_once('../app_config.php');
require_once(APP_ROOT.APP_FOLDER_NAME.'/scripts/echoHTML.php');
echoHead($jsFile, $cssFile);
echoHeader("Please note the error");
echo '<h3>' . $errMsg . '</h3><br><p>If you wish to return to the customer registration page, please click <a href="' . WEB_ROOT.APP_FOLDER_NAME . '/scripts/landingPage.php" class="error_return">here</a>.</p><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
echoFooter();
}//errorDisplay page for when a user bypasses html5 error checkingd
?>