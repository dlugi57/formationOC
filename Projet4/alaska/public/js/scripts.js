console.log("scripts");
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

//POST ADMIN
$('#addPostBtn').click(function() {
  if ($.trim($('#postTitle').val()) == "") {
    $('#postTitle').addClass('is-invalid');
    $('.invalid-feedback').text("Champs obligatoire");
    return false;
  } else {
    $('#postTitle').removeClass('is-invalid');
  }

  var editorContent = tinyMCE.get('postContent').getContent();
  if (editorContent == "") {
    $('.invalidContent').show();
    $('.invalidContent').text("Champs obligatoire");
    return false;
  } else {
    $('.invalidContent').hide();
  }
})

//UPDATE POST
$('#updatePostBtn').click(function() {
  if ($.trim($('#postTitleUpd').val()) == "") {
    $('#postTitleUpd').addClass('is-invalid');
    $('.invalid-feedback').text("Champs obligatoire");
    return false;
  } else {
    $('#postTitleUpd').removeClass('is-invalid');
  }

  var editorContent = tinyMCE.get('updateContent').getContent();
  if (editorContent == "") {
    $('.invalidContent').show();
    $('.invalidContent').text("Champs obligatoire");
    return false;
  } else {
    $('.invalidContent').hide();
  }
})

//UPDATE COMMENT
$('#updateCommentBtn').click(function() {
  if ($.trim($('#comment').val()) == "") {
    $('#comment').addClass('is-invalid');
    $('.invalid-feedback').text("Champs obligatoire");
    return false;
  } else {
    $('#comment').removeClass('is-invalid');
  }
})

//ADD COMMENT
$('#commentPostBtn').click(function() {
  if ($.trim($('#commentPostContent').val()) == "") {
    $('#commentPostContent').addClass('is-invalid');
    $('.invalid-feedback').text("Champs obligatoire");
    return false;
  } else {
    $('#commentPostContent').removeClass('is-invalid');
  }
})


//MODAL
//Function to get adres from submit button and put it into modal window to accept
$('#modalShow').on('show.bs.modal', function(e) {
  $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});

//COMMENTS PAGE
//shows and hide comments in comment list page
$('#commentsReported').click(function() {
  $('.notReported').hide();
  $('.reported').show();
})

$('#commentsAll').click(function() {
  $('.notReported').show();
  $('.reported').show();
})

$('#commentsNotReported').click(function() {
  $('.reported').hide();
  $('.notReported').show();
})
