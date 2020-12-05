<?php
  require 'connection.php';
  session_start();
  $error="";
  if(!empty($_POST['email']) and !empty($_POST['password'])) {
  	$email=trim($_POST['email']);
    $password=trim($_POST['password']);
    if($email == "admin@gmail.com" && $password == "admin") {
      header('Location: ../adminhome.php');
    } else {
  		$password=md5($password);
      $query=$connection->prepare("select * from `user` where email=? and password=?");
      $query->bind_param("ss",$email,$password);
      $query->execute();
      $result=$query->get_result();
      if(mysqli_num_rows($result) == 1) {
        $row=mysqli_fetch_assoc($result);
        $_SESSION['uid'] = $row['uid'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['phoneNo'] = $row['phoneNo'];
        $_SESSION['organisation'] = $row['organisation'];
        header("Location: ../dashboard.php");
      } else {
        $error ='Invalid Login Credentials';
        header("Location: ../index.php?error=$error");
      }
    }
  } else {
    $error= "Enter valid username and password";
    header("Location: ../index.php?error=$error");
  }
?>
