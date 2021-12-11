<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <nav class="pcoded-navbar">
            <div class="pcoded-inner-navbar main-menu">
                <div class="pcoded-navigatio-lavel">Navigation</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="<?= App\Http\Controllers\admin\BaseController::menu(2,['dashboard'])[2] ?>">
                        <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/dashboard') ?>">
                            <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                            <span class="pcoded-mtext">Dashboard</span>
                        </a>
                    </li>
                    <li class="<?= App\Http\Controllers\admin\BaseController::menu(2,['profile'])[2] ?>">
                        <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/profile') ?>">
                            <span class="pcoded-micon"><i class="feather icon-user"></i></span>
                            <span class="pcoded-mtext">My Profile</span>
                        </a>
                    </li>
                    <?php if(App\Http\Controllers\admin\BaseController::checkRight(1)){ ?>
                        <li class="<?= App\Http\Controllers\admin\BaseController::menu(2,['courses'])[2] ?>">
                            <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/courses') ?>">
                                <span class="pcoded-micon"><i class="fa fa-list"></i></span>
                                <span class="pcoded-mtext">Manage Courses</span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if(App\Http\Controllers\admin\BaseController::checkRight(2)){ ?>
                        <li class="<?= App\Http\Controllers\admin\BaseController::menu(2,['expenses'])[2] ?>">
                            <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/expenses') ?>">
                                <span class="pcoded-micon"><i class="fa fa-exchange"></i></span>
                                <span class="pcoded-mtext">Manage Expenses</span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if(App\Http\Controllers\admin\BaseController::checkRight(3)){ ?>
                        <li class="<?= App\Http\Controllers\admin\BaseController::menu(2,['reviews'])[2] ?>">
                            <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/reviews') ?>">
                                <span class="pcoded-micon"><i class="fa fa-star"></i></span>
                                <span class="pcoded-mtext">Manage Reviews</span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if(App\Http\Controllers\admin\BaseController::checkRight(4)){ ?>
                        <li class="<?= App\Http\Controllers\admin\BaseController::menu(2,['messages'])[2] ?>">
                            <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/messages') ?>">
                                <span class="pcoded-micon"><i class="fa fa-envelope"></i></span>
                                <span class="pcoded-mtext">Manage Messages</span>
                            </a>
                        </li>
                    <?php } ?>
                    <!-- <li class="<?= App\Http\Controllers\admin\BaseController::menu(2,['users'])[2] ?>">
                        <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/users') ?>">
                            <span class="pcoded-micon"><i class="fa fa-user-secret"></i></span>
                            <span class="pcoded-mtext">Manage Users</span>
                        </a>
                    </li> -->
                    <?php if(App\Http\Controllers\admin\BaseController::checkRight(5)){ ?>
                        <li class="<?= App\Http\Controllers\admin\BaseController::menu(2,['leads'])[2] ?>">
                            <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/leads') ?>">
                                <span class="pcoded-micon"><i class="fa fa-calendar"></i></span>
                                <span class="pcoded-mtext">Manage Leads</span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if(App\Http\Controllers\admin\BaseController::checkRight(6)){ ?>
                        <li class="<?= App\Http\Controllers\admin\BaseController::menu(2,['employee'])[2] ?>">
                            <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/employee') ?>">
                                <span class="pcoded-micon"><i class="fa fa-user-secret"></i></span>
                                <span class="pcoded-mtext">Manage Employees</span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if(App\Http\Controllers\admin\BaseController::checkRight(17)){ ?>
                        <li class="<?= App\Http\Controllers\admin\BaseController::menu(2,['students'])[2] ?>">
                            <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/students') ?>">
                                <span class="pcoded-micon"><i class="fa fa-users"></i></span>
                                <span class="pcoded-mtext">Manage Students</span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if(App\Http\Controllers\admin\BaseController::checkRight(27)){ ?>
                        <li class="<?= App\Http\Controllers\admin\BaseController::menu(2,['attendance'])[2] ?>">
                            <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/attendance') ?>">
                                <span class="pcoded-micon"><i class="fa fa-calendar"></i></span>
                                <span class="pcoded-mtext">Manage Attendance</span>
                            </a>
                        </li>
                    <?php } ?>
                    <div class="pcoded-navigatio-lavel"></div>
                    <?php if(Session::get('AdminId') == "1"){ ?>
                        <li class="<?= App\Http\Controllers\admin\BaseController::menu(2,['deletereq'])[2] ?>">
                            <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/deletereq') ?>">
                                <span class="pcoded-micon"><i class="fa fa-reply"></i></span> 
                                <span class="pcoded-mtext">Delete Requests</span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if(App\Http\Controllers\admin\BaseController::checkRight(24)){ ?>
                        <li class="<?= App\Http\Controllers\admin\BaseController::menu(2,['reference'])[2] ?>">
                            <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/reference') ?>">
                                <span class="pcoded-micon"><i class="fa fa-files-o"></i></span> 
                                <span class="pcoded-mtext">Manage Reference</span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if(App\Http\Controllers\admin\BaseController::checkRight(26)){ ?>
                        <li class="<?= App\Http\Controllers\admin\BaseController::menu(2,['attype'])[2] ?>">
                            <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/attype') ?>">
                                <span class="pcoded-micon"><i class="fa fa-files-o"></i></span> 
                                <span class="pcoded-mtext">Manage Attendance Types</span>
                            </a>
                        </li>
                    <?php } ?>
                    
                    <div class="pcoded-navigatio-lavel"></div>
                    <?php if(App\Http\Controllers\admin\BaseController::checkRight(10)){ ?>
                        <li class="<?= App\Http\Controllers\admin\BaseController::menu(2,['sticky'])[2] ?>">
                            <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/sticky') ?>">
                                <span class="pcoded-micon"><i class="fa fa-files-o"></i></span> 
                                <span class="pcoded-mtext">Sticky Page</span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if(App\Http\Controllers\admin\BaseController::checkRight(12)){ ?>
                    <ul class="pcoded-item pcoded-left-item">
                        <li class="pcoded-hasmenu <?= App\Http\Controllers\admin\BaseController::menu(2,['home'])[2] ?>">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="fa fa-home"></i></span>
                                <span class="pcoded-mtext">Home</span>
                            </a>   
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/home/slider') ?>">
                                        <span class="pcoded-micon"><i class="fa fa-list"></i></span>
                                        <span class="pcoded-mtext">Slider</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/home/steps') ?>">
                                        <span class="pcoded-micon"><i class="fa fa-list"></i></span>
                                        <span class="pcoded-mtext">Steps</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <?php } ?>
                    <?php if(App\Http\Controllers\admin\BaseController::checkRight(13)){ ?>
                    <ul class="pcoded-item pcoded-left-item">
                        <li class="pcoded-hasmenu <?= App\Http\Controllers\admin\BaseController::menu(2,['about'])[2] ?>">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="fa fa-info"></i></span>
                                <span class="pcoded-mtext">About</span>
                            </a>   
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/about/content') ?>">
                                        <span class="pcoded-micon"><i class="fa fa-list"></i></span>
                                        <span class="pcoded-mtext">Content</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/about/slider') ?>">
                                        <span class="pcoded-micon"><i class="fa fa-list"></i></span>
                                        <span class="pcoded-mtext">Partrner slider</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/about/team') ?>">
                                        <span class="pcoded-micon"><i class="fa fa-list"></i></span>
                                        <span class="pcoded-mtext">Team</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <?php } ?>
                    <?php if(App\Http\Controllers\admin\BaseController::checkRight(14)){ ?>
                    <ul class="pcoded-item pcoded-left-item">
                        <li class="pcoded-hasmenu <?= App\Http\Controllers\admin\BaseController::menu(2,['blog'])[2] ?>">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="fa fa-th"></i></span>
                                <span class="pcoded-mtext">Blog</span>
                            </a>   
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/blog/content') ?>">
                                        <span class="pcoded-micon"><i class="fa fa-list"></i></span>
                                        <span class="pcoded-mtext">Content</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/blog/list') ?>">
                                        <span class="pcoded-micon"><i class="fa fa-list"></i></span>
                                        <span class="pcoded-mtext">List</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <?php } ?>
                    <?php if(App\Http\Controllers\admin\BaseController::checkRight(15)){ ?>
                    <ul class="pcoded-item pcoded-left-item">
                        <li class="pcoded-hasmenu <?= App\Http\Controllers\admin\BaseController::menu(2,['cources-univercities'])[2] ?>">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="fa fa-bandcamp"></i></span>
                                <span class="pcoded-mtext">Courses</span>
                            </a>   
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/cources-univercities/content') ?>">
                                        <span class="pcoded-micon"><i class="fa fa-list"></i></span>
                                        <span class="pcoded-mtext">Content</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/cources-univercities/slider') ?>">
                                        <span class="pcoded-micon"><i class="fa fa-list"></i></span>
                                        <span class="pcoded-mtext">Slider</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <?php } ?>
                    <?php if(App\Http\Controllers\admin\BaseController::checkRight(16)){ ?>
                    <ul class="pcoded-item pcoded-left-item">
                        <li class="pcoded-hasmenu <?= App\Http\Controllers\admin\BaseController::menu(2,['contact'])[2] ?>">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="fa fa-envelope"></i></span>
                                <span class="pcoded-mtext">Contact us</span>
                            </a>   
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/contact/content') ?>">
                                        <span class="pcoded-micon"><i class="fa fa-list"></i></span>
                                        <span class="pcoded-mtext">Content</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <?php } ?>
                    <?php if(App\Http\Controllers\admin\BaseController::checkRight(9)){ ?>
                    <li class="<?= App\Http\Controllers\admin\BaseController::menu(2,['pages'])[2] ?>">
                        <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/pages') ?>">
                            <span class="pcoded-micon"><i class="fa fa-files-o"></i></span> 
                            <span class="pcoded-mtext">Pages</span>
                        </a>
                    </li>
                    <?php } ?>
                    <!-- <ul class="pcoded-item pcoded-left-item">
                        <li class="pcoded-hasmenu <?= App\Http\Controllers\admin\BaseController::menu(2,['common'])[2] ?>">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="fa fa-window-restore"></i></span>
                                <span class="pcoded-mtext">Common</span>
                            </a>   
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/common/social-links') ?>">
                                        <span class="pcoded-micon"><i class="fa fa-list"></i></span>
                                        <span class="pcoded-mtext">Social Links</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul> -->
                    <?php if(App\Http\Controllers\admin\BaseController::checkRight(11)){ ?>
                    <li class="<?= App\Http\Controllers\admin\BaseController::menu(3,['social-links'])[2] ?>">
                        <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/common/social-links') ?>">
                            <span class="pcoded-micon"><i class="fa fa-anchor"></i></span> 
                            <span class="pcoded-mtext">Social Links</span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if(App\Http\Controllers\admin\BaseController::checkRight(8)){ ?>
                    <li class="<?= App\Http\Controllers\admin\BaseController::menu(2,['footer-links'])[2] ?>">
                        <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/footer-links') ?>">
                            <span class="pcoded-micon"><i class="fa fa-anchor"></i></span> 
                            <span class="pcoded-mtext">Footer Links</span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if(App\Http\Controllers\admin\BaseController::checkRight(7)){ ?>
                    <li class="<?= App\Http\Controllers\admin\BaseController::menu(2,['settings'])[2] ?>">
                        <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/settings') ?>">
                            <span class="pcoded-micon"><i class="fa fa-gear fa-spin"></i></span> 
                            <span class="pcoded-mtext">Settings</span>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">