<?php
    require 'connection.php';
    session_start();
    $email = $_POST['pass'];
    $password = md5($email);
    if(isset($_GET['delete'])) {
        $query=$connection->prepare("Delete from user where email=?");
        $query->bind_param("s",$email);
        if(!$query->execute())
            header("Location: ../verifyAccounts.php?error=Account deletion Failed!");
        else
            header("Location: ../verifyAccounts.php?error=Account deleted Successfully!");
    } else {
        $query=$connection->prepare("UPDATE user SET password = ? where email = ?");
        $query->bind_param("ss",$password,$email);
        if(!$query->execute())
            header("Location: ../resetPass.php?error=Password reset Failed!");
        else
            header("Location: ../resetPass.php?error=Password reset Successfully!");
    }
?>