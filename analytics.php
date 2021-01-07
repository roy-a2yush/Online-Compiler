<?php
    include 'php_only/connection.php';
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
    <style>
        #myTable {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
	<nav class="navbar navbar-dark navbar-expand-sm fixed-top" style="background:black">
    	<div class="container">
      		<a class="navbar-brand" href="adminhome.php " style="color:white"><b>codeSmode</b><br></a>
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
    	<a id ="link" href="adminhome.php"><b><i>Admin Home</i></b></a><br>
  		
  		<a id ="link" href="comp2.php">Add Events</a><br>
  		
  		<a id ="link" href="edit.php">Edit</a><br>

		<a id ="link" href="resetPass.php">Reset Password</a><br>

		<a id ="link" href="verifyAccounts.php">Verify Accounts</a><br>

		<a id ="link" href="analytics.php">Analytics</a><br>
	</div>
	<br>
  	
  	<div class="card mx-auto">
  		<div class="container">
  			<div class="card-header text-center" style="background-color: black">
  				<b style="color: white">Admin Panel</b>
  			</div>
  			<div class="card-body">
              <div class="table-responsive">
              <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Name" title="Type in a name">
              <br>
              <br>
                <table class="table" id="myTable" style="margin-top: .5rem;">
                    <tr>
                        <th>qid</th>
                        <th>uid</th>
                        <th>name</th>
                        <th>email</th>
                        <th>phoneNo</th>
                        <th>number of test cases present</th>
                        <th>number of test cases passed</th>
                    </tr>
                    <?php

                        $sql_stmt = "Select * from overview order by qid, uid";
                        $result = mysqli_query($db, $sql_stmt);
                        while ($question = $result->fetch_assoc()) {
                        $qid = $question['qid'];
                        $uid = $question['uid'];
                        $num_test_case_passed = $question['num_test_case_passed'];
                        $num_test_case_present = $question['num_test_case_present'];
                        $query=$connection->prepare("select * from `user` where uid=?");
                        $query->bind_param("s",$uid);
                        $query->execute();
                        $result=$query->get_result();
                        if(mysqli_num_rows($result) == 1) {
                            $row=mysqli_fetch_assoc($result);
                            $name = $row['name'];
                            $email = $row['email'];
                            $phoneNo = $row['phoneNo'];

                    ?>
                    <tr>
                        <td><?php echo $qid; ?></td>
                        <td><?php echo $uid; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $phoneNo; ?></td>
                        <td><?php echo $num_test_case_present; ?></td>
                        <td><?php echo $num_test_case_passed; }}?></td>
                    </tr>
                </table>
              </div>
  			</div>	
		</div>
    </div>
    <script>
          function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
              td = tr[i].getElementsByTagName("td")[2];
              if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                  tr[i].style.display = "";
                } else {
                  tr[i].style.display = "none";
                }
              }
            }
          }
        </script>	
</body>
</html>
