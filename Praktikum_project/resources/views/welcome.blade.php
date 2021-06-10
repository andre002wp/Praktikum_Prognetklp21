@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link {{ (request()->is('/home')) ? 'active' : '' }}" href="/home">Home</a>
                    @foreach($categories as $kat)
                        <a class="nav-item nav-link {{ (request()->is('/home/'.$kat->id)) ? 'active' : '' }}" name="categories" id="{{$kat->category_name}}" href="/home/{{$kat->id}}">{{$kat->category_name}}</a>
                    @endforeach 
                </div>
            </div>
        </nav>
        <div class="ml-4">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <?php 
                    $filter=0;
                ?>
                @if($filter == 0)
                    @foreach($products as $product)
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                @foreach ($productimages as $image)
                                    @if($image->product_id == $product->id)
                                        <img src=" {{url('storage/livewire-tmp/product/'.$image->image_name)}} " alt="{{ $image->image_name}}" width="240px" height="240px">
                                    @endif
                                @endforeach
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->product_name }}</h5>
                                    <p class="card-text">
                                        <strong>Price : </strong>Rp {{ number_format($product->price)}} <br>
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
                @endif
                <div>
                    @if($products->count()>8)
                        <span>{{$products->links()}}</span>   
                    @endif
                </div>
            </div>
        </div>
    </div>
<script>
    $(document).ready(function(e){
        
        $('.categories').click(function(e){
            var val = $(this).val();
            // console.log(val);
        });
    });
</script>
@endsection