<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <span class="brand-text font-weight-light">SafariStay</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <!--    
                <div class="image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                -->
                        <a href="#" class="d-block"><?= session()->get('admin_name') ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

                        <li class="nav-item">
                            <a href="<?= base_url('admin_dashboard') ?>" class="nav-link">
                                <p>
                                    Dashboard
                                    <span class="right badge badge-primary"></span>
                                </p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="<?= base_url('admin/viewusers'); ?>" class="nav-link">
                                <p>
                                    Users
                                    <span class="right badge badge-primary"></span>
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('admin/viewProducts'); ?>" class="nav-link">
                                <p>
                                    Products
                                    <span class="right badge badge-primary"></span>
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('BookingController/all'); ?>" class="nav-link">
                                <p>
                                    Bookings
                                    <span class="right badge badge-primary"></span>
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('Admin/validateproduct'); ?>" class="nav-link">
                                <p>
                                    Validate Products
                                    <span class="right badge badge-primary"></span>
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('admin') ?>" class="nav-link">
                                <i class="nav-icon fas fa-bell"></i>
                                <p>
                                    Notifications
                                    <span class="right badge badge-primary"><?= $notificationCount ?></span>
                                </p>
                            </a>
                        </li>

                        
                        <li class="nav-item">
                            <a href="/logout" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
