<?php

include 'connection.php';
session_start();


if(!isset($_SESSION['uid']) || $_SESSION["uid"]!=0){
    header('Location: index.php');
}

?>
