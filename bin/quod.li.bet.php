<?php

function qoud_make_hash($url, $pwd="") {
	if ($quod_hash = hash('crc32', $url.$pwd)) {
		return($quod_hash);
	} else {
		exit("Error generating hash.");
	}
}

?>