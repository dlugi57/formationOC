$(function () {
/*
  $('#addClientDash').click(function(){
    $('#clientForm').removeClass('hidden');
  })
*/

  $('.clientsTable').DataTable({
    'paging'      : true,
    'lengthChange': true,
    'searching'   : true,
    'ordering'    : true,
    'info'        : true,
    'autoWidth'   : true
  })

  $(".clickableRowClient").click(function() {
      window.location = $(this).data("href");
  });

  //Initialize Select2 Elements
  $('.select2').select2()






})
