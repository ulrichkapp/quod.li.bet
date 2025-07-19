<?php

if (!filter_var($my_url, FILTER_VALIDATE_URL) OR !preg_match('/^https?\:\/\//i', $my_url)) die ('<p>URL ungültig!<br><br>Go back to <a href="#" name="goback" title="Back to quod.libet" onclick="history.back()">qoud.libet</a> page to try again.</p>');

switch(TRUE) {
	case (@$my_days_valid == "-"):
		$my_seconds_valid = "0";
		break;
	case (@$my_days_valid > 0 AND @$my_days_valid < 365):
		$my_seconds_valid = time() + $my_days_valid * 86400;
		break;
	default:
		$my_seconds_valid = time() + 3110400;
}
if ($my_pwd) {
	$my_seconds_valid."p";
}

?>
