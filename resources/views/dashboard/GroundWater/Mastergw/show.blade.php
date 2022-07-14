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
                        <div class="form-group ">
                            <label 
                                class="">Code Sample</label>
                            <div class="">
                                <select class="form-control form-control-sm " name="gwcodesample_id" disabled>
                                    @foreach ($code_units as $code)
                                    @if (old('gwcodesample_id', $Master->gwcodesample_id)==$code->id)
                                    <option value="{{$code->id}}" selected>{{$code->nama}}</option>
                                    @else
                                    <option value="{{$code->id}}" >{{$code->nama}}</option>
                                    @endif
                                    @endforeach
                                </select>

                            </div>

                        </div>

                        <div class="form-group">
                            <label for="inputEstimatedBudget">SWL mBGL</label>
                            <input name="well" type="number" step="0.01"
                            class="form-control form-control-sm @error('well') is-invalid @enderror"
                            value="{{ old('well',$Master->well) }}" />
                        @error('well')
                            <span
                                class=" invalid-feedback">{{ $message }}</span>
                        @enderror
                        </div>

                        <div class="form-group ">
                            <label 
                                class="">Total</label>
                            <div class="">
                                <select class="form-control form-control-sm custom-select" name="gwcodesample_id" disabled>
                                    @foreach ($code_units as $code)
                                    @if (old('gwcodesample_id', $Master->gwcodesample_id)==$code->id)
                                    <option value="{{$code->id}}" selected>{{$code->total}}</option>
                                    @else
                                    <option value="{{$code->id}}" >{{$code->total}}</option>
                                    @endif
                                    @endforeach
                                </select>

                            </div>

                        </div>
                    
                        <div class="form-group ">
                            <label 
                                class="">Casing above GL (m)</label>
                            <div class="">
                                <select class="form-control form-control-sm custom-select" name="gl" disabled>
                                    @foreach ($code_units as $code)
                                    @if (old('gl', $Master->gwcodesample_id)==$code->id)
                                    <option value="{{$code->id}}" selected>{{$code->gl}}</option>
                                    @else
                                    <option value="{{$code->id}}" >{{$code->gl}}</option>
                                    @endif
                                    @endforeach
                                </select>

                            </div>

                        </div>
                        <div class="form-group ">
                            <label 
                                class="">Casing above RL</label>
                            <div class="">
                                <select class="form-control form-control-sm custom-select" name="rl" disabled>
                                    @foreach ($code_units as $code)
                                    @if (old('rl', $Master->gwcodesample_id)==$code->id)
                                    <option value="{{$code->id}}" selected>{{$code->rl}}</option>
                                    @else
                                    <option value="{{$code->id}}" >{{$code->rl}}</option>
                                    @endif
                                    @endforeach
                                </select>

                            </div>

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

                       
                       

                        <div class="form-group">
                            <label for="inputSpentBudget">Date</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" name="date"
                                    class="form-control datetimepicker-input form-control-sm @error('date') is-invalid @enderror "
                                    data-target="#reservationdate" data-toggle="datetimepicker"
                                    value="{{ old('date', $Master->date) }}" />
                                @error('date')
                                    <span class=" invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEstimatedBudget">SWL mBGL</label>
                            <input name="well" type="number" step="0.01"
                            class="form-control form-control-sm @error('well') is-invalid @enderror"
                            value="{{ old('well',$Master->well) }}" />
                        @error('well')
                            <span
                                class=" invalid-feedback">{{ $message }}</span>
                        @enderror
                        </div>
                        @php
                        
                        @endphp
                        <div class="form-group">
                            <label for="inputSpentBudget">SWL RL</label>
                            <input type="number" id="inputSpentBudget" class="form-control form-control-sm" value="{{$hasil}}">
                        </div>
                     
                    </div>

                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="#" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Create new Project" class="btn btn-success float-right">
            </div>
        </div>
    </section>

</div>

<!-- /.content -->

<!-- /.content-wrapper -->
@endsection
