@extends('admin.layouts.master')

@section('title')
    Admin | Courier

@section('css')
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Courier</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            {{-- <li class="breadcrumb-item active">Dashboard v1</li> --}}
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DataCourier</h3>
                    <a href="{{ route ('add.courier') }}" class="btn btn-success btn-sm float-right"><i class="fas fa-plus-square"></i></a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Courier Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($couriers as $courier)
                    <tr>
                        <td>{{ $courier->id }}</td>
                        <td>{{ $courier->courier }}</td>
                        <td>
                            <a href="{{ route('edit.courier', $courier->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></a>
                            <a href="{{ route('courier') }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></a>
                        </td>
                    </tr>
                    @endforeach
                    </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
                </div>
                </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
<!-- /.content -->
</div>
@endsection