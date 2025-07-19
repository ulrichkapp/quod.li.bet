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

## Get the hash from the URL. ##
$my_hash = array_pop(explode('/', $_SERVER['PHP_SELF']));

## Include the sqlite-wrapper script. ##
include("bin/quod.sqlite.php");

## Query the Database for the hash. ##
$result_array = quo_db_query($my_hash);

## Check if the Link exists and open the page. ##
if(empty($result_array)) {
		exit($error_html);
	} else {
		if (str_ends_with($result_array['timestamp'], "p")) {
			$ask_pwd_html = <<<END
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>>Quod.li.bet – Passworteingabe</title>
</head>
<body>
	<h2>Quod.li.bet – Passworteingabe</h2>
	<p>
		<b>Bitte gib das Link-Passwort ein.</b><br><br>
			<form id="quodlibet_pwd" action="../bin/quod.libet.pwdcheck.php" method="post">
   				<label class="h3" form="quod.libet">quod.libet URL-Shortener</label>
   				<br>
				<p>Dein Kurzlink (https://quod.li/$my_hash) ist mit einem Passwort gesichert. Bitte gib dieses hier ein:</p>
				<label for="Passwort">Passwort:</label>  
    			<input type="password" name="pwd" id="pwd" maxlength="64" size="32">
    			<input type="hidden" name="hash" id="hash" value="$my_hash">
   				<br>
   				<br>
    <button type="reset">Eingabe zurücksetzen</button>
    <button type="submit">Eingabe absenden</button>
			</form>
	</p>
</body>
</html>
END;
			echo $ask_pwd_html;
			die();
//			$result_array['timestamp'] = substr($result_array['timestamp'], 0, -1);
//			$http_header = "Location: ".$result_array['source'];
//			header($http_header);
		} else {
			$http_header = "Location: ".$result_array['source'];
			header($http_header);
		}
	}
?>