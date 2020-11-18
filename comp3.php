<?php 

  include "php_only/connection.php";
  session_start();
  $_SESSION['qname']=$_POST['questionname'];
  $questionname=$_POST['questionname'];
  $question=$_POST['question'];
  $codec=$_POST['codec'];
  $_SESSION["ccode"] = $codec;
  $notest=$_POST['notest'];
  $constraints = $_POST["constraints"];
  if(isset($_SESSION['qid'])){
    //question exists
  $qid=$_SESSION["qid"];
  $sql=$conn->prepare("update `questions` set `qname` = ?,`question` =? , `ccode` = ?,`constraints` = ? where `qid`= ?");
  $sql->bind_param("sssss",$questionname,$question, $codec,$constraints,$qid);
  $sql->execute();
  $sql=$conn->prepare("delete from `testcases` where `qid`= ?");
  $sql->bind_param("s",$qid);
  $sql->execute();
  }
  else{
  $sql=$conn->prepare("INSERT INTO `questions`(`qname`,`question`, `ccode`,`constraints`) VALUES (?,?,?,?)");
  $sql->bind_param("ssss",$questionname,$question, $codec,$constraints);
  $sql->execute();
  $sql=$conn->prepare("select qid from `questions` where qname=?");
  $sql->bind_param("s",$questionname);
  $sql->execute();
  $result=$sql->get_result();
  $res= mysqli_fetch_assoc($result);
  $_SESSION["qid"]= $res["qid"];
  }
  $_SESSION["notest"] = $notest;


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
  				<b style="color: white">Add Testcases</b>
  			</div>
  			<div class="card-body">	
  				

          <form style="font-size: 15px" method="POST" >
          <?php 
            for($i=0;$i<$notest;$i++)
            {
           ?>   
            <div class="form-group row">
                    <label class="col-2 col-form-label">Enter test case <?php echo $i+1; ?></label>
                    <div class="col-10">
                      <textarea id="testcase1" name=<?php echo "testcase".$i; ?> rows="10" cols="120" required></textarea>
                    </div>
            </div>
          <?php 
            }
          ?>
            <button type="submit" class="btn btn-primary" formaction="comp2.php" style="background-color: black" "color:white">Previous</button>
            <button type="submit"  class="btn btn-primary" formaction="php_only/comp5conn.php" style="background-color: black" "color:white">Submit</button>
            <button type="submit" class="btn btn-primary" formaction="php_only/comp5conn2.php" style="background-color: black" "color:white">Add Another Question</button>
  				</form>	
  				<br>
  				
  			</div>
         	
		</div>
	</div>
</body>
</html>
