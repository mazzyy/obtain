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

                                    <h3 class="pl-1 mb-0">New Employee</h3>
                                </div>
                                <div class="col-4 text-right">

                                    <button href="" class=" btn-block mt-3 mb-3 mr-2 pr-3 btn btn-icon   btn-default btn-sm"
                                        type="button" data-toggle="modal" data-target="#modal-form">
                                        <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                                        <span class="btn-inner--text">Add new Employee </span>
                                    </button>
                                </div>
                            </div>



                            <!-- Light table -->
                            <div id="ajaxrefresh">
                                <div class="table-responsive" id="table">
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

                                            @foreach ($Employees as $Employee)
                                                <tr>
                                                    <th scope="row">
                                                        <div class="media-body">
                                                            <i class="bg-warning"></i>
                                                            <span class="name mb-0 text-sm"> {{ $Employee->id }}</span>
                                                        </div>
                                                    </th>
                                                    <td class="budget">
                                                        {{ $Employee->name }}
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-dot mr-4">

                                                            <span class="status">{{ $Employee->email }}</span>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-dot mr-4">

                                                            <span class="status">
                                                                @if ($Employee->role == '1')

                                                                    Admin
                                                                @endif

                                                                @if ($Employee->role == '2')

                                                                    Employee
                                                                @endif

                                                                @if ($Employee->role == '3')

                                                                    Staff
                                                                @endif


                                                            </span>
                                                        </span>
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
                                                                <a class="dropdown-item" href="#">Edit</a>
                                                                <a class="dropdown-item" href="#">Delete</a>
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

                                <div class="modal-body p-0">


                                    <div class="card bg-secondary shadow border-0">

                                        <div class="card-body px-lg-5 py-lg-5">
                                            <div class="text-center text-muted mb-4">
                                                <small>Employee </small>
                                            </div>
                                            <div class="alert alert-danger print-error-msg" style="display:none">

                                                <ul></ul>
                                            </div>
                                            <form action="" method="post" id="target" name="target">
                                                @csrf
                                                {{-- country --}}
                                                <div class="form-group mb-3">
                                                    <div class="input-group input-group-alternative">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-flag"></i></span>
                                                        </div>

                                                        <input class="form-control" placeholder="Name" type="text"
                                                            list="country" name="name" id="name" autocomplete="off" />

                                                    </div>
                                                </div>

                                                {{-- City --}}
                                                <div class="form-group mb-3">
                                                    <div class="input-group input-group-alternative">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-city"></i></span>
                                                        </div>

                                                        <input name="email" class="form-control" placeholder="Email"
                                                            type="email" list="city" id="cityinput" autocomplete="off"
                                                            required />

                                                    </div>
                                                </div>
                                                {{-- locality --}}

                                                <div class="form-group mb-3">
                                                    <div class="input-group input-group-alternative">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-map-marked-alt"></i></span>
                                                        </div>


                                                        <select name='role' class="form-control"
                                                            aria-label="Default select example" required>
                                                            <option value="" selected>Role</option>
                                                            <option value="1">Admin</option>
                                                            <option value="2">Employee</option>
                                                            <option value="3">Staff</option>
                                                        </select>
                                                    </div>
                                                </div>




                                                {{-- sublocality --}}

                                                <div class="form-group mb-3">
                                                    <div class="input-group input-group-alternative">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-building"></i></span>
                                                        </div>

                                                        <input class="form-control" placeholder="Password" type="password"
                                                            name="password" id="password" required />

                                                    </div>
                                                </div>



                                                <div class="text-center">
                                                    {{-- <button type="button" class="btn btn-primary my-4" name="btn" onclick="savemodal()">Save</button> --}}
                                                    {{-- <input type="submit "class="btn btn-primary my-4" > --}}
                                                    <button type="submit" class="btn btn-primary my-4"
                                                        id="btnclk">Submit</button>
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
        <script>
            $('#target').on('submit', function(event) {

                event.preventDefault();
                var data = $('#target').serialize();
                //  alert('life');
                //  console.log(data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: '{{ route('createEmployeesUsers') }}',
                    data: data,
                    success: function(results) {
                        console.log(results)

                        if($.isEmptyObject(results.error)){

                            $('#modal-form').modal('hide');
                            $('#ajaxrefresh').load(' #table');
                            // console.log(results);
                            // console.log(data);
                            $(".header-body").append(
                                '<div  class="popup alert alert-default" role="alert"><span class="alert-inner--icon"><i class="ni ni-like-2"></i></span><span class="alert-inner--text"><strong>' +
                                results.success + '</strong> created successfully</span></div>');
                        // alert(results.success);
                        }else{
                            $(".print-error-msg").find("ul").html('');

                            $(".print-error-msg").css('display','block');

                            $.each( results.error, function( key, value ) {

                            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                            console.log(value)
                            });

                        }




                    }


                }); // end ajax
                //time for popup div
                setTimeout(function() {
                    $('.popup').remove();
                }, 5000);
            });

        </script>
    @endsection

    @push('js')
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    @endpush
