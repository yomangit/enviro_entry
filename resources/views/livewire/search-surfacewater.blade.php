<div>
    <div class="card">
        <div class="card-header">
            <div class="card-title text center">Grafik</div>
            <div class=" card-tools p-1 mr-2 form-inline">
               

                    <div class="input-group date" id="reservationdate4" style="width: 85px;" data-target-input="nearest">
                        <input type="text" name="fromDate" placeholder="Date" class="form-control datetimepicker-input form-control-sm " data-target="#reservationdate4" data-toggle="datetimepicker" value="{{ request('fromDate') }}" />
                    </div>
                    <span class="input-group-text form-control-sm ">To</span>

                    <div class="input-group date mr-2" id="reservationdate5" style="width: 85px;" data-target-input="nearest">
                        <input type="text" name="toDate" placeholder="Date" class="form-control datetimepicker-input form-control-sm" data-target="#reservationdate5" data-toggle="datetimepicker" value="{{ request('toDate') }}" />
                    </div>

                    <div style="width: 118px;" class="input-group mr-1">
                        <select wire:model="search" class="form-control form-control-sm" >
                            <option value="" selected>Point ID</option>
                            @foreach ($code_units as $code)
                            @if ( request('search')==$code->nama)
                            <option value="{{($code->nama)}}" selected>{{$code->nama}}</option>
                            @else
                            <option value="{{$code->nama}}">{{$code->nama}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                
            </div>
        </div>
        {{$nama}}
        <div class="card-body table-responsive p-0" id="container" style=" width: auto"></div>
    {{-- <div class="m-2 bg-transparent">{{ $Input->links() }}</div> --}}
       
    </div>
   
        
    <script>
        Highcharts.chart('container', {
               chart: {
                   type: 'spline'
               },
               title: {
                   text: 'Monthly Average Temperature'
               },
               subtitle: {
                   text: 'Source: ' +
                       '<a href="https://en.wikipedia.org/wiki/List_of_cities_by_average_temperature" ' +
                       'target="_blank">Wikipedia.com</a>'
               },
               xAxis: {
                   categories: {!! json_encode($nama) !!}
               },
               yAxis: {
                   title: {
                       text: 'Temperature'
                   },
                   labels: {
                       formatter: function() {
                           return this.value + '°';
                       }
                   }
               },
               tooltip: {
                   crosshairs: true,
                   shared: true
               },
               plotOptions: {
                   spline: {
                       marker: {
                           radius: 4,
                           lineColor: '#666666',
                           lineWidth: 1
                       }
                   }
               },
               series: [{
           name: 'PH',
           // visible: false,
           color: '#6AB187',
           marker: {
               symbol: 'triangle-down'
           },
           data: {!!json_encode($ph) !!}
       }]
           });
   </script>
   
   
</div>
