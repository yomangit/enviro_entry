<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside style="" class="main-sidebar elevation-4 sidebar-dark-primary">
    <!-- Brand Logo -->
    <a href="/" class="brand-link navbar-dark ">
        <img src="/assets/dist/img/logo.png" alt="AdminLTE Logo" class="brand-image " style="opacity: .8">
        <!-- <span style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;color:aliceblue" class="brand-text ">Archi Indonesia</span> -->
    </a>

    <!-- Sidebar -->
    <div class="sidebar os-host os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-theme-dark os-host-overflow-x">
        <!-- Sidebar user (optional) -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-flat nav-child-indent " data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/" class="nav-link btn-sm btn-sm {{ Request::is('/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @can('admin')
                <li class="nav-header text-muted">Administrator</li>
                @endcan
                <li class="nav-item {{ Request::is('hydrometric*') ? 'menu-open' : '' }}    ">
                    <a href="#" class="nav-link  {{ Request::is('hydrometric*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-gauge-high"></i>

                        <p>
                            Hydrometric
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/hydrometric/wlvp" class="nav-link {{ Request::is('hydrometric/wlvp*') ? 'active' : '' }}">
                                <i style="font-size: 10px" class="nav-icon fa-solid fa-circle-dot"></i>

                                <p>Water Level & Volume Pond</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/hydrometric/dischargemanual" class="nav-link {{ Request::is('hydrometric/dischargemanual*') ? 'active' : '' }}">
                                <i style="font-size: 10px" class="nav-icon fa-solid fa-circle-dot"></i>

                                <p>Water discharge (Manual) </p>
                            </a>
                        </li>
                      
                    </ul>
                </li>
                <li class="nav-item {{ Request::is('surfacewater*') ? 'menu-open' : '' }}    ">
                    <a href="#" class="nav-link  {{ Request::is('surfacewater*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-water"></i>

                        <p>
                            Surface Water
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/surfacewater/standardtable" class="nav-link {{ Request::is('surfacewater/standardtable*') ? 'active' : '' }}">
                                <i style="font-size: 10px" class="nav-icon fa-solid fa-circle-dot"></i>

                                <p>Table Standard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/surfacewater/qualityperiode" class="nav-link {{ Request::is('surfacewater/qualityperiode*') ? 'active' : '' }}">
                                <i style="font-size: 10px" class="nav-icon fa-solid fa-circle-dot"></i>

                                <p>Quality Periode</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/surfacewater/monthly" class="nav-link {{ Request::is('surfacewater/monthly*') ? 'active' : '' }}">
                                <i style="font-size: 10px" class="nav-icon fa-solid fa-circle-dot"></i>

                                <p>Monthly Report</p>
                            </a>
                        </li>
<<<<<<< HEAD
                        
=======
>>>>>>> d0a6326defbeba8c21bdbfff3da64407ba3b31e3
                        <li class="nav-item">
                            <a href="/surfacewater/drinkwater" class="nav-link {{ Request::is('surfacewater/drinkwater*') ? 'active' : '' }}">
                                <i style="font-size: 10px" class="nav-icon fa-solid fa-circle-dot"></i>

                                <p>Clean & Drinking</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/surfacewater/marinesurfacewater" class="nav-link {{ Request::is('surfacewater/marinesurfacewater*') ? 'active' : '' }}">
                                <i style="font-size: 10px" class="nav-icon fa-solid fa-circle-dot"></i>

                                <p>Marine Monitoring</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ Request::is('groundwater*') ? 'menu-open' : '' }}    ">
                    <a href="#" class="nav-link  {{ Request::is('groundwater*') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-arrow-up-from-ground-water"></i>

                        <p>
                            Ground Water
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/groundwater/standard" class="nav-link btn-sm btn-sm {{ Request::is('groundwater/standard*') ? 'active' : '' }}">
                                <i style="font-size: 10px" class="nav-icon fa-solid fa-circle-dot"></i>
                                <p>Table Standard</p>
                            </a>
                        
                        <li class="nav-item">
                            <a href="/groundwater/mastergw" class="nav-link btn-sm btn-sm {{ Request::is('groundwater/mastergw*') ? 'active' : '' }}">
                                <i style="font-size: 10px" class="nav-icon fa-solid fa-circle-dot"></i>
                                <p>Monitoring Master(MSM) </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/groundwater/level" class="nav-link btn-sm btn-sm {{ Request::is('groundwater/level*') ? 'active' : '' }}">
                                <i style="font-size: 10px" class="nav-icon fa-solid fa-circle-dot"></i>
                                <p>Well Level</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/groundwater/masterttn" class="nav-link btn-sm btn-sm {{ Request::is('groundwater/masterttn*') ? 'active' : '' }}">
                                <i style="font-size: 10px" class="nav-icon fa-solid fa-circle-dot"></i>
                                <p>Groundwell Community </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/groundwater/monthly" class="nav-link btn-sm btn-sm {{ Request::is('groundwater/monthly*') ? 'active' : '' }}">
                                <i style="font-size: 10px" class="nav-icon fa-solid fa-circle-dot"></i>
                                <p>Monthly Report</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ Request::is('weather*') ? 'menu-open' : '' }}    ">
                    <a href="#" class="nav-link  {{ Request::is('weather*') ? 'active' : '' }}">
                      
                        <i class="fa-solid fa-cloud-sun-rain nav-icon"></i>
                        <p>
                        Weather
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/weather/rainfall" class="nav-link  {{ Request::is('weather/rainfall*') ? 'active' : '' }}">
                                <i style="font-size: 10px" class="nav-icon fa-solid fa-circle-dot"></i>
                                <p>Rainfall</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/weather/evaporation" class="nav-link  {{ Request::is('weather/evaporation*') ? 'active' : '' }}">
                                <i style="font-size: 10px" class="nav-icon fa-solid fa-circle-dot"></i>
                                <p>Evaporation</p>
                            </a>
                        </li>                      
                    </ul>
                </li>
<<<<<<< HEAD
                <li class="nav-item {{ Request::is('sediment*') ? 'menu-open' : '' }}    ">
=======
                <!-- <li class="nav-item {{ Request::is('sediment*') ? 'menu-open' : '' }}    ">
>>>>>>> d0a6326defbeba8c21bdbfff3da64407ba3b31e3
                    <a href="#" class="nav-link  {{ Request::is('sedimen*') ? 'active' : '' }}">
                      
                        <i class="fa-solid fa-hill-rockslide nav-icon"> </i>
                        <p>
                        Sediment
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/sediment/freshwater" class="nav-link  {{ Request::is('sediment/freshwater*') ? 'active' : '' }}">
                                <i style="font-size: 10px" class="nav-icon fa-solid fa-circle-dot"></i>
                                <p>Freshwater</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/sediment/marine" class="nav-link  {{ Request::is('sediment/marine*') ? 'active' : '' }}">
                                <i style="font-size: 10px" class="nav-icon fa-solid fa-circle-dot"></i>
                                <p>Marine</p>
                            </a>
                        </li>                      
                    </ul>
<<<<<<< HEAD
                </li>
=======
                </li> -->
>>>>>>> d0a6326defbeba8c21bdbfff3da64407ba3b31e3
                
                <li class="nav-item">
                    <a href="/wastewater" class="nav-link btn-sm btn-sm {{ Request::is('wastewater*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-biohazard"></i>
                        <p>Waste Water</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/tailing" class="nav-link btn-sm btn-sm {{ Request::is('tailing*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-mound"></i>
                        <p>Tailing</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('airquality*') ? 'menu-open' : '' }}    ">
                    <a href="#" class="nav-link  {{ Request::is('airquality*') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-wind"></i>

                        <p>
                            Air Quality
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/airquality/dustgauge/dust" class="nav-link  {{ Request::is('airquality/dustgauge/dust*') ? 'active' : '' }}">
                                <i style="font-size: 10px" class="nav-icon fa-solid fa-circle-dot"></i>
                                <p>Dust Monitoring</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/airquality/ambien" class="nav-link  {{ Request::is('airquality/ambien*') ? 'active' : '' }}">
                                <i style="font-size: 10px" class="nav-icon fa-solid fa-circle-dot"></i>
                                <p>Ambien Monitoring</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/airquality/emission" class="nav-link  {{ Request::is('airquality/emission*') ? 'active' : '' }}">
                                <i style="font-size: 10px" class="nav-icon fa-solid fa-circle-dot"></i>
                                <p>Emission Monitoring</p>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('airquality/noisemeter*') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="#" class="nav-link  {{ Request::is('airquality/noisemeter*') ? 'bg-gray' : '' }}">
                                <i style="font-size: 10px" class="nav-icon fa-solid fa-circle-dot"></i>
                                <p>Noise Monitoring <i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/airquality/noisemeter/noise" class="nav-link  {{ Request::is('airquality/noisemeter/noise*') ? 'active' : '' }}">
                                        <i style="font-size: 10px" class="nav-icon fa-solid fa-circle-dot"></i>
                                        <p>Noise Monitoring</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/airquality/noisemeter/resumebulanan" class="nav-link  {{ Request::is('airquality/noisemeter/resumebulanan*') ? 'active' : '' }}">
                                        <i style="font-size: 10px" class="nav-icon fa-solid fa-circle-dot"></i>
                                        <p>Monthly Resume</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/airquality/noisemeter/resumetahunan" class="nav-link  {{ Request::is('airquality/noisemeter/resumetahunan*') ? 'active' : '' }}">
                                        <i style="font-size: 10px" class="nav-icon fa-solid fa-circle-dot"></i>
                                        <p>Annual Resume</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </li>
                <li class="nav-item {{ Request::is('monitoring*') ? 'menu-open' : '' }}    ">
                    <a href="#" class="nav-link  {{ Request::is('monitoring*') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-fish-fins"></i>
                        <p>
                            Biota Sampling
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        @can('admin')
                        <li class="nav-item">
                            <a href="/monitoring/freshwater/biota" class="nav-link  {{ Request::is('monitoring/freshwater/biota*') ? 'active' : '' }}">
                                <i style="font-size: 10px" class="nav-icon fa-solid fa-circle-dot"></i>
                                <p>Biota</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/monitoring/location" class="nav-link  {{ Request::is('monitoring/location*') ? 'active' : '' }}">
                                <i style="font-size: 10px" class="nav-icon fa-solid fa-circle-dot"></i>
                                <p>Location Of Biota</p>
                            </a>
                        </li>
                        @endcan
                        <li class="nav-item">
                            <a href="/monitoring/freshwater/master" class="nav-link  {{ Request::is('monitoring/freshwater/master*') ? 'active' : '' }}">
                                <i style="font-size: 10px" class="nav-icon fa-solid fa-circle-dot"></i>
                                <p>Fresh Water</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/monitoring/marine" class="nav-link  {{ Request::is('monitoring/marine*') ? 'active' : '' }}">
                                <i style="font-size: 10px" class="nav-icon fa-solid fa-circle-dot"></i>
                                <p>Marine</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/soilquality" class="nav-link btn-sm btn-sm {{ Request::is('soilquality*') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-earth-asia"></i>
                        <p>
                            Soil Quality

                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="/blasting" class="nav-link btn-sm btn-sm {{ Request::is('blasting*') ? 'active' : '' }}">
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