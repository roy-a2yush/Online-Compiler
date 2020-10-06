//to remove the error after click of a button
$(document).click(function() {
  $(".error").html("<h6></h6>");
});

//function to check the passwords are matching or not
function check() {
  console.log($("#pass1").val());
  console.log($("#pass2").val());
  if ($("#pass1").val() != $("#pass2").val()) {
    $("#pass1").addClass("error-pass");
    $("#pass2").addClass("error-pass");
    $(".btn").prop("disabled", true);
  } else {
    $("#pass1").removeClass("error-pass");
    $("#pass2").removeClass("error-pass");
    $(".btn").prop("disabled", false);
  }
}
