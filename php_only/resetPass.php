<?php
    require 'connection.php';
    session_start();
    $email = $_POST['pass'];
    $password = md5($email);
    $query=$connection->prepare("UPDATE user SET password = ? where email = ?");
    $query->bind_param("ss",$password,$email);
    if(!$query->execute())
        header("Location: ../resetPass.php?error=Password reset Failed!");
    else
        header("Location: ../resetPass.php?error=Password reset Successfully!");
?>