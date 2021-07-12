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
                    <li class="<?= App\Http\Controllers\admin\BaseController::menu(2,['expenses'])[2] ?>">
                        <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/expenses') ?>">
                            <span class="pcoded-micon"><i class="fa fa-exchange"></i></span>
                            <span class="pcoded-mtext">Manage Expenses</span>
                        </a>
                    </li>
                    <li class="<?= App\Http\Controllers\admin\BaseController::menu(2,['users'])[2] ?>">
                        <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/users') ?>">
                            <span class="pcoded-micon"><i class="fa fa-user-secret"></i></span>
                            <span class="pcoded-mtext">Manage Admins</span>
                        </a>
                    </li>
                    <div class="pcoded-navigatio-lavel">CMS</div>
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
                    <ul class="pcoded-item pcoded-left-item">
                        <li class="pcoded-hasmenu <?= App\Http\Controllers\admin\BaseController::menu(2,['cources-univercities'])[2] ?>">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="fa fa-bandcamp"></i></span>
                                <span class="pcoded-mtext">Cources & Univercities</span>
                            </a>   
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/cources-univercities/content') ?>">
                                        <span class="pcoded-micon"><i class="fa fa-list"></i></span>
                                        <span class="pcoded-mtext">Content</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
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
                    <li class="<?= App\Http\Controllers\admin\BaseController::menu(2,['pages'])[2] ?>">
                        <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/pages') ?>">
                            <span class="pcoded-micon"><i class="fa fa-files-o"></i></span> 
                            <span class="pcoded-mtext">Pages</span>
                        </a>
                    </li>
                    <ul class="pcoded-item pcoded-left-item">
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
                    </ul>
                    <li class="<?= App\Http\Controllers\admin\BaseController::menu(2,['footer-links'])[2] ?>">
                        <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/footer-links') ?>">
                            <span class="pcoded-micon"><i class="fa fa-anchor"></i></span> 
                            <span class="pcoded-mtext">Footer Links</span>
                        </a>
                    </li>
                    <li class="<?= App\Http\Controllers\admin\BaseController::menu(2,['settings'])[2] ?>">
                        <a href="<?= App\Http\Controllers\admin\BaseController::aUrl('/settings') ?>">
                            <span class="pcoded-micon"><i class="fa fa-gear fa-spin"></i></span> 
                            <span class="pcoded-mtext">Settings</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">