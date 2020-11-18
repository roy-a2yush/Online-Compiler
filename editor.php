<?php include 'php_only/checkLogin.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Editor</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<meta charset="utf-8">
<link rel="stylesheet" href="css/editor.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <!-- This is a pop up card for taking user ip -->
  <div class="modal fade" id="customIP" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Enter Your Input</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="input-group">
    <div class="input-group-prepend">
      <span class="input-group-text">Enter Your Testcase</span>
    </div>
    <textarea class="form-control" rows="10" id="ip"></textarea>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="RunWithIP" data-dismiss="modal" data-toggle="modal" data-target="#runButton">Run</button>
      </div>
    </div>
  </div>
  </div>
  <!-- This is a pop up card for taking user ip -->
  <div class="modal fade" id="saveFile" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Enter Your Input</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="row">
                <div class="col-sm-8">
                  <input type="text" class="form-control mr-n2" id="fname" placeholder="Enter filename">
                </div>
                <div class="col-sm-2 h5" id="ext">
              </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Save</button>
      </div>
    </div>
  </div>
  </div>
  <!-- This is a pop up card for displaying run's output -->
  <div class="modal fade" id="runButton" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Output</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"> Input: </h5>
            <p class="card-text" id="inputText"></p>
          </div>
        </div>
        <div class="card" style="margin-top:10px;">
          <div class="card-body">
            <h5 class="card-title"> Output: </h5>
            <p class="card-text" id="outputText"></p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="nav">
<a class="navbar-brand" href="#">codeSmode</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
  <div class="navbar-nav">
    <a class="nav-item nav-link" href="dashboard.php">Home <span class="sr-only">(current)</span></a>
    <a class="nav-item nav-link" href="daily_Challenges.php">Questions</a>
    <a class="nav-item nav-link disabled active" href="#" tabindex="-1" aria-disabled="true">Editor</a>
  </div>
</div>
</nav>
<div class="container-fluid rempadding">
  <div class="col-12 col-xs-12 rempadding">
  <div id="editor"></div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ace.js" type="text/javascript" charset="utf-8"></script>
  <script>
  var c="#include<stdio.h>\nvoid main(){\n\n}";
  var java = "class Main{\n   public static void main(String[] args){\n\n   }\n}";
  var cpp = "#include<iostream>\nusing namespace std;\nint main(){\n\n    return 0;\n}";
  var py = "";
 var editor = ace.edit("editor");
 editor.setTheme("ace/theme/cobalt");
 editor.session.setValue(c);
 editor.session.setMode("ace/mode/c_cpp");
 editor.setShowPrintMargin(false);
 editor.setFontSize("12px");
 var ext="c";
</script>
</div>
</div>
<div class="container-fluid bg-dark" id ="bottom-tag" style="width:100%;padding:1vh;">
  <select class="bg-dark text-white rounded dropup" id="sel1">
    <option value="c">C</option>
    <option value="cpp">C++</option>
    <option value="java">Java</option>
    <option value="py">Python</option>
  </select>
<div class="float-right mr-5">
  <!--  <button class="btn btn-m btn-info" data-toggle="modal" data-target="#saveFile">Save</button> -->
    <button class="btn btn-m btn-primary" onclick="toogleRun();" data-toggle="modal" data-target="#customIP">Execute Code</button>
  </div>
</div>
<script type="text/javascript">
  var heightofnav = document.getElementById('nav').offsetHeight;
  var h = window.innerHeight;
  var vhh = (heightofnav/h)*100;
  var res= 16-vhh;
  document.getElementById('bottom-tag').style.height= res+"vh";
</script>
<script type="text/javascript" src="js/editor.js"></script>
</body>
</html>
