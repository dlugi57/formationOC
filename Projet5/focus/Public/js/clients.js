$(function () {
  $('.clientsTable').DataTable()
  $('#example2').DataTable({
    'paging'      : true,
    'lengthChange': false,
    'searching'   : false,
    'ordering'    : true,
    'info'        : true,
    'autoWidth'   : false
  })

  $(".clickableRowClient").click(function() {
      window.location = $(this).data("href");
  });

})
