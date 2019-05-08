$(function() {

  'use strict';

  if (document.location.href.indexOf("dashboard") >= 0) {

    //----------------
    //- Monthly Cash -
    //----------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
    // This will get the first returned node in the jQuery collection.
    var areaChart = new Chart(areaChartCanvas)

    var areaChartData = {
      labels: arrayFromPHPMonth,
      datasets: [{
          label: 'Brut',
          fillColor: 'rgba(210, 214, 222, 1)',
          strokeColor: 'rgba(210, 214, 222, 1)',
          pointColor: 'rgba(210, 214, 222, 1)',
          pointStrokeColor: '#c1c7d1',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data: arrayFromPHPCash
        },
        {
          label: 'Net',
          fillColor: 'rgba(60,141,188,0.9)',
          strokeColor: 'rgba(60,141,188,0.8)',
          pointColor: '#3b8bba',
          pointStrokeColor: 'rgba(60,141,188,1)',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data: summarySeanceCmdTaxNet
        }
      ]
    }

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: false,
      //String - Colour of the grid lines
      scaleGridLineColor: 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - Whether the line is curved between points
      bezierCurve: true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension: 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot: false,
      //Number - Radius of each point dot in pixels
      pointDotRadius: 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth: 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius: 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke: true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth: 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill: true,
      //String - A legend template
      legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true
    }
    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions)
    // ---------------------------
    // - END MONTHLY SALES CHART -
    // ---------------------------

    //-------------------
    //- Monthly seances -
    //-------------------
    var areaBarData = {
      labels: arrayFromPHPMonth,
      datasets: [{
          label: 'Seances',
          fillColor: 'rgba(210, 214, 222, 1)',
          strokeColor: 'rgba(210, 214, 222, 1)',
          pointColor: 'rgba(210, 214, 222, 1)',
          pointStrokeColor: '#c1c7d1',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data: arrayFromPHPNbSeances
        },
        {
          label: 'Clients',
          fillColor: 'rgba(60,141,188,0.9)',
          strokeColor: 'rgba(60,141,188,0.8)',
          pointColor: '#3b8bba',
          pointStrokeColor: 'rgba(60,141,188,1)',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data: arrayFromPHPNb
        }
      ]
    }

    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChart = new Chart(barChartCanvas)
    var barChartData = areaBarData
    barChartData.datasets[1].fillColor = '#00a65a'
    barChartData.datasets[1].strokeColor = '#00a65a'
    barChartData.datasets[1].pointColor = '#00a65a'
    var barChartOptions = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - If there is a stroke on each bar
      barShowStroke: true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth: 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing: 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing: 1,
      //String - A legend template
      legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive: true,
      maintainAspectRatio: true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
    //-----------------------
    //- END Monthly seances -
    //-----------------------

    // --------------
    // - CONTACT BY -
    // --------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChartContact').get(0).getContext('2d');
    var pieChart = new Chart(pieChartCanvas);
    var PieData = afpContactBy;
    var pieOptions = {
      // Boolean - Whether we should show a stroke on each segment
      segmentShowStroke: true,
      // String - The colour of each segment stroke
      segmentStrokeColor: '#fff',
      // Number - The width of each segment stroke
      segmentStrokeWidth: 1,
      // Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      // Number - Amount of animation steps
      animationSteps: 100,
      // String - Animation easing effect
      animationEasing: 'easeOutBounce',
      // Boolean - Whether we animate the rotation of the Doughnut
      animateRotate: true,
      // Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale: false,
      // Boolean - whether to make the chart responsive to window resizing
      responsive: true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: false,
      // String - A legend template
      legendTemplate: '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<segments.length; i++){%><li><span style=\'background-color:<%=segments[i].fillColor%>\'></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',
      // String - A tooltip template
      tooltipTemplate: '<%=value %> <%=label%>'
    };
    // Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions);
    // ------------------
    // - END CONTACT BY -
    // ------------------

    // ----------------
    // - TYPE SESSION -
    // ----------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvasCont = $('#pieChart').get(0).getContext('2d');
    var pieChartCont = new Chart(pieChartCanvasCont);

    var PieData = afpTypeSession;
    var pieOptionsCont = {
      // Boolean - Whether we should show a stroke on each segment
      segmentShowStroke: true,
      // String - The colour of each segment stroke
      segmentStrokeColor: '#fff',
      // Number - The width of each segment stroke
      segmentStrokeWidth: 1,
      // Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      // Number - Amount of animation steps
      animationSteps: 100,
      // String - Animation easing effect
      animationEasing: 'easeOutBounce',
      // Boolean - Whether we animate the rotation of the Doughnut
      animateRotate: true,
      // Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale: false,
      // Boolean - whether to make the chart responsive to window resizing
      responsive: true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: false,
      // String - A legend template
      legendTemplate: '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<segments.length; i++){%><li><span style=\'background-color:<%=segments[i].fillColor%>\'></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',
      // String - A tooltip template
      tooltipTemplate: '<%=value %> <%=label%>'
    };
    // Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChartCont.Doughnut(PieData, pieOptionsCont);
    // --------------------
    // - END TYPE SESSION -
    // --------------------

    // -----------------
    // -   AJAX INSTA  -
    // -----------------
    var newAjax = new Ajax;
    var url = 'https://api.instagram.com/v1/users/self/?access_token=6995657814.d948bef.c504d590713243449dd958d4c3b31495';
    newAjax.ajaxGet(url, function(reponse) {
      var instagram = JSON.parse(reponse);
      $("#instaFullName").text(instagram.data.full_name);
      $("#instaUserName").text(instagram.data.username);
      $("#instaProfile").attr("src", instagram.data.profile_picture);
      $("#instaPosts").text(instagram.data.counts.media);
      $("#instaFollowers").text(instagram.data.counts.followed_by);
      $("#instaFollows").text(instagram.data.counts.follows);
    })
    // -----------------
    // -END AJAX INSTA -
    // -----------------

    // -----------------
    // -  PAGINATION   -
    // -----------------
    var $elementPaginationContact = $(".pagination_dashboard_");
    var pageSize = 7;
    $elementPaginationContact.slice(0, pageSize).show();
    $elementPaginationContact.slice(pageSize, $elementPaginationContact.length).hide();

    function addSlice(num) {
      return num + pageSize;
    }

    function subtractSlice(num) {
      return num - pageSize;
    }
    var slice = [0, pageSize];
    $(".nextBlockDashboard").click(function() {
      if (slice[1] < $elementPaginationContact.length) {
        slice = slice.map(addSlice);
      }
      showSlice(slice);
    });
    $(".prevBlockDashboard").click(function() {
      if (slice[0] > 0) {
        slice = slice.map(subtractSlice);
      }
      showSlice(slice);
    });

    function showSlice(slice) {
      $elementPaginationContact.hide();
      $elementPaginationContact.slice(slice[0], slice[1]).show();
    };
    // -----------------
    // -END PAGINATION -
    // -----------------
  }
});
