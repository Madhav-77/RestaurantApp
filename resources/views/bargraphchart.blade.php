@extends('layouts.app')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.3/Chart.bundle.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
    var items = ['Tea','Coffee','Samosa', 'Cake'];
    var total_data = <?php echo $total; ?>;
    var barChartData = {
        labels: items,
        datasets: [{
            label: 'Total',
            backgroundColor: "rgba(220,220,220,0.5)",
            data: total_data
        }]
    };
    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: 'rgb(0, 255, 0)',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Total sales product wise'
                }
            }
        });
   };
</script>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                <button type="button" class="btn btn-primary active" > <a style=color:#fff; href="{{ url('/bargraphchart') }}">Total Sales(Product)</a></button>
                    <button type="button" class="btn btn-primary"> <a style=color:#fff; href="{{ url('/reports') }}">Products sold</a></button>
                    <button type="button" class="btn btn-primary"> <a style=color:#fff; href="{{ url('/reportLinegraph') }}">Total Sales(Per Day)</a></button>
                    <canvas id="canvas" height="280" width="600" style="background:#ffffff;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection