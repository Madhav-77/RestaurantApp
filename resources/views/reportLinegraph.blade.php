@extends('layouts.app')
@section('content')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    <script type="text/javascript">
      var tot = <?php echo $tot; ?>
      
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      
      function drawChart() {
        var data = google.visualization.arrayToDataTable(tot);
        var options = {
          title: 'Total daily sales'
          
        };
        var chart = new google.visualization.LineChart(document.getElementById('linechart'));
        chart.draw(data, options);
      }
    </script>
 
  <div class="container">
    <button type="button" class="btn btn-primary"> <a style=color:#fff; href="{{ url('/bargraphchart') }}">Total Sales(Product)</a></button>
    <button type="button" class="btn btn-primary"> <a style=color:#fff; href="{{ url('/reports') }}">Products sold</a></button>
    <button type="button" class="btn btn-primary active"> <a style=color:#fff; href="{{ url('/reportLinegraph') }}">Total Sales(Per Day)</a></button>
    <div id="linechart" style="width: 900px; height: 500px"></div>
  </div>
@endsection