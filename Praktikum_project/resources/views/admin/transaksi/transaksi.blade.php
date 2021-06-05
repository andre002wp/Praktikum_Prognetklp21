@extends('admin.layouts.master')

@section('content')

<section class="cart_area">
  <div class="container">
    <div class="cart_inner">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th><strong>Id Transaksi</strong></th>
              <th><strong>Id User</strong></th>
              <th><strong>Jatuh Tempo</strong></th>
              <th><strong>Alamat</strong></th>
              <th><strong>Kota</strong></th>
              <th><strong>Provinsi</strong></th>
              <th><strong>Total</strong></th>
              <th><strong>Status</strong></th>
              <th><strong>Aksi</strong></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($transaksi as $list)
              <tr>             
                <td>{{$list->id}}</td>
                <td>{{$list->user_id}}</td>
                <td>{{$list->timeout}}</td>
                <td>{{$list->address}}</td>
                <td>{{$list->regency}}</td>
                <td>{{$list->province}}</td>
                <td>Rp {{number_format($list->sub_total)}}</td>
                <td>
                  @if ($list->status == 'success' || $list->status == 'delivered')
                    <span class="btn-sm btn-success mt-1">{{$list->status}}</span>
                  @elseif ($list->status == 'verified' || $list->status == 'in delivery')
                    <span class="btn-sm btn-warning mt-1">{{$list->status}}</span>
                  @else
                    <span class="btn-sm btn-danger mt-1">{{$list->status}}</span>
                  @endif
                </td>
                <td>
                  <a href="/admin/transaksi/detail/{{$list->id}}"><strong>Detail Transaksi</strong></a>
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