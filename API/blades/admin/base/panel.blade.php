<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav" style="margin-bottom: 3px">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('administration.roles') }}" title="Administration">
                <i class="fas fa-users-cog fa-lg btn btn-outline-primary"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" target="_blank" href="{{ route('clearCache') }}" title="Cache Cleaner">
                <i class="fas fa-recycle fa-lg btn btn-outline-success"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" title="Log out">
                <i class="fas fa-sign-out-alt fa-lg btn btn-outline-warning"></i>
            </a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li>
            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </li>

    </ul>
</nav>
<!-- /.navbar -->
