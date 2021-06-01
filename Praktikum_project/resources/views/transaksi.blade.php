@extends('layouts.master')

@section('content')

<section class="cart_area">
  <div class="container">
    <div class="cart_inner">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
            <th>No</th>
                                <th>Jatuh Tempo</th>
                                <th>Alamat</th>
                                <th>Kota</th>
                                <th>Provinsi</th>
                                <th>Total</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
          @php
                            $no = 1;
                            @endphp
                            @foreach ($transactions as $transaksi)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$transaksi->timeout}}</td>
                                <td>{{$transaksi->address}}</td>
                                <td>{{$transaksi->regency}}</td>
                                <td>{{$transaksi->province}}</td>
                                <td>Rp.{{number_format($transaksi->total, 0, ',', '.')}}</td>
                                <td class="text-center">{{$transaksi->status}}
                                </td>

                                <td class="text-center">

                                    <a href="{{Route('show-transaksi',['transaction'=>$transaksi->id])}}"
                                        class=" btn btn-sm btn-dark"><i class="fas fa-eye"></i></a>

                                </td>
                            </tr>
                            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

@endsection