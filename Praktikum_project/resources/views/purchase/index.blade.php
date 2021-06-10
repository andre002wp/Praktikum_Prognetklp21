@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
            <div class="col-md-12">
                <a href="{{ url('home')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>  Go to home</a>
            </div>
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h4>Detail Produk</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                @if(!empty($product->product_image[0]))
                                    <div class="col-md-6">
                                        <img src="{{url('storage/livewire-tmp/product/'.$product->product_image[0]->image_name)}}" width="400" alt="Card image cap">
                                    </div>
                                @endif
                                <div class="col-md-6 mt-5">
                                    <h2>{{ $product->product_name}}</h2>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Price</td>
                                                <td>:</td>
                                                <td>Rp {{ number_format($product->price)}}</td>
                                            </tr>   
                                            <tr>
                                                <td>Stock</td>
                                                <td>:</td>
                                                <td>{{ $product->stock}}</td>
                                            </tr>
                                            <tr>
                                                <td>Description</td>
                                                <td>:</td>
                                                <td>{{ $product->description}}</td>
                                            </tr>     
                                            <tr>
                                                @if ($product->stock>0)
                                                    <td>Jumlah Pesanan</td>
                                                    <td>:</td>
                                                    <td>
                                                        <form action="{{ url('cart')}}/{{$product->id}}" method="post">
                                                            @csrf
                                                            <input type="text" name="jumlah_pesanan" class="form-control" required="">
                                                            <button type="submit" class="btn btn-primary mt-3"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                                        </form> 
                                                    </td>
                                                @else
                                                    <td>Stok Habis !!!</td>
                                                    <td>:</td>
                                                @endif
                                                
                                            </tr>                                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h4>Reviews</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mt-5">
                                    @forelse($product->product_review as $reviews)
                                        <ul>
                                            {{$reviews->user->name}} Give {{$reviews->rate}}/5 Star and said {{$reviews->content}}
                                        </ul>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection