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
 if(x=="cpp"){
   ext="cpp";
 }
 if(x=="java"){
   ext="java";
   //console.log("java");
   editor.session.setMode("ace/mode/java");
 }
 if(x=="py"){
   ext="py";
   //console.log("python");
   editor.session.setMode("ace/mode/python");
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
 $('#runWithoutIP').click(function(){
   var prog = editor.getSession().getValue();
   var ip = document.getElementById('sIN').textContent;
   if(ip.trim()==""){
     ip="No input";
   }
   ajax_run(prog,ip,ext);
   $('#runButton').on('shown.bs.modal',function(){
     $('#inputText').text(ip);
   })
  })