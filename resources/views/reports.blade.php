@extends('layouts.app')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
<script type="text/javascript">
    var analytics = <?php echo $item_id; ?>
    
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawchart);
    
    function drawchart(){
        var data = google.visualization.arrayToDataTable(analytics);
        var options = {title: 'Percent of Items'};
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
</script>

@section('content')
<div id="piechart" style="width:750px; height:450px;">

</div>
<h6>View Reports</h6>
                    <button type="button"> <a href="{{ url('/bargraphchart') }}">Total Sales(Product)</a></button>
                    <button type="button"> <a href="{{ url('/reports') }}">Products sold</a></button>
                    <button type="button"> <a href="{{ url('/reportLinegraph') }}">Total Sales(Per Day)</a></button>
                    <button type="button"> <a href="{{ url('/index') }}">Back</a></button>
@endsection