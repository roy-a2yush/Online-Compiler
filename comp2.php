<?php
include "php_only/connection.php";
session_start();
if(isset($_GET['id'])){
  $qid = $_GET['id'];
  $_SESSION["qid"]= $qid;
  $stmt = $db->prepare("select * from `questions` where qid=?");
  $stmt->bind_param("s",$qid);
  $stmt->execute();
  $res = $stmt->get_result();
  $row = $res->fetch_assoc();
  
  $numr = mysqli_num_rows($res);  
  if($numr >= 1)
  { 
    $qname = $row["qname"];
    $ques = $row["question"];
    $ccode = $row["ccode"];
    $notest = $row["notest"];
    $constraints = $row["constraints"];
  }  
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/compcss.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>codeSmode</title>
</head>
<body>
	<nav class="navbar navbar-dark navbar-expand-sm fixed-top" style="background:black">
    	<div class="container">
      		<a class="navbar-brand" href="#" style="color:white"><b>codeSmode</b><br></a>
      		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
        		<span class="navbar-toggler-icon"></span>
      		</button>
      		<ul style="list-style-type:none;">
            <li type="">
              
              <a id="log" href="index.php" class="navbar-brand pull-right" style="color:white">Logout</a>
            </li>
          </ul>
       	</div>
    </nav>  
    <br><br><br>
    <div class="navbar" style="background-color: black" "color:white">
    <br>
    	<a id ="link" href="adminhome.php">Admin Home</a><br>
  		
  		<a id ="link" href="comp2.php"><b><i>Add Events</i></b></a><br>
  		
  		<a id ="link" href="edit.php">Edit</a><br>
</div>
	<br>
  	
  
  	<div class="card mx-auto">
  		<div class="container">
  			<div class="card-header text-center" style="background-color: black">
  				<b style="color: white">Add Questions</b>
  			</div>
  			<div class="card-body">	
  				<form method="POST" >
            <div class="form-group row">
                    <label class="col-2 col-form-label">Question Name</label>
                    <div class="col-10">
                        <input class="form-control" type="text" id="questionname" name="questionname" required value = <?php if(isset($qname)) {echo $qname;} ?> >
                        
                    </div>
            </div>
            <div class="form-group row">
                    <label class="col-2 col-form-label">Enter the Question</label>
                    <div class="col-10">
                        <input class="form-control" type="text" id="question" name="question" required value = <?php if(isset($ques)) { echo $ques;} ?> >
                    </div>
            </div>
            <div class="form-group row">
                    <label class="col-2 col-form-label">Constraints</label>
                    <div class="col-10">
                       <textarea id="constraints" name="constraints" rows="10" cols="120" required><?php if(isset($constraints)) {echo $constraints ;} ?></textarea> 
                    </div>
            </div>
            <div class="form-group row">
                    <label class="col-2 col-form-label">Enter working code in C</label>
                    <div class="col-10">
                      <textarea id="codec" name="codec" rows="10" cols="120" required><?php if(isset($ccode)) {echo $ccode;} ?></textarea>
                    </div>
            </div>
            <div class="form-group row">
                    <label class="col-2 col-form-label">Enter the number of testcases</label>
                    <div class="col-10">
                        <input class="form-control" type="text" id="notest" name="notest" required value = <?php if(isset($notest)) {echo $notest;} ?>> 
                    </div>
            </div>
            

            <!-- <div class="form-group row">
                    <label class="col-2 col-form-label">Enter working code in C++</label>
                    <div class="col-10">
                      <textarea id="codecpp" name="codecpp" rows="10" cols="120"></textarea>
                    </div>
            </div>

            <div class="form-group row">
                    <label class="col-2 col-form-label">Enter working code in Java</label>
                    <div class="col-10">
                      <textarea id="codej" name="codej" rows="10" cols="120"></textarea>
                    </div>
            </div>

            <div class="form-group row">
                    <label class="col-2 col-form-label">Enter working code in Python</label>
                    <div class="col-10">
                      <textarea id="codep" name="codep" rows="10" cols="120"></textarea>
                    </div>
            </div> -->
            <!-- <div class="form-group row">
                    <label class="col-2 col-form-label">Enter number of test cases</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="testcases" id="testcases" required>
                    </div>
            </div> -->
          			<button type="submit" class="btn btn-primary" formaction="comp3.php" style="background-color: black" "color:white">Next</button></center>
                  
  				</form>
           
          <br>
  			</div>	
		</div>

	</div>	
      
</body>
</html>
