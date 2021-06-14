@extends('layouts.master')

@section('content')

<section class="cart">
  <div class="container">
    @if (session('status'))
        <div class="alert alert-danger" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="cart_inner">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Product Image</th>
              <th>Product Name</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Total</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
          @php
	          $total = 0;
          @endphp 

            @forelse ($cart as $data)
            <tr>
              <div class="media">
                <td>
                    @foreach ($data->product->product_image as $image)
                      <img class="w-10" src="{{url('storage/livewire-tmp/product/'.$image->image_name)}}" alt="" height="200" width="200">
                    @break
                    @endforeach
                </td>
                <td>
                  <div class="media-body">
                    <p>{{$data->product->product_name}}</p>
                  </div>
                </td>
              </div>
              <td>
                @php
                  $price = 0;
                @endphp

                @if ($price != 0)
                  <div class="cart">
                    Rp<span class="grey-text">{{number_format($price)}}</li>
                    Rp<span class="grey-text"><small><s>{{number_format($data -> product -> price)}}</s></small></span>
                  </div>
                @else
                  <div class="cart">
                    Rp <span class="grey-text">{{number_format($data -> product -> price)}}</li>
                  </div>
                @endif
              </td>

              <td>
                <div class="btn-group radio-group ml-2" data-toggle="buttons">
                  <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">
                  <button class="qty btn btn-primary btn-sm" id="minus" data-qty="{{$data->qty}}" data-id="{{$data->id}}" data-price="{{$data->product->price}}"><i class="fas fa-arrow-left"></i></button>
                  <span class="mr-3" id="qtyspan{{$data->id}}">{{$data -> qty}} </span>
                  <button class="qty btn btn-primary btn-sm" id="plus" data-qty="{{$data->qty}}" data-id="{{$data->id}}" data-price="{{$data->product->price}}"><i class="fas fa-arrow-right"></i></button>
                </div>
              </td>
              <td>
                @if ($price != 0)
                  <strong>Rp</strong><strong class="cart_item_total sub-total{{$data->id}}">{{number_format($price * $data -> qty)}}</strong>
                  @php
                    $total = $total + ($price * $data -> qty);
                  @endphp
                @else
                  <strong>Rp.</strong><strong name= "total" class="cart_item_total sub-total{{$data->id}}">{{number_format($data -> product -> price * $data -> qty)}}</strong>
                  @php
                    $total = $total + ($data-> product-> price * $data-> qty);
                  @endphp
                @endif
              </td>

              <td class="product-remove">   
                <form action="{{Route('delete',$data->id)}}" method="post">
                    @method('delete')
                    @csrf
                      <button type="submit" class="btn btn-danger">
                          <i class="fa fa-trash"></i>
                      </button>
                </form>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="4" style="text-align:center">
				      <p style="font-size:30px;"><br><br>Empty Cart</p>
              </td>
            </tr>
            @endforelse
            <tr>
              <td></td><td></td><td></td>
              <td>
                <span class="font-weight-bold text-dark">Rp </span><span id="totalShow" class="totalShow font-weight-bold text-dark" data-total="{{$total}}">{{number_format($total)}}</span>   
              </td>
            </tr>
            <tr>            
            </tr>
          </tbody>
        </table>
        <div class="d-flex flex-row-reverse">
        @if (!empty($data->product))
          <div class="checkout_btn_inner">
            <form action="{{url('checkout')}}" method="POST">
              @csrf
                <input type="hidden" name="sub_total" value="{{$total}}">
                <input type="hidden" name="product_id" value="{{$data->product->id}}">
                <input type="hidden" name="qty" value="{{$data->qty}}">
                <button type="submit" class="btn btn-success">Checkout
              </button>
            </form>
          </div>
        @endif
        <div>
          <a href="/home" class="btn btn-primary mr-3">Shopping</a>
        <div>
      </div>
    </div>
  </div>
</section>
<script>
  $(document).ready(function(e){
      $('.qty').click(function(e){
          var id_produk = $(this).attr('data-id');
          var action = $(this).attr('id');
          var price = $(this).attr('data-price');
          var qty_now = $(this).attr('data-qty');
          var total = $('#totalShow').attr('data-total');
          jQuery.ajax({
            url: "{{url('updatecart')}}",
            method: 'POST',
            data: {
                _token: $('#signup-token').val(),
                product_id:id_produk,
                action: action,
            },
            success: function(result){
              console.log(price*result['qty']);
              $('#qtyspan'+id_produk).text(result['qty']);
              $('.sub-total'+id_produk).text(price*result['qty']);
              if(result == 1){
                $('#totalShow').text(+total);
              }
              else{
                $('#totalShow').text(+total -(price*qty_now)+ (price*result['qty']) );
                qty_now = result['qty'];
              }
            }
          });
      });
  });
</script>
@endsection