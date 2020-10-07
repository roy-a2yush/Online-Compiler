<?php
$ext = $_POST["ext"];
if($ext=="c"){
  include("compilercodes/c.php");
}
else if($ext=="cpp"){
  include("compilercodes/cpp.php");
}
else if($ext=="java"){
  include("compilercodes/java.php");
}
else{
  include("compilercodes/python.php");
}
?>
