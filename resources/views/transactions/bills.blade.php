@extends('layouts.app')
{{-- {{ dd($locations[1]) }} --}}

@section('content')
   @include('layouts.headers.cards', [
        // 'title' => __('') . ' '.'Important!',
        'description' => __('If a bill has already been created for a customer on the same date, it will simply open and it will not be created again.'),
        'class' => 'col-lg-12'
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
                    {{-- @if(isset($message))
                        <div class=" popup alert alert-success">
                            {{ $message }}
                        </div>
                    @endif --}}
                    <form action="{{route('bills.create')}}" method="POST">
                        @csrf
                            <div class="row bg-gradient-default shadow rounded text-white">
                                <div class="col-md-9">
                                    <div class="row pt-1">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Month</label>
                                                <select name="month" class="form-control" required >
                                                    <option value="" selected="">Select Month</option>
                                                    <option value="January">January</option>
                                                    <option value="Feburay">Feburay</option>
                                                    <option value="March">March</option>
                                                    <option value="April">April</option>
                                                    <option value="May">May</option>
                                                    <option value="June">June</option>
                                                    <option value="July">July</option>
                                                    <option value="August">August</option>
                                                    <option value="September">September</option>
                                                    <option value="October">October</option>
                                                    <option value="November">November</option>
                                                    <option value="Decmeber">Decmeber</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Year</label>
                                                <select name="year" class="form-control" required>
                                                    <option  value="" disabled="" selected="" >Select Year</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                    <option value="2021">2025</option>
                                                    <option value="2022">2026</option>
                                                    <option value="2023">2026</option>
                                                    <option value="2024">2027</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Bills Type</label>
                                                <select name="bill-type" class="form-control"required>
                                                    <option value="" disabled="" selected="" >Select Type</option>
                                                    <option value="Both">Both</option>
                                                    <option value="Cable">Cable</option>
                                                    <option value="Internet">Internet</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group ">
                                                <label>Sublocality</label>
                                                <select name="sublocality" class="form-control"  required>
                                                    <option value="0">All</option>
                                                    @foreach ($locations as $location)
                                                        <option value="{{ $location->id }}-{{ $location->sublocality }}">{{ $location->sublocality }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="row pt-3">
                                        <div class="col-md-6 m-0 p-0">
                                            <label> </label>
                                            <div class=" text-right mrg-top-5">

                                                <button style=" margin-top:-0.3ch; word-wrap: break-word;" name="action" value="create" id="btnCreate" class=" pl-2 pr-2 btn btn-primary w-100"><i class=" pl-0 pr-0 fas fa-plus-square  fa-w-14 fa-1x"></i>Create <br></button>
                                            </div>
                                        </div>

                                        <div class="col-md-6  m-0 p-0">
                                            <label> </label>
                                            <div class=" text-right mrg-top-5">
                                                <button style="margin-top:-0.3ch;   word-wrap: break-word;"  name="action" value="delete" id="btnDelete" class=" pl-2 pr-2 btn btn-danger mb-3 w-100"  ><i class="pl-0 pr-0 fas fa-trash-alt  fa-w-14 fa-1x "></i>  &nbspDelete</button>

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
<div class="mt-5 px-2">
<div class="container-fluid mt--6">
      <div class="row">
        <div class="col p-0 m-0 pt-3">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
            {{-- <h3 class="mb-0">Bill Generated      @if($generatedbill) on <small>{{$generatedbill[0]->created_at}}</small> @endif</h3> --}}
            @if($generatedbill)
                <span>

                <h3 class="mb-0 ">Bill Generated  <a title="Download bill in excel file" href="excel?year={{$generatedbill[0]->year}}&amp;mth={{$generatedbill[0]->month}}&amp;btn-fetch=" rel="noopener" target="_blank" style="float:right" class="  btn btn-success h-50 text-success btn-sm text-white" ><i class="far fa-file-excel"></i></a></h3>
                <div class="tooltip">Hover over me
                    <span class="tooltiptext">Tooltip text</span>
                  </div>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table id="table" class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>

                    <th scope="col pl-1 ml-1">CustID</th>
                    <th scope="col pl-5">Name</th>
                    <th scope="col">Internet Id</th>
                    <th scope="col">Sublocality</th>
                    <th scope="col">Address</th>
                    <th scope="col">Month/Year</th>
                    <th scope="col">Collection Type</th>
                    <th scope="col">Net Amount</th>
                    <th scope="col">recevied</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>


                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
<tr>

         @foreach ($generatedbill as $perUser)
            <tr id="rowinput" >
                    <th scope="row">
                        <div class="media-body">
                            <i class="bg-warning"></i>
                        <span class="name mb-0 text-sm pl-2">  {{ $perUser->id}}</span>
                        </div>
                    </th>
                    <td class="budget">
                    {{ $perUser->name}}
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

                        <span class="completion mr-2"> {{ $perUser->connectiontype}}</span>

                    </td>
                    <td>

                        <span class="completion mr-2"> {{ $perUser->netAmount}}</span>

                    </td>
                    <td>

                        <span class="completion mr-2"> {{ $perUser->recevieAmount}}</span>

                    </td>
                    <td>

                        <span class="completion mr-2"> {{ $perUser->billStatus}}</span>

                    </td>


                    <td class="text-right">
                    <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class=" dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <a class=" dropdown-item" href="#">Edit</a>
                        <a class="dropdown-item" href="#">Delete</a>
                        {{-- <a class="dropdown-item" href="#">Something else here</a> --}}
                        </div>
                    </div>
                    </td>
            </tr>
        @endforeach


</tr>
                </tbody>
              </table>
              @endif
            </div>

            <!-- Card footer -->
            <div class="card-footer py-4 pt-5 mt-5">
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

//time for popup dive
    // setTimeout(function(){
    // $('.popup').remove();
    // }, 10000);
    // fitText(document.querySelector("action"), 0.38);
</script>
{{-- excel file cdn and function --}}
{{-- <script src=
"//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js">
</script>
<script>

       $(".table").table2excel({
           filename: "attendanceSheet.xls"
       });

   </script> --}}
{{-- end of excel file cdn and function --}}
@endsection

