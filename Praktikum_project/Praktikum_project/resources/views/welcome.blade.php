@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row justify-content-center">
        
                @foreach($products as $product)
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="..." alt="Card image cap">
                            
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->product_name }}</h5>
                                <p class="card-text">
                                    <strong>Price : </strong>Rp. {{ number_format($product->price)}} <br>
                                    <strong>Stock: </strong> {{ $product->stock}} <br>
                                    <br>
                                    <strong>Description: </strong><br>
                                        {{ $product->description}}
                                </p>

                                <a href="{{ url('purchase')}}/{{ $product->id}}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> purchase</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection