<?php
$ext = $_POST["ext"];
chdir("..");
chdir("UserProgSpace");
if($ext=="c"){
  include("compilercodes/cfunc.php");
  $c = new codeWithC($_POST["code"]);
}
else if($ext=="cpp"){
  include("compilercodes/cppfunc.php");
  $c = new codeWithCpp($_POST["code"]);
}
else if($ext=="java"){
  include("compilercodes/java.php");
  $c = new codeWithJava($_POST["code"]);
}
else{
  include("compilercodes/python.php");
  $c = new codeWithPython($_POST["code"]);
}
$c->writeInput($_POST["textIP"]);
$c->compile();
$c->execute();
$c->clearFiles();
?>
