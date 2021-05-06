@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    
    <div class="container-fluid mt--7">
        <div class="">
       
            <div class="">
                <div class="col-12 ">
                    
                  <div class="card">
                      
                    <!-- Card header -->
                    <div > 
                   
                      
                        
                        <div class="row align-items-center">
                           
                            <div class="col-8">
                                
                                <h3 class="pl-1 mb-0">Address</h3>
                            </div>
                            <div class="col-4 text-right">
                                
                                <button href=""  class=" mt-3 mb-3 mr-2 pr-3 btn btn-icon   btn-default btn-sm" type="button">
                                    <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                                    <span class="btn-inner--text" data-toggle="modal" data-target="#modal-form">Add new Customer</span>
                                </button>
                            </div>
                        </div>
                  
                    
                    
                    <!-- Light table -->
                    <div class="table-responsive"  >
                      <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col" class="sort" data-sort="name">Id</th>
                            <th scope="col" class="sort" data-sort="budget">Country</th>
                            <th scope="col" class="sort" data-sort="status">City</th>
                           
                            <th scope="col" class="sort" data-sort="Locality">Locality</th>
                            <th scope="col" class="sort" >Sublocality</th>
                            
                            <th scope="col" class="sort" data-sort="completion">Action</th>
                          </tr>
                        </thead>
                        <tbody class="list">
                         
                    {{-- @foreach ($locations as $location)
                          <tr>
                                <th scope="row">
                                    <div class="media-body">
                                        <i class="bg-warning"></i>
                                      <span class="name mb-0 text-sm">  {{ $location->id}}</span>
                                    </div>
                                </th>
                                <td class="budget">
                                   {{ $location->country}}
                                </td>
                                <td>
                                  <span class="badge badge-dot mr-4">
                                  
                                    <span class="status">{{ $location->city}}</span>
                                  </span>
                                </td>
    
                               
                                <td>
                             
                                    {{ $location->locality}}
                                </td>
                                <td>
                                  
                                    <span class="completion mr-2"> {{ $location->sublocality}}</span>
                                  
                                </td>
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
                    @endforeach                             --}}
                        </tbody>
                      </table>
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
              <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                  <div class="modal-content">
                      
                      <div class="modal-body p-0">
                          
                              
          <div class="card bg-secondary shadow border-0">
              
              <div class="card-body px-lg-5 py-lg-5">
                  <div class="text-center text-muted mb-4">
                      <small>New Address </small>
                  </div>
                  <form role="form">

                {{-- country --}}
                      <div class="form-group mb-3">
                          <div class="input-group input-group-alternative">
                              <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-flag"></i></span>
                              </div>
                              
                              <input class="form-control" placeholder="Country" type="text" type="text" list="cars" />
                                <datalist id="cars">
                                <option>Volvo</option>
                                <option>Saab</option>
                                <option>Mercedes</option>
                                <option>Audi</option>
                                </datalist>
                          </div>
                      </div>
                      
                      {{-- City --}}
                      <div class="form-group mb-3">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                            </div>
                            
                            <input class="form-control" placeholder="City" type="text" type="text" list="cars" />
                              <datalist id="cars">
                              <option>Volvo</option>
                              <option>Saab</option>
                              <option>Mercedes</option>
                              <option>Audi</option>
                              </datalist>
                        </div>
                    </div>
                    {{-- locality --}}
                     
                     <div class="form-group mb-3">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                            </div>
                            
                            <input class="form-control" placeholder="locality" type="text" type="text" list="cars" />
                              <datalist id="cars">
                              <option>Volvo</option>
                              <option>Saab</option>
                              <option>Mercedes</option>
                              <option>Audi</option>
                              </datalist>
                        </div>
                    </div>
                    
                      {{-- sublocality --}}
                     
                      <div class="form-group mb-3">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                            </div>
                            
                            <input class="form-control" placeholder="sublocality" type="text" type="text" list="cars" />
                              <datalist id="cars">
                              <option>Volvo</option>
                              <option>Saab</option>
                              <option>Mercedes</option>
                              <option>Audi</option>
                              </datalist>
                        </div>
                    </div>

                   
                      
                      <div class="text-center">
                          <button type="button" class="btn btn-primary my-4">Save</button>
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
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush