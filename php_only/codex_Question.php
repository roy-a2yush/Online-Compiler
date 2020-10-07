<?php

  //including connection file
  include "connection.php";

  //problem query
  $query=$connection->prepare("select * from `problems` where pid=?");
  $query->bind_param("s",$pid);
  $query->execute();
  $result=$query->get_result();
  if(mysqli_num_rows($result) == 1) {
    $row=mysqli_fetch_assoc($result);
    $_SESSION['pid'] = $row['pid'];
    $_SESSION['pName'] = $row['pName'];
    $_SESSION['pDesc'] = $row['pDesc'];
    $_SESSION['constraints'] = $row['constraints'];
    $_SESSION['sampleInput'] = $row['sampleInput'];
    $_SESSION['sampleOutput'] = $row['sampleOutput'];
    $_SESSION['numTestCases'] = $row['numTestCases'];
  } else {
    //Error Location
    header("Location: ../error.php");
  }

 ?>
