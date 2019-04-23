<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <a class="navbar-brand" href="/">
        <img src="http://www.thejobsportal.co.uk/assets/img/Logo@2x.png" alt="Logo" style="width:40px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="/contact_us">Contact Us</a>
            </li>
            <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Dropdown link
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Link 1</a>
                    <a class="dropdown-item" href="#">Link 2</a>
                    <a class="dropdown-item" href="#">Link 3</a>
                </div>
            </li>   -->
        </ul>
        <ul class="navbar-nav">
        @if(Auth::guest())
            <li class="nav-item">
                <a href="/login" class="nav-link"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
            </li>
            <li class="nav-item">
                <a href="/signup" class="nav-link"><i class="fa fa-user-plus" aria-hidden="true"></i> Sign Up</a>
            </li>
        @else
            <li class="nav-item">
                <a href="/logout" class="nav-link"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
            </li>
            <li class="nav-item">
                <a href="/profile" class="nav-link"><i class="fa fa-user"></i> Profile</a>
            </li>
        @endif
        </ul>
    </div> 
</nav>