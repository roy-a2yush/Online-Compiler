<?php
include "connection.php";
$c =$_POST["c"];
$cpp =$_POST["cpp"];
$java =$_POST["java"];
$py =$_POST["py"];
$uid = $_POST["uid"];
$qid=$_POST["qid"];
$query=$connection->prepare("select * from `usercodes` where qid=? and uid=?");
  $query->bind_param("ss",$qid, $uid);
  $query->execute();
  $res = $query->get_result();
  $num = mysqli_num_rows($res);
  if($num>=1){
      //update
    $query=$connection->prepare("update `usercodes` set ccode=?, cppcode=?, javacode=?, pycode=? where qid=? and uid=?");
    $query->bind_param("ssssss",$c,$cpp,$java,$py,$qid, $uid);
    $query->execute();
  }
  else{
      //insert
    $query=$connection->prepare("insert into `usercodes` values(?,?,?,?,?,?)");
    $query->bind_param("ssssss",$uid,$qid,$c,$java,$cpp,$py);
    $query->execute();
  }
?>