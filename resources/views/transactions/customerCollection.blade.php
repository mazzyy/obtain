@extends('layouts.app')
{{-- {{ dd($locations[1]) }} --}}

@section('content')
   @include('layouts.headers.cards', [
        // 'title' => __('') . ' '.'Important!',
        'description' => __('If a bill has already been created for a customer on the same date, it will simply open and it will not be created again.'),
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
                                                <h4 class="card-title">User Collections</h4>
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
                                                    <th>Payment Type</th>
                                                    <th>Collection Type</th>
                                                    <th>Net Amount</th>
                                                    <th>Balance</th>
                                                    <th>Status</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody id="fcol">
                                                <tr>
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
                                                            {{-- <a class="dropdown-item" href="#">Delete</a> --}}

                                                          </div>
                                                        </div>
                                                      </td>
                                                </tr>
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
                                                        <button id="btnpop" type="button" class="btn btn-raised btn-success"><i class="fa fa-check"></i> Receiving</button>
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
                                                        <button id="btnrcvd" type="button" class="btn btn-raised btn-info"><i class="fa fa-plus "></i> New Amount</button>
                                                        <button hidden="" id="btnrcvd2" data-toggle="modal" data-target="#modal-lg" data-original-title="" title="" type="button" class="btn btn-raised btn-info"><i class="fa fa-plus "></i> New Amount</button>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <div class="dropdown inline-block">
                                                            <button class="btn btn-info btn-raised dropdown-toggle" type="button" data-toggle="dropdown"><span>Rports</span><i class="ti-angle-down font-size-9"></i></button>
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
                    <div class="card">
                        <div class="card-heading border bottom">
                            <h4 class="card-title">Users Collection History</h4>
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
                                            <th>Payment Type</th>
                                            <th>Collection Type</th>
                                            <th>Rcv Amount</th>
                                            <th>Receving Date</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                            <th>Recevie By</th>
                                        </tr>
                                      </thead>
                                      <tbody class="list">
                                        <tr><td>41810201</td>
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
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                  </div>
                                                </div>
                                              </td>
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

                            </div>
                            <div class="alert alert-danger print-error-msg" style="display:none">

                                <ul></ul>
                            </div>
                            <form autocomplete="off" id="target-form">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-block">
                                            <div class="row">
                                                <h4 class="card-title">Customer Names</h4>

                                                <div class="col-md-4">
                                                    <div class="form-group inline">
                                                        <select id="cmbArea" class="form-control">
                                                            <option value="0">All(Sublocality)</option>
                                                            @foreach ($locations as $loc)
                                                            <option value="{{ $loc->id }}">{{ $loc->sublocality }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-overflow">
                                                <input type="text" class="form-control" placeholder="Enter Internet ID,Name ,Address or mobile" name="internetId"  id="txtSrchInternet" style="border:solid 1px;">
                                                <table class="table table-lg table-hover table-bordered">
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
<script>
    $('#txtSrchInternet').on('keyup', function(event) {
        // searchValue=$('#txtSrchInternet').val("");
        // $('#txtSrchAdd').val("");
        // $('#txtSrchCell').val("");
        // $('#txtSrchName').val("");
        // console.log(searchValue);
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
                console.log(results)
                if(results){
                    console.log(results)
                    $('.append').remove();
                    $.each( results, function( key, value ) {

                        $("#searchtb").append('<tr class="append"><td>' + value.internetId + '</td><td>' + value.name + '</td> <td>' + value.Sublocality + '</td><td>' + value.address + '</td><td>' + value.contact + '</td> <td><a href="javascript:void(0)" onclick="selectID(' + value.ID + ');" class="btn btn-info">SELECT</a></td></tr >');

                    });
                    }else if(event.which == 8)
                    {
                        $('.append').remove();
                    }
                    else{
                        $('.append').remove();
                    }

// console.log(results);

            }
              //Laravel validation error function



        }); // end ajax

    });

</script>


@endsection

