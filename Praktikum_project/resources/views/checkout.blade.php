@extends('layouts.master')

@section('content')
<section class="checkout_area section_gap">
  <div class="container">
    <div class="billing_details">
      <div class="row">
        <div class="col-lg-8">
          <h3>Detail Pemesanan</h3>
          <form
            action="/checkout/transaksi" method="post"
            class="row contact_form needs-validation"
            id="checkout_form" class="checkout_form"
          >
            @csrf
            <div class="col-md-6">
              <label>Name</label>
              <input type="text" class="form-control" id="name" name="name"value="{{Auth::user()->name}}"/>
            </div>
            <div class="col-md-6">
              <label>Phone</label>
              <input type="text"
                class="form-control" id="number" name="no_telp" placeholder="phone" required/>
            </div>
            <div class="col-md-6">
              <label>Provinsi</label>
                <select 
                  style="padding:5px 60px;"
                  name="province" id="provinsi" class="form-select dropdown_item_select checkout_input" required>
                  <option selected disabled></option>
                    @foreach ($provinsi as $province)
                      <option value="{{$province->id}}">{{$province->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12 form-group p_star">
              <label>Kota</label>
              <select 
                style="border: 1px solid #C8C8C8; border-radius:3px; padding:5px 7px; color: #707070; font-size: 16px;"
                name="regency" id="kota" class="form-select country_select dropdown_item_select checkout_input cekongkir" required>
                <option selected disabled>Pilih Kota</option>
              </select>
            </div>
            <div class="col-md-12 form-group p_star">
              <label>Alamat</label>
              <input
                type="text"
                class="form-control"
                id="address"
                name="address"
                placeholder="Address"required>
            </div>
            <div class="col-md-12 form-group p_star">
              <label>Kurir</label>
              <select style="border: 1px solid #C8C8C8; border-radius:3px; padding:5px 7px; color: #707070; font-size: 16px;" name="courier" id="kurir" class="form-select country_select dropdown_item_select checkout_input cekongkir" required>
                <option selected disabled></option>
                @foreach ($kurir as $k)
                    <option value="{{$k->courier}}">{{$k->courier}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-12 form-group p_star">
              <label for="">Layanan Pengiriman</label>
              <select 
                style="border: 1px solid #C8C8C8; border-radius:3px; padding:5px 7px; color: #707070; font-size: 16px;"
                name="courier_service" id="courier_service" class="form-select country_select dropdown_item_select checkout_input" required>
                <option selected disabled></option>
              </select>
          </div> 
          </div>
          <div class="col-lg-4">
            <div class="order_box">
              <h2>Rincian Pemesanan</h2>
              <ul class="list">
                @foreach ($cart as $data)
                  <li>
                    <span class="middle">{{$data->product->product_name}} x {{$data->qty}}</span>
                    @php
                      $hasil = $data->product->price*$data->qty
                    @endphp
                    @if ($hasil != 0)
                      <span>Rp{{number_format($hasil)}}</span>
                    @else
                      <span>{{number_format($data->price)}}</span>
                    @endif
                  </li>
                @endforeach
                <li>     
                    Sub Total
                    <span id="biaya-total">Rp{{ number_format($subtotal)}}</span>            
                </li>
                <li>
                    Shipping
                    <span id="biaya-ongkir">Rp</span>
                </li>
              </ul>
              <ul class="list list_2">
                <li>
                  
                    Total
                    <span class = "font-weight-bold" id="total-biaya">Rp{{ number_format($subtotal)}}</span>
                  
                </li>
              </ul>
              <input type="hidden" name="sub_total" value="{{$subtotal}}">
              <input type="hidden" name="total" id="totalbiaya" value="">
              <input type="hidden" name="shipping_cost" id="ongkir" value="">
              <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
              <input type="hidden" name="cart" value="{{$cart}}">
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
<script>
  $(document).ready(function(e){
      function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
      }
      $('#provinsi').change(function(e){
          console.log("masuk provinsi");
          var id_provinsi = $('#provinsi').val();
          if(id_provinsi){
              jQuery.ajax({
                  url: '/kota/'+id_provinsi,
                  type: "GET",
                  dataType: "json",
                  success:function(data){
                      $('#kota').empty();
                      $('#kota').append('<option selected disabled>Pilih Kota</option>');
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
          // console.log('wrong ajax');
          // console.log('kota destinasi: '+kota+' berat: '+berat+' Kurir: '+kurir)
          if((provinsi).length>0 && (kurir).length>0){
              jQuery.ajax({
                  url: "{{url('cekongkir')}}",
                  method: 'POST',
                  data: {
                      _token: $('#signup-token').val(),
                      city_origin:114,
                      destination: kota,
                      weight: berat,
                      courier: kurir, 
                  },
                  success: function(result){
                      // console.log(result[0].costs);
                      $('#courier_service').empty();
                      $('#courier_service').append('<option selected disabled>Pilih Service</option>');
                      $.each(result[0].costs, function(key,value){
                        console.log(value['cost'][0]['value']);
                          $('#courier_service').append('<option value="'+value['cost'][0]['value']+'">'+value['service']+" "+value['cost'][0]['etd']+" Harga("+value['cost'][0]['value']+')</option>');
                      });
                      // $('#ongkir').val(result.hasil["value"]);
                      // $('#biaya-ongkir').append('<input type="hidden" id="biaya-ongkir" value="'+value['cost'][0]['value']+'">');
                      // $('#total-biaya').text( formatNumber({{$subtotal}}+result.hasil["value"]));
                      // $('#totalbiaya').val({{$subtotal}}+result.hasil["value"]);
                  }
              });
          }else{
              console.log('wrong');
              console.log('provinsi: '+provinsi+' Kurir: '+kurir)
          }

      });

      $('#courier_service').change(function(e){
          
          var id_provinsi = $('#provinsi').val();
          var harga_shipping = $('#courier_service').val();
          var Total = parseInt('{{$subtotal}}');
          Total = +Total + +harga_shipping;// I would use the unary plus operator to convert them to numbers first. klo ga 120008000 gaditambah
          console.log("ganti service "+Total);
          $('#biaya-ongkir').text('Rp'+ formatNumber(harga_shipping));
          $('#total-biaya').text('Rp'+ formatNumber(Total));
          $('#totalbiaya').val(Total);
          $('#ongkir').val(harga_shipping);
      });
  });
</script>
<!--================End Checkout Area =================-->
@endsection