<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url(); ?>index.php" class="brand-link navbar-primary">
        <img src="<?php echo public_url(); ?>storage/logo/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Automotive</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo public_url(); ?>storage/admin/user1-128x128.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Username</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>
                            Dashboard
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>super_admin/index.php" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">TABLES</li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-user-md"></i>
                        <p>
                            Mails
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>super_admin/mail/table.php" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Mails Table</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-user-md"></i>
                        <p>
                            Admins
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>super_admin/admins/table.php" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Admins Table</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-user-md"></i>
                        <p>
                            Members
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>super_admin/members/table.php" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Members Table</p>
                            </a>
                        </li>
                    </ul>
                </li>   

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-user-md"></i>
                        <p>
                            Vehicles
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>super_admin/vehicles/table.php" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Vehicles Table</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>super_admin/vehicles/images_table.php" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Vehicle Images Table</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-cogs"></i>
                        <p>
                            Roles and Permissions
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>super_admin/roles/roles_table.php" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Roles Table</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>super_admin/vehicles/images_table.php" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Vehicle Images Table</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>