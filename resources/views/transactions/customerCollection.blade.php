@extends('layouts.app')
{{-- {{ dd($locations[1]) }} --}}

@section('content')
   @include('layouts.headers.cards', [
        // 'title' => __('') . ' '.'Important!',
        'description' => __('Customers Collection.'),
        'class' => 'col-lg-12 m-0 p-0p'
    ])


<style>
    .card .table td,
    .card .table th
{
    padding-right: 0;
    padding-left: 0;
}
.btnsearch{
  border-radius: 50px;
  border: 2px solid #73AD21;
  padding: 20px;
  width: 200px;
  height: 150px;
}

</style>

    <div class="mt-2 px-2 ">
        <div class="card-block">
            <div class="container-fluid mt--7 mrg-top-20">
                <div class="row ">
                    <div class="col-md-12 ml-auto mr-auto">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="row mt-3">
                                    <div class="col-lg-6">
                                        <div class="form-group ">
                                            <div class="card-heading">
                                                <h4 class="card-title">Unpaid and partial</h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6  ">
                                        <div class=" mrg-top-10"></div>
                                        <div class="form-group rounded-lg">
                                            <button id="btnSearch" class=" form-control rounded  btn-lg btn-block input-group " type="submit"  type="button" data-toggle="modal" data-target="#modal-form"><i class="fas fa-search pr-1 pt-1"> </i>   Search</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <table style="width: 97% !important" class="table-bordered ml-3  table align-items-center ">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>CustID</th>
                                                    <th>Name</th>
                                                    <th>Internet Id</th>
                                                    <th>Address</th>
                                                    <th>Month/Year</th>
                                                    {{-- <th>Payment Type</th> --}}
                                                    <th>Collection Type</th>
                                                    <th>Net Amount</th>
                                                    <th>Balance</th>
                                                    <th>Status</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody id="fcol" >
                                                {{-- <tr>
                                                    <td>50817</td>
                                                    <td>HOTEL</td>
                                                    <td>gt-hotel</td>
                                                    <td>Hotel</td>
                                                    <td>May 2021</td>
                                                    <td>Monthly</td>
                                                    <td>Internet</td>
                                                    <td>700</td>
                                                    <td>700</td>
                                                    <td>unpaid</td>

                                                    <td class="text-right">
                                                        <div class="dropdown">
                                                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                          </a>
                                                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                            <a class="dropdown-item" href="#">Change Amount</a>
                                                            <a class="dropdown-item" href="#">Delete</a>

                                                          </div>
                                                        </div>
                                                      </td>
                                                </tr> --}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row" style="margin-top:10px;">
                                    <div class="col-lg-5 mrg-right-70">
                                        <div class="card-heading  ">
                                            <h4 class="card-title"></h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 text-right">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <button id="btnpop" type="button" class="btn btn-raised btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-check"></i> Receiving</button>
                                                        <button hidden="" data-toggle="modal" data-target="#modal-receiving" data-original-title="" id="btnpop2" type="button" class="btn btn-raised btn-success disabled"><i class="fa fa-check"></i> Receiving</button>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 m-0 p-0 ml-1">
                                                    <div class="form-group">
                                                        <input style="border:solid 1px;" readonly="" type="text" id="amtrd" class="form-control" value="0">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <button id="btnrcvd" type="button" class="btn btn-raised btn-info"   data-toggle="modal" data-target="#exampleModalLong" ><i class="fa fa-plus "></i> New Amount</button>
                                                        {{-- <button hidden="" id="btnrcvd2" data-toggle="modal" data-target="#modal-lg" data-original-title="" title="" type="button" class="btn btn-raised btn-info"><i class="fa fa-plus "></i> New Amount</button> --}}
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <div class="dropdown inline-block">
                                                            <button class="btn btn-info btn-raised dropdown-toggle" type="button" data-toggle="dropdown"><span>Reports</span><i class="ti-angle-down font-size-9"></i></button>
                                                            <ul class="dropdown-menu">
                                                                <li><a id="btnSumID" type="submit" class="btn">Summary</a></li>
                                                                <li><a id="btnInvoice" type="submit" class="btn">Invoice</a></li>
                                                                <li><a id="btnInvoice2" type="submit" class="btn">Invoice 2</a></li>
                                                            </ul>
                                                        </div>
                                                        <button hidden="" type="button" class="btn btn-raised btn-danger"><i hidden="" class="fa fa-print"></i> Print</button>
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

    </div>
<div class="mt-2 pt-2 px-2 ">
    <div class="card-block">
        <div class="container-fluid  mrg-top-10">
            <div class="row">
                <div class="col-md-12 " >
                    <div class="card pb-5">
                        <div class="card-heading ">
                            <h4 class="card-title pt-2">paid</h4>
                        </div>
                        <div class="card-block">
                            <div class="table-overflow">

                                <div class="table-responsive">
                                    <table style="width: 97% !important" class="table-bordered ml-3  table align-items-center ">
                                      <thead class="thead-light">
                                        <tr>
                                            <th>Bill#</th>
                                            <th>CustID</th>
                                            <th>Name</th>
                                            <th>Internet Id</th>
                                            <th>Address</th>
                                            <th>Month/Year</th>
                                            {{-- <th>Payment Type</th> --}}
                                            <th>Collection Type</th>
                                            <th>Rcv Amount</th>
                                            <th>Receving Date</th>
                                            <th>Status</th>
                                            <th>Recevie By</th>
                                            <th>Actions</th>

                                        </tr>
                                      </thead>
                                      <tbody class="list">
                                        {{-- <tr><td>41810201</td>
                                                    <td>50817</td>
                                                    <td>HOTEL</td>
                                                    <td>Hotel</td>
                                                    <td>gt-hotel</td>
                                                    <td>Apr 2021</td>
                                                    <td>Monthly</td>
                                                    <td>Internet</td>
                                                    <td>700</td>
                                                    <td>5/11/2021</td>
                                                    <td>paid</td>
                                                    <td>gt</td>
                                                    <td class="text-right">
                                                        <div class="dropdown">
                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                            <a class="dropdown-item" href="#">uppaid</a>
                                                            <a class="dropdown-item" href="#">dublicate print</a>
                                                        </div>
                                                        </div>
                                                    </td>
                                            </tr> --}}
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

  {{-- modal --}}
  <div class="col-md-4">
    {{-- <button type="button" class="btn btn-block btn-default" data-toggle="modal" data-target="#modal-form">Form</button> --}}
    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-body p-0">


                    <div class="card bg-secondary shadow border-0">

                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <h4 class="card-title">Customers Information</h4>
                            </div>
                            <div class="alert alert-danger print-error-msg" style="display:none">

                                <ul></ul>
                            </div>
                            <form autocomplete="off" id="target-form">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-block">
                                            <div class="row">


                                                <div class="col-md-4">
                                                <center>
                                                    <div class="form-group inline">
                                                        <select id="cmbArea" class="form-control">
                                                            <option value="0">All(Sublocality)</option>
                                                            @foreach ($locations as $loc)
                                                            <option value="{{ $loc->id }}">{{ $loc->sublocality }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </center>
                                                </div>
                                            </div>
                                            <div class="table-overflow">
                                                <input type="text" class="form-control" placeholder="Search Internet ID,Name ,Address or mobile" name="internetId"  id="txtSrchInternet" style="border:solid 1px;">
                                                <table class="table table-responsive-lg table-hover table-bordered">
                                                    <thead>
                                                        {{-- <tr>
                                                            <th><input type="text" class="form-control" placeholder="Enter Internet ID" name="internetId"  id="txtSrchInternet" style="border:solid 1px;"></th>

                                                        </tr> --}}
                                                    </thead>
                                                    <thead>
                                                        <tr>
                                                            <th>Internet-ID</th>
                                                            <th>Customer Name</th>
                                                            <th>Sublocality</th>
                                                            <th>Address</th>
                                                            <th>Cell</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="searchtb">
                                                        {{-- <tr><td>gt-hotel</td><td>HOTEL</td> <td>Hotel, Green Town</td><td>0 - 0</td> <td><a href="javascript:void(0)" onclick="selectID(50817);" class="btn btn-info">SELECT</a></td></tr> --}}
                                                    </tbody>
                                                </table>
                                                <button hidden="" id="hidemodler" data-dismiss="modal">
                                            </button></div>
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
{{-- end modal --}}


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Receiving</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="table-overflow">
                <table id="rectable" class="table table-lg table-hover table-bordered"><thead>
                        <tr><th>CustID</th> <th>Name</th><th>Month/Year</th><th>Type</th> <th>Net Amount</th></tr>
                    </thead>
                    <tbody class="recieve">
                        {{-- <tr><th>50817</th> <th>HOTEL</th><th>Jun 2021</th><td>Monthly, Internet</td><th>700</th></tr> --}}
                    </tbody>
                </table>
            <form action="{{route('collection.reveive')}}" method="POST" id='recevingForm'>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="">RecieptID</label>
                            <input type="text" value="0"  maxlength="9" class="form-control pull-right" name="recieptID" placeholder="BillID" id="txtRID" style="border:solid 1px;">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="">Receiving Date</label>
                        <input type="date"  class="form-control datepicker-1" id="today" data-provide="datepicker" name="receivingDate" style="border:solid 1px;"  >
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                          <input type="hidden" name="cusId" id="cusId" value="">
                        </div>
                    </div>
                    <div class="col-md-2 " style="padding-top: 4.5%">
                        <input type="text"  maxlength="9" class="form-control pull-right mrg-top-25" name="value" placeholder="Amount" id="txtrcv" style="border:solid 1px;">
                    </div>
                    <div class="col-md-2 " style="padding-top: 4.5%">
                        <button type="submit" class="btn btn-info pull-right mrg-top-25" id="btnsub">Submit</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>
  {{-- end modal --}}

      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
        <div class="copyright text-center text-xl-left text-muted">
            © 2021 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a> &amp;
            <a href="https://www.updivision.com" class="font-weight-bold ml-1" target="_blank">Updivision</a>
        </div>
          </div>
    <div class="col-xl-6">
        <ul class="nav nav-footer justify-content-center justify-content-xl-end">
            <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
            </li>
            <li class="nav-item">
                <a href="https://www.updivision.com" class="nav-link" target="_blank">Updivision</a>
            </li>
            <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
            </li>
            <li class="nav-item">
                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
            </li>
            <li class="nav-item">
                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
            </li>
        </ul>
    </div>
        </div>
      </footer>
    </div>
</div>



<!-- Modal  new ammount-->
<div class="modal fade  bd-example-modal-lg" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Customer bill Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card-block">
                <div class="row">
                    <div class="col-md-12">
                    <form  id="form-validation" autocomplete="off" action="{{route('collection.newAmount')}}" method="GET">
                            <div class="row ">
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label>id</label>
                                        <input type="tel" class="form-control" readonly="" name="txtid" id="txtid" placeholder="ID" style="border:solid 1px;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>Name</label>
                                        <input type="text" class="form-control" readonly="" name="txtNam" id="txtNam" placeholder="Name" style="border:solid 1px;">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label>Internet id</label>
                                        <input type="text" class="form-control" readonly="" name="txtintid"  id="txtintid" placeholder="ID" style="border:solid 1px;">
                                    </div>
                                </div>
                            </div>
                            <div class="row ">

                                <div class="col-md-12">
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label>Net Amount</label>
                                                <input dis="" id="Namt" type="tel"  class="form-control" name="text" placeholder="" value="0" style="border:solid 1px;">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Month</label>
                                        <select id="cmbmnth" name="cmbmnth" class="form-control" style="border:solid 1px;">
                                            <option value="0" disabled="" selected="">Select Month</option>
                                            <option value="Jan">January</option>
                                            <option value="Feb">Feburay</option>
                                            <option value="Mar">March</option>
                                            <option value="Apr">April</option>
                                            <option value="May">May</option>
                                            <option value="Jun">June</option>
                                            <option value="Jul">July</option>
                                            <option value="Aug">August</option>
                                            <option value="Sep">September</option>
                                            <option value="Oct">October</option>
                                            <option value="Nov">November</option>
                                            <option value="Dec">Decmeber</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Year</label>
                                        <select id="cmbyear" name="cmbyear" class="form-control" style="border:solid 1px;">
                                            <option value="0" disabled="" selected="">Select Year</option>

                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <input type="hidden" id="codexdbugysub" name="codexdbugysub">
                            <input type="hidden" id="erx3extr12o404subn" name="erx3extr12o404subn">
                            <input type="hidden" id="asdh89haskltype" name="asdh89haskltype">

                            <div class="text-right">
                                <button id="btnonesub" type="submit" class="btn btn-info">Submit</button>
                            </div>
                    </form>
                        {{-- <button hidden="" id="hidemodle" data-dismiss="modal">
                    </button></div> --}}
                </div>
            </div>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>

<script>
    $('#txtSrchInternet').on('keyup', function(event) {

        event.preventDefault();
            var x = document.getElementById("txtSrchInternet");
            var cmbArea = document.getElementById("cmbArea");
            data='searchId='+x.value+'&'+'Area='+cmbArea.value;
            // alert(data);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'get',
            url: '{{ route('collection.find') }}',
            data: data,
            success: function(results) {
                // console.log(results)
                if(results){
                    // console.log(results)
                    $('.append').remove();
                    $.each( results, function( key, value ) {

                        $("#searchtb").append('<tr class="append"><td>' + value.internetId + '</td><td>' + value.name + '</td> <td>' + value.Sublocality + '</td><td>'+ value.address + '</td><td>' + value.contact + '</td> <td><a href="javascript:void(0)" onclick="selectID(' + value.userid + ');" class="btn btn-info">SELECT</a></td></tr >');

                    });
                    }
                    else{
                        $('.append').remove();
                    }


            }
              //Laravel validation error function



        }); // end ajax

    });

</script>

<script>
        function selectID(id) {
                $('#idName').val(id);
                $('.append').remove();
                $('.unpaid').remove();
                $('.recieveAppend').remove();
                document.getElementById('txtrcv').value=0;
                document.getElementById('txtRID').value=0;
                document.getElementById('amtrd').value=0;
                // console.log(id);
                event.preventDefault();
                url = '?name='+id;
                    // alert(data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'get',
                    url: '{{ route('collection.customerbill') }}',
                    data: url,
                    success: function(results) {
                        var sum=0;
                        $.each( results, function( key, value ) {
                        if(value.billStatus=='paid'){

                            // console.log(value.billStatus);
                            $(".list").append('<tr class="append"><td>' + value.id + '</td><td>' + value.user_id + '</td><td>' + value.user_name + '</td> <td>' + value.internetId + '</td><td>' + value.sublocalityName + '</td><td>' +value.month+'-'+ value.year + '</td><td>'+value.billType+'</td><td>'+value.recevieAmount+'</td><td>'+value.updated_at+'</td><td>'+value.billStatus+'</td> <td>'+value.receviedBy+'</td> <td class="text-right"><div class="dropdown"><a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a><div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow"><a class="dropdown-item" href="#">unpaid</a><a class="dropdown-item" href="#">dublicate print </a></div></div></td>');

                        }else{
                            $("#fcol").append('<tr class="unpaid"><td>' + value.user_id + '</td><td>' + value.user_name + '</td> <td>' + value.internetId + '</td><td>' + value.sublocalityName + '</td><td>' +value.month+'-'+ value.year + '</td><td>'+value.billType+'</td><td>'+value.netAmount+'</td><td>'+value.recevieAmount+'</td><td>'+value.billStatus+'</td>  <td class="text-right"><div class="dropdown"><a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a><div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow"><a class="dropdown-item" href="#">Change Amount</a><a class="dropdown-item" href="#">Delete</a></div></div></td>');
                            $(".recieve").append('<tr class="recieveAppend"><th>' + value.user_id + '</th> <th>' + value.user_name + '</th><th>' +value.month+'-'+ value.year + '</th><td>'+value.billType+'</td><th>'+value.netAmount+'</th></tr>');
                            document.getElementById('today').value = new Date().toISOString().slice(0, 10);
                            sum=sum+value.netAmount;

                           document.getElementById('cusId').value=value.user_id;
                           document.getElementById('txtrcv').value=sum;
                           document.getElementById('txtRID').value=value.id;
                        }


                            $('#modal-form').modal('hide');
                            $('#card-block').load(' #table');
                              // insert value for new amount modal form
                        document.getElementById('txtid').value=value.user_id;
                        document.getElementById('txtNam').value=value.user_name;
                        document.getElementById('txtintid').value=value.internetId;
                        document.getElementById('Namt').value=value.netAmount;
                        document.getElementById('codexdbugysub').value=value.sublocality;
                        document.getElementById('erx3extr12o404subn').value=value.sublocalityName ;
                        document.getElementById('asdh89haskltype').value=value.billType;

                        });

                        document.getElementById('amtrd').value=sum;






                        // console.log(sum);


                    }
                    //Laravel validation error function



                }); // end ajax


            }
</script>

<script>
    $('#recevingForm').on('submit', function(event) {
        $('.append').remove();
        $('.unpaid').remove();
        $('.recieveAppend').remove();


        event.preventDefault();
        data=$('#recevingForm').serializeArray();


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'post',
            url: '{{ route('collection.reveive') }}',
            data: data,
            success: function(results) {
                // console.log('result='+results)


                        $.each( results, function( key, value ) {



                        if(value.billStatus=='paid' ){


                            $(".list").append('<tr class="append"><td>' + value.id + '</td><td>' + value.user_id + '</td><td>' + value.user_name + '</td> <td>' + value.internetId + '</td><td>' + value.sublocalityName + '</td><td>' +value.month+'-'+ value.year + '</td><td>'+value.billType+'</td><td>'+value.recevieAmount+'</td><td>'+value.updated_at+'</td><td>'+value.billStatus+'</td> <td>'+value.receviedBy+'</td> <td class="text-right"><div class="dropdown"><a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a><div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow"><a class="dropdown-item" href="#">unpaid</a><a class="dropdown-item" href="#">dublicate print </a></div></div></td>');


                        }else if(value.billStatus=='unpaid' || value.billStatus=='partial' ) {
                            $("#fcol").append('<tr class="unpaid"><td>' + value.user_id + '</td><td>' + value.user_name + '</td> <td>' + value.internetId + '</td><td>' + value.sublocalityName + '</td><td>' +value.month+'-'+ value.year + '</td><td>'+value.billType+'</td><td>'+value.netAmount+'</td><td>'+value.recevieAmount+'</td><td>'+value.billStatus+'</td>  <td class="text-right"><div class="dropdown"><a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a><div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow"><a class="dropdown-item" href="#">Change Amount</a><a class="dropdown-item" href="#">Delete</a></div></div></td>');
                            // console.log(value.billStatus);
                            // console.log('unpaid');



                        }

                        });

                        $('#exampleModal').modal('hide');

            }




        }); // end ajax
        document.getElementById('amtrd').value=0;
        document.getElementById('txtrcv').value=0;
    });

</script>

{{-- new amount ajax --}}
<script>
    $('#form-validation').on('submit', function(event) {



        event.preventDefault();
        data=$('#form-validation').serializeArray();


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '{{ route('collection.newAmount') }}',
            data: data,
            success: function(results) {

                // dataToSend = JSON.stringify({ 'list': results });



                            $("#fcol").append('<tr class="unpaid"><td>' + results.user_id + '</td><td>' + results.user_name + '</td> <td>' + results.internetId + '</td><td>' + results.sublocalityName + '</td><td>' +results.month+'-'+ results.year + '</td><td>'+results.billType+'</td><td>'+results.netAmount+'</td><td>'+results.recevieAmount+'</td><td>'+results.billStatus+'</td>  <td class="text-right"><div class="dropdown"><a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a><div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow"><a class="dropdown-item" href="#">Change Amount</a><a class="dropdown-item" href="#">Delete</a></div></div></td>');
                            $(".recieve").append('<tr class="recieveAppend"><th>' + results.user_id + '</th> <th>' + results.user_name + '</th><th>' +results.month+'-'+ results.year + '</th><td>'+results.billType+'</td><th>'+results.netAmount+'</th></tr>');

                            val=document.getElementById('amtrd').value;
                            val=parseInt(val);
                            netAmount=parseInt(results.netAmount);
                            val=val+netAmount;
                            document.getElementById('amtrd').value=val;
                            document.getElementById('txtrcv').value=val;


            },
            error:function(xhr){
                    console.log(xhr);
            }




        }); // end ajax
        $('#exampleModalLong').modal('hide');
    });

</script>




@endsection

