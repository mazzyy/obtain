@extends('layouts.app')
@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid mt--7">
        <div class="">

            <div class="">
                <div class="col-12 ">

                    <div class="card">

                        <!-- Card header -->
                        <div>



                            <div class="row align-items-center">

                                <div class="col-8">

                                    <h3 class="pl-1 mb-0">Packages</h3>
                                </div>
                                <div class="col-4 text-right">

                                    <button href="" class=" mt-3 mb-3 mr-2 pr-3 btn btn-icon   btn-default btn-sm"
                                        type="button">
                                        <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                                        <span class="btn-inner--text" data-toggle="modal" data-target="#modal-form">Add new
                                            Package </span>
                                    </button>
                                </div>
                            </div>



                            <!-- Light table -->
                        <div id="ajaxrefresh">
                            <div class="table-responsive" id="table">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>

                                            <th scope="col" class="sort" data-sort="budget">Package</th>
                                            <th scope="col" class="sort" data-sort="status">Type</th>
                                            <th scope="col" class="sort" data-sort="Locality">Price</th>
                                            <th scope="col" class="sort" data-sort="completion">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">

                                        @foreach ($packages as $package)
                                            <tr>
                                                <th scope="row">
                                                    <div class="media-body">
                                                        <i class="bg-warning"></i>
                                                        <span class="name mb-0 text-sm"> {{ $package->package }}</span>
                                                    </div>
                                                </th>
                                                <td class="budget">
                                                    {{ $package->type }}
                                                </td>
                                                <td>
                                                    <span class="badge badge-dot mr-4">

                                                        <span class="status">{{ $package->price }}</span>
                                                    </span>
                                                </td>



                                                <td class="text-right">
                                                    <div class="dropdown">
                                                        <a class="btn btn-sm btn-icon-only text-light" href="#"
                                                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                            <a class="dropdown-item" href="#">Edit</a>
                                                            {{-- <a class="dropdown-item" href="#">Delete</a> --}}
                                                            {{-- <a class="dropdown-item" href="#">Something else here</a> --}}
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
                        <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">New Package</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body p-0">


                                    <div class="card bg-secondary shadow border-0">

                                        <div class="card-body px-lg-5 py-lg-5">
                                            {{-- <div class="text-center text-muted mb-4">
                                                <small>New Package </small>
                                            </div> --}}
                                            <form method="POST" id="pckg-form">
                                                @csrf

                                                {{-- packg name --}}
                                                <div class="form-group mb-3">
                                                    <div class="input-group input-group-alternative">
                                                        {{-- <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-flag"></i></span>
                              </div> --}}
                                                        <input class="form-control" placeholder="Package name" type="text"
                                                            name="pckg-name" required autocomplete="off" />
                                                    </div>
                                                </div>

                                                {{-- Package price --}}
                                                <div class="form-group mb-3">
                                                    <div class="input-group input-group-alternative">
                                                        {{-- <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                            </div> --}}
                                                        <input class="form-control" placeholder="Package price" type="text"
                                                            name="pckg-price" required  autocomplete="off"/>
                                                    </div>
                                                </div>

                                                {{-- Package type --}}
                                                <div class="form-group mb-3">
                                                    <div class="input-group input-group-alternative">
                                                        {{-- <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                            </div> --}}
                                                        {{-- <input class="form-control" placeholder="Package type" type="text" name="pckg-type" /> --}}
                                                        <select name="pckg-type" class="form-control" required>
                                                            <option value="internet">Internet</option>
                                                            <option value="tv">TV</option>
                                                            {{-- <option value="both">Both</option> --}}
                                                        </select>
                                                    </div>
                                                </div>



                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-primary my-4">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <script>
                                        const form = document.getElementById("pckg-form")
                                        form.addEventListener("submit", event => {
                                            event.preventDefault()
                                            const data = $("#pckg-form").serialize()
                                            $.ajax({
                                                type: 'post',
                                                url: '{{ route('packages.store') }}',
                                                data: data,
                                                success: function(results) {
                                                    $('#modal-form').modal('hide');

                                                    $('#ajaxrefresh').load(' #table');
                                                }
                                            })
                                        })

                                    </script>




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
