console.log("scripts");

$('#registerBtn').click(function() {

  if ($.trim($('#nick').val()) == "") {
    $('#nick').addClass('is-invalid');
    $('.invalid-feedback').text("chujeks");
    return false;
  } else {
    $('#nick').removeClass('is-invalid');
  }
  if ($.trim($('#email').val()) == "") {
    $('#email').addClass('is-invalid');
    return false;
  } else {
    $('#email').removeClass('is-invalid');
  }
  if ($.trim($('#confirmMail').val()) == "") {
    $('#confirmMail').addClass('is-invalid');
    return false;
  } else {
    $('#confirmMail').removeClass('is-invalid');
  }
  if ($.trim($('#password').val()) == "") {
    $('#password').addClass('is-invalid');
    return false;
  } else {
    $('#password').removeClass('is-invalid');
  }
  if ($.trim($('#confirmPass').val()) == "") {
    $('#confirmPass').addClass('is-invalid');
    return false;
  } else {
    $('#confirmPass').removeClass('is-invalid');
  }
  if ($('#password').val() !== $('#confirmPass').val()) {
    $('#confirmPass').addClass('is-invalid');
    return false;
  }
  if ($('#email').val() !== $('#confirmMail').val()) {
    $('#confirmMail').addClass('is-invalid');
    return false;
  }



})
