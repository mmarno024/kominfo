<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <a href="{{ url('/home') }}" aria-expanded="false">
                    <i class="fa fa-dashboard menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/users') }}" aria-expanded="false">
                    <i class="fa fa-user menu-icon"></i><span class="nav-text">Users</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/courses') }}" aria-expanded="false">
                    <i class="fa fa-book menu-icon"></i><span class="nav-text">Course</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/usercourses') }}" aria-expanded="false">
                    <i class="fa fa-edit menu-icon"></i><span class="nav-text">User Course</span>
                </a>
            </li>
            
            <div class="dropdown-divider"></div>
            @if (auth()->check())
                <li>
                    <a href="{{ url('/logout') }}" aria-expanded="false">
                        <i class="fa fa-power-off menu-icon"></i><span class="nav-text">Sign out</span>
                    </a>
                </li>
            @else
                <li>
                    <a href="#" aria-expanded="false" class="text-muted" style="cursor: not-allowed;">
                        <i class="fa fa-power-off menu-icon text-muted"></i><span class="nav-text text-muted">Sign out</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>
