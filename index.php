<?php
    session_start();
    if (!empty($_SESSION['username']) && !empty($_SESSION['password']))
    {
      include "lib/koneksi.php";
      date_default_timezone_set('Asia/Jakarta');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Administrator | WIG</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <?php include("header.php"); ?>
  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <?php include("sidebar.php"); ?>
  </aside>

  <div class="content-wrapper">
    <?php include("content.php"); ?>

  </div>
  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2018</strong> Sistem Informasi Week Important Goal | PLN Bulungan
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/chartjs-old/Chart.min.js"></script>
<script src="plugins/fastclick/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
<script>
  $(function () {
    $("#datepicker").datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true, 
      todayHighlight: true
    });
  });
</script>
<script>
  $(document).ready(function () {
    var barChartCanvas = $('#barChart').get(0).getContext('2d');
    var barChart = new Chart(barChartCanvas);
    var barChartData = {
      labels  : [<?php foreach($datgraf as $datas){ echo "'".date('M',strtotime($datas->tanggal))."',";}?>],
      datasets: [
        {
          label               : 'Digital Goods',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          data                : [<?php foreach($datgraf as $datas){ echo $datas->realisasi.",";}?>],
        }
      ]
    }
    barChartData.datasets[0].fillColor   = '#00a65a'
    barChartData.datasets[0].strokeColor = '#00a65a'
    barChartData.datasets[0].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 15,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><li><span style="background-color:<%=datasets[0].fillColor%>"></span><%=datasets[0].label%></li></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions);
  });
</script>
<script>
$(function(){
    var counter = $('#counter').val();
    $('#counter').val(counter);
    $("#addButton").click(function(){		
	    if(counter>9){
            alert("Maksimal 10 Textbox");
            return false;
	    }   
      
        var newTextBoxDiv1 = $(document.createElement('div')).attr("id", 'TextBoxDiv1' + counter),
            newTextBoxDiv2 = $(document.createElement('div')).attr("id", 'TextBoxDiv2' + counter);
        newTextBoxDiv1.after().html('<input type="text" style="margin-top:10px;" class="form-control" placeholder="masukkan LM ..." name="lm'+counter+'" required>');
        newTextBoxDiv2.after().html('<input type="text" style="margin-top:10px;" class="form-control" placeholder="masukkan PIC ..." name="pic'+counter+'" required>');
        newTextBoxDiv1.appendTo("#lm-div");
        newTextBoxDiv2.appendTo("#pic-div");		
        counter++;
        $('#counter').val(counter);
    });

    $("#removeButton").click(function () {
	    if(counter==1){
            alert("Minimal 1 Textbox");
            return false;
        }
	      counter--;
        $('#counter').val(counter);
        $("#TextBoxDiv1" + counter).remove();
        $("#TextBoxDiv2" + counter).remove();
    });
  });
</script>
</body>
</html>
<?php
}
else { ?>
<div class="col-md-12" align="center">
  <button type="button" name="button" class="btn btn-primary">Login Terlebih dahulu</button>
</div>


<?php echo"<meta http-equiv='refresh' content='1;
url=login.php'>";
} ?>
