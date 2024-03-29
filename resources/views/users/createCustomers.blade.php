@extends('layouts.app')
@section('content')
    @include('layouts.headers.cards')

    <style>
        label {
            font-size: 80%
        }

        .card .table td,
        .card .table th {
            padding-right: 0rem !important;
            padding-left: 0.2rem !important;
        }

    </style>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" type="text/css"
     href="https://cdn.datatables.net/searchbuilder/1.0.1/css/searchBuilder.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css" />

    <div class="container-fluid mt--7">
        <div class="">

            <div class="">
                <div class="col-12 p-0 m-0">

                    <div class="card" id="card">

                        <!-- Card header -->
                        <div>



                            <div class="row align-items-center">

                                <div class="col-7">

                                    <h3 class="pl-1 mb-0">Customers</h3>
                                </div>

                                <div class="col-5 text-right">

                                    <button href="" class=" mt-3 mb-3 mr-2 pr-3 btn btn-icon   btn-default btn-sm"
                                        type="button" data-toggle="modal" data-target="#modal-import">
                                        <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                                        <span class="btn-inner--text">Import New Customer</span>
                                    </button>
                                    <button href="" class=" mt-3 mb-3 mr-2 pr-3 btn btn-icon   btn-default btn-sm"
                                        type="button" data-toggle="modal" data-target="#modal-form">
                                        <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                                        <span class="btn-inner--text">Add new Customer </span>
                                    </button>
                                </div>
                            </div>



                            <!-- Light table -->
                            <div id="ajaxrefresh">
                                <div class="table-responsive" id="table">
                                    <table id="targettable" class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" class="sort " data-sort="name">InternetID</th>
                                                <th scope="col" class="sort" data-sort="budget">Name</th>
                                                <th scope="col" class="sort" data-sort="status">Address</th>
                                                <th scope="col" class="sort" data-sort="Locality">Contact</th>
                                                <th scope="col" class="sort" data-sort="Locality">Type</th>
                                                <th scope="col" class="sort" data-sort="Locality">Install Date</th>
                                                <th scope="col" class="sort" data-sort="Locality">Internet</th>
                                                <th scope="col" class="sort" data-sort="Locality">Cable</th>
                                                <th scope="col" class="sort" data-sort="Locality">Status</th>
                                                <th scope="col" class="sort" data-sort="Locality">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody class="list">

                                            @foreach ($Customers as $Customer)
                                                <tr id="{{$Customer->id}}">
                                                <th scope="row" id="{{$Customer->id}}-internetId">
                                                        <div class="media-body">
                                                            <i class="bg-warning"></i>
                                                            <span class="name mb-0 text-sm" min="1" max="12">
                                                                {{ $Customer->connections->internetId }}</span>
                                                        </div>
                                                    </th>
                                                    <td class="budget" id="{{$Customer->id}}-name">
                                                        {{ $Customer->name }}
                                                    </td>
                                                    <td id="{{$Customer->id}}-address" >
                                                        <span class="badge badge-dot mr-4">
                                                        <span id="{{$Customer->id}}-sub"  hidden>{{ $Customer->connections->Sublocality }}</span>
                                                            <span
                                                                class="status">{{ $Customer->connections->address }}</span>
                                                        </span>
                                                    </td>
                                                    <td id="{{$Customer->id}}-contact">
                                                        <span class="badge badge-dot mr-4">

                                                            <span class="status" id="changex">
                                                                {{ $Customer->connections->contact }}


                                                            </span>
                                                        </span>
                                                    </td>
                                                    <td id="{{$Customer->id}}-type">
                                                        {{ $Customer->connections->connectiontype }}
                                                    </td>
                                                    <td >
                                                        {{ $Customer->connections->installDate }}
                                                    </td>
                                                    <td>
                                                        {{ $Customer->connections->internetdiscont }}
                                                    </td>
                                                    <td>
                                                        {{ $Customer->connections->cablediscount }}
                                                    </td>

                                                <td id="{{{$Customer->id}}}-statuschange">
                                                        {{ $Customer->connections->status }}
                                                    </td>



                                                    <td class="text-right">
                                                        <div class="dropdown">
                                                            <a class="btn btn-sm btn-icon-only text-light" href="#"
                                                                role="button" data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </a>
                                                            <div
                                                                class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                <a class="dropdown-item"  data-toggle="modal" data-target="#modal-form-update"  onclick="Edit({{$Customer->id}})" > Edit </a>
                                                                <a class="dropdown-item"   onclick="status({{$Customer->id}},'active')" >Active</a>
                                                                <a class="dropdown-item"  data-toggle="modal" data-target="#modal-deactivate"  onclick="status({{$Customer->id}},'deactive')">Deactive</a>
                                                                <a class="dropdown-item"   onclick="status({{$Customer->id}},'delete')">Delete</a>
                                                                <a class="dropdown-item"  >Collection</a>
                                                                <a class="dropdown-item"  >profile</a>
                                                                <a class="dropdown-item"  >print</a>

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
                    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form"
                        aria-hidden="true">
                        <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">

                                <div class="modal-body p-0">


                                    <div class="card bg-secondary shadow border-0">

                                        <div class="card-body px-lg-5 py-lg-5">
                                            <div class="text-center text-muted mb-4">
                                                <small>Customers </small>
                                            </div>
                                            <div class="alert alert-danger print-error-msg" style="display:none">

                                                <ul></ul>
                                            </div>

                                            <form action="" method="post" id="target-form" name="target-form">
                                                <div class="col-md-12">

                                                    <div class="form-row ">
                                                        <div class="col-md-3">
                                                            <div class="form-group ">
                                                                <label>Internet ID</label>
                                                                <input type="text" class="form-control" id="txtNic"
                                                                    placeholder="Internet ID" maxlength="15"
                                                                    name="internetId"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group ">
                                                                <label>Sublocality</label>



                                                                <select id="cmbSubLocality" class="form-control"
                                                                    name="Sublocality">

                                                                    @foreach ($location as $loc)
                                                                        <option value="{{ $loc->id }}">
                                                                            {{ $loc->sublocality }}</option>

                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <label>Name</label>
                                                                <input type="text" class="form-control" id="txtName"
                                                                    placeholder="Name" name="name" required>
                                                            </div>
                                                        </div>


                                                    </div>

                                                    <div class="row ">

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Mobile</label>
                                                                <input type="text" class="form-control" maxlength="11"
                                                                    name="txtPhone1" id="txtPhone1" required
                                                                    onkeypress="javascript:return checkNumber(event)">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Mobile 2</label>
                                                                <input type="text" class="form-control" maxlength="11"
                                                                    id="txtPhone2" name="txtPhone2" placeholder="Phone2"

                                                                    onkeypress="javascript:return checkNumber(event)">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <label>Address</label>
                                                                <input type="text" class="form-control" id="txtAddress"
                                                                    placeholder="Address" name="address" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row ">


                                                        <div class="col-md-3">
                                                            <div class="form-group ">
                                                                <label>Installation amount</label>
                                                                <input type="number" maxlength="9" class="form-control"
                                                                    id="txtInstalAmount" name="installationAmount"
                                                                    value='0'
                                                                    onkeypress="javascript:return checkNumber(event)">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group ">
                                                                <label>Other Amount </label>
                                                                <input type="number" maxlength="9" class="form-control"
                                                                    id="txtOtherAmt" name="otherAmount" value='0'
                                                                    onkeypress="javascript:return checkNumber(event)">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Wifi Amount</label>
                                                                <input class="form-control" type="number" list="sublocality"
                                                                    name="wifiAmount" id="wifiAmount" autocomplete="off"
                                                                    onkeypress="javascript:return checkNumber(event)" />
                                                                <datalist id="sublocality">
                                                                    <option value="0"> Free</option>
                                                                </datalist>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Wire Amount</label>

                                                                <input class="form-control" type="number" list="sublocality"
                                                                    name="wireAmount" id="wireAmount" autocomplete="off"
                                                                    onkeypress="javascript:return checkNumber(event)" />
                                                                <datalist id="sublocality">
                                                                    <option value="0"> Free</option>
                                                                </datalist>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group ">
                                                                        <label>Installation Date</label>
                                                                        <input type="date" class="form-control datepicker-1"
                                                                            id="txtDtAddDate" maxlength="10"
                                                                            name="installationDate"
                                                                            required
                                                                            data-provide="datepicker">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group ">
                                                                        <label>Recharge Date</label>
                                                                        <input type="date" class="form-control datepicker-1"
                                                                            id="txtDtReDate" maxlength="10"
                                                                            required
                                                                            name="rechargeDate" data-provide="datepicker">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group ">
                                                                        <label>Providers</label>
                                                                        <select id="cmbConPro" class="form-control"
                                                                            name="provider"
                                                                            >
                                                                            <option value="0">Select the Message</option>
                                                                            <option value="CLICK" pick="">CLICK PICK
                                                                            </option>
                                                                            <option value="COMSATS">COMSATS</option>
                                                                            <option value="CONCTEL">CONCTEL</option>
                                                                            <option value="CONNECT">CONNECT</option>
                                                                            <option value="DREAM">DREAM</option>
                                                                            <option value="EBONE">EBONE</option>
                                                                            <option value="FARIYA">FARIYA</option>
                                                                            <option value="FIBERISH">FIBERISH</option>
                                                                            <option value="FIBERLINK">FIBERLINK</option>
                                                                            <option value="GALAXY">GALAXY</option>
                                                                            <option value="HOMENET">HOMENET</option>
                                                                            <option value="K.K.NET">K.K.NET</option>
                                                                            <option value="LEO">LEO</option>
                                                                            <option value="MULTINET">MULTINET</option>
                                                                            <option value="NATION">NATION</option>
                                                                            <option value="NATIONAL" broadband="">NATIONAL
                                                                                BROADBAND</option>
                                                                            <option value="NAYATEL">NAYATEL</option>
                                                                            <option value="NETON">NETON</option>
                                                                            <option value="NETSOL">NETSOL</option>
                                                                            <option value="OPTIX">OPTIX</option>
                                                                            <option value="SKYNET">SKYNET</option>
                                                                            <option value="TRANSWORLD">TRANSWORLD</option>
                                                                            <option value="VISION">VISION</option>
                                                                            <option value="WANCOM">WANCOM</option>
                                                                            <option value="WORLDCALL">WORLDCALL</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                        <label>Connection Type</label>
                                                                        <select id="cmbConType" class="form-control"
                                                                            name="type">
                                                                            <option value="Both">Both</option>
                                                                            <option value="Internet">Internet</option>
                                                                            <option value="Cable">TV Cable</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                        <label>Box Number</label>
                                                                        <input type="text" maxlength="9"
                                                                            class="form-control" id="txtboxno"
                                                                            placeholder="Box Number" name="box" required=""
                                                                            onkeypress="javascript:return checkNumber(event)">
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
                                                                        <select name="cmbPackage" id="cmbPackage"
                                                                            class="form-control" placeholder="package">
                                                                            <option value="0">Select the Package </option>
                                                                            @foreach ($cablePkg as $cblPkg)
                                                                                <option
                                                                                    value="{{ $cblPkg->package }}-{{ $cblPkg->price }}">
                                                                                    {{ $cblPkg->package }} </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group ">
                                                                        <label>Discount </label>
                                                                        <input name='txtAmount' type="number" maxlength="9"
                                                                            class="form-control" id="txtAmount"
                                                                            placeholder="Amount" required=""
                                                                            onkeypress="javascript:return checkNumber(event)"
                                                                            value="0">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group ">
                                                                        <label>Pkg-Internet </label>
                                                                        <select name="cmbPackageint" id="cmbPackageint"
                                                                            class="form-control" placeholder="package">
                                                                            <option value="0">Select the Package </option>
                                                                            @foreach ($internetPkg as $intPkg)
                                                                                <option
                                                                                    value="{{ $intPkg->package }}-{{ $intPkg->price }}">
                                                                                    {{ $intPkg->package }}
                                                                                </option>
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
                                                                        <input name="txtAmountint" type="number"
                                                                            maxlength="9" class="form-control"
                                                                            id="txtAmountint" placeholder="Amount"
                                                                            required=""
                                                                            onkeypress="javascript:return checkNumber(event)"
                                                                            value='0'>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="form-group ">
                                                                        <label>Email </label>
                                                                        <input type="email" class="form-control" id="email"
                                                                            placeholder="email" required name="email">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>


                                                    <div class="text-right mrg-top-15">
                                                        <button type="reset" id="btncancel"
                                                            class="btn btn-danger">Cancel</button>
                                                        <button type="submit" id="btnSave"
                                                            class="btn btn-info"  >Submit</button>
                                                    </div>

                                                    <button hidden="" id="hidemodle" data-dismiss="modal">

                                                    </button>
                                                </div>

                                            </form>


                                        </div>
                                    </div>




                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                {{-- end modal --}}

                {{-- modal (import) --}}
                <div class="col-md-4">
                    {{-- <button type="button" class="btn btn-block btn-default" data-toggle="modal" data-target="#modal-form">Form</button> --}}
                    <div class="modal fade" id="modal-import" tabindex="-1" role="dialog" aria-labelledby="modal-import"
                        aria-hidden="true">
                        <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">

                                <div class="modal-body p-0">


                                    <div class="card bg-secondary shadow border-0">

                                        <div class="card-body px-lg-5 py-lg-5">
                                            <div class="text-center text-muted mb-4">
                                                <h3>Import Customer through excel file </h3>
                                                <small><strong>Accepted Extensions: .xlsx , .xls, .csv</strong></small>
                                            </div>
                                            <form action="{{ route('store') }}" method="post" id="target" name="target"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="file" name="file" class="form-control"
                                                        accept=".xlsx, .xls, .csv" required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" value="Submit"
                                                        class="form-control btn btn-primary">

                                                </div>
                                            </form>
                                                <div class="pt--7 pt-5 border-top">
                                                    <a href="{{asset('Customers_Import.xlsx')}}" download>
                                                        <i class="fas fa-file-excel text-success">Customers csv format download</i>
                                                    </a>
                                                </div>

                                        </div>
                                    </div>




                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                {{-- end modal --}}

                   {{-- modal update customer --}}
                   <div class="col-md-4">
                    {{-- <button type="button" class="btn btn-block btn-default" data-toggle="modal" data-target="#modal-form">Form</button> --}}
                    <div class="modal fade" id="modal-form-update" tabindex="-1" role="dialog" aria-labelledby="modal-form-update"
                        aria-hidden="true">
                        <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">

                                <div class="modal-body p-0">


                                    <div class="card bg-secondary shadow border-0">

                                        <div class="card-body px-lg-5 py-lg-5 pt-0 mt-0">


                                        <form action="{{route('customer.update')}}" method="get" id="target-form-update" name="target-form">
                                                <div class="col-md-12">

                                                    <div class="form-row ">
                                                        <div class="col-md-3">
                                                            <div class="form-group ">
                                                                <label>Internet ID</label>
                                                            <input type="text" class="form-control" id="update-txtNic"
                                                                    placeholder="Internet ID" maxlength="15"
                                                                    name="internetId"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group ">
                                                                <label>Sublocality</label>



                                                                <select id="update-cmbSubLocality" class="form-control"
                                                                    name="Sublocality">

                                                                    @foreach ($location as $loc)
                                                                        <option value="{{ $loc->id }}">
                                                                            {{ $loc->sublocality }}</option>

                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <label>Name</label>
                                                                <input type="text" class="form-control" id="update-txtName"
                                                                    placeholder="Name" name="name" required>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" id="aasdjaIdsas" name="aasdjaIdsas">
                                                        <input type="hidden" id="nill" name="nill">


                                                    </div>

                                                    <div class="row ">

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Mobile</label>
                                                                <input type="text" class="form-control" maxlength="11"
                                                                    name="txtPhone1" id="update-txtPhone1" required
                                                                   >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Mobile 2</label>
                                                                <input type="text" class="form-control" maxlength="11"
                                                                    id="update-txtPhone2" name="txtPhone2" placeholder="Phone2"

                                                                    onkeypress="javascript:return checkNumber(event)">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <label>Address</label>
                                                                <input type="text" class="form-control" id="update-txtAddress"
                                                                    placeholder="Address" name="address" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row ">


                                                        <div class="col-md-3">
                                                            <div class="form-group ">
                                                                <label>Installation amount</label>
                                                                <input type="number" maxlength="9" class="form-control"
                                                                    id="update-txtInstalAmount" name="installationAmount"
                                                                    value='0'
                                                                    onkeypress="javascript:return checkNumber(event)">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group ">
                                                                <label>Other Amount </label>
                                                                <input type="number" maxlength="9" class="form-control"
                                                                    id="update-txtOtherAmt" name="otherAmount" value='0'
                                                                    onkeypress="javascript:return checkNumber(event)">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Wifi Amount</label>
                                                                <input class="form-control" type="number" list="sublocality"
                                                                    name="wifiAmount" id="update-wifiAmount" autocomplete="off"
                                                                    onkeypress="javascript:return checkNumber(event)" />
                                                                <datalist id="update-sublocality">
                                                                    <option value="0"> Free</option>
                                                                </datalist>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Wire Amount</label>

                                                                <input class="form-control" type="number" list="sublocality"
                                                                    name="wireAmount" id="update-wireAmount" autocomplete="off"
                                                                    onkeypress="javascript:return checkNumber(event)" />
                                                                <datalist id="update-sublocality">
                                                                    <option value="0"> Free</option>
                                                                </datalist>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group ">
                                                                        <label>Installation Date</label>
                                                                        <input  type="date" class=" pl-0 pr-0 form-control datepicker-1"
                                                                            id="update-txtDtAddDate" maxlength="10"
                                                                            name="installationDate"
                                                                            required
                                                                            data-provide="datepicker">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group ">
                                                                        <label>Recharge Date</label>
                                                                        <input type="date" class="form-control datepicker-1"
                                                                            id="update-txtDtReDate" maxlength="10"
                                                                            required
                                                                            name="rechargeDate" data-provide="datepicker">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group ">
                                                                        <label>Providers</label>
                                                                        <select id="update-cmbConPro" class="form-control"
                                                                            name="provider"
                                                                            >
                                                                            <option value="0">Select the Message</option>
                                                                            <option value="CLICK" pick="">CLICK PICK
                                                                            </option>
                                                                            <option value="COMSATS">COMSATS</option>
                                                                            <option value="CONCTEL">CONCTEL</option>
                                                                            <option value="CONNECT">CONNECT</option>
                                                                            <option value="DREAM">DREAM</option>
                                                                            <option value="EBONE">EBONE</option>
                                                                            <option value="FARIYA">FARIYA</option>
                                                                            <option value="FIBERISH">FIBERISH</option>
                                                                            <option value="FIBERLINK">FIBERLINK</option>
                                                                            <option value="GALAXY">GALAXY</option>
                                                                            <option value="HOMENET">HOMENET</option>
                                                                            <option value="K.K.NET">K.K.NET</option>
                                                                            <option value="LEO">LEO</option>
                                                                            <option value="MULTINET">MULTINET</option>
                                                                            <option value="NATION">NATION</option>
                                                                            <option value="NATIONAL" broadband="">NATIONAL
                                                                                BROADBAND</option>
                                                                            <option value="NAYATEL">NAYATEL</option>
                                                                            <option value="NETON">NETON</option>
                                                                            <option value="NETSOL">NETSOL</option>
                                                                            <option value="OPTIX">OPTIX</option>
                                                                            <option value="SKYNET">SKYNET</option>
                                                                            <option value="TRANSWORLD">TRANSWORLD</option>
                                                                            <option value="VISION">VISION</option>
                                                                            <option value="WANCOM">WANCOM</option>
                                                                            <option value="WORLDCALL">WORLDCALL</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                        <label>Connection Type</label>
                                                                        <select id="update-cmbConType" class="form-control"
                                                                            name="type">
                                                                            <option value="Both">Both</option>
                                                                            <option value="Internet">Internet</option>
                                                                            <option value="Cable">TV Cable</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                        <label>Box Number</label>
                                                                        <input type="text" maxlength="9"
                                                                            class="form-control" id="update-txtboxno"
                                                                            placeholder="Box Number" name="box" required=""
                                                                            onkeypress="javascript:return checkNumber(event)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row ">
                                                        <div class="col-md-6 cable" id="update-rwCable">
                                                            <div class="row ">
                                                                <div class="col-md-4">
                                                                    <div class="form-group ">
                                                                        <label>Pkg-Cable </label>
                                                                        <select name="cmbPackage" id="update-cmbPackage"
                                                                            class="form-control" placeholder="package">
                                                                            <option value="0">Select the Package </option>
                                                                            @foreach ($cablePkg as $cblPkg)
                                                                                <option
                                                                                    value="{{ $cblPkg->package }}-{{ $cblPkg->price }}">
                                                                                    {{ $cblPkg->package }} </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group ">
                                                                        <label>Discount </label>
                                                                        <input name='txtAmount' type="number" maxlength="9"
                                                                            class="form-control" id="update-txtAmount"
                                                                            placeholder="Amount" required=""
                                                                            onkeypress="javascript:return checkNumber(event)"
                                                                            value="0">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group ">
                                                                        <label>Pkg-Internet </label>
                                                                        <select name="cmbPackageint" id="update-cmbPackageint"
                                                                            class="form-control" placeholder="package">
                                                                            <option value="0">Select the Package </option>
                                                                            @foreach ($internetPkg as $intPkg)
                                                                                <option
                                                                                    value="{{ $intPkg->package }}-{{ $intPkg->price }}">
                                                                                    {{ $intPkg->package }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6 internet" id="update-rwInternet">
                                                            <div class="row ">
                                                                <div class="col-md-4">
                                                                    <div class="form-group ">
                                                                        <label>Discount </label>
                                                                        <input name="txtAmountint" type="number"
                                                                            maxlength="9" class="form-control"
                                                                            id="update-txtAmountint" placeholder="Amount"
                                                                            required=""
                                                                            onkeypress="javascript:return checkNumber(event)"
                                                                            value='0'>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="form-group ">
                                                                        <label>Email </label>
                                                                        <input type="email" class="form-control" id="update-email"
                                                                            placeholder="email" required name="email">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <span class="col-6">
                                                            <span>
                                                            Cable pkg=<span id="cp"></span> <br>
                                                            </span>
                                                            <span>
                                                                Cable pkg=<span id="cpp"></span> <br>
                                                            </span>
                                                            <span>
                                                            Discount =<span id="cpd"></span> <br>
                                                            </span>
                                                            <span>
                                                                After =<span id="cpa"></span> <br>
                                                            </span>
                                                        </span>

                                                        <span class="col-6">
                                                            <span>
                                                            Internet pkg=<span id="ip"></span> <br>
                                                            </span>
                                                            <span>
                                                                Internet pkg=<span id="ipp"></span> <br>
                                                            </span>
                                                            <span>
                                                            Discount =<span id="ipd"></span> <br>
                                                            </span>
                                                            <span>
                                                                After =<span id="ipa"></span> <br>
                                                            </span>
                                                         </span>

                                                    </div>
                                                    <div class="text-right mrg-top-15">

                                                        <button type="submit" id="update-btnSave"
                                                            class="btn btn-info">Submit</button>
                                                    </div>

                                                    <button hidden="" id="update-hidemodle" data-dismiss="modal">

                                                    </button>
                                                </div>

                                            </form>


                                        </div>
                                    </div>




                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                {{-- end modal --}}


                <!-- Modal deactivate-->
            <div class="modal fade" id="modal-deactivate" tabindex="-1" role="dialog" aria-labelledby="modal-deactivateeLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="modal-deactivatelLabel">Details for Deactivation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                            <form role="form" id="Deactiave-update" autocomplete="off" _lpchecked="1" method="post" action="{{route('Deactiave.update')}}">
                                    <div class="form-row ">
                                        <div class="col-md-3">
                                            <div class="form-group ">
                                                <label>ID</label>
                                                <input name="id" type="text" class="form-control" placeholder="ID" id="txtcnnID" readonly="">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group ">
                                                <label>Name</label>
                                                <input name="name" type="text" class="form-control" placeholder="Name" id="txtcnnName" readonly="">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group ">
                                                <label>Address</label>
                                                <input  name="address" type="text" class="form-control" placeholder="Address" id="txtcnnAddress" readonly="">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group ">
                                                <label>Cell/Ph</label>
                                                <input  name="cell"  type="text" class="form-control" placeholder="Cell #" id="txtcnnCell" readonly="">
                                            </div>
                                        </div>
                                        <input hidden name="sb"id="sb" />
                                        <input type="hidden" id="tp" name="tp">
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label>Leaving Date</label>
                                                <input required name="ldate" type="date" class="form-control datepicker-1" id="dtcnnLeaving" data-provide="datepicker" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label>Leaving Reason</label>
                                        <input list="browsers" name="browser" id="browser" class="form-control datepicker-1">
                                            <datalist id="browsers">
                                                    <option value="Temporary close">
                                                    <option value="Shift from Current House">
                                                    <option value="Block Due to the payments">
                                                    <option value="Card expired">
                                            </datalist>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label>Other Comments</label>
                                                <input type="text" class="form-control" placeholder="Enter any Comments" id="txtcnnComnt" name="txtcnnComnt">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="text-right mrg-top-15">
                                        <input type="submit"  value="Save" class="btn btn-info">
                                    </div>
                                </form>
                                <button hidden="" id="hidemodlexy" data-dismiss="modal">

                            </button></div>
                        </div>
                    </div>

                </div>
                </div>
            </div>

            </div>
            @include('layouts.footers.auth')
        </div>
        <script>
            function checkNumber(evt) {
                var iKeyCode = (evt.which) ? evt.which : evt.keyCode
                if (iKeyCode < 48 || iKeyCode > 57) {
                    return false;
                } else {
                    return true;
                }
            }

        </script>
        <script>
            $('#target-form').on('submit', function(event) {

                event.preventDefault();
                var data = $('#target-form').serialize();
                //  alert('life');
                //  console.log(data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: '{{ route('createCustomersUsers') }}',
                    data: data,
                    success: function(results) {
                        // console.log(results)
                        if($.isEmptyObject(results.error)){

                                 $('#modal-form').modal('hide');
                            $('#ajaxrefresh').load(' #table');

                            // console.log(data);
                            $(".header-body").append(
                            '<div  class="popup alert alert-default" role="alert"><span class="alert-inner--icon"><i class="ni ni-like-2"></i></span><span class="alert-inner--text"><strong>' +
                                results.success + '</strong> created successfully</span></div>');

                            }else{
                                $(".print-error-msg").find("ul").html('');

                                $(".print-error-msg").css('display','block');

                            $.each( results.error, function( key, value ) {

                                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                                console.log(value)
                            });

                            }



                    }
                      //Laravel validation error function



                }); // end ajax


            //popup close after 5 seconds
                setTimeout(function() {
                    $('.popup').remove();
                }, 5000);
            });

        </script>
        <script>
function typeCheck(type){
    var selected = type;

if (selected == 'Internet') {

    $("#cmbPackage").prop("disabled", true);
    $("#txtAmount").prop("disabled", true);
    $("#cmbPackageint").prop("disabled", false);
    $("#txtAmountint").prop("disabled", false);
    $("#cmbPackage").value = "0"
    $("#txtAmount").value = "0"
} else if (selected == 'TV Cable') {
    $("#cmbPackage").prop("disabled", false);
    $("#txtAmount").prop("disabled", false);
    $("#cmbPackageint").prop("disabled", true);
    $("#txtAmountint").prop("disabled", true);
    $("#cmbPackageint").value = "0";
    $("#txtAmountint").value = "0";
    // document.getElementById("cmbPackageint").innerHTML='';
    // document.getElementById("txtAmountint").innerHTML='';

} else {

    $("#cmbPackage").prop("disabled", false);
    $("#txtAmount").prop("disabled", false);
    $("#cmbPackageint").prop("disabled", false);
    $("#txtAmountint").prop("disabled", false);

}
}
function typeCheckUpdate(type){
    var selected = type;

    if (selected == 'Internet') {
            console.log('update='+selected);
            $("#update-cmbPackage").prop("disabled", true);
            $("#update-txtAmount").prop("disabled", true);
            $("#update-cmbPackageint").prop("disabled", false);
            $("#update-txtAmountint").prop("disabled", false);
            $("#cmbPackage").value = "0"
            $( "#update-txtAmount").value = "0"
            } else if (selected == 'TV Cable') {
                console.log(selected);
            $("#update-cmbPackage").prop("disabled", false);
            $("#update-txtAmount").prop("disabled", false);
            $("#update-cmbPackageint").prop("disabled", true);
            $("#update-txtAmountint").prop("disabled", true);
            $("#update-cmbPackageint").value = "0";
            $("#update-txtAmountint").value = "0";
            // document.getElementById("cmbPackageint").innerHTML='';
            // document.getElementById("txtAmountint").innerHTML='';

            } else {
                console.log(selected);
            $("#update-cmbPackage").prop("disabled", false);
            $("#update-txtAmount").prop("disabled", false);
            $("#update-cmbPackageint").prop("disabled", false);
            $("#update-txtAmountint").prop("disabled", false);

            }


}
            $('#cmbConType').on('change', function(e) {

                var selected = $("#cmbConType option:selected").text();

                typeCheck(selected);


            });

            $('#update-cmbConType').on('change', function(e) {

                 var selected = $("#update-cmbConType option:selected").text();
                 typeCheckUpdate(selected);



            });

        </script>
        <script>
             $(document).ready(function() {
                $('#targettable').DataTable( {


                } );
            } );
        </script>

        <script>
          function  Edit(id,internet){
            console.log(internet);
            console.log('Edit');
            console.log(id);

            $.ajax({
                    type: 'GET',
                    url: '{{ route('show') }}',
                    data: {'id': id},

                    success: function(results) {
                        console.log(results);

                        // $("#update-txtNic").value =results.internetId ;
                        document.getElementById('update-txtNic').value=results[0].internetId;
                        document.getElementById('update-cmbSubLocality').value=results[0].Sublocality;
                        document.getElementById('update-txtAddress').value=results[0].address;
                        document.getElementById('update-txtboxno').value=results[0].boxNumber;
                        document.getElementById('aasdjaIdsas').value=id;
                        document.getElementById('nill').value=results[0].id;


                        document.getElementById('update-txtAmount').value=results[0].cablePrice-results[0].cablediscount;
                        document.getElementById('update-cmbPackage').value=results[0].cablePackage+'-'+results[0].cablePrice;

                        document.getElementById('update-txtName').value=results[0].name;
                        // document.getElementById('update-txtNic').value=results[0].company_id;
                        document.getElementById('update-cmbConPro').value=results[0].connectionProvider;
                        document.getElementById('update-cmbConType').value=results[0].connectiontype;
                        document.getElementById('update-txtPhone1').value=results[0].contact;
                        document.getElementById('update-txtPhone2').value=results[0].contact2;
                        document.getElementById('update-email').value=results[0].email;
                        document.getElementById('update-txtDtAddDate').value=results[0].installDate;
                        document.getElementById('update-txtDtReDate').value=results[0].rechargeDate;
                        document.getElementById('update-txtInstalAmount').value=results[0].installationAmount;
                        document.getElementById('update-cmbPackageint').value=results[0].internetPackage+'-'+results[0].internetPrice;
                        document.getElementById('update-txtAmountint').value=results[0].internetPrice-results[0].internetdiscont;
                        document.getElementById('update-txtOtherAmt').value=results[0].otherAmount;
                        document.getElementById('update-wifiAmount').value=results[0].wifiAmount;
                        document.getElementById('update-wireAmount').value=results[0].wireAmount;
                        document.getElementById('ip').innerHTML=results[0].internetPackage;
                        document.getElementById('ipp').innerHTML=results[0].internetPrice;
                        document.getElementById('ipd').innerHTML=results[0].internetPrice-results[0].internetdiscont;
                        document.getElementById('ipa').innerHTML=results[0].internetdiscont;
                        document.getElementById('cp').innerHTML=results[0].cablePackage;
                        document.getElementById('cpp').innerHTML=results[0].cablePrice;
                        document.getElementById('cpd').innerHTML=results[0].cablePrice-results[0].cablediscount;
                        document.getElementById('cpa').innerHTML=results[0].cablediscount;
                        // var selected = $("#update-cmbConType").value();
                        var selected =document.getElementById('update-cmbConType').value
                        typeCheckUpdate(selected);




                    },
                    Error: function(results) {
                        console.log(results);

                    }
                      //Laravel validation error function



                });
           }
        </script>

<script>
    $('#target-form-update').on('submit', function(event) {

        event.preventDefault();
        var data = $('#target-form-update').serialize();
        //  alert('life');
         id=document.getElementById('aasdjaIdsas').value;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'post',
            url: '{{ route('customer.update') }}',
            data: data,
            success: function(value) {
                // console.log('testingupdate'+values);

                $('#modal-form-update').modal('hide');
                // $('#ajaxrefresh').load(' #table');
                document.getElementById(id).innerHTML='<th>' + value.internetId + '</th><td>' + value.name + '</td><td>' + value.address + '</td><td>' +value.contact+'</td><td>'+value.connectiontype+'</td><td>'+value.installDate+'</td><td>'+value.internetdiscont+'</td><td>'+value.cablediscount+'</td><td>'+value.status+'</td>'+' <td class="bg-success text-right"><div class="dropdown"><a class="btn btn-sm btn-icon-only text-light"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a><div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow"><a class="dropdown-item"  data-toggle="modal" data-target="#modal-form-update" onclick="Edit('+id+')" >Edit</a><a class="dropdown-item" onclick="status('+id+',active)" >Active</a><a class="dropdown-item" >Deactive</a><a class="dropdown-item" >Delete</a><a class="dropdown-item" >Collection</a><a class="dropdown-item" >Profile</a><a class="dropdown-item" >print</a><a class="dropdown-item" href="#">Delete</a></div></div></td>';

            }
              //Laravel validation error function



        }); // end ajax


    //popup close after 5 seconds
        setTimeout(function() {
            $('.popup').remove();
        }, 5000);
    });

</script>

<script>

    function status(id,desicion){
        idd=id
        customerId=document.getElementById(idd+'-internetId').value;

        name=document.getElementById(idd+'-name').textContent;
        address=document.getElementById(idd+'-address').textContent;
        contact=document.getElementById(idd+'-contact').textContent;
        sub=document.getElementById(idd+'-sub').textContent;
        type=document.getElementById(idd+'-type').textContent;

console.log('type='+type.toString().trim());

        document.getElementById('sb').value=sub;
        document.getElementById('txtcnnID').value=idd;
        customerName=document.getElementById('txtcnnName').value=name.toString().trim();
        document.getElementById('txtcnnAddress').value=address.toString().trim();
        document.getElementById('txtcnnCell').value=contact.toString().trim();
        document.getElementById('tp').value=type.toString().trim();




        console.log(id+desicion);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'post',
            url: '{{ route('customer.changestatus') }}',
            data: {
                'id': id,
                'desicion':desicion,
                'name':customerName
            },
            success: function(results) {
                console.log(results);

                if(results== 'active'){
                console.log(results+' '+' #'+id);

                document.getElementById(id+'-statuschange').innerHTML='<th>Active</th>';
                }else if(results== 'deactive'){
                    document.getElementById(id+'-statuschange').innerHTML='<th>Deactive</th>';
                }else if(results== 'delete'){
                    document.getElementById(id).remove();

                }



            }
              //Laravel validation error function



        });

    }
</script>


<script>

    $('#Deactiave-update').on('submit', function(event) {
        // $("#btnSubmit").prop("disabled", true);

        event.preventDefault();
        var data = $('#Deactiave-update').serialize();
        // console.log(data);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'post',
            url: '{{ route('Deactiave.update') }}',
            data: data,
            success: function(value) {
                console.log('testingupdate'+value);

                $('#modal-deactivate').modal('hide');
                // $('#ajaxrefresh').load(' #table');
                // document.getElementById(id).innerHTML='<th>' + value.internetId + '</th><td>' + value.name + '</td><td>' + value.address + '</td><td>' +value.contact+'</td><td>'+value.connectiontype+'</td><td>'+value.installDate+'</td><td>'+value.internetdiscont+'</td><td>'+value.cablediscount+'</td><td>'+value.status+'</td>'+' <td class="bg-success text-right"><div class="dropdown"><a class="btn btn-sm btn-icon-only text-light"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a><div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow"><a class="dropdown-item"  data-toggle="modal" data-target="#modal-form-update" onclick="Edit('+id+')" >Edit</a><a class="dropdown-item" onclick="status('+id+',active)" >Active</a><a class="dropdown-item" >Deactive</a><a class="dropdown-item" >Delete</a><a class="dropdown-item" >Collection</a><a class="dropdown-item" >Profile</a><a class="dropdown-item" >print</a><a class="dropdown-item" href="#">Delete</a></div></div></td>';

            }
              //Laravel validation error function



        }); // end ajax


    //popup close after 5 seconds

    });

</script>



    @endsection

    @push('js')
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    @endpush
