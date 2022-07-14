@extends('dashboard.layouts.main')
@section('container')
    <!-- Content Wrapper. Contains page content -->


    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Invoice</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Invoice</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="callout callout-info">
                            <h5><i class="fas fa-info"></i> Note:</h5>
                            This page has been enhanced for printing. Click the print button at the bottom of the invoice to
                            test.
                        </div>


                        <!-- Main content -->
                        <div cltass="invoice p-3 mb-3">
                            <a href="/dashboard/dataentry" class="btn bg-gradient-success  btn-sm"><i class="fas fa-arrow-left"></i> Back to My Data</a>
                            <a href="/dashboard/dataentry/{{ $Input->failed_at }}/edit" class="btn bg-gradient-warning  btn-sm"><i class="fas fa-pen"></i> Edit</a>
                            <form action="/dashboard/dataentry/{{ $Input->failed_at }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button  class="btn  bg-gradient-danger  btn-sm "onclick="return confirm('are you sure?')" ><i class="fas fa-trash"></i> Delete</button>
                            </form>
                           
                            <!-- title row -->
                            <div class="row mt-2">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-globe"></i> AdminLTE, Inc.
                                   
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    Code Sample  &emsp; : <b>{{ $Input->CodeSample->nama }}</b><br>
                                    Date  &emsp; : <b>{{ $Input->date }}</b><br>
                                    Start Time  &emsp; : <b>{{ $Input->start_time }}</b><br>
                                    Stop Time  &emsp; : <b>{{ $Input->stop_time }}</b><br>
                                    TSS Standard  &emsp; : <b>{{ $Input->standard->tss }}</b><br>
                                    TSS(mg/L)  &emsp; : <b>{{ $Input->tss }}</b><br>
                                    pH Standard Max.  &emsp; : <b>{{ $Input->standard->ph_max }}</b><br>
                                    pH Standard Min.  &emsp; : <b>{{ $Input->standard->ph_min }}</b><br>
                                    pH  &emsp; : <b>{{ $Input->ph }}</b><br>
                                    DO Standard  &emsp; : <b>{{ $Input->standard->do }}</b><br>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                  DO  &emsp; : <b>{{ $Input->do }}</b><br>
                                  Redox Standard  &emsp; : <b>{{ $Input->standard->redox }}</b><br>
                                  Redox(mEV)  &emsp; : <b>{{ $Input->redox }}</b><br>
                                  Conductivity Standard  &emsp; : <b>{{ $Input->standard->conductivity }}</b><br>
                                  Conductivity (uS/cm)  &emsp; : <b>{{ $Input->conductivity }}</b><br>
                                  TDS Standard  &emsp; : <b>{{ $Input->standard->tds }}</b><br>
                                  TDS (mg/L)  &emsp; : <b>{{ $Input->tds }}</b><br>
                                  Temperatur Standard  &emsp; : <b>{{ $Input->standard->temperatur }}</b><br>
                                  Temperatur (<small>0</small>C)  &emsp; : <b>{{ $Input->temperatur }}</b><br>
                                  Salinity (ppt)  &emsp; : <b>{{ $Input-> salinity}}</b><br>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                  Turbidity (NTU)  &emsp; : <b>{{ $Input->turbidity }}</b><br>
                                  Water Condition  &emsp; : <b>{{ $Input->water_condition }}</b><br>
                                  water Color  &emsp; : <b>{{ $Input->water_color }}</b><br>
                                  Water Scant  &emsp; : <b>{{ $Input->smel_of_water }}</b><br>
                                  Rain  &emsp; : <b>{{ $Input->rain }}</b><br>
                                  Rain During Sampling  &emsp; : <b>{{ $Input->rain_during_sampling }}</b><br>
                                  Oil Layer  &emsp; : <b>{{ $Input->oil_layer }}</b><br>
                                  Sorce of Pollution  &emsp; : <b>{{ $Input->source_pollution }}</b><br>
                                  Sampler  &emsp; : <b>{{ $Input->user->username }}</b><br>
                                  Hard Copy  &emsp; : <b>{{ $Input->hard_copy }}</b><br>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                                <div class=" table-responsive">
                                    <table class="table col-3 ">
                                   
                                        <tbody>
                                            <tr>
                                               
                                                <td>Date</td>
                                                <td><b>{{ $Input->date }}</b></td>
                                              
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Need for Speed IV</td>
                                                
                                            </tr>
                                    
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-6">
                              
                               <img class="img-fluid" src="{{ asset('storage/'.$Input->hard_copy) }}" style="height: 10cm; width:10cm" >
                            
                         
                        
                                </div>
                                <!-- /.col -->
                                <div class="col-6">
                                    <p class="lead">Amount Due 2/22/2014</p>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th style="width:50%">Subtotal<br>
                                                <td>$250.30</td>
                                            </tr>
                                            <tr>
                                                Tax (9.3%)<br>
                                                <td>$10.34</td>
                                            </tr>
                                            <tr>
                                                Shipping<br>
                                                <td>$5.80</td>
                                            </tr>
                                            <tr>
                                                Total<br>
                                                <td>$265.24</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-12">
                                    <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i
                                            class="fas fa-print"></i> Print</a>
                                    <button type="button" class="btn btn-success float-right"><i
                                            class="far fa-credit-card"></i> Submit
                                        Payment
                                    </button>
                                    <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                        <i class="fas fa-download"></i> Generate PDF
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content -->

    <!-- /.content-wrapper -->
@endsection
