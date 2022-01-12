<!DOCTYPE html>
<html lang="en">

<head>
    
    <title><?php if(isset($_title)){ echo $_title.' | '; } ?><?= App\Http\Controllers\admin\BaseController::getSetting()->name; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Kava Developers">
    <meta name="keywords" content="Kava Developers">
    <meta name="author" content="Kava Developers">
    <!-- Favicon icon -->
    <link rel="icon" href="<?= url('public/uploads/settings/'.App\Http\Controllers\admin\BaseController::getSetting()->favicon) ?>" type="image/x-icon">
    <script type="text/javascript" src="<?= url('public/admin/') ?>/bower_components/jquery/js/jquery.min.js"></script>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?= url('public/admin/') ?>/bower_components/bootstrap/css/bootstrap.min.css">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="<?= url('public/admin/') ?>/assets/icon/feather/css/feather.css">
    

    <link rel="stylesheet" type="text/css" href="<?= url('public/admin/') ?>/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?= url('public/admin/') ?>/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?= url('public/admin/') ?>/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="<?= url('public/admin/') ?>/assets/icon/feather/css/feather.css">
    <link rel="stylesheet" type="text/css" href="<?= url('public/admin/') ?>/assets/icon/icofont/css/icofont.css">
    <link rel="stylesheet" type="text/css" href="<?= url('public/admin/') ?>/assets/icon/font-awesome/css/font-awesome.min.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?= url('public/admin/') ?>/bower_components/bootstrap-daterangepicker/css/daterangepicker.css">
    <link rel="stylesheet" href="<?= url('public/admin/') ?>/bower_components/datepicker/datepicker3.css">
    <!-- PNotify -->
    <link rel="stylesheet" type="text/css" href="<?= url('public/admin/') ?>/bower_components/pnotify/css/pnotify.css">
    <link rel="stylesheet" type="text/css" href="<?= url('public/admin/') ?>/bower_components/pnotify/css/pnotify.brighttheme.css">
    <link rel="stylesheet" type="text/css" href="<?= url('public/admin/') ?>/bower_components/pnotify/css/pnotify.buttons.css">
    <link rel="stylesheet" type="text/css" href="<?= url('public/admin/') ?>/bower_components/pnotify/css/pnotify.history.css">
    <link rel="stylesheet" type="text/css" href="<?= url('public/admin/') ?>/bower_components/pnotify/css/pnotify.mobile.css">
    
    <link rel="stylesheet" type="text/css" href="<?= url('public/admin/') ?>/bower_components/sweetalert/css/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="<?= url('public/admin/') ?>/assets/croppie/croppie.css">
    <!-- Select 2 css -->
    <link rel="stylesheet" href="<?= url('public/admin/') ?>/bower_components/select2/css/select2.min.css">

    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?= url('public/admin/') ?>/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= url('public/admin/') ?>/assets/css/jquery.mCustomScrollbar.css">

    <!--forms-wizard css-->
    <link rel="stylesheet" type="text/css" href="<?= url('public/admin/') ?>/bower_components/jquery.steps/css/jquery.steps.css">

    <link rel="stylesheet" href="<?= url('public/admin/') ?>/assets/photoswipe/photoswipe.css"> 
    <link rel="stylesheet" href="<?= url('public/admin/') ?>/assets/photoswipe/default-skin/default-skin.css"> 
    <script src="<?= url('public/admin/') ?>/assets/photoswipe/photoswipe.min.js"></script> 
    <script src="<?= url('public/admin/') ?>/assets/photoswipe/photoswipe-ui-default.min.js"></script> 

    <link rel="stylesheet" type="text/css" href="<?= url('public/admin/') ?>/assets/simple-calendar/style.css">
    <script type="text/javascript" src="<?= url('public/admin/') ?>/assets/simple-calendar/script.js"></script>
    
    <link rel="stylesheet" type="text/css" href="<?= url('public/admin/') ?>/assets/calander.js/style.css">
    <link rel="stylesheet" type="text/css" href="<?= url('public/admin/') ?>/assets/calander.js/theme.css">
    <script type="text/javascript" src="<?= url('public/admin/') ?>/assets/calander.js/script.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>

<body>

    
    
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="ajaxLoader">
        <div class="loader animation-start">
            <span class="circle delay-1 size-2"></span>
            <span class="circle delay-2 size-4"></span>
            <span class="circle delay-3 size-6"></span>
            <span class="circle delay-4 size-7"></span>
            <span class="circle delay-5 size-7"></span>
            <span class="circle delay-6 size-6"></span>
            <span class="circle delay-7 size-4"></span>
            <span class="circle delay-8 size-2"></span>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header" >
                <div class="navbar-wrapper">

                    <div class="navbar-logo" >
                        <a class="mobile-menu" id="mobile-collapse" href="javascript:;">
                            <i class="feather icon-menu"></i>
                        </a>
                        <a href="#">
                            <img class="img-fluid" src="<?php echo url('public/logo.png'); ?>" alt="Theme-Logo" style="width: 150px;">
                        </a>
                        <a class="mobile-options">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <!-- <ul class="nav-left">
                            <li>
                                <a href="javascript:;" onclick="javascript:toggleFullScreen()">
                                    <i class="feather icon-maximize full-screen"></i>
                                </a>
                            </li>
                        </ul> -->
                        <ul class="nav-right">
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="<?= url('public/admin/') ?>/images/user/male.png" class="img-radius" alt="User-Profile-Image">
                                        <span><?= App\Http\Controllers\admin\BaseController::getUser()->name; ?></span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <?php if(App\Http\Controllers\admin\BaseController::checkRight(7)){ ?>
                                            <li style="padding: 0;">
                                                <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/settings') ?>" class="dis-block" style="padding: 0.7em 20px;">
                                                    <i class="fa fa-gear fa-spin"></i> Settings
                                                </a>
                                            </li>
                                        <?php } ?>
                                        <li style="padding: 0;">
                                            <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/profile') ?>" class="dis-block" style="padding: 0.7em 20px;">
                                                <i class="feather icon-user"></i> Profile
                                            </a>
                                        </li>
                                        <li style="padding: 0;">
                                            <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/logout') ?>" class="dis-block" style="padding: 0.7em 20px;">
                                                <i class="feather icon-log-out"></i> Logout
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>


            <!-- Sidebar -->
            @include('admin.layouts.sidebar')
            <!-- End sidebar -->




            @yield('content')



</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

    
    <script type="text/javascript" src="<?= url('public/admin/') ?>/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?= url('public/admin/') ?>/bower_components/popper.js/js/popper.min.js"></script>
    <script type="text/javascript" src="<?= url('public/admin/') ?>/bower_components/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="<?= url('public/admin/') ?>/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="<?= url('public/admin/') ?>/bower_components/modernizr/js/modernizr.js"></script>

    <script src="<?= url('public/admin/') ?>/assets/js/pcoded.min.js"></script>
    <script src="<?= url('public/admin/') ?>/assets/js/vartical-layout.min.js"></script>
    <script src="<?= url('public/admin/') ?>/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="<?= url('public/admin/') ?>/assets/js/script.min.js"></script>
    <script type="text/javascript" src="<?= url('public/admin/') ?>/assets/js/SmoothScroll.js"></script>


    <!-- bootstrap-datepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="<?= url('public/admin/') ?>/bower_components/daterangepicker/daterangepicker.js"></script>
    <script src="<?= url('public/admin/') ?>/bower_components/datepicker/bootstrap-datepicker.js"></script>

    <script src="<?= url('public/admin/') ?>/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= url('public/admin/') ?>/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= url('public/admin/') ?>/assets/pages/data-table/js/jszip.min.js"></script>
    <script src="<?= url('public/admin/') ?>/assets/pages/data-table/js/pdfmake.min.js"></script>
    <script src="<?= url('public/admin/') ?>/assets/pages/data-table/js/vfs_fonts.js"></script>
    <script src="<?= url('public/admin/') ?>/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?= url('public/admin/') ?>/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= url('public/admin/') ?>/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= url('public/admin/') ?>/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= url('public/admin/') ?>/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    
    <!-- pnotify js -->
    <script type="text/javascript" src="<?= url('public/admin/') ?>/bower_components/pnotify/js/pnotify.js"></script>
    <script type="text/javascript" src="<?= url('public/admin/') ?>/bower_components/pnotify/js/pnotify.desktop.js"></script>
    <script type="text/javascript" src="<?= url('public/admin/') ?>/bower_components/pnotify/js/pnotify.buttons.js"></script>
    <script type="text/javascript" src="<?= url('public/admin/') ?>/bower_components/pnotify/js/pnotify.confirm.js"></script>
    <script type="text/javascript" src="<?= url('public/admin/') ?>/bower_components/pnotify/js/pnotify.callbacks.js"></script>
    <script type="text/javascript" src="<?= url('public/admin/') ?>/bower_components/pnotify/js/pnotify.animate.js"></script>
    <script type="text/javascript" src="<?= url('public/admin/') ?>/bower_components/pnotify/js/pnotify.history.js"></script>
    <script type="text/javascript" src="<?= url('public/admin/') ?>/bower_components/pnotify/js/pnotify.mobile.js"></script>
    <script type="text/javascript" src="<?= url('public/admin/') ?>/bower_components/pnotify/js/pnotify.nonblock.js"></script>
    <script type="text/javascript" src="<?= url('public/admin/') ?>/bower_components/sweetalert/js/sweetalert.min.js"></script>

    <script src="<?= url('public/admin/') ?>/bower_components/select2/js/select2.full.min.js"></script>
    <script type="text/javascript" src="<?= url('public/admin/') ?>/assets/croppie/croppie.js"></script>
    <script type="text/javascript" src="<?= url('public/admin/') ?>/script.js"></script>

    <!-- Masking js -->
    <script src="<?= url('public/admin/') ?>/assets/pages/form-masking/inputmask.js"></script>
    <script src="<?= url('public/admin/') ?>/assets/pages/form-masking/jquery.inputmask.js"></script>
    <script src="<?= url('public/admin/') ?>/assets/pages/form-masking/autoNumeric.js"></script>
    <script src="<?= url('public/admin/') ?>/assets/pages/form-masking/form-mask.js"></script>

    <script type="text/javascript">
        function master_alert(string){
            PNOTY(string,'error');
            return false;
        }
        $(function(){
            $('.select2-container').addClass('m-t2');
        })
    </script>
    <!-- Style -->


    <script type="text/javascript">
        <?php if(Session::has('error')){ ?>
            PNOTY('<?= Session::get('error'); ?>','error');
        <?php } ?>
        <?php if(Session::has('success')){ ?>
            PNOTY('<?= Session::get('success'); ?>','success');
        <?php } ?>
    </script>
    <style type="text/css">
        .ui-pnotify{
            z-index: 999999999 !important;
        }
    </style>
    @include('admin.layouts.style')
    @include('admin.layouts.script')
    @include('admin.layouts.modals')
    <!-- End Style -->
    </body>
</html>