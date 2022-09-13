<nav class="main-header navbar navbar-expand navbar-dark navbar-dark border-bottom-1 dropdown-legacy">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a hidden class="nav-link" id="auto" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
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
                           
                            <button style="color: #143d59" type="submit"
                                class="btn btn-block btn-outline-success btn-xs">Sign out<i class="fa-solid fa-right-from-bracket ml-5"></i></button>
                        </form>

                    </li>
                </ul>
            </li>

        @endauth
    </ul>
</nav>
