<?php
    require 'connection.php';
    session_start();
    $email = $_SESSION['email'];
    $error="";
    if(!empty($_POST['password']) and !empty($_POST['cpass'])) {
        $password=trim($_POST['password']);
        $password=md5($password);
        $query=$connection->prepare("UPDATE user SET password = ? where email = ?");
        $query->bind_param("ss",$password,$email);
        $query->execute();
    }
    header("Location: ../success.php");
?>