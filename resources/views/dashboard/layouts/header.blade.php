<nav class="main-header navbar navbar-expand navbar-dark navbar-dark border-bottom-1 dropdown-legacy">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a hidden class="nav-link" id="auto" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        
        @auth
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <i class="fas fa-user mr-2"></i>

                    <span class="d-none d-md-inline">{{ auth()->user()->username }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right " style="width: 50px">

                    <li class="user-footer">
                        <form action="/logout" method="POST">
                            @csrf
                            <a style="color: #143d59" href="/dashboard/master"
                                class="btn btn-block btn-outline-success btn-xs">My Dashboard</a>
                                <a style="color: #143d59" href="/"
                                class="btn btn-block btn-outline-success btn-xs">Main Dashboard</a>
                            <button style="color: #143d59" type="submit"
                                class="btn btn-block btn-outline-success btn-xs">Sign out</button>
                        </form>

                    </li>
                </ul>
            </li>

        @endauth
    </ul>
</nav>
