@extends('admin.layouts.master')

@section('title')
    Admin | Edit Products
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
                        <h1 class="m-0 text-dark">Product</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href=" {{ route('product') }} ">Product</a></li>
                        <li class="breadcrumb-item active">Edit Product</li>
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
                                <h3 class="card-title">Edit Product</h3>
                            </div>
                            <!-- /.card-header -->

                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif
                            
                            <!-- form start -->
                            {{-- @livewire('admin.product.update',['id' => ]) --}}

                            <form method="POST" action="{{ route('update.product', $products->id) }}">
                                @csrf
                                    <div class="card-body">
                                        <h4>Product Name</h4>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-desktop"></i></i></span>
                                            </div>
                                            <input type="text" name="product_name" class="form-control @error('product_name') is invalid @enderror" placeholder="{{$products->product_name}}" value="{{$products->product_name}}">
                                        </div>
                                        @error('product_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                            
                                        <h4>Price</h4>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-desktop"></i></i></span>
                                            </div>
                                            <input type="text" name="price" class="form-control @error('price') is invalid @enderror" placeholder="{{$products->price}}" value="{{$products->price}}">
                                            <!-- @error('price')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror -->
                                        </div>
                            
                                        <h4>Description</h4>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-desktop"></i></i></span>
                                            </div>
                                            <input type="text" name="description" class="form-control @error('description') is invalid @enderror" placeholder="{{$products->description}}" value="{{$products->description}}">
                                            <!-- @error('description')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror -->
                                        </div>
                            
                                        <h4>Stock</h4>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-desktop"></i></i></span>
                                            </div>
                                            <input type="text" name="stock" class="form-control @error('stock') is invalid @enderror" placeholder="{{$products->stock}}" value="{{$products->stock}}">
                                            <!-- @error('stock')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror -->
                                        </div>
                            
                                        <h4>Weight</h4>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-desktop"></i></i></span>
                                            </div>
                                            <input type="text" name="weight" class="form-control @error('weight') is invalid @enderror" placeholder="{{$products->weight}}" value="{{$products->weight}}">
                                            <!-- @error('weight')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror -->
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
