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
        }
        input[type=date] {
        width: 100%;
        padding: 0.3px 0.3px;
        margin: 0px 0;
        box-sizing: border-box;
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
                                        <form method="GET" action="{{route('Defaulter.filter')}}" id="recevingForm">
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
                                                                        <option value="{{ $loc->sublocality }}">
                                                                            {{ $loc->sublocality }}</option>

                                                                    @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
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
                                                            </div>
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
                                            <div class="pull-left-sm pl-2">
                                                <p>SUMMARY</p>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table id="tbSum" class=" table-responsive table table-hover text-dark">
                                                            <thead>
                                                                <tr >

                                                                    <th style=" padding-left: 1rem !important;padding-right: 1rem !important; ">Total Connections</th>
                                                                    <th style=" padding-left: 1rem !important;padding-right: 1rem !important; ">Total NetAmount</th>
                                                                    <th style=" padding-left: 1rem !important;padding-right: 1rem !important; ">Total Received</th>
                                                                    <th style=" padding-left: 1rem !important;padding-right: 1rem !important; ">Total Remaining</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr id='stat'>
                                                                    {{-- @if (isset($stat[0]))
                                                                    <th style=" padding-left: 1rem !important;padding-right: 1rem !important; ">{{$stat[0]->count}}</th>
                                                                    <th style=" padding-left: 1rem !important;padding-right: 1rem !important; ">{{$stat[0]->netsum}}</th>
                                                                    <th style=" padding-left: 1rem !important;padding-right: 1rem !important; ">{{$stat[0]->receviesum}}</th>
                                                                    @endif --}}

                                                                    {{-- <th id="count" style=" padding-left: 1rem !important;padding-right: 1rem !important; "></th>
                                                                    <th id="netAmount" style=" padding-left: 1rem !important;padding-right: 1rem !important; "></th>
                                                                    <th id="reveivedAMount" style=" padding-left: 1rem !important;padding-right: 1rem !important; "></th> --}}

                                                                </tr>
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
                                    <h3 class="mb-0 ">Report
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


                                                <th scope="col pl-5">Name</th>
                                                <th scope="col">Internet Id</th>
                                                <th scope="col">Sublocality</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Month/Year</th>
                                                {{-- <th scope="col">Type</th> --}}
                                                <th scope="col">Total NetAmount</th>
                                                <th scope="col">Total Recevied</th>
                                                <th scope="col">Total Remaining</th>




                                                <th scope="col"></th>
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
                console.log( data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'GET',
                    url: '{{route('Defaulter.filter')}}',
                    data: data,
                    success: function(results) {
                        console.log('result='+results)
                        count=0;
                        sumNetAmount=0;
                        sumReveievedAmount=0;

                                $.each( results, function( key, value ) {
                                    netA=parseInt(value.netA);
                                    recA=parseInt(value.recA);
                                    count=count+1;
                                    sumNetAmount=sumNetAmount+netA;
                                    sumReveievedAmount=sumReveievedAmount+recA;
                                    remaining=value.netA-value.recA;
                                    $(".list").append('<tr class="append"><td>' + value.user_name + '</td> <td>' + value.internetId + '</td><td>' + value.sublocalityName + '</td><td>' + value.address + '</td><td>' +value.month+'-'+ value.year + '</td><td>' + value.netA + '</td><td>' + value.recA + '</td><td>'+remaining+'</td></tr>');

                                });
                               sumRemainingAmount =sumNetAmount-sumReveievedAmount;
                                $('#stat').append('<th id="appendcount" style=" padding-left: 1rem !important;padding-right: 1rem !important; ">'+count+'</th>');
                                $('#stat').append('<th id="appendnet" style=" padding-left: 1rem !important;padding-right: 1rem !important; ">'+sumNetAmount+'</th>');
                                $('#stat').append( '<th id="appendreceive" style=" padding-left: 1rem !important;padding-right: 1rem !important; ">'+sumReveievedAmount+'</th>');
                                $('#stat').append( '<th id="appendremaing" style=" padding-left: 1rem !important;padding-right: 1rem !important; ">'+sumRemainingAmount+'</th>');


                    }




                }); // end ajax

            });


        </script>


        <script>
// function fnExcelReport()
// {
//     var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
//     var textRange; var j=0;
//     tab = document.getElementById('targettable'); // id of table

//     for(j = 0 ; j < $('#targettable tr').length ; j++)
//     {
//         tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
//         //tab_text=tab_text+"</tr>";
//     }

//     tab_text=tab_text+"</table>";
//     tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
//     tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
//     tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

//     var ua = window.navigator.userAgent;
//     var msie = ua.indexOf("MSIE ");

//     if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
//     {
//         txtArea1.document.open("txt/html","replace");
//         txtArea1.document.write(tab_text);
//         txtArea1.document.close();
//         txtArea1.focus();
//         sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
//     }
//     else                 //other browser not tested on IE 11
//         sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));

//     return (sa);
// }

        </script>

    @endsection


