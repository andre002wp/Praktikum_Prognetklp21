<div>
<!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Product</h3>
                            <a href="{{ route ('add.product') }}" class="btn btn-success btn-sm float-right"><i class="fas fa-plus-square"></i></a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Stock</th>
                                        <th>Weight</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>Rp {{ number_format($product->price)}}</td>
                                            <td>{{ $product->description }}</td>
                                            <td>{{ $product->stock }}</td>
                                            <td>{{ $product->weight }}</td>
                                            <td>
                                                @foreach ($productimages as $image)
                                                    @if($image->product_id == $product->id)
                                                        <img src=" {{url('storage/livewire-tmp/product/'.$image->image_name)}} " alt="{{ $image->image_name}}" width="100px">
                                                    @endif
                                                @endforeach
                                                {{-- <img src="{{route('get.image', $product->id)}}" alt="{{ $product->product_name}}" width="100px"> --}}
                                            </td>
                                            <td>
                                                <a href="{{ route('edit.product', $product->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></a>
                                                <a href="{{ route('delete.product', $product->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
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