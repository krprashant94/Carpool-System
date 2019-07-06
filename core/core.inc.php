<?php
	if(!include 'config.php'){
		die('<br><br><br>Installation required !!! <br><b>Open <a href="./install.php">install.php</a></b>'); 
	}
	date_default_timezone_set("Asia/Kolkata");
	define('__TATA_SPONGE__', true);
	session_name('__TATA_SPONGE__');
	session_start();
?>