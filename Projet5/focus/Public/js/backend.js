$(function() {
  /*
    $('#addClientDash').click(function(){
      $('#clientForm').removeClass('hidden');
    })
  */

  $('.clientsTable').DataTable({
    'paging': true,
    'lengthChange': true,
    'searching': true,
    'ordering': true,
    'info': true,
    'autoWidth': true
  })

  $(".clickableRowClient").click(function() {
    window.location = $(this).data("href");
  });

  //Initialize Select2 Elements
  $('.select2').select2()

  //Date picker
  $('#datepickerSeance').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  })

  $('#datepickerSeanceModify').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  })



  $('#datepickerTaxe').datepicker({
    autoclose: true,
    viewMode: "months",
    minViewMode: "months",
    format: 'yyyy-mm-dd'
  })

  //Timepicker
  $('.timepicker').timepicker({
    showInputs: false,
    showMeridian: false
  })

  //Money Euro
  $('[data-mask]').inputmask();

  //MODAL
  //Function to get adres from submit button and put it into modal window to accept
  $('#modalShow').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
  });

  //CONDITIONS

  function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
  };

  function isValidDate(dateString) {
    var regEx = /^\d{4}-\d{2}-\d{2}$/;
    if (!dateString.match(regEx)) return false; // Invalid format
    var d = new Date(dateString);
    var dNum = d.getTime();
    if (!dNum && dNum !== 0) return false; // NaN value, Invalid date
    return d.toISOString().slice(0, 10) === dateString;
  }

  function isValidTime(timeString){
    var regEx = /^\d{2}:\d{2}$/
    if (!timeString.match(regEx)) return false;
  }

  //CLIENT
  $('.addClient').click(function() {
    if ($.trim($('.addClientName').val()) == "") {
      $('.addClientName').closest('div.form-group').addClass('has-error');
      $('.addClientName').closest('div.form-group').find('span.help-block').text("Champs obligatoire");
      return false;
    } else {
      $('.addClientName').closest('div.form-group').removeClass('has-error');
      $('.addClientName').closest('div.form-group').find('span.help-block').text("");
    }

    if ($.trim($('.addClientTel').val()) == "") {
      $('.addClientTel').closest('div.form-group').addClass('has-error');
      $('.addClientTel').closest('div.form-group').find('span.help-block').text("Champs obligatoire");
      return false;
    } else {
      if ($.isNumeric($('.addClientTel').val())) {
        $('.addClientName').closest('div.form-group').removeClass('has-error');
        $('.addClientName').closest('div.form-group').find('span.help-block').text("");
      } else {
        $('.addClientTel').closest('div.form-group').addClass('has-error');
        $('.addClientTel').closest('div.form-group').find('span.help-block').text("10 chiffre obligatoire");
        return false;
      }
    }

    if ($('.addClientEmail').val() !== "") {
      if (!isValidEmailAddress($('.addClientEmail').val())) {
        $('.addClientEmail').closest('div.form-group').addClass('has-error');
        $('.addClientEmail').closest('div.form-group').find('span.help-block').text("Format mail invalide");
        return false;
      } else {
        $('.addClientEmail').closest('div.form-group').removeClass('has-error');
        $('.addClientEmail').closest('div.form-group').find('span.help-block').text("");
      }
    }

    if ($('.addClientPost').val() !== "") {
      if ($.isNumeric($('.addClientPost').val())) {
        $('.addClientPost').closest('div.form-group').removeClass('has-error');
        $('.addClientPost').closest('div.form-group').find('span.help-block').text("");
      } else {
        $('.addClientPost').closest('div.form-group').addClass('has-error');
        $('.addClientPost').closest('div.form-group').find('span.help-block').text("5 chiffre obligatoire");
        return false;
      }
    }
  }) //end of client



  $('.addSeance').click(function() {
    if ($.trim($('.addSeanceClient').val()) == "") {
      $('.addSeanceClient').closest('div.form-group').addClass('has-error');
      $('.addSeanceClient').closest('div.form-group').find('span.help-block').text("Champs obligatoire");
      return false;
    } else {
      $('.addSeanceClient').closest('div.form-group').removeClass('has-error');
      $('.addSeanceClient').closest('div.form-group').find('span.help-block').text("");
    }

    if ($.trim($('.addSeanceDate').val()) == "") {
      $('.addSeanceDate').closest('div.form-group').addClass('has-error');
      $('.addSeanceDate').closest('div.form-group').find('span.help-block').text("Champs obligatoire");
      return false;
    } else {
      if (!isValidDate($('.addSeanceDate').val())) {
        $('.addSeanceDate').closest('div.form-group').addClass('has-error');
        $('.addSeanceDate').closest('div.form-group').find('span.help-block').text("Format mail invalide");
        return false;
      } else {
        $('.addSeanceDate').closest('div.form-group').removeClass('has-error');
        $('.addSeanceDate').closest('div.form-group').find('span.help-block').text("");
      }
    }

    if ($('.addSeanceTime').val() !== "") {
      if (!isValidTime($('.addSeanceTime').val())) {
        $('.addSeanceTime').closest('div.form-group').removeClass('has-error');
        $('.addSeanceTime').closest('div.form-group').find('span.help-block').text("");
      } else {
        $('.addSeanceTime').closest('div.form-group').addClass('has-error');
        $('.addSeanceTime').closest('div.form-group').find('span.help-block').text("Chiffres obligatoire");
        return false;
      }
    }

        if ($.trim($('.addSeancePrix').val()) == "") {
          $('.addSeancePrix').closest('div.form-group').addClass('has-error');
          $('.addSeancePrix').closest('div.form-group').find('span.help-block').text("Champs numerique obligatoire");
          return false;
        } else {
          if ($.isNumeric($('.addSeancePrix').val())) {
            $('.addSeancePrix').closest('div.form-group').removeClass('has-error');
            $('.addSeancePrix').closest('div.form-group').find('span.help-block').text("");
          } else {
            $('.addSeancePrix').closest('div.form-group').addClass('has-error');
            $('.addSeancePrix').closest('div.form-group').find('span.help-block').text("Chiffres obligatoire");
            return false;
          }
        }




  })





})
