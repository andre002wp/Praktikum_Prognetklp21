@extends('admin.layouts.master')

@section('title')
    Admin | Dashboard 
@endsection

@section('css')

@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div style="margin-top: 2rem;">
          <h2>Transaksi per Bulan</h2>
  
          @php
              $number = 0;
          @endphp
  
          <table class="table table-hover">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Bulan Tahun</th>
                      <th>Jumlah Transaksi</th>
                  </tr>
              </thead>
              <tbody>
  
                  @foreach ($trans_by_month_year->keys()->sort() as $it)
                      <tr>
                          <td>{{ $number += 1 }}</td>
                          <td>{{ $it }}</td>
                          <td>{{ count($trans_by_month_year[$it]) }}</td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
        </div>
  
        <div style="margin-top: 2rem;">
          <h2>Transaksi per Tahun</h2>
  
          @php
              $number = 0;
          @endphp
  
          <table class="table table-hover">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Tahun</th>
                      <th>Jumlah Transaksi</th>
                  </tr>
              </thead>
              <tbody>
  
                  @foreach ($trans_by_year->keys() as $it)
                      <tr>
                          <td>{{ $number += 1 }}</td>
                          <td>20{{ $it }}</td>
                          <td>{{ count($trans_by_year[$it]) }}</td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
        </div>
  
        <div style="margin-top: 2rem;">
          <h2>Grafik Transaksi Total</h2>
  
          <canvas id="myChart" height="100"></canvas>
  
          <script>
              var ctx = document.getElementById('myChart').getContext('2d');
  
              const data = {
                  labels: {!! $trans_graph_label !!},
                  datasets: [{
                      label: 'Jumlah Penjualan',
                      data: {!! $trans_graph_count !!},
                      // backgroundColor: [
                      //     'rgba(255, 99, 132, 0.2)',
                      //     'rgba(255, 159, 64, 0.2)',
                      //     'rgba(255, 205, 86, 0.2)',
                      //     'rgba(75, 192, 192, 0.2)',
                      //     'rgba(54, 162, 235, 0.2)',
                      //     'rgba(153, 102, 255, 0.2)',
                      //     'rgba(201, 203, 207, 0.2)'
                      // ],
                      // borderColor: [
                      //     'rgb(255, 99, 132)',
                      //     'rgb(255, 159, 64)',
                      //     'rgb(255, 205, 86)',
                      //     'rgb(75, 192, 192)',
                      //     'rgb(54, 162, 235)',
                      //     'rgb(153, 102, 255)',
                      //     'rgb(201, 203, 207)'
                      // ],
                      borderWidth: 1
                  }]
              };
  
              var myBarChart = new Chart(ctx, {
                  type: 'bar',
                  data: data,
              });
  
          </script>
        </div>
  
        <div style="margin-top: 2rem;">
          <h2>Grafik Transaksi Sukses</h2>
  
          <canvas id="myChartSuccess" height="100"></canvas>
  
          <script>
              var ctxSuccess = document.getElementById('myChartSuccess').getContext('2d');
  
              const dataSuccess = {
                  labels: {!! $trans_graph_label_success !!},
                  datasets: [{
                      label: 'Jumlah Penjualan Sukses',
                      data: {!! $trans_graph_count_success !!},
                      borderWidth: 1
                  }]
              };
  
              var myBarChartSuccess = new Chart(ctxSuccess, {
                  type: 'bar',
                  data: dataSuccess,
              });
  
          </script>
        </div>
  
        <div style="margin-top: 2rem;">
          <h2>Grafik Transaksi Gagal</h2>
  
          <canvas id="myChartGagal" height="100"></canvas>
  
          <script>
              var ctxGagal = document.getElementById('myChartGagal').getContext('2d');
  
              const dataGagal = {
                  labels: {!! $trans_graph_label_failed !!},
                  datasets: [{
                      label: 'Jumlah Penjualan Gagal',
                      data: {!! $trans_graph_count_failed !!},
                      borderWidth: 1
                  }]
              };
  
              var myBarChartGagal = new Chart(ctxGagal, {
                  type: 'bar',
                  data: dataGagal,
              });
  
          </script>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection

@section('scripts')

@endsection
