@extends('layouts.app')

@section('content')


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
var result = document.getElementById('total'); 
var myResult = myBox1 * myBox2;
document.getElementById('total').value = myResult;
} 
</script>    

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Billing System</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div> 
                        @endif
                            <h6>Items</h6>
                            <form action="{{ action('ItemsController@store') }}" method = "GET">
                               
                                <select id="items" name="items">  <!-- onchange="ChooseContact(this)"> --> 
                                
                                <option value="">Select Item...</option>
                                @foreach($items as $item)
                                <option  id='{{$item->item_price}}' value='{{$item->item_name}}' name= "test">{{$item->item_name}}</option>
                                @endforeach
                                
                                </select>
                            
                            <input type="text" id="price" name="price">
                            *
                            <input type="text" id="quantity" name="quantity" onchange="calculate();">
                            =
                            <input type="text" id="total" name="total">
                            <button type="submit" id="submit" name="submit">Submit</button>
                            <!-- <input type="submit" name="submit" id="submit" value="Submit"> -->
                            <h6>View Reports</h6>
                            <button type="button"> <a href="{{ url('/bargraphchart') }}">View Reports</a></button>
                            </form>
                     </div> 
            </div>
        </div>
    </div>
</div>
@endsection

