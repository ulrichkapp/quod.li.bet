<?php
## Error page if link doesn't exist. Please feel free to change. ##
$error_html = <<<END
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>>Quod.li.bet – Fehlermeldung</title>
</head>
<body>
	<h2>Quod.li.bet – Fehlermeldung</h2>
	<p>
		<b>Ungültige URL!</b><br><br>
		Entweder ist ihre URL fehlerhaft, oder zu alt.
		=> Bitte besorgen Sie sich den Link erneut.
	</p>
</body>
</html>
END;

$pwd_error_html = <<<END
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>>Quod.li.bet – Fehlermeldung</title>
</head>
<body>
	<h2>Quod.li.bet – Fehlermeldung</h2>
	<p>
		<b>Ungültiges Passwort!</b><br><br>
		Leider ist dein Passwort ungültig.
		=> Bitte versuchen Sie es erneut.
	</p>
</body>
</html>
END;


include ('../bin/quod.get.pwdvars.php');
	$my_request_vars = new getpost_vars;
	$MY_REQUEST = $my_request_vars->GetPostVars();
	extract($MY_REQUEST, EXTR_PREFIX_ALL, "my");

/*	
include ('../bin/quod.li.bet.php');
	$my_hash = qoud_make_hash($my_url, $my_pwd);
*/

## Include the sqlite-wrapper script. ##
include("bin/quod.sqlite.php");

## Query the Database for the hash. ##
$result_array = quo_db_query($my_hash);

//print_r($result_array);

## Check if the Link exists and open the page. ##
if(empty($result_array)) {
		exit($error_html);
	} else {
		if (str_ends_with($result_array['timestamp'], "p")) {
			include ('../bin/quod.li.bet.php');
			$test_hash = qoud_make_hash($result_array['source'], $my_pwd);
			if ($test_hash == $my_hash) {
				$http_header = "Location: ".$result_array['source'];
				header($http_header);
			} else {
				exit($pwd_error_html);
			}
		} else {
			exit($error_html);
		}
	}
?>