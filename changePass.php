<?php include 'php_only/checkLogin.php' ?>

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

  <!-- navBar -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed opacity-less" style="height:8vh;">
    <a class="navbar-brand" href="#">codeSmode</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <div class="navbar-nav ml-auto">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="dashboard.html">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="daily_Challenges.php">Questions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="codex.php">Editor</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="php_only/logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- main heading -->
  <h1 class="main-heading dashboard-header">Change Password</h1>

  <!-- 3 cards -->
  <!-- 1st Card -->
  <div class="card text-center option-card">
    <div class="card-body">
      <form action="php_only/changePass.php" method="POST">
        <label>Enter your new Password</label>
        <br>
        <input type="password" name="password" id="pass1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"	 onkeyup='check();' required >
        <br>
        <label>Re-enter password: </label>
        <br>
        <input type="password" name="cpass" id="pass2" onkeyup='check();' required>
        <br>
        <input type="submit" class="btn btn-light button" name="Login" value="Change Password">
      </form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script src="js/index.js" charset="utf-8"></script>
</body>

</html>
