@extends('layouts.master')

@section('content')
<section class="checkout_area">
  <div class="container">
    <div class="billing_details">
      <div class="row">
        <div class="col-lg-8">
        <strong><h3>Checkout</h3></strong>
           
          <form
            action="/payment" method="post" class="row contact_form needs-validation"
            id="checkout_form" class="checkout_form">
            @csrf
            <div class="col-md-12 form-group p_star">
              <label>Nama</label>
              <input type="text" class="form-control" id="name" name="name"value="{{Auth::user()->name}}"/>
            </div>

            <div class="col-md-5 form-group">
              <label>Email</label>
              <input type="text" id="email" name="email" class="form-control" value="{{Auth::user()->email}}"/>
            </div>
            <div class="col-md-12 form-group p_star">
              <label>Provinsi</label>
                <select 
                  style="border: 1px solid #C8C8C8; border-radius:3px; padding:5px 7px; color: #707070; font-size: 16px;"
                  name="province" id="provinsi" class="form-select dropdown_item_select checkout_input cekongkir" required
                >
                  <option selected disabled></option>
                    @foreach ($provinsi as $prov)
                      <option value="{{$prov->id}}">{{$prov->name}}</option>
                    @endforeach
                </select>
            </div>
            <!-- <div class="col-md-12 form-group p_star">
              <label>Kota</label>
              <select 
                style="border: 1px solid #C8C8C8; border-radius:3px; padding:5px 7px; color: #707070; font-size: 16px;"
                name="regency" id="kota" class="form-select country_select dropdown_item_select checkout_input cekongkir" required>
                <option disabled></option>
              </select>
            </div> -->
           
            <div class="col-md-12 form-group p_star">
              <label>Kurir</label>
              <select style="border: 1px solid #C8C8C8; border-radius:3px; padding:5px 7px; color: #707070; font-size: 16px;" name="courier" id="kurir" class="form-select country_select dropdown_item_select checkout_input cekongkir" required>
                <option></option>
                @foreach ($kurir as $k)
                    <option value="{{$k->id}}">{{$k->courier}}</option>
                @endforeach
              </select>
            </div> 
          </div>
          <div class="col-lg-4">
            <div class="card-body">
              <h2 class="my-4 pb-2">Cost Detail</h2>
              <ul>
                @foreach ($cart as $data)
                  <li>
        
                      @if (is_null($data->product))
                        {{$data->product_name}}<span class="middle">x {{$qty}}</span>
                        @php
                          $hasil = $data->price*$qty;
                        @endphp
                        @if ($hasil != 0)
                          <span>Rp{{number_format($hasil)}}</span>
                        @else
                          <span>Rp{{number_format($data->price)}}</span>
                        @endif
                      @else
                        {{$data->product_name}}<span class="middle">x {{$qty}}</span>
                        @php
                          $hasil = $data->product->price*$qty;
                        @endphp
                        @if ($hasil != 0)
                        <span>Rp{{number_format($hasil)}}</span>
                        @else
                        <span>{{number_format($data->price)}}</span>
                        @endif  
                      @endif
                    
                  </li>
                @endforeach
                <li>
                  
                    Sub Total
                    <span>Rp{{ number_format($subtotal)}}</span>
                
                </li>
                <li>
                  
                    Shipping
                    @php
                        $shipping = 0;
                    @endphp
                    <span>Rp{{ number_format($shipping)}}</span>
                  
                </li>
              </ul>
              <ul >
               
                <li>
                @php
                  $total_biaya = $subtotal+$shipping;
                @endphp
                
                 
                    Total
                    <span class = "font-weight-bold">Rp<span class = "font-weight-bold" id="total-biaya">{{ number_format($subtotal*$qty)}}</span></span>
                  </a>
                </li>
              </ul>
              <input type="hidden" name="sub_total" value="{{$subtotal}}">
              <input type="hidden" name="total" id="totalbiaya" value="{{$total_biaya}}">
              <input type="hidden" name="shipping_cost" id="ongkir" value="{{$shipping}}">
              <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
              <input type="hidden" name="product_id" value="{{$product_id}}">
              <input type="hidden" name="qty" value="{{$qty}}">
              <div class="d-flex justify-content-center mt-5">
                <button type="submit" class="btn btn-success" id="payment">Payment Now</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="billing_details my-5">
      <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">
      <input type="hidden" value="{{$weight}}" id="weight">
    </div>
  </div>
  <br><br><br>
</section>
<!--================End Checkout Area =================-->
@endsection

@section('script')
<script>
    $(document).ready(function(e){
        console.log(#name);
        // $('#name').empty();// gajalan ni jquerynya e
        function formatNumber(num) {
          return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        }
        $('#provinsi').change(function(e){
            var id_provinsi = $('#provinsi').val();
            if(id_provinsi){
                jQuery.ajax({
                    url: '/kota/'+id_provinsi,
                    type: "GET",
                    dataType: "json",
                    success:function(data){
                        $('#kota').empty();
                        $.each(data, function(key,value){
                            $('#kota').append('<option value="'+key+'">'+value+'</option>');
                        });
                    },
                });
            }else{
                $('#kota').empty();
            }
        });

        $('.cekongkir').change(function(e){
            var kurir = $('#kurir').val();
            var provinsi = $('#provinsi').val();
            var kota = $('#kota').val();
            var berat = parseInt($('#weight').val());
            if(provinsi>0 && kurir>0){
                jQuery.ajax({
                    url: "{{url('/ongkir')}}",
                    method: 'POST',
                    data: {
                        _token: $('#signup-token').val(),
                        destination: kota,
                        weight: berat,
                        courier: kurir,
                        prov: provinsi, 
                    },
                    success: function(result){
                        console.log(result.success);
                        console.log(result.hasil["etd"]);
                        $('#biaya-ongkir').text('Rp'+ formatNumber(result.hasil["value"]));
                        $('#ongkir').val(result.hasil["value"]);
                        $('#biaya-ongkir').append('<input type="hidden" id="biaya-ongkir" value="'+result.hasil["value"]+'">');
                        $('#total-biaya').text( formatNumber({{$subtotal}}+result.hasil["value"]));
                        $('#totalbiaya').val({{$subtotal}}+result.hasil["value"]);
                    }
                });
                // console.log('wrong');
                // console.log('kota: '+kota+' provinsi: '+provinsi+' Kurir: '+kurir)
            }else{
                console.log('wrong');
                console.log('provinsi: '+provinsi+' Kurir: '+kurir)
            }

        });

        $('#beli').click(function(e){
          var kurir = $('#kurir').val();
          var provinsi = $('#provinsi').val();
          var kota = $('#kota').val();
          var alamat = $('#alamat').val();
          var totals = parseInt($('#total-biaya').text());
          var subtotal = parseInt('{{$subtotal}}');
          var ongkir = $('#biaya-ongkir').val();
          var user = $('#user_id').val();
          console.log(totals)
          if(totals==0){
            alert('Tolong Lengkapi Masukan Data');
            return false;
          }
        });
    });
</script>
@endsection