<div>
<!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DataProduct</h3>
                    <a href="<?php echo e(route ('add.product')); ?>" class="btn btn-success btn-sm float-right"><i class="fas fa-plus-square"></i></a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
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
                    <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td>
                            <img src="<?php echo e(asset('images/product'.$p->image_name)); ?>" alt="<?php echo e($p->product_name); ?>" width="100px">
                        </td>
                        <td>
                            <a href="" class="btn btn-primary btn-sm"><i class="fa fa-edit"></a>
                            <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></a>
                        </td>
                    </tr>
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
</div><?php /**PATH C:\xampp7\htdocs\Praktikum_project\resources\views/livewire/admin/product/index.blade.php ENDPATH**/ ?>