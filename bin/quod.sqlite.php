<?php
class quodlibetDB extends SQLite3
{
    function __construct()
    {
        $this->open('../db/quod.li.bet.db');
    }
}

## Open connection to the database file. ##
$quo_db = new quodlibetDB();

## Create database tables, columns and indices, if they do not exist. ##
$quo_db->exec('CREATE TABLE IF NOT EXISTS url (hash STRING, source STRING, timestamp INTEGER);');

## Write a hash/url-set to the datadase. ##
function quo_db_write($hash, $url, $seconds_valid) {
	global $quo_db;
	$w_string = "INSERT INTO url (hash, source, timestamp) VALUES ('".$hash."', '".$url."', '".$seconds_valid."');";
	$w_result = $quo_db->exec($w_string);
	return ($w_result);
}

## Read a hash/url-set from the datadase. ##
function quo_db_query($hash) {
	global $quo_db;
	$q_result = $quo_db->query("SELECT * FROM url WHERE hash = '$hash';");
	$result_array = $q_result->fetchArray();
		return ($result_array);
}

## Close the datadase. ##
function quo_db_close() {
	global $quo_db;
	$quo_db->close();
	unset($quo_db);
}
?>
