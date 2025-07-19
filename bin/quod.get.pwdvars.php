<?php
/****************************************************/
/* Klasse zum sicheren laden der GET/POST-Variablen */
/****************************************************/
class getpost_vars {
/* Class Globals Section */

	// Import variables defined
	const vars_to_extract = array(
		"hash",
		"pwd"
	);
/* End Class Globals Section */


/* The function itself */

	function GetPostVars() {
		$varArray = array();
		$returnArray = array();
		foreach($_REQUEST as $key => $value) {
			if (in_array($key, self::vars_to_extract)) {
				$returnArray[$key] = $value;
			}
		}
		unset($_REQUEST);
		return $returnArray;
	}
/* End function itself */
}
?>