<?php
include ('../bin/quod.get.vars.php');
	$my_request_vars = new getpost_vars;
	$MY_REQUEST = $my_request_vars->GetPostVars();
	
	
	extract($MY_REQUEST, EXTR_PREFIX_ALL, "my");
		

include ('../bin/quod.validity.php');

include ('../bin/quod.li.bet.php');
	$my_hash = qoud_make_hash($my_url, $my_pwd);

if ($my_pwd) $my_seconds_valid .= "p";

include ('../bin/quod.sqlite.php');
	quo_db_write($my_hash, $my_url, $my_seconds_valid);
	quo_db_close();
	echo "<br><br><br><br>";
	echo 'Your quod.li.bet-URL is: <a href="https://quod.li/'.$my_hash.'" name="quod.li.bet-Link" title="short-link" target="_new">https://quod.li/'.$my_hash.'</a>';

?>
