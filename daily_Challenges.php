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
            <a class="nav-link" href="#">Questions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Problems</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Editor</a>
          </li>
          <li class="nav-item dropdown padding-right">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">username</a>
              <a class="dropdown-item" href="#">logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- main heading -->
  <h1 class="main-heading dashboard-header">Daily Challenges</h1>

  <!-- Jumbotron for problems -->
  <div class="jumbotron problem-card">
    <h1 class="display-4 sub-heading">Hello, world!</h1>
    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
    <hr class="my-4">
    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
    <a class="btn btn-primary btn-lg" href="codex.php?pid=1" role="button">Solve</a>
  </div>
