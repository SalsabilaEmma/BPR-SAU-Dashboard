@extends('layout.app')
@section('content')
    <!-- Main Content hal ne ini-->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Mutasi Tabungan</h1>
                <div class="section-header-breadcrumb">
                </div>
            </div>
            <div class="section-body">
                {{-- <h2 class="section-title"> </h2> --}}
                <div class="row text-dark">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Mutasi Rekening - {{request()->rekening}}</h4>
                            </div>
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    {{-- <div class="col-12 col-md-12 col-lg-12">
                                        <label>Filter Tanggal</label>
                                        <form action="{{route('getMutasi')}}" method="POST">
                                            <div class="input-group mb-3">
                                                <input id="awal" type="date" class="form-control" name="tglawal" placeholder="{{request()->tglawal}}">
                                                <input id="akhir" type="date" class="form-control" name="tglakhir" placeholder="{{request()->tglakhir}}">
                                                <button class="btn btn-primary" id="filter" type="submit">Cari</button>
                                            </div>
                                        </form>
                                    </div> 
                                    {{request()->tglawal}} . {{request()->tglakhir}} --}}
                                    <table>
                                        <tr>
                                          <td>
                                             <input type='text' readonly id='search_fromdate' class="datepicker" placeholder='From date'>
                                          </td>
                                          <td>
                                             <input type='text' readonly id='search_todate' class="datepicker" placeholder='To date'>
                                          </td>
                                          <td>
                                             <input type='button' id="btn_search" value="Search">
                                          </td>
                                        </tr>
                                      </table>
                                    {{-- <div class="row well input-daterange">
                                        <div class="col-sm-3">
                                          <label class="control-label">Start date</label>
                                          <input class="form-control datepicker" type="text" name="initial_date" id="initial_date" placeholder="yyyy-mm-dd" style="height: 40px;"/>
                                        </div>
                                        <div class="col-sm-3">
                                          <label class="control-label">End date</label>
                                          <input class="form-control datepicker" type="text" name="final_date" id="final_date" placeholder="yyyy-mm-dd" style="height: 40px;"/>
                                        </div>
                                        <div class="col-sm-2">
                                          <button class="btn btn-success btn-block" type="submit" name="filter" id="filter" style="margin-top: 30px">
                                            <i class="fa fa-filter"></i> Filter
                                          </button>
                                        </div>
                                        <div class="col-sm-12 text-danger" id="error_log"></div>
                                      </div> --}}
                                      <br/><br/>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id='empTable' class='display dataTable'>
                                                {{--  name="filter" id="filter" .  class="display" id="datatable" .  id="empTable" class="display dataTable"--}}
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>No</th>
                                                        <th>Cabang Entry</th>
                                                        <th>Faktur</th>
                                                        <th>Tanggal</th>
                                                        <th>Kode Transaksi</th>
                                                        <th>DK</th>
                                                        <th>Keterangan</th>
                                                        <th>Debet</th>
                                                        <th>Kredit</th>
                                                        <th>Username</th>
                                                        {{-- <th>Aksi</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody id="filter">
                                                    @foreach ($mutasi as $m)
                                                    {{-- {{dd($mutasi)}} --}}
                                                    <tr>
                                                        <td class="text-center">{{ $loop->iteration }}</td>
                                                        <td>{{$m['cabangentry']}}</td>
                                                        <td>{{$m['faktur']}}</td>
                                                        <td>{{$m['tgl']}}</td>
                                                        <td>{{$m['kodetransaksi']}}</td>
                                                        <td>{{$m['dk']}}</td>
                                                        <td>{{ substr($m['keterangan'], 0,30)}} ...</td>
                                                        <td>{{$m['debet']}}</td>
                                                        <td>{{$m['kredit']}}</td>
                                                        <td>{{$m['username']}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            {{-- <p>Catatan : </p> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection

@section('js')
    {{-- <script>
        $('#filter').click(function (e) { 
            e.preventDefault();
            let awal = $('#awal').val();
            let akhir = $('#akhir').val();
            // console.log(awal);
            console.log(akhir);
            window.location = "mutasi-rekening?rekening={{request()->rekening}}&tglawal="+awal+"&tglakhir="+akhir;
        });
        
    </script> --}}

    
    <script>$(document).ready(function(){

        // Datapicker 
        $( ".datepicker" ).datepicker({
           "dateFormat": "yy-mm-dd",
           changeYear: true
        });
     
        // DataTable
        var dataTable = $('#empTable').DataTable({
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
          'searching': true, // Set false to Remove default Search Control
          'ajax': {
            'url':'ajaxfile.php',
            'data': function(data){
               // Read values
               var from_date = $('#search_fromdate').val();
               var to_date = $('#search_todate').val();
     
               // Append to data
               data.searchByFromdate = from_date;
               data.searchByTodate = to_date;
            }
          },
          'columns': [
             { data: 'emp_name' },
             { data: 'email' },
             { data: 'date_of_joining' },
             { data: 'salary' },
             { data: 'city' },
          ]
       });
     
       // Search button
       $('#btn_search').click(function(){
          dataTable.draw();
       });
     
     });
     </script>
@endsection