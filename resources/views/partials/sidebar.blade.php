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
                    <a href="/"
                        class="nav-link btn-sm btn-sm {{ Request::is('dashboard/master*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>

                </li>
              
                <li class="nav-item {{ Request::is('auth/surfacewater') ? 'menu-open' : '' }}    ">
                    <a href="#" class="nav-link  {{ Request::is('auth/surfacewater') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-water"></i>

                        <p>
                            Surface Water
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/auth/surfacewater"
                                class="nav-link {{ Request::is('auth/surfacewater') ? 'active' : '' }}">
                                <i class="fas fa-table-list nav-icon"></i>
                                <p>All Data</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ Request::is('auth/groundwater*') ? 'menu-open' : '' }}    ">
                    <a href="#" class="nav-link  {{ Request::is('auth/groundwater*') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-arrow-up-from-ground-water"></i>

                        <p>
                            Ground Water
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="/auth/groundwater/msm"
                                class="nav-link btn-sm btn-sm {{ Request::is('auth/groundwater/msm') ? 'active' : '' }}">
                                <i class="fas fa-table-list nav-icon"></i>
                                <p>Monitoring Master(MSM) </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href ="/auth/groundwater/welllevel"
                                class="nav-link btn-sm btn-sm {{ Request::is('auth/groundwater/welllevel') ? 'active' : '' }}">
                                <i class=" nav-icon fa-solid fa-arrow-up-right-dots"></i>
                                <p>
                                    Well Level
                                </p>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a href="/auth/groundwater/ttn"
                                class="nav-link btn-sm btn-sm {{ Request::is('auth/groundwater/ttn') ? 'active' : '' }}">
                                <i style="font-size: 15px" class="nav-icon fa-solid fa-circle-dot"></i>
                                <p>Monitoring Master(TTN) </p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item {{ Request::is('auth/airquality*') ? 'menu-open' : '' }}    ">
                    <a href="#" class="nav-link  {{ Request::is('auth/airquality*') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-wind"></i>

                        <p>
                            Air Quality
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/auth/airquality/dust"
                                class="nav-link  {{ Request::is('auth/airquality/dust') ? 'active' : '' }}">
                                <i style="font-size: 15px" class="nav-icon fa-solid fa-circle-dot"></i>
                                <p>Dust Monitoring</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/auth/airquality/noise"
                                class="nav-link  {{ Request::is('auth/airquality/noise') ? 'active' : '' }}">
                                <i style="font-size: 15px" class="nav-icon fa-solid fa-circle-dot"></i>
                                <p>Noise Monitoring</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ Request::is('auth/biotasampling*') ? 'menu-open' : '' }}    ">
                    <a href="#" class="nav-link  {{ Request::is('auth/biotasampling*') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-fish-fins"></i>
                        <p>
                            Biota Sampling
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/auth/biotasampling/freshwater"
                                class="nav-link  {{ Request::is('auth/biotasampling/freshwater') ? 'active' : '' }}">
                                <i style="font-size: 15px" class="nav-icon fa-solid fa-circle-dot"></i>
                                <p>Fresh Water</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/auth/biotasampling/marine"
                                class="nav-link  {{ Request::is('auth/biotasampling/marine') ? 'active' : '' }}">
                                <i style="font-size: 15px" class="nav-icon fa-solid fa-circle-dot"></i>
                                <p>Marine</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/auth/blasting"
                        class="nav-link btn-sm btn-sm {{ Request::is('auth/blasting') ? 'active' : '' }}">
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
