<?php
	require "core/core.inc.php";
	session_destroy();
	header("Location: index.php");
?>