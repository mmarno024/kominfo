<div class="nav-header">
    <div class="brand-logo">
        <a href="{{ url('/home') }}">
            <b class="logo-abbr text-white">CRUD</b>
            <span class="logo-compact text-white">CRUD</span>
            <span class="brand-title text-white">
                CRUD
            </span>
        </a>
    </div>
</div>
<div class="header">
    <div class="header-content clearfix">

        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div>
        <div class="header-left">
        </div>
        <div class="header-right">
            <ul class="clearfix">
                <li class="icons dropdown">
                    <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                        <span class="activity active"></span>
                        <img src="{{ url('theme') }}/images/user/1.png" height="40" width="40" alt="">
                    </div>
                    <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                        <div class="dropdown-content-body">
                            <ul>
                                <li>
                                    <a href=""><i class="icon-user"></i>
                                        <span>Profile</span></a>
                                </li>
                                @if (auth()->check())
                                    <li><a href="{{ url('/logout') }}"><i class="icon-key"></i> <span>Sign
                                                out</span></a>
                                    </li>
                                @else
                                    <li>
                                        <a href="#" aria-expanded="false" class="text-muted"
                                            style="cursor: not-allowed;">
                                            <i class="icon-key text-muted"></i> <span class="text-muted">Sign out</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
