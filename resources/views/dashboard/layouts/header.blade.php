<header class="navbar navbar-light sticky-top flex-md-nowrap p-0 shadow" style="background-color: #DAF7A6;">

    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" style="background-color: #DAF7A6;" href="#"><img src="/image/logo.png" alt="" width="30" height="30"> SIRA Manager</a>

    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <input class="form-control form-control-light w-100 mx-2 my-2" type="text" placeholder="Search" aria-label="Search">

    <div class="dropdown mx-2 text-nowrap" style="background-color: #DAF7A6;">
        <button class="btn mx-2 my-2 btn-outline-success" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false"><span data-feather="user"></span> Account</button>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenu2">
            <li><a class="dropdown-item" href="/profile"><span data-feather="edit"></span> Profile</a></li>
            <li><a class="dropdown-item" href="/activate"><span data-feather="lock"></span> Password</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item"><span data-feather="log-out"></span> Logout</button>
                </form>
            </li>
        </ul>
    </div>



</header>