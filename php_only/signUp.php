<?php

  require 'connection.php';
  session_start();
  $error="";
  if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['phoneNo']) && !empty($_POST['organisation']) && !empty($_POST['cpass']) && ($_POST['password'] == $_POST['cpass'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phoneNo = trim($_POST['phoneNo']);
    $organisation = trim($_POST['organisation']);
    $password = trim($_POST['password']);
    echo "$name\n$email\n$phoneNo\n$organisation\n$password";
    $password = md5($password);
    echo "\n$password"; }
    /*
    //Checking if user already exists
    $query=$connection->prepare("select * from `user` where email=?");
    $query->bind_param('s',$email);
    $query->execute();
    $result = $query->get_result();
    if(mysqli_num_rows($result) == 1) {
      $error="Email id already used. Sign in into your account!";
      header("Location: ../index.php?error=$error");
    } else {
      //if no user already exists, adding this user
      $password = md5($password);
      $query=$connection->prepare("INSERT INTO `user`(`name`, `email`, `phoneNo`, `organisation`, `password`) VALUES (?,?,?,?,?)");
      $query->bind_param('ssssss',$name,$email,$phoneNo,$organisation,$password);
      $query->execute();
      $error = "Account created!<br>Login.";
      header("Location: ../index.php?error=$error");
    }
  } else {
    $error = "Something went Wrong!<br>Please Try Again!";
    header("Location: ../index.php?error=$error");
  }
*/
?>
