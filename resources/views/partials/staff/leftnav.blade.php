<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/applicants" class="brand-link">
        <img src="{{asset('img/logo/genescor.png')}}" alt="Genescor Logo" class="brand-image elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Genescor App</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            <img src="/img/profile/{{Auth::user()->image}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <a href="#" class="d-block">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item"><router-link to="/staffs/dashboard" class="nav-link"><i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard</p></router-link></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon fas fa-users"></i><p>Users<i class="right fas fa-angle-left"></i></p></a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><router-link to="/staffs/users" class="nav-link"><i class="fa fa-list nav-icon"></i><p>All</p></router-link></li>
                        <li class="nav-item"><router-link to="/staffs/users/new" class="nav-link"><i class="fa fa-user-plus nav-icon"></i><p>New Registrations</p></router-link></li>
                        <li class="nav-item"><router-link to="/staffs/users/roles" class="nav-link"><i class="fa fa-user-cog nav-icon"></i><p>Roles</p></router-link></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link"><i class="nav-icon fas fa-check"></i><p>Approvals<i class="right fas fa-angle-left"></i></p></a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><router-link to="/staffs/pend/providers" class="nav-link"><i class="fa fa-user-md nav-icon"></i><p>Providers</p></router-link></li>
                        <li class="nav-item"><router-link to="/staffs/pend/agencies" class="nav-link"><i class="fa fa-building nav-icon"></i><p>Agencies</p></router-link></li>
                        <li class="nav-item"><router-link to="/staffs/pend/stories" class="nav-link"><i class="fa fa-comment-alt nav-icon"></i><p>Stories</p></router-link></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <router-link to="/staff/doctors" class="nav-link">
                        <i class="nav-icon fas fas fa-calendar-day"></i>
                        <p>Appointments</p>
                    </router-link >
                </li>
                <li class="nav-item">
                    <router-link to="/staff/payments" class="nav-link">
                        <i class="nav-icon fas fa-wallet"></i>
                        <p>Payments</p>
                    </router-link >
                </li>
                <li class="nav-item">
                    <router-link to="/staff/tickets" class="nav-link">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>Tickets</p>
                    </router-link >
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link"><i class="nav-icon fas fa-power-off"></i><p>Log Out </p></a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
            </ul>
        </nav>
    </div>
</aside>