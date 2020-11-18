
<?php
  include "compilercodes/cfunc.php";
  $qname=$_SESSION['qname'];
  $qid = $_SESSION['qid'];
  $notest= $_SESSION['notest'];
  $query=$connection->prepare("Insert into `testcases` values (?,?,?)");
  $c = $_SESSION["ccode"];
  $code = new codeWithC($c);
  $code->compile();
  for($i=0;$i<$notest ; $i++){
    $testcase = $_POST["testcase$i"];
    $code->writeInput($testcase);
    $op = $code->execute(false);
    $query->bind_param("sss",$qid,$testcase,$op);
    $query->execute();
  }
  $code->clearFiles();
  header('Location: ../adminhome.php');
?>
