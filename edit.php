<?php
include "php_only/connection.php";

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
    <link rel="stylesheet" href="css/editcss.css">
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
              
              <a id="log" href=# class="navbar-brand pull-right" style="color:white">Logout</a>
            </li>
          </ul>
        </div>
    </nav>  
    <br><br><br>
    <div class="navbar" style="background-color: black" "color:white">
    <br>
      <a id ="link" href="adminhome.php" style="color:white" >Admin Home</a><br>
      <a id ="link" href="comp2.php" style="color:white">Add Events</a><br>
      <a id ="link" href="edit.php" style="color:white"><b><i>Edit</i></b></a><br>
</div>
  <br>
    
  
    <div class="card mx-auto">
      <div class="container">
        <div class="card-header text-center" style="background-color: black">
          <b style="color: white">Edit Questions</b>
        </div>
        <div class="card-body" id="card"> 
          <form method="GET" >
              
              <?php
              
              $query = $db->prepare("SELECT * from `questions`");
              $query->execute();
              $res = $query->get_result();
              while($row = $res->fetch_assoc()){
                $qid= $row['qid'];
              ?>
              <table class="table table-hover" border="black">
              <tr><td ><?php  echo "<a href='comp2.php?id=$qid'>".$row["qname"]."</a><br />"; ?></td></tr>
              
              </table>

                <?php
                }
                ?>
              
              


              <!--   <button type="submit" class="btn btn-primary" formaction="comp3.php" style="background-color: black" "color:white">Next</button></center>
               -->    
          </form>
           
          <br>
        </div>  
    </div>

  </div>  
      
</body>
</html>
