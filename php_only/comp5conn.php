
<?php 
  include "config.php";
  session_start();
  
  $qname=$_SESSION['qname'];
  $testcase3=$_POST['testcase3'];
  $sql="UPDATE `questions` SET `testcase3`='".$testcase3."' WHERE `qname`='".$qname."'";
  $conn -> query($sql);  
  header('Location: adminhome.php');
?>
