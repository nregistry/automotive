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
            <div class="image loggedInImage">
            </div>
            <div class="info">
                <a href="<?php echo base_url(); ?>members/account/profile.php" class="d-block loggedInUserName"></a>
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
                            <a href="<?php echo base_url(); ?>members/index.php" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-bank"></i>
                        <p>
                            Vehicles
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>members/vehicles/index.php" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>My Vehicle</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>members/vehicles/requests.php" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>My Requets</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">SETTINGS</li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-cogs"></i>
                        <p>
                            Settings
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>members/account/profile.php" class="nav-link seetingsBtn">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>My Profile</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">LOGOUT</li>

                <li class="nav-item">
                    <a href="#" class="nav-link logout">
                        <i class="nav-icon fa fa-sign-out"></i>
                        <p>
                            Sign Out
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>