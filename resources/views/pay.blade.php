@extends('layouts.app')

@section('content')

<style>

#app {
  display: none;
}


</style>

 <div class="container">
    <div class="row">
        <div class="col-md-6">

           <table class="table" id="hanau">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product</th>
      <th scope="col">Price</th>
      <th scope="col">Qty</th>

    </tr>
  </thead>
  <tbody>

    @if($cart)
  @php $i=1 @endphp

@foreach($cart->items as $product)
    <tr>
      <th scope="row">{{$i++}}</th>
      
      
      <td>{{$product['name']}}</td>
      <td>Rp{{$product['price']}}</td>
      <td>
        {{$product['qty']}}
    </td>
      <td>
    
      </td>
    </tr>
   @endforeach
   @endif



  </tbody>
</table>
<hr>
<h4>Total Harga : Rp{{$cart->totalPrice}}</h4>
</div>

 	<div class="col-md-6">
 		<div class="card">
 			<div class="card-header"><h3><b>Checkout</h3></div>
 			<div class="card-body">

        <form action="../api/transactions" method="post" >@csrf
        
                     <div class="form-group" >
                        <label></label>
                        <input type="hidden" name="user_id" id="user_id" class="form-control" required="" value="{{auth()->user()->id}}" readonly="">
                      </div>
                      <div class="form-group" >
                        <label>Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" required="" value="{{auth()->user()->name}}" readonly="">
                      </div>
                    
                      <div class="form-group">

                        <label>Nomor HP</label>
                        <input type="text" name="no_hp" id="no_hp" class="form-control" required="">
                      </div>
                      <div class="form-group">

                        <label>Nomor Meja</label>
                        <input type="text" name="no_meja" id="no_meja" class="form-control" required="">
                      </div>
                      <div class="form-group">
                        

                
              <input type="hidden" name="amount" value="{{$amount}}">


                

              <button class="btn btn-success mt-4" type="submit">Bayar Sekarang</button>
   
            </form>
            </div>
        </div>
    </div>
</div>
</div>