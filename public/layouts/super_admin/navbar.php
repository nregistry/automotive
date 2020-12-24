<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url(); ?>index.php" class="brand-link navbar-primary">
        <img src="<?php echo public_url(); ?>storage/logo/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Schedulize</span>
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

                <li class="nav-header">ACCOUNTS</li>

                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>super_admin/packages/index.php" class="nav-link">
                        <i class="nav-icon fa fa-folder"></i>
                        <p>
                            Packages
                            
                        </p>
                    </a>
                </li>


                <li class="nav-header">TABLES</li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-th"></i>
                        <p>
                            Accounts
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>super_admin/account/table.php" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Accounts Table</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>super_admin/account/history_table.php" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Account History Table</p>
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
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>super_admin/admins/index.php" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>View Admins</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-building"></i>
                        <p>
                            Organizations
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>super_admin/organizations/table.php" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Organizations Table</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>View Organizations</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-th"></i>
                        <p>
                            Customers
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>super_admin/customers/table.php" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Customers Table</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/UI/icons.html" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>View Organizations</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-balance-scale"></i>
                        <p>
                            Invoices
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>super_admin/invoices/table.php" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Invoices Table</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Suppliers</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-bar-chart"></i>
                        <p>
                            Invoice items
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>super_admin/invoice_items/table.php" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Invoice items Table</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Suppliers</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-sticky-note"></i>
                        <p>
                            Receipts
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>super_admin/receipts/table.php" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Receipts Table</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Suppliers</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-file-text"></i>
                        <p>
                            Sales
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>super_admin/sales/table.php" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Sales Table</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>super_admin/sales/sale_items_table.php" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Sale Items Table</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-contao"></i>
                        <p>
                            Taxes
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>super_admin/taxes/table.php" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Taxes Table</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-credit-card"></i>
                        <p>
                            Payment Methods
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>super_admin/methods/table.php" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Methods Table</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Suppliers</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-balance-scale"></i>
                        <p>
                            Expenses
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>super_admin/expenses/categories_table.php" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Categories Table</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>super_admin/expenses/table.php" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Expenses Table</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-shield"></i>
                        <p>
                            Suppliers
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>super_admin/suppliers/table.php" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Suppliers Table</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-calculator"></i>
                        <p>
                            Inventories
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>super_admin/inventories/categories_table.php" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Product Categories Table</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>super_admin/inventories/table.php" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Products Table</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-file-archive-o"></i>
                        <p>
                            Logs
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>super_admin/logs/admin_logs_table.php" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Admin Logs Table</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>super_admin/logs/user_logs_table.php" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>User Logs Table</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Employees
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>super_admin/employees/table.php" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Employees Table</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>super_admin/inventories/table.php" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Products Table</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Organizational Users
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>super_admin/users/table.php" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Users Table</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>super_admin/inventories/table.php" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Products Table</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-envelope"></i>
                        <p>
                            Mail
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>super_admin/mail/table.php" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Mail Table</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-folder"></i>
                        <p>
                            Packages
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>super_admin/packages/table.php" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Packages Table</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">TRANSACTIONS</li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-folder"></i>
                        <p>
                            Transactions
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>super_admin/transactions/paypal_transactions_table.php" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Paypal Transactions Table</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">USERS</li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Users
                            <span class="right badge badge-warning">20</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-th-list"></i>
                        <p>
                            Employees
                            <span class="right badge badge-primary">5</span>
                        </p>
                    </a>
                </li>

                <li class="nav-header">ORGANIZATIONS</li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-industry"></i>
                        <p>
                            My Organizations
                            <i class="fa fa-angle-left right"></i>
                            <span class="badge badge-info right">3</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/layout/top-nav.html" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Tad Tech Africa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Ubuni ventures</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/boxed.html" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Webkeja</p>
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
                            <a href="" class="nav-link seetingsBtn">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Settings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link account">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Account Settings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/read-mail.html" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Change Password</p>
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