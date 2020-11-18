<?php

include 'connection.php';
session_start();

if(!isset($_SESSION['uid']))
  header('Location: error.php');

?>
