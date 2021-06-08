@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="container">
            @foreach($categories as $kat)
                <input type="radio" id="{{$kat->category_name}}" class="categories" name="categories" value="{{$kat->id}}"/>
                <label for="{{$kat->category_name}}">{{$kat->category_name}}</label><br>
            @endforeach
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
            </div>
        </div>
    </div>
<script>
    $(document).ready(function(e){
        
        $('.categories').click(function(e){
            var val = $(this).val();
            console.log(val);
        });
    });
</script>
@endsection