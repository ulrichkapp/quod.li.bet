<?php
$lang = array_shift(explode (",", $_ENV['HTTP_ACCEPT_LANGUAGE']));

switch ($lang) {
	case "de-DE":
		$return_html = <<<END
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title></title>
	<link rel="stylesheet" href="../css/basic.css" />
	<script>
	function checkpwd() {
		const theREGEX = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.* ).{8,16}$/;
		\$thePWD = document.getElementById("pwd").value;
		switch (\$thePWD) {
   			case "":
				document.getElementById("pwdINFO").style.backgroundColor = "white";
				document.getElementById("pwdINFO").innerText = "";
				break;
			default:
				switch (theREGEX.test(\$thePWD)) {
					case true:
						document.getElementById("pwdINFO").style.backgroundColor = "rgb(0 255 0 /0.2)";
						document.getElementById("pwdINFO").innerText = "OK!";
						break;					
					case false:
						document.getElementById("pwdINFO").style.backgroundColor = "rgb(255 0 0 /0.2)";
						document.getElementById("pwdINFO").innerText = "mind. 8 Zeichen ('a-z','A-Z','0-9')";
						break;
				}
				break;
		}
	}
	</script>
</head>
<body>
	<div id="content-box">
		<div id="header">
			<img alt="logo" src="../media/quod.libet.svg">
		</div>
		<div id="content">
			<p class="description">Sie suchen nach einem URL-Shortener, der keine Daten über Sie und ihre Kunden, Freunde und Partner sammelt?<br>Sie wollen den Dienst auf Ihrem eigenen Webserver anbieten?<br>Sie möchten schlanken, sicheren und quelloffenen Code?</p>
			<hr align="left">
			<p class="description"><span class="bolder">quod.libet</span> sichert lediglich die URL und einen Hash (Einweg-verschlüsselt) für die Identifizierung beim Abruf<!-- sowie ggf. für ein Passwort, um den Abruf des Links vor fremdem Zugriff zu schützen-->.<br><span class="bolder">Keine persönlichen Daten werden gespeichert.</span></p>
			<p class="description"><span class="bolder">quod.libet</span> benötigt weder AJAX noch einen Datenbankserver.<br>Es verwendet zur Speicherung der URLs eine SQLite Datenbank-Datei und ist in PHP geschrieben.<br>Als quelloffene Software kann jede:r die Qualität und Integrität des Codes selbst überprüfen.</p>
			<p class="description"><span class="bolder">quod.libet</span> können Sie als Privatperson gerne kostenlos über meinen Server nutzen.</p>
			<p class="description">Oder Sie hosten <span class="bolder">quod.libet</span> selbst:<br>Als Unternehmen/Gewerbe erwerben Sie eine <span class="bolder">quod.libet</span> Lizenz, welche der Art und dem Umfang Ihrer geschäftlichen Aktivitäten angemessen ist.<br>Als gemeinnütziger Verein oder "non profit organisation" können Sie eine kostenlose Lizenz erhalten.</p>
			<p class="description">Kontaktieren Sie mich dazu unter: <span class="bolder">info[at]quod.li</span> (e-Mail-Link bitte kopieren.)</p>
			<hr align="left">
			
			<form id="quodlibet" action="quod.libet.landp.php" method="post">
   				<label id="lbl_form" form="quod.libet">quod.libet URL-Shortener<br></label>
   				<br>
				<label id="lbl_url" for="url">URL:</label> 
				<span id="sp_url"><input type="text" name="url" id="url" maxlength="256" size="64"></span>
   				<br>
				<label id="lbl_daysvalid" for="days_valid">Lebensdauer:</label>  
				<span id="sp_daysvalid"><input type="text" name="days_valid" id="days_valid" maxlength="3" size="5"><span class="smallbold"> (Anzahl Tage, '-' = unbegrenzt)</span></span>
   				<br>
				<label id="lbl_pwd" for="Passwort">Passwort:&nbsp;</label>
				<span id="sp_pwd"><input type="password" name="pwd" id="pwd" maxlength="64" size="32" oninput="checkpwd();"><span class="smallbold"> (leer für kein Passwort)&nbsp;&nbsp;<span id="pwdINFO"></span></span></span>
   				<br>
   				<br>
    <button type="reset">Eingaben zurücksetzen</button>
    <button type="submit">Eingaben absenden</button>
			</form>
		</div>
	</div>
</body>
</html>
END;
		break;
	
	default:
		$return_html = <<<END
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title></title>
	<link rel="stylesheet" href="../css/basic.en.css" />
	<script>
	function checkpwd() {
		const theREGEX = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.* ).{8,16}$/;
		\$thePWD = document.getElementById("pwd").value;
		switch (\$thePWD) {
   			case "":
				document.getElementById("pwdINFO").style.backgroundColor = "white";
				document.getElementById("pwdINFO").innerText = "";
				break;
			default:
				switch (theREGEX.test(\$thePWD)) {
					case true:
						document.getElementById("pwdINFO").style.backgroundColor = "rgb(0 255 0 /0.2)";
						document.getElementById("pwdINFO").innerText = "OK!";
						break;					
					case false:
						document.getElementById("pwdINFO").style.backgroundColor = "rgb(255 0 0 /0.2)";
						document.getElementById("pwdINFO").innerText = "8 characters min. ('a-z','A-Z','0-9')";
						break;
				}
				break;
		}
	}
	</script>
</head>
<body>
	<div id="content-box">
		<div id="header">
			<img alt="logo" src="../media/quod.libet.svg">
		</div>
		<div id="content">
			<p class="description">You are looking for an URL-Shortener, which doesn't collect any data about your customers, partners or friends?<br>You want to offer the service on your own website?<br>You like to use a slim, secure and open source code?</p>
			<hr align="left">
			<p class="description"><span class="bolder">quod.libet</span> only saves the URL and a hash (one-way-encrypted) used to identify the URL and, if chosen, a password to secure your shortened link from abuse.<br><span class="bolder">No personal data is saved.</span></p>
			<p class="description"><span class="bolder">quod.libet</span> doesn't need either AJAX nor a database server.<br>It uses an SQLite database file and is written in PHP 8.<br>As Open Source software, everyone can check the integrity and security of the code.</p>
			<hr align="left">
			
			<form id="quodlibet" action="quod.libet.landp.php" method="post">
   				<label id="lbl_form" form="quod.libet">quod.libet URL-Shortener<br></label>
   				<br>
				<label id="lbl_url" for="url">URL:</label> 
				<span id="sp_url"><input type="text" name="url" id="url" maxlength="256" size="64"></span>
   				<br>
				<label id="lbl_daysvalid" for="days_valid">Valid until:</label>  
				<span id="sp_daysvalid"><input type="text" name="days_valid" id="days_valid" maxlength="3" size="5"><span class="smallbold"> (Num. of days, '-' = unlimited)</span></span>
   				<br>
				<label id="lbl_pwd" for="Passwort">Password:&nbsp;</label>
				<span id="sp_pwd"><input type="password" name="pwd" id="pwd" maxlength="64" size="32" oninput="checkpwd();"><span class="smallbold"> (Empty for no password)&nbsp;&nbsp;<span id="pwdINFO"></span></span></span>
   				<br>
   				<br>
    <button type="reset">Reset Entries</button>
    <button type="submit">Send Entries</button>
			</form>
		</div>
	</div>
</body>
</html>
END;
		break;
}

echo $return_html;
?>