

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="container">
        Notification
        </div>
        <div>
            <li class="hassubs active">
                <?php 
                    $id = Auth::user()->id;
                    $notif_count = Auth()->user()->unreadNotifications->count();
                    $notifications = Auth::user()->notifications;
                    // $notifications = DB::table('user_notifications')->where('notifiable_id',$id)->where('read_at',NULL)->orderBy('created_at','desc')->get();
                ?>
                
                <ul >
                    <center><a href="/marknotif" class="btn" style="background-color: white;">Mark All As Read</a></center>
                    <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo $notif->data; ?></li>
                        <br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                  
                </ul>
            </li>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\asus\OneDrive\Dokumen\GitHub\Praktikum_Prognetklp21\Praktikum_project\resources\views/notif.blade.php ENDPATH**/ ?>