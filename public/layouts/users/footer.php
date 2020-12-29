            </div>
            <!-- /.content-wrapper -->
            <!-- Main Footer -->
            <footer class="main-footer">
                <strong>Copyright &copy; 2020.</strong>
                All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 3.0.5
                </div>
            </footer>
            </div>
            <!-- ./wrapper -->
            <!-- REQUIRED SCRIPTS -->
            <!-- jQuery -->
            <script src="<?php echo public_url();  ?>back/plugins/jquery/jquery.min.js"></script>
            <!-- Bootstrap -->
            <script src="<?php echo public_url();  ?>back/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- SweetAlert2 -->
            <script src="<?php echo public_url();  ?>back/plugins/sweetalert2/sweetalert2.min.js"></script>
            <!-- Ekko Lightbox -->
            <script src="<?php echo public_url();  ?>back/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
            <!-- Toastr -->
            <script src="<?php echo public_url();  ?>back/plugins/toastr/toastr.min.js"></script>
            <!-- InputMask -->
            <script src="<?php echo public_url();  ?>back/plugins/moment/moment.min.js"></script>
            <script src="<?php echo public_url();  ?>back/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
            <!-- date-range-picker -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
            <!-- chart js -->
            <script src="<?php echo public_url();  ?>back/plugins/chart.js/Chart.min.js"></script>
            <!-- DataTables -->
            <script src="<?php echo public_url();  ?>back/plugins/datatables/jquery.dataTables.min.js"></script>
            <script src="<?php echo public_url();  ?>back/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
            <script src="<?php echo public_url();  ?>back/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
            <script src="<?php echo public_url();  ?>back/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
            <!-- AdminLTE -->
            <script src="<?php echo public_url();  ?>back/js/adminlte.js"></script>
            <script src="<?php echo public_url();  ?>back/js/demo.js"></script>
            <script>
                $(document).ready(function() {
                    $('.datepicker').datepicker({
                        format: 'yyyy-mm-dd'
                    });

                    $(document).on('click', '.logout', function(e) {
                        e.preventDefault();
                        logout();
                    });
                    
                    function logout(){
                        var action = "LOGOUT";
                        $.ajax({
                            url: "<?php echo base_url(); ?>api/members/members.php",
                            type: "POST",
                            data: {
                                action: action
                            },
                            dataType: "json",
                            success: function(data) {
                                if (data.message == "success") {
                                    localStorage.clear();
                                    window.location.href = "<?php echo base_url(); ?>members/login.php";
                                }
                            }
                        });
                    }

                    find_user();

                    function find_user() {
                        var action = "FETCH_LOGGED_IN_USER";
                        $.ajax({
                            url: "<?php echo base_url(); ?>api/members/members.php",
                            type: "POST",
                            data: {
                                action: action
                            },
                            dataType: "json",
                            success: function(data) {
                                if (data.message == "logout") {
                                    logout();
                                } else {
                                    $('.loggedInImage').html('<img src="<?php echo public_url(); ?>storage/users/' + data.image + '" class="img-circle elevation-2" alt="User Image">');
                                    $('.loggedInUserName').html(data.username);
                                    // profile
                                    $('#userProfileImage').html('<img class="profile-user-img img-fluid img-circle" src="<?php echo public_url(); ?>storage/users/' + data.image + '" alt="User profile picture">');
                                    $('#userProfileUserName').html(data.username);
                                    $('#adminProfileImage').html('<img class="profile-user-img img-fluid img-circle" src="<?php echo public_url(); ?>storage/users/' + data.image + '" alt="User profile picture">');
                                    $('#adminProfileUserName').html(data.username);
                                    $('#adminProfileFullNames').html(data.fullnames);
                                    $('#adminProfileEmailAddress').html(data.email);
                                    $('#adminProfilePhone').html(data.phone);
                                    $('#adminProfileDOB').html(data.dob);
                                    $('#adminProfileGender').html(data.gender);
                                    $('#adminProfileLocation').html(data.location);
                                    $('#adminProfileStatus').html(data.status);
                                }
                            }
                        });
                    }
                });
            </script>
            </body>

            </html>