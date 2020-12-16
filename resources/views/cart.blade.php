@extends('layouts.app')

@section('content')

 <div class="container" id="zalgan">
   @if($errors->any())

   @foreach($errors->all() as $error)
        <div class="alert alert-danger">{{$error}}</div>
   @endforeach

   @endif
<table class="table">
  <thead>
    <tr class="label" >
      <th scope="col">#</th>
      <!--<th scope="col">Image</th>-->
      <th scope="col">Menu</th>
      <th scope="col">Harga</th>
      <th scope="col">Qty</th>
      <th scope="col">Remove</th>

    </tr>
  </thead>
  <tbody>

    @if($cart)
  @php $i=1 @endphp

@foreach($cart->items as $product)
    <tr class="label">
      <th scope="row">{{$i++}}</th>
      
      <!--<td><img src="{{Storage::url($product['image'])}}" width="100"></td>-->
      <td>{{$product['name']}}</td>
      <td>Rp{{$product['price']}}</td>
      <td>
    <form action="{{route('cart.update',$product['id'])}}" method="post">@csrf
      	<input type="text" name="qty" value="{{$product['qty']}}">
      	<button class="btn btn-secondary btn-sm">
      		<i class="fas fa-sync"></i>Update
      	</button>
      </form>
    </td>
      <td>
    <form action="{{route('cart.remove',$product['id'])}}" method="post">@csrf

      	<button class="btn btn-danger">Remove</button>
      </form>
      </td>
    </tr>
   @endforeach



  </tbody>
</table>
<hr>
<div class="card-footer">
	<a href="{{url('/')}}"><button class="btn btn-primary">Lanjutkan Belanja</button></a>
	<span style="margin-left: 300px;">Total Harga : Rp{{$cart->totalPrice}}</span>

	<a href="{{route('cart.pay',$cart->totalPrice)}}"><button class="btn btn-success float-right">Checkout</button></a>



</div>
@else
<td>No items in cart</td>
@endif
   
 </div>
 @endsection
