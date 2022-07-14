@extends('dashboard.layouts.main')
@section('container')
<!-- Content Wrapper. Contains page content -->


<!-- Main content -->
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Iput Data Ground Water Level</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Project Add</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">General</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach ($code_units as $item)

                        @endforeach
                        <div class="form-group ">
                            <label class="">Code Sample</label>
                            <input name="code_sample" type="text" disabled class="form-control form-control-sm @error('code_sample') is-invalid @enderror" value="{{ old('code_sample',$item->nama) }}" />
                            @error('code_sample')
                            <span class=" invalid-feedback">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="form-group ">
                            <label>Total</label>
                            <input name="total" type="number" step="0.01" disabled class="form-control form-control-sm @error('total') is-invalid @enderror" value="{{ old('total',$item->total) }}" />
                            @error('total')
                            <span class=" invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group ">
                            <label class="">Casing above GL (m)</label>
                            <input name="gl" type="number" step="0.01" disabled class="form-control form-control-sm @error('gl') is-invalid @enderror" value="{{ old('gl',$item->gl) }}" />
                            @error('gl')
                            <span class=" invalid-feedback">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="form-group ">
                            <label class="">Casing above RL</label>
                            <input name="rl" type="number" step="0.01" disabled class="form-control form-control-sm @error('rl') is-invalid @enderror" value="{{ old('rl',$item->rl) }}" />
                            @error('rl')
                            <span class=" invalid-feedback">{{ $message }}</span>
                            @enderror

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-6">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Budget</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/dashboard/groundwater/level" method="post" checked enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="form-group">
                                <label for="inputSpentBudget">Date</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="text" name="date" class="form-control datetimepicker-input form-control-sm @error('date') is-invalid @enderror " data-target="#reservationdate" data-toggle="datetimepicker" value="{{ old('date', $Master->date) }}" />
                                    @error('date')
                                    <span class=" invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedBudget">SWL mBGL</label>
                                <input name="mbgl" type="number" step="0.01" class="form-control form-control-sm @error('mbgl') is-invalid @enderror" value="{{ old('mbgl',$Master->well) }}" />
                                @error('mbgl')
                                <span class=" invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            @php

                            $hasil= $item->rl-($Master->well-$item->gl)
                            @endphp
                            <div class="form-group">
                                <label for="inputSpentBudget">SWL RL</label>
                                <input type="number" id="inputSpentBudget" class="form-control form-control-sm" value="{{ $hasil }}">
                            </div>
                       
                    </div>

                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="#" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Create new Water Level" class="btn btn-success float-right">
            </div>
        </form>
        </div>
    </section>

</div>

<!-- /.content -->

<!-- /.content-wrapper -->
@endsection
