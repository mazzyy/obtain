@extends('layouts.app')
{{-- {{ dd($locations[1]) }} --}}
@section('content')
    @include('layouts.headers.cards')


    <div class="mt-2 px-2">
        <div class="card-block">
            <div class="mrg-top-20">
                <div class="row">
                    <div class="col-md-12 ml-auto mr-auto">
                        <form>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Month</label>
                                                <select name="month" class="form-control ">
                                                    <option value="0" disabled="" selected="">Select Month</option>
                                                    <option value="Jan">January</option>
                                                    <option value="Feb">Feburay</option>
                                                    <option value="Mar">March</option>
                                                    <option value="Apr">April</option>
                                                    <option value="May">May</option>
                                                    <option value="Jun">June</option>
                                                    <option value="Jul">July</option>
                                                    <option value="Aug">August</option>
                                                    <option value="Sep">September</option>
                                                    <option value="Oct">October</option>
                                                    <option value="Nov">November</option>
                                                    <option value="Dec">Decmeber</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Year</label>
                                                <select name="year" class="form-control">
                                                    <option value="0" disabled="" selected="">Select Year</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2017">2017</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2019">2019</option>
                                                    <option value="2020">2020</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Bills Type</label>
                                                <select name="bill-type" class="form-control">
                                                    <option value="0" disabled="" selected="">Select Type</option>
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



@endsection
