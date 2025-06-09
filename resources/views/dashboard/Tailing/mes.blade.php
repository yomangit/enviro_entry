<div class="card card-primary card-outline mt-3">
    <div class="card-header p-0">

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible form-inline m-2">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5 class="mr-2"><i class="icon fas fa-check"></i> Success</h5>
                {{ session('success') }}
            </div>
        @endif
        @if (session()->has('failures'))
            <table class="table table-danger">
                <tr>
                    <th class="align-middle">Row</th>
                    <th class="align-middle">Attribute</th>
                    <th class="align-middle">Errors</th>
                    <th class="align-middle">Value</th>
                </tr>
                @foreach (session()->get('failures') as $validation)
                    <tr>
                        <td class="align-middle">{{ $validation->row() }}</td>
                        <td class="align-middle">{{ $validation->attribute() }}</td>
                        <td class="align-middle">
                            <ul>
                                @foreach ($validation->errors() as $e)
                                    <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="align-middle">
                            {{ $validation->values()[$validation->attribute()] }}</td>
                    </tr>
                @endforeach
            </table>
        @endif
        @can('admin')
            <a href="/tailing/codeid" class="btn bg-gradient-info btn-xs my-1 ml-2 ">Code Sample</a>
            <a href="/tailing/qualitystandard" class="btn bg-gradient-info btn-xs my-1  ">Table
                Standard</a>
        @endcan
        <div class=" card-tools p-1 mr-2 form-inline">
            <form action="/mestom" class="form-inline" autocomplete="off">
                <div class="input-group date" id="reservationdate11" style="width: 85px;" data-target-input="nearest">
                    <input type="text" name="fromDate" placeholder="Date"
                        @error('Antimony_Sb')
                                <span class=" invalid-feedback">{{ $message }}</span>
                            @enderror
                        class="form-control datetimepicker-input form-control-sm " data-target="#reservationdate11"
                        data-toggle="datetimepicker" value="{{ request('fromDate') }}" />
                </div>
                <span class="input-group-text form-control-sm ">To</span>

                <div class="input-group date mr-2" id="reservationdate5" style="width: 85px;"
                    data-target-input="nearest">
                    <input type="text" name="toDate" placeholder="Date"
                        @error('Antimony_Sb')
                                <span class=" invalid-feedback">{{ $message }}</span>
                            @enderror
                        class="form-control datetimepicker-input form-control-sm" data-target="#reservationdate5"
                        data-toggle="datetimepicker" value="{{ request('toDate') }}" />
                </div>
                <div style="width: 118px;" class="input-group mr-1">
                    <select name="" class="@error('date') is-invalid @enderror form-control form-control-sm "
                        name="search">
                        <option value="" selected>Point ID</option>
                        @foreach ($code_units as $code)
                            @if (request('search') == $code->nama)
                                <option value="{{ $code->nama }}" selected>{{ $code->nama }}
                                </option>
                            @else
                                <option value="{{ $code->nama }}">{{ $code->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>



                <div class="mr-2">
                    <button type="submit" class="btn bg-gradient-dark btn-xs">filter</button>
                </div>
            </form>
            <form action="/mestom">
                <button type="submit" class="btn bg-gradient-dark btn-xs">refresh</button>
            </form>
        </div>
    </div>
    <div class="card-body">
        <div class="content">
            <div class="col-12">
                @can('admin')
                    <div class="d-flex justify-content-start my-2">
                        <a href="/mestom/create" class="btn bg-gradient-secondary btn-xs ml-1"><i
                                class="fas fa-plus mr-1 mt"></i>Add Data</a>
                        <a href="/export/mestom" class="btn  bg-gradient-secondary btn-xs ml-1" data-toggle="tooltip"
                            data-placement="top" title="download"><i class="fas fa-download mr-1"></i>Excel</a>
                        <a href="#" class="btn  bg-gradient-secondary btn-xs ml-1" data-toggle="modal"
                            data-toggle="tooltip" data-placement="top" title="Upload" data-target="#modal-default"><i
                                class="fas fa-upload mr-1"></i>Excel</a>

                    </div>
                @endcan
            </div>
        </div>
    </div
