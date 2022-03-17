<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-white sidebar collapse">
    <div class="position-sticky pt-3">
    
        <ul class="nav flex-column mt-2 mb-1">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active':'' }}" aria-current="page" href="/dashboard"><span data-feather="home"></span>Dashboard</a>
            </li>
        </ul>
        
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-muted">
            <span>Administration</span><a class="link-secondary" href="#" aria-label="Add a new report"><span data-feather="edit"></span></a>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/students*') ? 'active':'' }}" href="/dashboard/students"><span data-feather="users"></span>Student</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/employees*') ? 'active':'' }}" href="/dashboard/employees"><span data-feather="user"></span>Employee</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/sbfps*') ? 'active':'' }}" href="/dashboard/sbfps"><span data-feather="dollar-sign"></span>School Budget Financial Plan</a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-muted">
            <span>Finances</span><a class="link-secondary" href="#" aria-label="Add a new report"><span data-feather="file-plus"></span></a>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/finances/payment*') ? 'active':'' }}" href="/dashboard/finances/payment"><span data-feather="credit-card"></span>Payment</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/finances/transcation*') ? 'active':'' }}" href="/dashboard/finances/transaction"><span data-feather="file-text"></span>Transaction</a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-muted">
            <span>Download Report</span><a class="link-secondary" href="#" aria-label="Add a new report"><span data-feather="download"></span></a>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active':'' }}" href="/dashboard"><span data-feather="users"></span>Students</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active':'' }}" href="/dashboard"><span data-feather="user"></span>Employee</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active':'' }}" href="/dashboard"><span data-feather="dollar-sign"></span>Payment</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active':'' }}" href="/dashboard"><span data-feather="info"></span>Financial Statement</a>
            </li>
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-muted">
            <span>Administrator</span><a class="link-secondary" href="#" aria-label="Add a new report"><span data-feather="settings"></span></a>
        </h6>
        <ul class="nav flex-column mb-5">
            <li class="nav-item dropend">
                <a class="nav-link dropdown-toggle {{ Request::is('dashboard/properties*') ? 'active':'' }}" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span data-feather="database"></span> Data Properties
                </a>
                <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
                    <li><a class="dropdown-item" href="/dashboard/properties/activities">Activity</a></li>
                    <li><a class="dropdown-item" href="/dashboard/properties/invoices">Invoice</a></li>
                    <li><a class="dropdown-item" href="/dashboard/properties/classrooms">Classroom</a></li>
                    <li><a class="dropdown-item" href="/dashboard/properties/titles">Title</a></li>
                    <li><a class="dropdown-item" href="/dashboard/properties/years">Year</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active':'' }}" href="/dashboard"><span data-feather="info"></span>Log</a>
            </li>
        </ul>
    </div>
</nav>