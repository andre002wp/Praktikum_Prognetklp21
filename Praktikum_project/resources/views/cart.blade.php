@extends('layouts.master')

@section('content')
@php
	$total = 0;
@endphp 

<section class="cart_area ganti">
  <div class="container">
    <div class="cart_inner">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Product</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Total</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            
            @forelse ($cart as $data)
            <tr>
              <td>
                <div class="media">
                  <!-- <input type="hidden" class="id_cart{{$loop->iteration-1}}" value="{{$data->id}}"> -->
                  <!-- <input type="hidden" id="user_id" value="{{$data->user_id}}"> -->
                  <!-- <input type="hidden" class="stock{{$loop->iteration-1}}" value="{{$data->product->stock}}"> -->
                  @foreach ($data->product->product_image as $image)
                  
                    <img class="w-25" src="{{url('storage/livewire-tmp/product/'.$image->image_name)}}" alt="" height="200" width="200">
                  @break
							    @endforeach
                  <div class="media-body">
                    <p>{{$data->product->product_name}}</p>
                  </div>
                </div>
              </td>
              <td>
                @php
                  $harga = 0;
                @endphp
                @if ($harga != 0)
                  <div class="cart_item_price">
                    Rp<span class="float-lef grey-text">{{number_format($harga)}}</li>
                    Rp<span class="float-lef grey-text"><small><s>{{number_format($data->product->price)}}</s></small></span>
                    <!-- <span class="hide float-lef grey-text price{{$loop->iteration-1}}">{{$harga}}</li> -->
                  </div>
                @else
                  <div class="cart_item_price">
                    Rp.<span class="float-lef grey-text">{{number_format($data->product->price)}}</li>
                    <!-- <span class="hide float-lef grey-text price{{$loop->iteration-1}}">{{$data->product->price}}</li> -->
                  </div>
                @endif
              </td>
              <td>
                <p class="text-danger" style="display:none" id="notif{{$loop->iteration-1}}"></p>
                <div class="btn-group radio-group ml-2" data-toggle="buttons">
                  <span class="qty{{$loop->iteration-1}} mr-3">{{$data->qty}} </span>
              
                </div>
              </td>
              <td>
                @if ($harga != 0)
                  <strong>Rp.</strong><strong class="cart_item_total sub-total{{$loop->iteration-1}}">{{number_format($harga*$data->qty)}}</strong>
                  @php
                    $total = $total + ($harga*$data->qty);
                  @endphp
                @else
                  <strong>Rp.</strong><strong class="cart_item_total sub-total{{$loop->iteration-1}}">{{number_format($data->product->price*$data->qty)}}</strong>
                  @php
                    $total = $total + ($data->product->price*$data->qty);
                  @endphp
                @endif
              </td>
              <td class="product-remove">   
                <form action="{{Route('delete',$data->id)}}" method="post">
                    @method('delete')
                    @csrf
                      <button type="submit" class="btn btn-danger"
                        aria-label="Remove this item"><i class="fa fa-trash"></i>
                      </button>
                </form>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="4" style="text-align:center">
				      <p class="fa fa-shopping-cart m-auto" style="font-size:30px;"><br><br>Empty Cart</p>
              </td>
            </tr>
            @endforelse
            <!-- end single product -->
            <tr>
              <td></td>
              <td></td>
              <td>
              </td>
              <td>
                <span class="font-weight-bold text-dark">Rp.</span><span class="totalShow font-weight-bold text-dark">{{number_format($total)}}</span>
                <h5 class="hide total">{{$total}}</h5>
                <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">
              </td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>
        <div class="d-flex flex-row-reverse">
        <div class="checkout_btn_inner">
          <form action="{{url('checkout')}}" method="POST" method="POST">
            @csrf
              <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
              <input type="hidden" name="sub_total" value="{{$total}}">
              <input type="hidden" name="product_id" value="{{$data->product->id}}">
              <input type="hidden" name="weight" value="{{$data->product->weight}}">
              <input type="hidden" name="qty" value="{{$data->qty}}">
              <button type="submit" class="btn btn-success mr-2 center-block">Checkout
              <i class="fa fa-angle-right right"></i>
            </button>
          </form>
        </div>
        <div>
        <a href="/home" class="btn btn-primary mr-2 center-block">Shopping</a>
        <div>
      </div>
    </div>
  </div>
</section>
@endsection