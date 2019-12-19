@extends('layouts.app')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
<div class="container">
    <button type="button" class="btn btn-primary"> <a style=color:#fff; href="{{ url('/bargraphchart') }}">Total Sales(Product)</a></button>
    <button type="button" class="btn btn-primary active"> <a style=color:#fff; href="{{ url('/reports') }}">Products sold</a></button>
    <button type="button" class="btn btn-primary"> <a style=color:#fff; href="{{ url('/reportLinegraph') }}">Total Sales(Per Day)</a></button>
    <div id="piechart" style="width:750px; height:450px; background:#efefef;"></div>
</div>    
@endsection