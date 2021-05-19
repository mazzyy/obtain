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

</style>

    <div class="mt-2 px-2 ">
        <div class="card-block">
            <div class="container-fluid mt--7 mrg-top-20">
                <div class="row ">
                    <div class="col-md-12 ml-auto mr-auto">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="form-group ">
                                            <div class="card-heading">
                                                <h4 class="card-title">User Collections</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group ">
                                            <input id="idName" class="form-control mrg-top-10" onkeypress="javascript:return isNumber(event)" type="text" style="border:solid 1px;" autocomplete="off" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class=" mrg-top-10"></div>
                                        <div class="form-group ">
                                            <button id="btnSearchID" type="submit" class="btn btn-info">Search</button>
                                            <button id="btnSearch" class="btn btn-info " type="submit" data-toggle="modal" data-target="#modal-searching">Find</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="table-overflow">
                                        <table class="table table-sm table-hover table-bordered">
                                            <thead>
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
                                            <tbody id="fcol"></tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row" style="margin-top:-30px;">
                                    <div class="col-lg-6 mrg-right-70">
                                        <div class="card-heading  ">
                                            <h4 class="card-title"></h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 text-right">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <button id="btnpop" type="button" class="btn btn-raised btn-success"><i class="fa fa-check"></i> Receiving</button>
                                                        <button hidden="" data-toggle="modal" data-target="#modal-receiving" data-original-title="" id="btnpop2" type="button" class="btn btn-raised btn-success disabled"><i class="fa fa-check"></i> Receiving</button>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
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
<div class="mt-5 px-2">
<div class="container-fluid mt--6">
      <div class="row">
        <div class="col p-0 m-0 pt-3">

        </div>
      </div>

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
<script >


@endsection

