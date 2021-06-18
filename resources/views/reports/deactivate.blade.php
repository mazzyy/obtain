@extends('layouts.app')
@section('content')
    @include('layouts.headers.cards')

    <style>
        label {
            font-size: 70% !important;
        }

        .card .table td,
        .card .table th {
            padding-right: 0.4rem !important;
            padding-left: 0.4rem !important;
            text-align:center;
        }
        input[type=date] {
        width: 100%;
        padding: 0.3px 0.3px;
        margin: 0px 0;
        box-sizing: border-box;
    }
    table{
        padding-left: 5%;
    }

    </style>
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" type="text/css"
     href="https://cdn.datatables.net/searchbuilder/1.0.1/css/searchBuilder.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css" /> --}}

    <div class="container-fluid mt--7">
        <div class="">

            <div class="">
                <div class="col-12 p-0 m-0">

                    <div class="card shadow" id="card">

                        <!-- Card header -->
                        <div>



                            <div class="row align-items-center">

                                <div class="col-7">

                                    {{-- <h3 class="pl-1 mb-0">Customers</h3> --}}
                                </div>


                            </div>



                            <!-- Light table -->
                            <div id="ajaxrefresh" class=" pt-5">
                                <div class="table" id="table">
                                    <div class="row">
                                        <div class="col-md-12 ml-auto mr-auto">
                                        <form method="GET" action="{{route("Deactiave.filter")}}" id="recevingForm">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-6 pl-4">
                                                                <label>From Date</label>
                                                                <div class="timepicker-input input-group">

                                                                    <input name="fDate" type="date" class="form-control datepicker-2" placeholder="Pick your date" data-provide="datepicker" id="Fdate">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>To Date</label>
                                                                <div class="timepicker-input input-group">

                                                                    <input name="ldate" type="date" class="form-control datepicker-2" placeholder="Pick your date" data-provide="datepicker" id="Tdate">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="form-group ">
                                                                    <label>Sublocality</label>
                                                                    <select name="sub" id="cmbOperators" class="form-control">
                                                                        <option value="All">All</option>
                                                                        @foreach ($location as $loc)
                                                                        <option value="{{ $loc->id }}">
                                                                            {{ $loc->sublocality }}</option>

                                                                    @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            {{-- <div class="col-md-3">
                                                                <div class="form-group ">
                                                                    <label>Report Type</label>
                                                                    <select name="rtype" id="cmbRptType" class="form-control">
                                                                        <option value="0">Select</option>
                                                                        <option value="Def">Defualters</option>
                                                                        <option value="Rcv">Recovery List</option>
                                                                        <option value="Rcv2">Recovery List 2</option>
                                                                        <option value="Sbw">Sublocality Wise Defualters</option>
                                                                        <option value="Bad">Bad Debts</option>
                                                                    </select>
                                                                </div>
                                                            </div> --}}
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Connection Type</label>
                                                                    <select name="type" id="cmbcontype" class="form-control">
                                                                        <option value="All" selected="">ALL</option>
                                                                        <option value="Both" selected="">Both</option>
                                                                        <option value="Cable">Cable</option>
                                                                        <option value="Internet">Internet</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label></label>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="text-right mrg-top-5">
                                                                            <button id="btnShow" class="btn btn-info">Show</button>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>



            </div>

            {{-- second --}}

            <div class="pt-5">
                <div class="col-12 p-0 m-0">

                    <div class="card pt-5 shadow" id="card">

                        <!-- Card header -->
                        <div>

                            <iframe id="txtArea1" style="display:none"></iframe>

                            <div class="card-header border-0">
                                <span>
                                    <h3 class="mb-0 ">
                                        {{-- <a  id="btnExport" onclick="fnExcelReport();" ><i class="far fa-file-excel"></i></a> --}}
                                        <a onclick="fnExcelReport();" title="Download bill in excel file"  style="float:right" class="  btn btn-success h-50 text-success btn-sm text-white"><i class="far fa-file-excel"></i></a>

                                        <a title="Download bill in excel file" href="excel?year=2024&amp;mth=June&amp;btn-fetch=" rel="noopener" target="_blank" style="float:right" class="  btn btn-success h-50 text-success btn-sm text-white"><i class="fas fa-print"></i></a>

                                    </h3>

                                    <div class="tooltip">Hover over me
                                        <span class="tooltiptext">Tooltip text</span>
                                    </div>
                                </span>
                            </div>


<div class="">
    <div class="row">
        <div class="col-12 p-0 m-0 pt-3">
                            <!-- Light table -->
                            <div id="report">
                                <div class="table" id="table">
                                    <table   class="table  table-responsive align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="col1">Sno</th>
                                                <th>Name</th>
                                                <th>Customer_id</th>
                                                <th>Sublocality</th>
                                                <th>Address</th>

                                                <th >Contact#</th>
                                                <th>Leaving Date</th>
                                                <th>Type</th>
                                                <th>Leaving Reasion</th>
                                                <th name="PkgCable">Other </th>

                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                        {{-- @if (isset($report))


                                            @foreach ($report as $perUser)
                                                <tr id="rowinput" >
                                                        <th scope="row">
                                                            <div class="media-body">
                                                                <i class="bg-warning"></i>
                                                            <span class="name mb-0 text-sm pl-2">  {{ $perUser->id}}</span>
                                                            </div>
                                                        </th>
                                                        <td class="budget">
                                                        {{ $perUser->user_name}}
                                                        </td>
                                                        <td>
                                                        <span class="badge badge-dot mr-4">

                                                            <span class="status">{{ $perUser->internetId}}</span>
                                                        </span>
                                                        </td>
                                                        <td>

                                                            {{ $perUser->sublocalityName}}
                                                        </td>

                                                        <td>

                                                            {{ $perUser->address}}
                                                        </td>
                                                        <td>

                                                            <span class="completion mr-2"> {{ $perUser->month}}-{{ $perUser->year}}</span>

                                                        </td>

                                                        <td>

                                                            <span class="completion mr-2"> {{ $perUser->netAmount}}</span>

                                                        </td>
                                                        <td>

                                                            <span class="completion mr-2"> {{ $perUser->recevieAmount}}</span>

                                                        </td>
                                                        <td>

                                                            <span class="completion mr-2"> {{ $perUser->receivingDate}}</span>

                                                        </td>
                                                        <td>

                                                            <span class="completion mr-2"> {{ $perUser->billStatus}}</span>

                                                        </td>


                                                </tr>
                                            @endforeach

                                        @endif --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
        </div>
    </div>
</div>

                        </div>

                    </div>
                </div>






            </div>
            @include('layouts.footers.auth')
        </div>








        <script>
            $('#recevingForm').on('submit', function(event) {
            $('.append').remove();
            $('#appendnet').remove();
            $('#appendcount').remove();
            $('#appendreceive').remove();



                event.preventDefault();
                data=$('#recevingForm').serializeArray();
                // console.log( data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'GET',
                    url: '{{route('Deactiave.filter')}}',
                    data: data,
                    success: function(results) {

                        i=0;

                                $.each( results, function( key, value ) {
                                  console.log(value.name)
                                    i++;


                                    $(".list").append('<tr class="append"><td>'+i+'</td><td>' + value.name + '</td> <td>' + value.Customer_id + '</td><td>'+value.sublocality+'</td><td>' + value.address + '</td><td>' + value.contact + '</td><td>' +value.leavingDate+'</td><td>'+ value.type+'</td><td>'+ value.leavingReasion+'</td><td>'+ value.otherComments+'</td></tr>');

                                });
                            //

                    }




                }); // end ajax

            });


        </script>



    @endsection


