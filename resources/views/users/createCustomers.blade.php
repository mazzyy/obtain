@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <style>
        label{
            font-size: 80%
        }
    </style>
    <div class="container-fluid mt--7">
        <div class="">

            <div class="">
                <div class="col-12 ">

                  <div class="card">

                    <!-- Card header -->
                    <div >



                        <div class="row align-items-center">

                            <div class="col-8">

                                <h3 class="pl-1 mb-0">New Customers</h3>
                            </div>
                            <div class="col-4 text-right">

                                <button href=""  class=" mt-3 mb-3 mr-2 pr-3 btn btn-icon   btn-default btn-sm" type="button">
                                    <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                                    <span class="btn-inner--text" data-toggle="modal" data-target="#modal-form">Add new Employee </span>
                                </button>
                            </div>
                        </div>



                    <!-- Light table -->
                <div id="ajaxrefresh">
                    <div class="table-responsive" id="table"  >
                      <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">Id</th>
                                    <th scope="col" class="sort" data-sort="budget">Name</th>
                                    <th scope="col" class="sort" data-sort="status">Email</th>

                                    <th scope="col" class="sort" data-sort="Locality">Role</th>
                                    <th scope="col" class="sort" data-sort="Locality">Action</th>

                                </tr>
                                </thead>
                                <tbody class="list">

                            @foreach ($Customers as $Customer)
                                <tr>
                                        <th scope="row">
                                            <div class="media-body">
                                                <i class="bg-warning"></i>
                                            <span class="name mb-0 text-sm">  {{ $Customer->id}}</span>
                                            </div>
                                        </th>
                                        <td class="budget">
                                        {{ $Customer->name}}
                                        </td>
                                        <td>
                                        <span class="badge badge-dot mr-4">

                                            <span class="status">{{ $Customer->email}}</span>
                                        </span>
                                        </td>
                                        <td>
                                            <span class="badge badge-dot mr-4">

                                            <span class="status">
                                               Customers


                                            </span>
                                            </span>
                                        </td>



                                        <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>

                                            </div>
                                        </div>
                                        </td>
                                </tr>
                            @endforeach
                                </tbody>
                      </table>
                    </div>
                </div>
                    <!-- Card footer -->
                    <div class="card-footer py-4">
                      <nav aria-label="...">
                        <ul class="pagination justify-content-end mb-0">
                          <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">
                              <i class="fas fa-angle-left"></i>
                              <span class="sr-only">Previous</span>
                            </a>
                          </li>
                          <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                          </li>
                          <li class="page-item">
                            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                          </li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item">
                            <a class="page-link" href="#">
                              <i class="fas fa-angle-right"></i>
                              <span class="sr-only">Next</span>
                            </a>
                          </li>
                        </ul>
                      </nav>
                    </div>
                  </div>

                </div>
              </div>


              {{-- modal --}}
              <div class="col-md-4">
                {{-- <button type="button" class="btn btn-block btn-default" data-toggle="modal" data-target="#modal-form">Form</button> --}}
                <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
              <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
                  <div class="modal-content">

                      <div class="modal-body p-0">


          <div class="card bg-secondary shadow border-0">

              <div class="card-body px-lg-5 py-lg-5">
                  <div class="text-center text-muted mb-4">
                      <small>Customers </small>
                  </div>
                  <form action="" method="get"  id="target" name="target">
                    <div class="col-md-12">

                            <div class="form-row ">
                                {{-- <div class="col-md-2">
                                    <div class="form-group ">
                                        <label>Internet ID</label>
                                        <input type="text" class="form-control" id="txtNic" placeholder="Internet ID" maxlength="30">
                                    </div>
                                </div> --}}
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label>Sublocality</label>



                                        <select id="cmbSubLocality" class="form-control" name="Sublocality">
                                            <option >Select SubLocality</option>
                                            @foreach ($location as $loc)
                                            <option value="{{$loc->id}}">{{ $loc->sublocality}}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label>Name</label>
                                        <input type="text" class="form-control" id="txtName" placeholder="Name" name="name" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>Address</label>
                                        <input type="text" class="form-control" id="txtAddress" placeholder="Address" name="address">
                                    </div>
                                </div>
                            </div>
                            <div class="row ">

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Cell</label>
                                        <input type="text" class="form-control" maxlength="11" name="txtPhone1" id="txtPhone1" required="" onkeypress="javascript:return checkNumber(event)">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input type="text" class="form-control" maxlength="11" id="txtPhone2" name="txtPhone2" placeholder="Phone2" required="" onkeypress="javascript:return checkNumber(event)">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label>Installation amount</label>
                                        <input type="text" maxlength="9" class="form-control" id="txtInstalAmount" name="installationAmount" placeholder="Amount" required="" onkeypress="javascript:return checkNumber(event)">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label>Other Amount </label>
                                        <input type="text" maxlength="9" class="form-control" id="txtOtherAmt" name="otherAmount" placeholder="Amount" required="" onkeypress="javascript:return checkNumber(event)">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label>Installation Date</label>
                                                <input type="date" class="form-control datepicker-1" id="txtDtAddDate" maxlength="10" name="installationDate" data-provide="datepicker" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label>Recharge Date</label>
                                                <input type="date" class="form-control datepicker-1" id="txtDtReDate" maxlength="10" name="rechargeDate" data-provide="datepicker">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label>Providers</label>
                                                <select id="cmbConPro" class="form-control" name="provider"><option value="0">Select the Message</option><option value="CLICK" pick="">CLICK PICK</option><option value="COMSATS">COMSATS</option><option value="CONCTEL">CONCTEL</option><option value="CONNECT">CONNECT</option><option value="DREAM">DREAM</option><option value="EBONE">EBONE</option><option value="FARIYA">FARIYA</option><option value="FIBERISH">FIBERISH</option><option value="FIBERLINK">FIBERLINK</option><option value="GALAXY">GALAXY</option><option value="HOMENET">HOMENET</option><option value="K.K.NET">K.K.NET</option><option value="LEO">LEO</option><option value="MULTINET">MULTINET</option><option value="NATION">NATION</option><option value="NATIONAL" broadband="">NATIONAL BROADBAND</option><option value="NAYATEL">NAYATEL</option><option value="NETON">NETON</option><option value="NETSOL">NETSOL</option><option value="OPTIX">OPTIX</option><option value="SKYNET">SKYNET</option><option value="TRANSWORLD">TRANSWORLD</option><option value="VISION">VISION</option><option value="WANCOM">WANCOM</option><option value="WORLDCALL">WORLDCALL</option></select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label>Connection Type</label>
                                                <select id="cmbConType" class="form-control" name="type">
                                                    <option value="Both">Both</option>
                                                    <option value="Internet">Internet</option>
                                                    <option value="Cable">TV Cable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label>Box Number</label>
                                                <input type="text" maxlength="9" class="form-control" id="txtboxno" placeholder="Box Number" name="box" required="" onkeypress="javascript:return checkNumber(event)">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-6 cable" id="rwCable">
                                    <div class="row ">
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label>Pkg-Cable </label>
                                                <select name="cmbPackage" id="cmbPackage" class="form-control" placeholder="package">
                                                    <option value="0">Select the Package </option>
                                                    @foreach ($cablePkg as $cblPkg )
                                                    <option value="{{$cblPkg->id}}" >{{$cblPkg->package}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Discount</label>
                                                <select name="cmbDiscount" id="cmbDiscount" class="form-control">
                                                    <option value="0">No Discount</option>
                                                    <option value="25">quarter</option>
                                                    <option value="50">half</option>
                                                    <option value="75">semi</option>
                                                    <option value="100">full free</option>
                                                    <option value="1">Custom</option>
                                                </select>
                                            </div>
                                        </div> --}}
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label>Discount </label>
                                                <input name='txtAmount' type="text" maxlength="9" class="form-control" id="txtAmount" placeholder="Amount" required="" onkeypress="javascript:return checkNumber(event)" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label>Pkg-Internet </label>
                                                <select name="cmbPackageint" id="cmbPackageint" class="form-control" placeholder="package">
                                                    <option value="0">Select the Package </option>
                                                    @foreach ($internetPkg as $intPkg )
                                                    <option value="{{$intPkg->id}}" >{{$intPkg->package}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 internet" id="rwInternet">
                                    <div class="row ">
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label>Discount </label>
                                                <input type="text" maxlength="9" class="form-control" id="txtAmountint" placeholder="Amount" required="" onkeypress="javascript:return checkNumber(event)" >
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group ">
                                                <label>Discount </label>
                                                <input type="email" class="form-control" id="txtAmountint" placeholder="email" required name="email" >
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="text-right mrg-top-15">
                                <button type="reset" id="btncancel" class="btn btn-danger">Cancel</button>
                                <button type="submit" id="btnSave" class="btn btn-info">Submit</button>
                            </div>

                        <button hidden="" id="hidemodle" data-dismiss="modal">

                    </button></div>

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
        @include('layouts.footers.auth')
    </div>
    <script >

    function checkNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode < 48 || iKeyCode > 57) { return false; }
        else { return true; }
    }

    </script>
    <script >

        $('#target').on('submit', function(event){

          event.preventDefault();
         var data= $('#target').serialize();
        //  alert('life');
        //  console.log(data);
         $.ajax({
      type: 'get',
      url: '{{route('createCustomersUsers')}}',
      data:data,
      success: function(results) {


      $('#modal-form').modal('hide');
      $('#ajaxrefresh').load(' #table');
         console.log(results);
         console.log(data);


      }

    }); // end ajax

         });

      </script>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
