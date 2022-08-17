<nav class="main-header navbar navbar-expand navbar-dark navbar-dark border-bottom-1 dropdown-legacy">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a hidden class="nav-link" id="auto" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
     
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
       
         @guest
        <li class="nav-item">
            <a class="nav-link" href="/login" role="button">
                <i class="ion ion-log-in"></i>
                Login
            </a>
        </li>
        @endguest
        @auth
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <span class="d-none d-md-inline">{{ auth()->user()->username }}</span>
                </a>
                 <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right " style="width: 50px">

                    <li class="user-footer">
                        <form action="/logout" method="POST">
                          @csrf
                           @can('admin') <a style="color: #143d59" href="/dashboard/master" class="btn btn-block btn-outline-success btn-xs">My Dashboard</a>@endcan
                            <button style="color: #143d59"  type="submit" class="btn btn-block btn-outline-success btn-xs">Sign out<i class="fas fa-arrow-right nav-icon" ></i></button>
                        </form>

                    </li>
                </ul>
            </li>

        @endauth

    </ul>
</nav>
