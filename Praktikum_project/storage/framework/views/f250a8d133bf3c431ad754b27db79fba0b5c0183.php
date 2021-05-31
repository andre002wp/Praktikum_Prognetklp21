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
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($product->id); ?></td>
                                            <td><?php echo e($product->product_name); ?></td>
                                            <td><?php echo e($product->price); ?></td>
                                            <td><?php echo e($product->description); ?></td>
                                            <td><?php echo e($product->stock); ?></td>
                                            <td><?php echo e($product->weight); ?></td>
                                            <td>
                                                <?php $__currentLoopData = $productimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($image->product_id == $product->id): ?>
                                                        <img src=" <?php echo e(url('storage/livewire-tmp/images/'.$image->image_name)); ?> " alt="<?php echo e($image->image_name); ?>" width="100px">
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                
                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('edit.product', $product->id)); ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></a>
                                                <a href="<?php echo e(route('delete.product', $product->id)); ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></a>
                                                
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
</div><?php /**PATH C:\Users\asus\Desktop\Praktikum_project\resources\views/livewire/admin/product/index.blade.php ENDPATH**/ ?>