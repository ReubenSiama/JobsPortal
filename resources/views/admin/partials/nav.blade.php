<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <a class="navbar-brand" href="/">
        <img src="http://www.thejobsportal.co.uk/assets/img/Logo@2x.png" alt="Logo" style="width:40px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ Route::is('admin_home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ Route('admin_home') }}">Home</a>
            </li>
            <li class="nav-item dropdown {{ Request::is('admin/job/*') ? 'active' : '' }}">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Jobs
                </a>
                <div class="dropdown-menu">
                    <a href="{{ Route('addJob') }}" class="dropdown-item">Add New Job</a>
                    <a href="{{ Route('applications') }}" class="dropdown-item">Applications</a>
                    <a href="{{ Route('addCategory') }}" class="dropdown-item">Categories</a>
                </div>
            </li>  
            <li class="nav-item dropdown {{ Request::is('admin/company/*') ? 'active' : '' }}">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop2" data-toggle="dropdown">Company</a>
                <div class="dropdown-menu">
                    <a href="{{ Route('add.company') }}" class="dropdown-item">Add New Company</a>
                    <a href="{{ Route('companies') }}" class="dropdown-item">Company List</a>
                </div>
            </li>
            <li class="nav-item {{ Route::is('locations') ? 'active' : '' }}">
                <a href="{{ Route('locations') }}" class="nav-link">Locations</a>
            </li>
            <li class="nav-item {{ Route::is('skills') ? 'active' : '' }}">
                <a href="{{ Route('skills') }}" class="nav-link">Skills</a>
            </li>
            <li class="nav-item {{ Route::is('qualification') ? 'active' : '' }}">
                <a href="{{ Route('qualification') }}" class="nav-link">Qualification</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="/logout" class="nav-link"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
            </li>
        </ul>
    </div> 
</nav>