@extends('admin.layouts.master')

@section('title')
    Admin | Add Products
@endsection

@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/css/fileinput.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<style>
    .file-input {
        width: 100%;
    }
</style>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href=" {{ route('courier') }} ">Courier</a></li>
                        <li class="breadcrumb-item active">Courier</li>
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
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add Courier</h3>
                            </div>
                            <!-- /.card-header -->

                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif
                            
        <!-- form start -->
        <form action="/courier" method="POST" >
        <div class="card-body">
            <h4>Couriers Name</h4>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-desktop"></i></i></span>
                </div>
                <input type="text" name="courier" class="form-control @error('courier') is invalid @enderror" placeholder="insert courier name">
            </div>
        
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        </form>

                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('scripts')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/js/fileinput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/themes/fa/theme.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/js/fileinput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/themes/fa/theme.min.js"></script>

<script>
    $("#input-fa").fileinput({
        theme: "fa",
        uploadUrl: "/file-upload-batch/2"
    });
</script>
<script>
    $("#input-fa-logo").fileinput({
        theme: "fa",
        uploadUrl: "/file-upload-batch/2"
    });
</script>
@endsection