<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    
    <script type="text/javascript">
      var visitor = <?php echo $visitor; ?>
      
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      
      function drawChart() {
        var data = google.visualization.arrayToDataTable(visitor);
        var options = {
          title: 'Total daily sales'
          
        };
        var chart = new google.visualization.LineChart(document.getElementById('linechart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="linechart" style="width: 900px; height: 500px">
    
    </div>
    <h6>View Reports</h6>
                    <button type="button"> <a href="{{ url('/bargraphchart') }}">Total Sales(Product)</a></button>
                    <button type="button"> <a href="{{ url('/reports') }}">Products sold</a></button>
                    <button type="button"> <a href="{{ url('/reportLinegraph') }}">Total Sales(Per Day)</a></button>
                    <button type="button"> <a href="{{ url('/index') }}">Back</a></button>
  </body>
</html>