<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url().'assets/'; ?>images/favicon.png">
    <title>Data GPS</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url().'assets/'; ?>css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url().'assets/'; ?>css/helper.css" rel="stylesheet">
    <link href="<?php echo base_url().'assets/'; ?>css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url('admin/dashboard'); ?>">
                        <!-- Logo icon -->
                        <!-- <b><img src="<?php echo base_url().'assets/'; ?>images/logo.png" alt="homepage" class="dark-logo" /></b> -->
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <!-- <span><img src="<?php echo base_url().'assets/'; ?>images/logo-text.png" alt="homepage" class="dark-logo" /></span> -->
                        <b>GPS</b>
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php if(($admin->name)==null){ echo '<strong style="color: red;">Annonymous</strong>'; } else { echo ''.ucwords($admin->name).''; } ?> <img src="<?php if(!empty($admin->photo)){echo base_url('files/users/'.$admin->id_user.'/'.$admin->photo);}else{ echo base_url('files/no_image.png');}?>" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="<?php echo base_url('admin/profile'); ?>"><i class="ti-user"></i> Profile</a></li>
                                    <li><a href="<?php echo base_url('login/logout'); ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a class="#" href="<?php echo base_url('admin/dashboard'); ?>" aria-expanded="false"><i class="fa fa-tachometer"></i>Dashboard </a>
                        </li>
                        </li>
                        <li class="nav-label">Data Master</li>
                        <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-database"></i><span class="hide-menu">Manage GPS</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url('admin/gps'); ?>">Data GPS</a></li>
                            </ul>
                        </li>
                        <li class="nav-label">Settings</li>
                        <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">User Management</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url('admin/user'); ?>">Data Users</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->
        <div class="page-wrapper">
            <?php $this->load->view($content); ?>
            <!-- footer -->
            <footer class="footer"> © 2018 All rights reserved. Satori </footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="<?php echo base_url().'assets/'; ?>js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url().'assets/'; ?>js/lib/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url().'assets/'; ?>js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url().'assets/'; ?>js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url().'assets/'; ?>js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url().'assets/'; ?>js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url().'assets/'; ?>js/custom.min.js"></script>


    <script src="<?php echo base_url().'assets/'; ?>js/lib/datatables/datatables.min.js"></script>
    <script src="<?php echo base_url().'assets/'; ?>js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url().'assets/'; ?>js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url().'assets/'; ?>js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="<?php echo base_url().'assets/'; ?>js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url().'assets/'; ?>js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="<?php echo base_url().'assets/'; ?>js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url().'assets/'; ?>js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url().'assets/'; ?>js/lib/datatables/datatables-init.js"></script>
    <!-- Form validation -->
    <script src="<?php echo base_url().'assets/'; ?>js/lib/form-validation/jquery.validate.min.js"></script>
    <script src="<?php echo base_url().'assets/'; ?>js/lib/form-validation/jquery.validate-init.js"></script>
    <script src="<?php echo base_url().'assets/'; ?>js/konfirmasi_js.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('table.display').DataTable()
        } );
    </script>
    <script type="text/javascript">
        $(document).ready(function(){   
          $('.inputcheckbox100').click(function(){
            if($(this).is(':checked')){
              $('.show_form_password').attr('type','text');
            }else{
              $('.show_form_password').attr('type','password');
            }
          });
        });
    </script>
</body>

</html>