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
            <a class="nav-link" href="changePass.php">Change Password</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="php_only/logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- main heading -->
  <h1 class="main-heading dashboard-header">Dashboard</h1>

  <!-- 3 cards -->
  <!-- 1st Card -->
  <div class="card text-center option-card">
    <div class="card-header sub-heading card-sub-heading no-opactity">
      Online Compiler
    </div>
    <div class="card-body">
      <h5 class="card-title no-opactity">Head to our online Compiler</h5>
      <p class="card-text no-opactity">Right now we support coding in 4 languages, namely C, C++, Java and Python.</p>
      <div class="no-opactity"><a href="editor.php" class="btn btn-primary">Go somewhere</a></div>
    </div>
    <div class="card-footer text-muted no-opactity">
      2 days ago
    </div>
  </div>

  <!-- 2nd Card -->
  <div class="card text-center option-card">
    <div class="card-header sub-heading card-sub-heading">
      Daily Challenges
    </div>
    <div class="card-body">
      <h5 class="card-title">Special title treatment</h5>
      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      <a href="daily_Challenges.php" class="btn btn-primary">Go somewhere</a>
    </div>
    <div class="card-footer text-muted">
      2 days ago
    </div>
  </div>

  <!-- 3rd Card -->
  <!--<div class="card text-center option-card">
    <div class="card-header sub-heading card-sub-heading">
      Saved Programs
    </div>
    <div class="card-body">
      <h5 class="card-title">Special title treatment</h5>
      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
    <div class="card-footer text-muted">
      2 days ago
    </div>
  </div>-->
</body>

</html>
