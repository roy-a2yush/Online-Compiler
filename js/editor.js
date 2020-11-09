$(document).ready(function() {
$(window).resize(function(){
  var heightofnav = document.getElementById('nav').offsetHeight;
  var h = window.innerHeight;
  var vhh = (heightofnav/h)*100;
  console.log('nav ka vhh is '+vhh);
  var res= 16-vhh;
  document.getElementById('bottom-tag').style.height= res+"vh";
});


$('#customIP').on('hidden.bs.modal',function(){
  $('#customipcheck').prop('checked',false);
})


$('#sel1').change(function(){
 var x = document.getElementById('sel1').value;
 if(x=="c"){
   ext="c";
   editor.session.setMode("ace/mode/c_cpp");
   editor.session.setValue(c);
 }
 if(x=="cpp"){
   ext="cpp";
   editor.session.setMode("ace/mode/c_cpp");
   editor.session.setValue(cpp);
 }
 if(x=="java"){
   ext="java";
   //console.log("java");
   editor.session.setMode("ace/mode/java");
   editor.session.setValue(java);
 }
 if(x=="py"){
   ext="py";
   //console.log("python");
   editor.session.setMode("ace/mode/python");
   editor.session.setValue(py);
 }
})



function ajax_run(code,ip,ext) {
    var hr = new XMLHttpRequest();
    var url = "php_only/runcode.php";
    var vars = "code=" + encodeURIComponent(code) + "&textIP=" + ip+ "&ext=" + ext;
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
      if (hr.readyState == 4 && hr.status == 200) {
        var return_data = hr.responseText;
        $("#outputText").html(return_data);
      }
    }
    hr.send(vars); // Actually execute the request
    $("#outputText").html("<div class='spinner-grow text-dark' role='status'><span class='sr-only'>Loading...</span></div>");
  }



$('#RunWithIP').click(function(){
var prog = editor.getSession().getValue();
var ip = document.getElementById('ip').value;
if(ip.trim()==""){
  ip="No input";
}
ajax_run(prog,ip,ext);
$('#runButton').on('shown.bs.modal',function(){
  $('#inputText').text(ip);
})
})



editor.session.on('change', function(delta) {
   if(ext=="c"){
     c=editor.getSession().getValue();
   }
   if(ext=="Java"){
     java=editor.getSession().getValue();
   }
   if(ext=="cpp"){
     cpp = editor.getSession().getValue();
   }
   if(ext=="py"){
     py = editor.getSession().getValue();
   }
});
});
