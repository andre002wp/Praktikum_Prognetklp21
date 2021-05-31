
<style>
    .a-text a{
        text-indent: 14px;
    }
</style>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo e(asset('backend/dist/img/user2-160x160.jpg')); ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo e(Auth::user()->name); ?></a>
            </div>
            <div class="ml-auto pr-2 pt-1">
                <a href="#" class="d-block">
                    
                        <svg class="notification" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                            <path id="notification-normal" d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                        </svg>
                    
                        
                        
                    
                </a>
                <div class="notification-content">
                    <ul>
                        <li>
                            Profile
                        </li>
                        <li>
                            <?php echo e(route('logout')); ?>

                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item">
                    
                    <a class="nav-link" href="#">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item has-treeview <?php echo e(Route::currentRouteName() === 'category' || 'brand' || 'product' ? 'menu-open' : ''); ?>">
                    <a href="#" class="nav-link <?php echo e(Route::currentRouteName() === 'category' || 'brand' || 'product' ? 'active' : ''); ?>">
                        <i class="fas fa-database pl-1 pr-1"></i>
                        <p style="text-indent: 8px;">Data Master</p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item a-text">
                            
                            <a href="#">
                                <i class="far fa-hand-point-right"></i>
                                <p>Category</p>
                            </a>
                        </li>
                        <li class="nav-item a-text">
                            
                            <a href="#">
                                <i class="far fa-hand-point-right"></i>
                                <p>Brands</p>
                            </a>
                        </li>
                        <li class="nav-item a-text">
                            
                            <a href="#">
                                <i class="far fa-hand-point-right"></i>
                                <p>Products</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php if(auth()->guard()->guest()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                    </li>
                    <?php if(Route::has('register')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                        </li>
                    <?php endif; ?>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('logout')); ?>"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                <?php echo e(__('Logout')); ?>

                        </a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                            <?php echo csrf_field(); ?>
                        </form>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<?php /**PATH C:\Users\asus\OneDrive\Dokumen\GitHub\Praktikum\Praktikum_project\resources\views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>