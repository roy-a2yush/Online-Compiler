<?php
include "connection.php";
$ext = $_POST["ext"];
chdir("..");
chdir("UserProgSpace");
$uid = $_POST["uid"];
$qid = $_POST["qid"];
$query = $conn->prepare("select * from `testcases` where qid = ?");
$query->bind_param("s",$qid);
$query->execute();
$res = $query->get_result();
$count=0;
$countreq = mysqli_num_rows($res);
$c;
if($ext=="c"){
    include("compilercodes/cfunc.php");
    $c = new codeWithC($_POST["code"]);
    $c->compile();
}
else if($ext=="cpp"){
    include("compilercodes/cppfunc.php");
    $c = new codeWithCpp($_POST["code"]);
    $c->compile();
}
else if($ext=="java"){
    include("compilercodes/java.php");
    $c = new codeWithJava($_POST["code"]);
    $c->compile();
}
else{
    include("compilercodes/python.php");
    $c = new codeWithPython($_POST["code"]);
    $c->compile();
}


while($r = mysqli_fetch_assoc($res)){
    $realOP = $r["testcaseop"];
    $ip = $r["testcase"];
    $c->writeInput($ip);
    $op1= $c->execute(false);
    //echo $op1." ".$realOP."<br>";
    if(trim($op1) == trim($realOP)){
        $count++;
    }
}

$c->clearFiles();
$completed = false;
if($countreq == $count){
    //correct op
	$completed = true;
    echo "<div class='bg-success rounded p-3 text-white'> <h5> Congrats, You have passed all testcases!</h5></div>";
}
else{
    //wrong op
   echo "<div class='bg-danger rounded p-3 text-white'><h5>Wrong Output:</h5>Oops! You have cleared $count/$countreq testcases! Change Your code and submit again!</div>";
}
$checkQuery = $conn->prepare("select * from `overview` where uid=? and qid=?");
$checkQuery->bind_param("ss",$uid,$qid);
$checkQuery->execute();
$res = $checkQuery->get_result();
if(mysqli_num_rows($res)>=1){
	$previousHighest = mysqli_fetch_assoc($res);
	$previousHighestCount = $previousHighest["num_test_case_passed"];
	if($previousHighestCount<$count){
		$query = $conn->prepare("update `overview` set `num_test_case_passed` = ? ,`num_test_case_present` = ? , `isCompleted`=? where uid =? and qid=?");
		$query->bind_param("sssss",$count,$countreq,$completed,$uid,$qid);
		$query->execute();
	}
}
else{
$query = $conn->prepare("insert into `overview` values(?,?,?,?,?)");
$query->bind_param("sssss",$uid,$qid,$count,$countreq,$completed);
$query->execute();
}
?>
