@extends('layouts.app')
{{-- {{ dd($locations[1]) }} --}}

@section('content')
    @include('layouts.headers.cards')


    <div class="mt-2 px-2 ">
        <div class="card-block">
            <div class="mrg-top-20">
                <div class="row">
                    <div class="col-md-12 ml-auto mr-auto">
                    <form action="{{route('bills.create')}}" method="get">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Month</label>
                                                <select name="month" class="form-control ">
                                                    <option value="0" disabled="" selected="">Select Month</option>
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
                                                <select name="year" class="form-control">
                                                    <option value="0" disabled="" selected="">Select Year</option>
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
                                                <select name="bill-type" class="form-control">
                                                    <option value="0" disabled="" selected="">Select Type</option>
                                                    <option value="Both">Both</option>
                                                    <option value="Cable">Cable</option>
                                                    <option value="Internet">Internet</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group ">
                                                <label>Sublocality</label>
                                                <select name="sublocality" class="form-control" >
                                                    <option value="0">All</option>
                                                    @foreach ($locations as $location)
                                                        <option value="{{ $location->id }}">{{ $location->sublocality }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label> </label>
                                            <div class="text-right mrg-top-5">
                                                <button id="btnCreate" class="btn btn-info">Create</button>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label> </label>
                                            <div class="text-right mrg-top-5">
                                                <button id="btnDelete" class="btn btn-danger">Delete</button>
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
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Light table</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>

                    <th scope="col">CustID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Internet Id</th>
                    <th scope="col">Address</th>
                    <th scope="col">Month/Year</th>
                    <th scope="col">Collection Type</th>
                    <th scope="col">Net Amount</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>


                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
<tr>
    @if($generatedbill)
         @foreach ($generatedbill as $location)
            <tr id="rowinput" >
                    <th scope="row">
                        <div class="media-body">
                            <i class="bg-warning"></i>
                        <span class="name mb-0 text-sm">  {{ $location->id}}</span>
                        </div>
                    </th>
                    <td class="budget">
                    {{ $location->name}}
                    </td>
                    <td>
                    <span class="badge badge-dot mr-4">

                        <span class="status">{{ $location->internetId}}</span>
                    </span>
                    </td>


                    <td>

                        {{ $location->address}}
                    </td>
                    <td>

                        <span class="completion mr-2"> {{ $location->month}}-{{ $location->year}}</span>

                    </td>
                    <td class="text-right">
                    <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <a class="dropdown-item" href="#">Edit</a>
                        <a class="dropdown-item" href="#">Delete</a>
                        {{-- <a class="dropdown-item" href="#">Something else here</a> --}}
                        </div>
                    </div>
                    </td>
            </tr>
        @endforeach
    @endif

</tr>
                </tbody>
              </table>
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



@endsection
