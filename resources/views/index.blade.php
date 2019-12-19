@extends('layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">

$(function() {
    $("#items").change(function(){
        var option = $('option:selected', this).attr('id');
        $('#price').val(option);
    });
});

function calculate() {
var myBox1 = document.getElementById('price').value; 
var myBox2 = document.getElementById('quantity').value;
//var result = document.getElementById('total'); 
var myResult = myBox1 * myBox2;
document.getElementById('total').value = myResult;
} 
</script>    

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Billing System 
                <a style="padding-left:10px;" href="{{ url('/bargraphchart') }}">View Reports</a></div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                            </div> 
                        @endif
                        <form action="{{ action('ItemsController@store') }}" method = "GET">
                            
                        <table border="0" align="center" style="padding-left:10px;">
                            <tr>
                                <th>Items</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>

                            <tr>
                                <td>    
                                    <select class="form-control" style=width:120px; id="items" name="items"> 
                                        <option value="">Select Item...</option>
                                        @foreach($items as $item)
                                        <option  id='{{$item->item_price}}' value='{{$item->item_name}}' name= "test">{{$item->item_name}}</option>
                                        @endforeach
                                    </select>
                                </td>    
                                <td>    
                                    <input class="form-control" style=width:120px; type="text" id="price" name="price" readonly required>
                                </td>
                                <td>    
                                    <input class="form-control" style=width:120px; type="number" id="quantity" name="quantity" min="1" onchange="calculate();  required">
                                </td>    
                                <td>    
                                    <input class="form-control" style=width:120px; type="text" id="total" name="total" readonly>
                                </td>
                                <td>
                                    <button class="btn btn-primary" type="submit" id="submit" name="submit">Submit</button>
                                </td>
                                <td>
                                    
                                </td>
                            </tr>
                        </table>
                        </form>
                    </div> 
            </div>
        </div>
    </div>
</div>
@endsection

