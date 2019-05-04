console.log();
if (document.location.href.indexOf("home") >= 0) {
    $(window).on('load',function(){
        $('#modalShowHome').modal('show');
    });
}
//INSCRIPTION PAGE CONDITIONS
$('#registerBtn').click(function() {

  if ($.trim($('#nick').val()) == "") {
    $('#nick').addClass('is-invalid');
    $('.invalid-feedback').text("Champs obligatoire");
    return false;
  } else {
    $('#nick').removeClass('is-invalid');
  }
  if ($.trim($('#email').val()) == "") {
    $('#email').addClass('is-invalid');
    $('.invalid-feedback').text("Champs obligatoire");
    return false;
  } else {
    $('#email').removeClass('is-invalid');
  }
  if ($.trim($('#confirmMail').val()) == "") {
    $('#confirmMail').addClass('is-invalid');
    $('.invalid-feedback').text("Champs obligatoire");
    return false;
  } else {
    $('#confirmMail').removeClass('is-invalid');
  }
  if ($.trim($('#password').val()) == "") {
    $('#password').addClass('is-invalid');
    $('.invalid-feedback').text("Champs obligatoire");
    return false;
  } else {
    $('#password').removeClass('is-invalid');
  }
  if ($.trim($('#confirmPass').val()) == "") {
    $('#confirmPass').addClass('is-invalid');
    $('.invalid-feedback').text("Champs obligatoire");
    return false;
  } else {
    $('#confirmPass').removeClass('is-invalid');
  }
  if ($('#password').val() !== $('#confirmPass').val()) {
    $('#confirmPass').addClass('is-invalid');
    $('.invalid-feedback').text("Le mot de passe doit être identique");
    return false;
  }
  if ($('#email').val() !== $('#confirmMail').val()) {
    $('#confirmMail').addClass('is-invalid');
    $('.invalid-feedback').text("Email doit être identique");
    return false;
  }

  var passwordValue = $('#password').val();

  if (passwordValue.length < 8) {
    $('#confirmPass').addClass('is-invalid');
    $('.invalid-feedback').text("Le mot de passe doit être de 8 caractères minimum");
    return false;
  }
  re = /[0-9]/;
  if (!re.test(passwordValue)) {
    $('#confirmPass').addClass('is-invalid');
    $('.invalid-feedback').text("Le mot de passe doit contenir au moins 1 chiffre. ");
    return false;
  }
  re = /[a-z]/;
  if (!re.test(passwordValue)) {
    $('#confirmPass').addClass('is-invalid');
    $('.invalid-feedback').text("Le mot de passe doit contenir au moins 1 caractère en minuscule");
    return false;
  }
  re = /[A-Z]/;
  if (!re.test(passwordValue)) {
    $('#confirmPass').addClass('is-invalid');
    $('.invalid-feedback').text("Le mot de passe doit contenir au moins 1 caractère en majuscule");
    return false;
  }
  re = /^\w+$/;
  if (!re.test(passwordValue)) {
    $('#confirmPass').addClass('is-invalid');
    $('.invalid-feedback').text("Le mot de passe doit contenir QUE des lettres ou des chiffres");
    return false;
  }
})

//CONNEXION PAGE CONDITIONS
$('#loginBtn').click(function() {
  if ($.trim($('#login').val()) == "") {
    $('#login').addClass('is-invalid');
    $('.invalid-feedback').text("Champs obligatoire");
    return false;
  } else {
    $('#login').removeClass('is-invalid');
  }
  if ($.trim($('#pass').val()) == "") {
    $('#pass').addClass('is-invalid');
    $('.invalid-feedback').text("Champs obligatoire");
    return false;
  } else {
    $('#pass').removeClass('is-invalid');
  }
})
//add some class to header if page move change background color to white
$(window).on("scroll", function() {
  var scrollPos = $(window).scrollTop();
  if (scrollPos <= 0) {
    $('.header').removeClass('header-scroll')
  } else {
    $('.header').addClass('header-scroll');
  }
});
