<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside style="" class="main-sidebar elevation-4 sidebar-dark-primary">
    <!-- Brand Logo -->
    <a href="assets/index3.html" class="brand-link navbar-dark ">
        <img src="/assets/dist/img/archii.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-4" style="opacity: .8">
        <span style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;color:aliceblue" class="brand-text ">Archi Indonesia</span>
    </a>

    <!-- Sidebar -->
    <div
        class="sidebar os-host os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-theme-dark os-host-overflow-x">
        <!-- Sidebar user (optional) -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-flat " data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/dashboard/master"
                        class="nav-link btn-sm btn-sm {{ Request::is('dashboard/master*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>

                </li>
                @can('admin')
                <li class="nav-header text-muted">Administrator</li>
                @endcan
                <li class="nav-item {{ Request::is('dashboard/index*') ? 'menu-open' : '' }}    ">
                    <a href="#" class="nav-link  {{ Request::is('dashboard/index*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-water"></i>

                        <p>
                            Surface Water
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/dashboard/index/dataentry/"
                                class="nav-link {{ Request::is('dashboard/index*') ? 'active' : '' }}">
                                <i style="font-size: 15px" class="nav-icon fa-solid fa-circle-dot"></i>

                                <p>All Data</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ Request::is('dashboard/groundwater*') ? 'menu-open' : '' }}    ">
                    <a href="#" class="nav-link  {{ Request::is('dashboard/groundwater*') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-arrow-up-from-ground-water"></i>

                        <p>
                            Ground Water
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="/dashboard/groundwater/mastergw"
                                class="nav-link btn-sm btn-sm {{ Request::is('dashboard/groundwater/mastergw*') ? 'active' : '' }}">
                                <i style="font-size: 15px" class="nav-icon fa-solid fa-circle-dot"></i>

                                <p>Monitoring Master(MSM) </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/dashboard/groundwater/level"
                                class="nav-link btn-sm btn-sm {{ Request::is('dashboard/groundwater/level*') ? 'active' : '' }}">
                                <i style="font-size: 15px" class="nav-icon fa-solid fa-circle-dot"></i>

                                <p>
                                    Well Level
                                </p>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a href="/dashboard/groundwater/masterttn"
                                class="nav-link btn-sm btn-sm {{ Request::is('dashboard/groundwater/masterttn*') ? 'active' : '' }}">
                                <i style="font-size: 15px" class="nav-icon fa-solid fa-circle-dot"></i>
                                <p>Monitoring Master(TTN) </p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item {{ Request::is('dashboard/dustgauge*') ? 'menu-open' : '' }}    ">
                    <a href="#" class="nav-link  {{ Request::is('dashboard/dustgauge*') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-wind"></i>

                        <p>
                            Air Quality
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/dashboard/dustgauge/dust"
                                class="nav-link  {{ Request::is('dashboard/dustgauge/dust*') ? 'active' : '' }}">
                                <i style="font-size: 15px" class="nav-icon fa-solid fa-circle-dot"></i>
                                <p>Dust Monitoring</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/dashboard/dustgauge/noisemeter/noise"
                                class="nav-link  {{ Request::is('dashboard/dustgauge/noisemeter/noise*') ? 'active' : '' }}">
                                <i style="font-size: 15px" class="nav-icon fa-solid fa-circle-dot"></i>
                                <p>Noise Monitoring</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ Request::is('dashboard/monitoring*') ? 'menu-open' : '' }}    ">
                    <a href="#" class="nav-link  {{ Request::is('dashboard/monitoring*') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-fish-fins"></i>
                        <p>
                            Biota Sampling
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        @can('admin')
                        <li class="nav-item">
                            <a href="/dashboard/monitoring/freshwater/biota"
                                class="nav-link  {{ Request::is('dashboard/monitoring/freshwater/biota*') ? 'active' : '' }}">
                                <i style="font-size: 15px" class="nav-icon fa-solid fa-circle-dot"></i>
                                <p>Biota</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/dashboard/monitoring/location"
                                class="nav-link  {{ Request::is('dashboard/monitoring/location*') ? 'active' : '' }}">
                                <i style="font-size: 15px" class="nav-icon fa-solid fa-circle-dot"></i>
                                <p>Location Of Biota</p>
                            </a>
                        </li>
                        @endcan
                        <li class="nav-item">
                            <a href="/dashboard/monitoring/freshwater/master"
                                class="nav-link  {{ Request::is('dashboard/monitoring/freshwater/master*') ? 'active' : '' }}">
                                <i style="font-size: 15px" class="nav-icon fa-solid fa-circle-dot"></i>
                                <p>Fresh Water</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/dashboard/monitoring/marine"
                                class="nav-link  {{ Request::is('dashboard/monitoring/marine*') ? 'active' : '' }}">
                                <i style="font-size: 15px" class="nav-icon fa-solid fa-circle-dot"></i>
                                <p>Marine</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/blasting"
                        class="nav-link btn-sm btn-sm {{ Request::is('dashboard/blasting*') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-explosion"></i>
                        <p>
                            Blasting

                        </p>
                    </a>

                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->


    <!-- /.sidebar-custom -->
</aside>
