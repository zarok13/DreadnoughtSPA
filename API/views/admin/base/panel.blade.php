<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav" style="margin-bottom: 3px">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('administration.roles') }}" title="Administration">
                <span class="btn btn-outline-primary"><i class="fas fa-users-cog fa-lg"></i></span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ env('APP_URL') }}" target="_blank" title="Go to site">
                <span class="btn btn-outline-success"><i class="fas fa-globe fa-lg"></i></span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " target="_blank" href="{{ route('clearCache') }}" title="Cache Cleaner">
                <span class="btn btn-outline-success"><i class="fas fa-recycle fa-lg"></i></span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" title="Log out">
                <span class="btn btn-outline-warning"><i class="fas fa-sign-out-alt fa-lg"></i></span>
            </a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li>
            @include('admin.applets.lang.content')
        </li>
        <li>
            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
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