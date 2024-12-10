<div class="navbar-custom">
    <div class="container-fluid ps-0">
        <ul class="list-unstyled topnav-menu float-end mb-0">
            
            <li class="notification-list d-none d-lg-block">
                <a href="javascript:void(0);" class="nav-link waves-effect waves-light" id="light-dark-mode"
                    type="button">
                    <i class="fe-sun noti-icon"></i>
                </a>
            </li>

            <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown"
                    href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{ asset('dashboard/assets/images/users/user-1.jpg') }}" alt="user-image" class="rounded-circle">
                    <span class="pro-user-name ms-1">
                        Nowak <i class="mdi mdi-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                    <a href="contacts-profile.html" class="dropdown-item notify-item">
                        <i class="fe-user"></i>
                        <span>My Account</span>
                    </a>

                    <div class="dropdown-divider"></div>

                    <a href="auth-logout.html" class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>
        </ul>

        <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
            <li class="">
                <button class="button-menu-mobile waves-effect">
                    <i class="fe-menu"></i>
                </button>
            </li>
            <li class="d-none d-lg-flex">
                <h4 class="page-title-main">Dashboard</h4>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
</div>