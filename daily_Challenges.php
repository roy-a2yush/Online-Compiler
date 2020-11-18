<?php

  include 'php_only/checkLogin.php';

?>

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
            <a class="nav-link" href="editor.php">Editor</a>
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
  <?php

    $sql_stmt = "Select * from questions";
    $result = mysqli_query($db, $sql_stmt);
    while ($question = $result->fetch_assoc()) {
        $qid = $question['qid'];
        $qname = $question['qname'];
        $q = $question['question'];

  ?>
  <!-- Jumbotron for problems -->
  <div class="jumbotron problem-card">
    <h1 class="display-4 sub-heading"><?php echo $qname; ?></h1>
    <p class="lead"><?php echo $q; ?></p>
    <a class="btn btn-primary btn-lg" href="codex.php?qid=<?php echo $qid; ?>" role="button">Solve</a>
  </div>
<?php } ?>

</body>
</html>
