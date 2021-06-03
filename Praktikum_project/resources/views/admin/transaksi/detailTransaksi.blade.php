@extends('admin.layouts.master')

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
                            <li>
                                <h6>Sub total: Rp {{number_format ($transaksi->total)}}</h6> 
                            </li>
                            <li>
                            <li>
                                <h6 id="biaya-ongkir">Shipping Cost: Rp {{number_format ($transaksi->shipping_cost)}}</h6>
                            </li>                        
                            <li>
                                <h6>Total Cost: Rp {{number_format ($transaksi->sub_total)}}</h6>
                            </li>
                            <h6>Bukti Pembayaran: 
                                @if (is_null($transaksi->proof_of_payment))
                                  <span class="badge success-color">Not available</span>
                                @else
                                  <span class="badge success-color">Available</span>
                                @endif
                            </h6>
                          </li>
                            <br>
                            <li>
                                @if($transaksi->status == "unverified" && !is_null($transaksi->proof_of_payment))
                                  <br>
                                  <div class="d-flex flex-row bd-highlight mb-3">
                                      <form action="/admin/transaksi/detail/status" method="POST">
                                        @csrf
                                              <input type="hidden" name="id" value="{{$transaksi->id}}">
                                              <input type="hidden" name="status" value="3">
                                              <button type="submit" class="btn btn-outline-success" onclick="return confirm('Acc this transaction?')">Verifikasi</button>
                                            </form>
                                        </div>  
                                    @endif
                                    
                                    @if ($transaksi->status === 'verified')
                                            <div class="d-flex flex-row bd-highlight mb-3">
                                            <form action="/admin/transaksi/detail/status" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$transaksi->id}}">
                                                <input type="hidden" name="status" value="4">
                                                <button type="submit" class="btn btn-success btn-sm">Deliver Products</button>
                                            </form>
                                        </div>  
                                    @endif
                                    
                                      @if (is_null($transaksi->proof_of_payment))   
                                                               
                                      
                                      @else
                                          <div class="d-flex flex-row bd-highlight mb-3">
                                              <button id="tombol" class="btn btn-outline-info" data-toggle="modal" data-target="#modalContactForm">Proof Of Payment</button>
                           
                                          </div>
                                      @endif

                                      <div class="d-flex flex-row bd-highlight mb-3">
                                        <a href="/admin/transaksi"><button type="button" class="btn btn-outline-secondary">go to transaction</button></a>
                                      </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>