<?php
include "connection.php";
include("compilercodes/cfunc.php");
$ext = $_POST["ext"];
chdir("..");
chdir("UserProgSpace");
$qid = $_POST["qid"];
$query = $conn->prepare("select ccode from `questions` where qid = ?");
$query->bind_param("s",$qid);
$query->execute();
$res = $query->get_result();
$r = mysqli_fetch_assoc($res);
$codeFromServer = $r["ccode"];
$op1="";
if($ext=="c"){
    $c = new codeWithC($_POST["code"]);
    $c->writeInput($_POST["textIP"]);
    $c->compile();
    $op1 = $c->execute(false);
    $c->clearFiles();
}
else if($ext=="cpp"){
  include("compilercodes/cppfunc.php");
  $c = new codeWithCpp($_POST["code"]);
  $c->writeInput($_POST["textIP"]);
  $c->compile();
  $op1 = $c->execute(false);
  $c->clearFiles();
}
else if($ext=="java"){
    include("compilercodes/java.php");
    $c = new codeWithJava($_POST["code"]);
    $c->writeInput($_POST["textIP"]);
    $c->compile();
    $op1 = $c->execute(false);
    $c->clearFiles();
}
else{
    include("compilercodes/python.php");
    $c = new codeWithPython($_POST["code"]);
    $c->writeInput($_POST["textIP"]);
    $c->compile();
    $op1 = $c->execute(false);
    $c->clearFiles();
}

$c1 = new codeWithC($codeFromServer);
$c1->writeInput($_POST["textIP"]);
$c1->compile();
$op2 = $c1->execute(false);
$c1->clearFiles();


if(trim($op1) == trim($op2)){
    //correct op
    echo "<div class='bg-success rounded p-3 text-white'> <h5> Correct Output:</h5>$op1</div>";
}
else {
    $op2 = $op2."<br />";
    if(trim($op1) == trim($op2)) {
        //correct op
        echo "<div class='bg-success rounded p-3 text-white'> <h5> Correct Output:</h5>$op1</div>";
    } else {
        //wrong op
        echo "<div class='bg-danger rounded p-3 text-white'><h5>Wrong Output:</h5>$op1!</div>";
    }
}
?>
