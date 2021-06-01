@extends('admin.layouts.master')

@section('content')
     <!-- Main Layout -->
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
                          <h3 class="mt-4">Detail Transaksi</h3>
                          <br>
                          <br>
                          
                              <div class="row md-12">
                                  <label for="colFormLabelSm" class="col-sm-2 col-form-label">Nama Penerima</label>
                                <div class="col-sm-10">
                                    <input type="text" id="nama" class="form-control" value="{{$transaksi->user->name}}" disabled>
                                </div>
                              </div>
                              
                              <div class="row md-12">
                                  <label for="colFormLabelSm" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" id="email" class="form-control" value="{{$transaksi->user->email}}" disabled>
                                </div>
                              </div>

                              <div class="row md-12">
                                    <label for="colFormLabelSm" class="col-sm-2 col-form-label">Nomer Telpon</label>
                                <div class="col-sm-10">
                                    <input type="text" id="nomor-telp" class="form-control" value="{{$transaksi->telp}}" disabled>
                                </div>
                              </div>

                              <div class="row md-12">
                                    <label for="colFormLabelSm" class="col-sm-2 col-form-label">Provinsi</label>
                                <div class="col-sm-10">
                                    <input type="text" id="nomor-telp" class="form-control" value="{{$transaksi->province}}" disabled>
                                </div>
                              </div>

                              <div class="row md-12">
                                    <label for="colFormLabelSm" class="col-sm-2 col-form-label">Kota</label>
                                <div class="col-sm-10">    
                                    <input type="text" id="nomor-telp" class="form-control" value="{{$transaksi->regency}}" disabled>
                                </div>
                              </div>

                              <div class="row md-12">
                                    <label for="colFormLabelSm" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <input type="text" id="alamat" class="form-control" value="{{$transaksi->address}}" disabled>
                                </div>
                              </div>

                              <div class="row md-12">
                                    <label for="colFormLabelSm" class="col-sm-2 col-form-label">Kurir</label>
                                <div class="col-sm-10">
                                  <input type="text" id="alamat" class="form-control" value="{{$transaksi->courier->courier}}" disabled>
                                </div>
                              </div>

                            <!-- Grid column -->

                            </div>
                            <!-- Grid row -->

                           <!-- Grid row -->


                        </div>

                      </div>
                      <!-- Grid column -->

                      <!-- Grid column -->
                      <div class="col-lg-4">

                        <div class="card-body">

                          <h3 class="my-4 pb-2">Rangkuman Pesanan</h3>
                          <br>
                          <label>Summary</label>
                          <ul class="text-lg-left list-unstyled ml-4">

                            <li>
                              <h6>Status: 
                                <span class="badge blue">
                                @if ($transaksi->status == "unverified" && !is_null($transaksi->proof_of_payment))
                                    Menunggu Konfirmasi
                                @else
                                {{$transaksi->status}}
                                @endif</span>
                              </h6>
                            </li>
                            <li>
                                <h6>Sub Biaya: Rp.{{$transaksi->sub_total}}</h6>
                            </li>
                            <li>
                                <h6 id="biaya-ongkir">Biaya Pengiriman: Rp.{{$transaksi->shipping_cost}}</h6>
                            </li>
                            <li>
                                <h6>Total Biaya: Rp.{{$transaksi->total}}</h6>
                            </li>
                            <li>
                            <h6>Bukti Pembayaran: 
                                @if (is_null($transaksi->proof_of_payment))
                                <span class="badge success-color">Not yet</span>
                                @else
                                <span class="badge success-color">Already</span>
                                @endif
                            </h6>
                          </li>
                            <br>
                            <li>
                                    @if ($transaksi->status == "unverified" && !is_null($transaksi->proof_of_payment))
                                        <br>
                                        <div class="d-flex flex-row bd-highlight mb-3">
                                            <form action="/admin/transaksi/detail/status" method="POST">
                                              @csrf
                                              <input type="hidden" name="id" value="{{$transaksi->id}}">
                                              <input type="hidden" name="status" value="3">
                                              <button type="submit" class="btn btn-outline-success" onclick="return confirm('Apa yakin ingin acc pesanan ini?')">Verify</button>
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

                                    @if ($transaksi->status === 'indelivery')
                                            <div class="d-flex flex-row bd-highlight mb-3">
                                            <form action="/admin/transaksi/detail/status" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$transaksi->id}}">
                                                <input type="hidden" name="status" value="5">
                                                <button type="submit" class="btn btn-success btn-sm">Set Product Delivered</button>
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
                                          <a href="/admin/transaksi"><button type="button" class="btn btn-outline-secondary">Back</button></a>
                                        </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <!-- Grid column -->

                    </div>
                    <!-- Grid row -->

                  </div>
                  <!-- Form with header -->
                </section>
                <!-- Sec