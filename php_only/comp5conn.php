
<?php 
  include "connection.php";
  session_start();
  $notest = $_POST["notest"];
  $qname=$_SESSION['qname'];
  $qid = $_SESSION['qid'];
  $notest= $_SESSION['notest'];
  $query=$connection->prepare("Insert into `testcases` values (?,?)");
  for($i=0;$i<$notest ; $i++){
    $testcase = $_POST["testcase$i"];
    $query->bind_param("ss",$qid,$testcase);
    $query->execute();
  }
  header('Location: ../adminhome.php');
?>
