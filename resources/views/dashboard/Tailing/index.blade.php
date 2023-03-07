@extends('dashboard.layouts.main')
@section('container')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> {{ $breadcrumb }}</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <ul class="nav nav-tabs tabs-marker tabs-dark bg-dark" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link " id="home" data-toggle="tab" href="#home-tab2" role="tab"
                        aria-controls="home" aria-selected="true">TCLP<span class="marker"></span></a>

                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="profile" data-toggle="tab" href="#profile-tab2" role="tab"
                        aria-controls="profile" aria-selected="false">MES & TOM<span class="marker"></span></a>
                </li>

            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade " id="home-tab2" role="tabpanel" aria-labelledby="home-tab">

                    @include('dashboard.tailing.tclp')
                </div>
                <div class="tab-pane fade show active" id="profile-tab2" role="tabpanel" aria-labelledby="profile-tab">
                    @include('dashboard.tailing.mes')
                </div>

            </div>



            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
