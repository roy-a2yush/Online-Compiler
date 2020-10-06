<?php
  include 'php_only/connection.php';
  session_start();
  if(isset($_SESSION['uid']))
    header("Location: php_only/logout.php");
?>

<!-- HTML code -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>codeSmode</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Courier+Prime:ital,wght@0,400;0,700;1,700&family=Lilita+One&family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <h1 class="main-heading">Welcome to the <span class="underline">codeSmode</span>,<br>an Online Compiler!</h1>
    <div class="form">
      <div id="carouselExampleControls" class="carousel slide" data-interval="false" data-pause="hover">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <h1 class="sub-heading">Login:</h1>
            <form action="php_only/signIn.php" method="post">
              <label>email ID:</label><br>
              <input type="email" name="email" value="" required><br>
              <label>password: </label><br>
              <input type="password" name="password" value="" required><br>
              <input type="submit" class="btn btn-light button" name="Login" value="Login">
            </form>
            <div class="register">
              <a href="#carouselExampleControls" role="button" data-slide="prev" class="register-link">Register?</a>
            </div>
          </div>
          <div class="carousel-item" id="reg">
            <h1 class="sub-heading">Register:</h1>
            <form action="php_only/signUp.php" method="post">
              <div class="row login-form">
                <div class="col-lg-6 right">
                  <div class="center">
                    <label>Name:</label>
                    <br>
                    <input type="text" name="name" value="" required>
                    <br>
                    <label>email ID:</label>
                    <br>
                    <input type="email" name="email" value="" required>
                    <br>
                    <label>password: </label>
                    <br>
                    <input type="password" name="password" id="pass1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"	 onkeyup='check();' required >
                    <br>
                  </div>
                </div>
                <div class="col-lg-6 left">
                  <div class="center">
                    <label>Phone No.</label>
                    <br>
                    <input type="tel" name="phoneNo"  pattern="[0-9]{10}" title="Please enter your 10 digit phone no." required/>
                    <br>
                    <label>Organisation:</label>
                    <br>
                    <input type="text" name="organisation" required>
                    <br>
                    <label>Re-enter password: </label>
                    <br>
                    <input type="password" name="cpass" id="pass2" onkeyup='check();' required>
                    <br>
                  </div>
                </div>
                <input type="submit" class="btn btn-light button" name="Login" value="Register">
            </form>
          </div>
        </div>
        <a class="carousel-control-prev prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
    <h3 style="color: red; font-weight: bold; margin-top: 5%;" class="error">
      <?php
        if(isset($_GET['error']))
          echo $_GET['error'];
      ?>
    </h3>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="js/index.js" charset="utf-8"></script>
  </body>
</html>
