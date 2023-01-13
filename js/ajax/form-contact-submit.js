$("document").ready(function () {
  $("#btnSubmit").click(function(){
    $.post( "https://marc.tanskygraphy.com/php/index.php",{
  email: $("#txtEmail").val(),
  phone: $("#telPhone").val(),
  subject: $("#txtSubject").val(),
  message: $("#txtMessage").val()
  }, function( data ) {
    var splitData = data.split(".");
      var status = splitData[0];
      var message = splitData[1];
      $("#results").append(
        " <div class='alert alert-" +
          status +
          "'  role='alert'>" +
          message +
          "</div>"
      );
      clearForm();
  });
  })
function clearForm(){
  $("#txtEmail").val("");
  $("#telPhone").val("");
  $("#txtSubject").val("");
  $("#txtMessage").val("")
}

});
