<?php

  //including connection file
  include "connection.php";

  //problem query
  $query=$connection->prepare("select * from `questions` where qid=?");
  $query->bind_param("s",$qid);
  $query->execute();


  $result=$query->get_result();
  if(mysqli_num_rows($result) == 1) {
    $row=mysqli_fetch_assoc($result);
    $_SESSION['qid'] = $row['qid'];
    $_SESSION['pName'] = $row['qname'];
    $_SESSION['pDesc'] = $row['question'];
    $_SESSION['constraints'] = $row['constraints'];
    $q=$connection->prepare("select * from `testcases` where qid=? limit 1");
    $q->bind_param("s",$qid);
    $q->execute();
    $res = $q->get_result();
    $r=mysqli_fetch_assoc($res);
    $_SESSION['sampleInput'] = $r['testcase'];
    $_SESSION['sampleOutput'] = $r['testcaseop'];
  } else {
    //Error Location
    header("Location: ../error.php");
  }

  $q=$connection->prepare("select * from `usercodes` where qid=? and uid=?");
  $uid =1;
  $q->bind_param("ss",$qid,$uid);
  $q->execute();
  $resu = $q->get_result();
  $resassoc = mysqli_fetch_assoc($resu);

  $c = $resassoc["ccode"];
  $java = $resassoc["javacode"];
  $cpp = $resassoc["cppcode"];
  $py = $resassoc["pycode"];

 ?>
