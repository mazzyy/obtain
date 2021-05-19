<!-- Argon CSS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">

<style>
    .card .table td,
    .card .table th {
        padding-right: 0;
        padding-left: 0;
    }

</style>

<div class="mt-2 px-2 ">
    <div class="card-block">
        <div class="container-fluid mt--7 mrg-top-20">

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
                        {{-- <h3 class="mb-0">Bill Generated      @if ($generatedbill) on <small>{{$generatedbill[0]->created_at}}</small> @endif</h3> --}}
                        @if ($generatedbill)

                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table id="table" class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>

                                    <th scope="col pl-1 ml-1">CustID</th>
                                    <th scope="col pl-5">Name</th>
                                    <th scope="col">Internet Id</th>
                                    <th scope="col">Number</th>
                                    <th scope="col">Sublocality</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Month/Year</th>
                                    <th scope="col">Collection Type</th>
                                    <th scope="col">Net Amount</th>
                                    <th scope="col">recevied</th>
                                    <th scope="col">Status</th>



                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <tr>

                                    @foreach ($generatedbill as $perUser)
                                <tr id="rowinput">
                                    <th scope="row">
                                        <div class="media-body">
                                            <i class="bg-warning"></i>
                                            <span class="name mb-0 text-sm pl-2"> {{ $perUser->id }}</span>
                                        </div>
                                    </th>
                                    <td class="budget">
                                        {{ $perUser->name }}
                                    </td>
                                    <td>
                                        <span class="badge badge-dot mr-4">

                                            <span class="status">{{ $perUser->internetId }}</span>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge badge-dot mr-4">

                                            <span class="status">{{ $perUser->contact }}</span>
                                        </span>
                                    </td>
                                    <td>

                                        {{ $perUser->sublocalityName }}
                                    </td>

                                    <td>

                                        {{ $perUser->address }}
                                    </td>
                                    <td>

                                        <span class="completion mr-2">
                                            {{ $perUser->month }}-{{ $perUser->year }}</span>

                                    </td>
                                    <td>

                                        <span class="completion mr-2"> {{ $perUser->connectiontype }}</span>

                                    </td>
                                    <td>

                                        <span class="completion mr-2"> {{ $perUser->netAmount }}</span>

                                    </td>
                                    <td>

                                        <span class="completion mr-2"> {{ $perUser->recevieAmount }}</span>

                                    </td>
                                    <td>

                                        <span class="completion mr-2"> {{ $perUser->billStatus }}</span>

                                    </td>



                                </tr>
                                @endforeach


                                </tr>
                            </tbody>
                        </table>
                        @endif
                    </div>

                    <!-- Card footer -->

                </div>
            </div>
        </div>


        <script>
            //time for popup dive
            setTimeout(function() {
                $('.popup').remove();
            }, 10000);

        </script>
        {{-- excel file cdn and function --}}
        <script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js">
        </script>
        <script>
            $(".table").table2excel({
                filename: "attendanceSheet.xls"
            });

        </script>
        {{-- end of excel file cdn and function --}}
