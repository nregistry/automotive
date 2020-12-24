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
            <div class="image loggedInImage">
            </div>
            <div class="info">
                <a href="<?php echo base_url(); ?>admin/account/profile.php?organization=<?php echo urlencode($current_org['id']); ?>" class="d-block loggedInUserName"></a>
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
                            <a href="<?php echo base_url(); ?>admin/index.php?organization=<?php echo urlencode($current_org['id']); ?>" class="nav-link">
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
                            Sales
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>admin/sales/index.php?organization=<?php echo urlencode($current_org['id']); ?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Sales</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="<?php //echo base_url(); ?>admin/invoice/index.php?organization=<?php //echo urlencode($current_org['id']); ?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Invoices</p>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>admin/receipts/index.php?organization=<?php echo urlencode($current_org['id']); ?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Receipts</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>admin/customers/index.php?organization=<?php echo urlencode($current_org["id"]); ?>" class="nav-link">
                        <i class="nav-icon fa fa-th"></i>
                        <p>
                            Customers
                            <span class="right badge badge-success">
                                <?php $customers = new Customers(); ?>
                                <?php $org_customers = $customers->find_customers_for_organization($current_org["id"]); ?>
                                <?php echo count($org_customers); ?>
                            </span>
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-balance-scale"></i>
                        <p>
                            Expenses
                            <i class="fa fa-angle-left right"></i>
                            <span class="badge badge-info right">
                                <?php $expenses = new Expenses(); ?>
                                <?php $org_expenses = $expenses->find_expenses_for_organization($current_org["id"]); ?>
                                <?php echo count($org_expenses); ?>
                            </span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>admin/expenses/categories.php?organization=<?php echo urlencode($current_org['id']); ?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Expense Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>admin/expenses/index.php?organization=<?php echo urlencode($current_org['id']); ?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Expenses</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>admin/suppliers/index.php?organization=<?php echo urlencode($current_org["id"]); ?>" class="nav-link">
                        <i class="nav-icon fa fa-shield"></i>
                        <p>
                            Suppliers
                            <span class="right badge badge-danger">
                                <?php $suppliers = new Suppliers(); ?>
                                <?php $org_suppliers = $suppliers->find_suppliers_for_organization($current_org["id"]); ?>
                                <?php echo count($org_suppliers); ?>
                            </span>
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>admin/taxes/index.php?organization=<?php echo urlencode($current_org["id"]); ?>" class="nav-link">
                        <i class="nav-icon fa fa-file-excel-o"></i>
                        <p>
                            taxes
                            <span class="right badge badge-warning">
                                <?php $taxes = new Taxes(); ?>
                                <?php $org_taxes = $taxes->find_taxes_for_organization($current_org["id"]); ?>
                                <?php echo count($org_taxes); ?>
                            </span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>admin/methods/index.php?organization=<?php echo urlencode($current_org["id"]); ?>" class="nav-link">
                        <i class="nav-icon fa fa-credit-card"></i>
                        <p>
                            Payment Methods
                            <span class="right badge badge-primary">
                                <?php $methods = new Payment_Methods(); ?>
                                <?php $org_methods = $methods->find_methods_for_organization($current_org["id"]); ?>
                                <?php echo count($org_methods); ?>
                            </span>
                        </p>
                    </a>
                </li>

                <li class="nav-header">INVENTORIES</li>

                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>admin/inventories/categories.php?organization=<?php echo urlencode($current_org["id"]); ?>" class="nav-link">
                        <i class="nav-icon fa fa-database"></i>
                        <p>
                            Product Categories
                            <span class="right badge badge-info">
                                <?php $categories = new Product_Categories(); ?>
                                <?php $org_categories = $categories->find_categories_for_organization($current_org["id"]); ?>
                                <?php echo count($org_categories); ?>
                            </span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>admin/inventories/index.php?organization=<?php echo urlencode($current_org["id"]); ?>" class="nav-link">
                        <i class="nav-icon fa fa-cubes"></i>
                        <p>
                            Products
                            <span class="right badge badge-success">
                                <?php $products = new Products(); ?>
                                <?php $org_products = $products->find_products_for_organization($current_org["id"]); ?>
                                <?php echo count($org_products); ?>
                            </span>
                        </p>
                    </a>
                </li>

                <li class="nav-header">REPORTS</li>

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
                            <a href="<?php echo base_url(); ?>admin/sales_report/index.php?organization=<?php echo urlencode($current_org['id']); ?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Daily Reports</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>admin/sales_report/month.php?organization=<?php echo urlencode($current_org['id']); ?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Monthly Reports</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>admin/sales_report/year.php?organization=<?php echo urlencode($current_org['id']); ?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Yearly Reports</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-file-text"></i>
                        <p>
                            Expenses
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>admin/expenses_report/index.php?organization=<?php echo urlencode($current_org['id']); ?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Daily Reports</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>admin/expenses_report/month.php?organization=<?php echo urlencode($current_org['id']); ?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Monthly Reports</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>admin/expenses_report/year.php?organization=<?php echo urlencode($current_org['id']); ?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Yearly Reports</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-file-text"></i>
                        <p>
                            Inventories
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>admin/inventories_report/index.php?organization=<?php echo urlencode($current_org['id']); ?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Reports</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-header">USERS</li>

                
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-th-list"></i>
                        <p>
                            Employees
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>admin/employees/index.php?organization=<?php echo urlencode($current_org['id']); ?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Employees</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>admin/employees/terminated.php?organization=<?php echo urlencode($current_org['id']); ?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Terminated Employees</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Users
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>admin/users/index.php?organization=<?php echo urlencode($current_org['id']); ?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Users</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-header">ORGANIZATIONS</li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-industry"></i>
                        <p>
                            My Organization
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>admin/organizations/view.php?organization=<?php echo urlencode($current_org['id']); ?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Current Organization</p>
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
                            <a href="<?php echo base_url(); ?>admin/organizations/index.php?organization=<?php echo urlencode($current_org['id']); ?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>My Organizations</p>
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
                            <a href="<?php echo base_url(); ?>admin/account/profile.php?organization=<?php echo urlencode($current_org['id']); ?>" class="nav-link seetingsBtn">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>My Profile</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-certificate"></i>
                        <p>
                            Logs
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>admin/logs/index.php?organization=<?php echo urlencode($current_org['id']); ?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Admin Logs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>admin/logs/users.php?organization=<?php echo urlencode($current_org['id']); ?>" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Users Logs</p>
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