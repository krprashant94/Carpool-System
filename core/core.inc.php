<?php
	if(!include 'config.php'){
		die("<br><br><br>Installation required !!! <br><b>Open install.php</b>"); 
	}
	define('__TATA_SPONGE__', true);
	session_name('__TATA_SPONGE__');
	session_start();
?>