@extends('layouts.app')

@section('content')


  <div class="container" id=cantik>
    <!--
  <h2>Category</h2>
  @foreach(App\Category::all() as $cat)
      <a href="{{route('product.list',[$cat->slug])}}"> <button class="btn btn-secondary">{{$cat->name}}</button></a>
  @endforeach
-->
  <div class="album py-5">
    <div class="container" id="ganteng">
        <h2>Products</h2>

      <div class="row">
      
      @foreach($products as $product)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img src="{{Storage::url($product->image)}}" height="200" style="width: 100%">
            <div class="card-body" id="gorpat">
                <p><b>{{$product->name}}</b></p>
              <p class="card-text">
                  {{(Str::limit($product->description,120))}}
              </p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                 <a href="{{route('product.view',[$product->id])}}"> <button type="button" class="btn btn-sm btn-success">Lihat</button>
                </a>
                
                
                
                </div>
                <small class="text-muted">Rp{{$product->price}}</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  
  
    
   
    </div>

  
  </div>




</main>


</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
     $("document").ready(function(){
     $(".addToCart").click(function(e){
        e.preventDefault();
        var product = $(this).attr('id');
       // alert(product)
        $.ajax({
            //  headers: {
            //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            // },
            type: "GET",
            url: "http://localhost:8000/addToCart/"+product,
           // data: { product: product },
            success: function (data) {

            },
            error: function (data) {
             console.log(data)
            }
          });
     })


    });
</script>
@endsection