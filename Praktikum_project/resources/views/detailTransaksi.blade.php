@extends('layouts.master')

@section('content')

<!-- Main Layout -->
<div class="container">
  <main>
    <div style="margin-top:120px;" class="container mt-5 pt-3">
      <!-- Grid row -->
      <div class="row" style="margin-top: -140px;">
        <!-- Grid column -->
        <div class="col-md-12">
          <div class="card pb-5">
            <div class="card-body">
              <div class="container">

                <!-- Section: Contact v.3 -->
                <section class="contact-section my-5">
                  <!-- Form with header -->
                  <div class="card">
                    <!-- Grid row -->
                    <div class="row">
                      <!-- Grid column -->
                      <div class="col-lg-8">
                        <div class="card-body form">

                          <!-- Header -->
                          <h3 class="mt-4">Transaction Details</h3>
                          <br><br>
                          <div class="row md-12">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                              <input type="text" id="nama" class="form-control" value="{{$transaksi->user->name}}" disabled>
                            </div>
                          </div>

                          <div class="row md-12">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                              <input type="text" id="nomor-telp" class="form-control" value="{{$transaksi->telp}}" disabled>
                            </div>
                          </div>
                          
                          <div class="row md-12">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                              <input type="email" id="email" class="form-control" value="{{$transaksi->user->email}}" disabled>
                            </div>
                          </div>

                          <div class="row md-12">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label">Province</label>
                            <div class="col-sm-10">
                              <input type="text" id="nomor-telp" class="form-control" value="{{$transaksi->province}}" disabled>
                            </div>
                          </div>

                          <div class="row md-12">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label">City</label>
                            <div class="col-sm-10">    
                              <input type="text" id="nomor-telp" class="form-control" value="{{$transaksi->regency}}" disabled>
                            </div>
                          </div>

                          <div class="row md-12">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                              <input type="text" id="alamat" class="form-control" value="{{$transaksi->address}}" disabled>
                            </div>
                          </div>

                          <div class="row md-12">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label">Courier</label>
                            <div class="col-sm-10">
                              <input type="text" id="alamat" class="form-control" value="{{$transaksi->courier->courier}}" disabled>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-4">
                      <div class="card-body">
                        <h3 class="my-4 pb-2">Detail</h3>
                        <ul class="text-lg-left list-unstyled ml-4">
                          <li>
                            <h6>Status: 
                              <span class="badge blue">
                                @if ($transaksi->status == "unverified" && !is_null($transaksi->proof_of_payment)) Waiting Confirmation
                                @else
                                  {{$transaksi->status}}
                                @endif
                              </span>
                            </h6>
                          </li>
                          <li><h6>Sub total: Rp {{number_format ($transaksi->total)}}</h6> </li>
                          <li><h6 id="biaya-ongkir">Shipping Cost: Rp {{number_format ($transaksi->shipping_cost)}}</h6></li>
                          <li><h6>Total Cost: Rp {{number_format ($transaksi->sub_total)}}</h6></li>
                          <div class="d-flex flex-row bd-highlight mb-3">
                            <a>upload bukti pembayaran</a>
                            @if (is_null($transaksi->proof_of_payment) && $transaksi->status == 'unverified')
                              <form action="/transaksi/detail/upload/payment" method="POST" enctype="multipart/form-data">
                                @csrf
                                  <input type="hidden" name="id" value="{{$transaksi->id}}">
                                  <input type="file" class="ml-3" name="proof" id="proof" onchange="preview_image(event)" required>
                                  <span> <button type="submit" class="btn btn-outline-info mt-3 ml-3">Upload</button></span>
                              </form>

                              <form action="{{Route('cancel',['transaksi' => $transaksi->id])}}" method="POST" enctype="multipart/form-data">
                                  @method('put')
                                  @csrf
                                  <button type="submit" class="btn btn-danger">Cancel Transaction</button>
                              </form>
                            
                            @elseif ($transaksi->proof_of_payment)
                              <span class = "badge blue">Uploaded</span>
                            @endif

                          </div>
                        </ul>
                        @if ($transaksi->status == 'delivered')
                          <h3 class="my-4 pb-2">Rate Your Order</h3>
                          @foreach ($transaksi->transaction_detail as $det_trans)
                            @if ($det_trans->product->product_image->count()>0)
                              <img src="{{url('storage/livewire-tmp/product/'.$det_trans->product->product_image[0]->image_name)}}" alt="" height="300px" width="500px">
                            @endif
                            @foreach ($reviews as $rev)
                              @if($det_trans->product->id === $rev->product_id)
                                <p>Kamu sudah memberikan ulasan</p>
                              @else
                                <div class="d-flex flex-row bd-highlight mb-3">
                                  <button data-prodid="{{ $det_trans->product->id  }}" data-transid="{{ $transaksi->id  }}" class="btn btn-outline-warning reviewbtn" data-toggle="modal" data-target="#add_Review">Add Review</button>
                                </div>
                              @endif
                            @endforeach
                          @endforeach
                          
                          <!-- Modal -->
                          <div class="modal fade" id="add_Review" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Tambahkan Review</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="{{ route('addRating') }}" method="POST">
                                    <input type="hidden" id="transaction_form" name="transaction_id" value="">
                                    <input type="hidden" id="product_form" name="product_id" value="">
                                    @csrf
                                    <div>
                                      <div class="form-group required">
                                        <div class="col-sm-12">
                                          <label for="newRating">
                                            Rating
                                          </label>
                                          <input class="star star-5" value="5" id="star-5" type="radio" name="star"/>
                                          <label class="star star-5" for="star-5"></label>
                                          <input class="star star-4" value="4" id="star-4" type="radio" name="star"/>
                                          <label class="star star-4" for="star-4"></label>
                                          <input class="star star-3" value="3" id="star-3" type="radio" name="star"/>
                                          <label class="star star-3" for="star-3"></label>
                                          <input class="star star-2" value="2" id="star-2" type="radio" name="star"/>
                                          <label class="star star-2" for="star-2"></label>
                                          <input class="star star-1" value="1" id="star-1" type="radio" name="star"/>
                                          <label class="star star-1" for="star-1"></label>
                                        </div>
                                        <div class="col-sm-12">
                                          <label for="Reviews col-sm-12">
                                            Ulasan
                                          </label>
                                          <textarea class="form-control" name="content" id="" cols="30" rows="10"></textarea>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="modal-footer" style="margin-top: 1rem;">
                                      <Button class="btn btn-primary">Beri Ulasan</Button>
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endif
                        @if ($transaksi->status == 'success')
                            <p>Kamu sudah memberikan semua ulasan</p>
                        @endif
                      </div>
                    </div>
                  </div>
                </section>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>
<script>
  $(document).ready(function(e){
    $('.reviewbtn').click(function(e){
      var id_produk = $(this).attr('data-prodid');
      var id_trans = $(this).attr('data-transid');
      $('#transaction_form').val(id_trans);
      $('#product_form').val(id_produk);
      });
  });
</script>
@endsection