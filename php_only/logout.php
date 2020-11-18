<?php
	session_start();
	include 'connection.php';
	session_destroy();
	header("Location: ../index.php?status=0"); //include this logout everywhere.
?>
