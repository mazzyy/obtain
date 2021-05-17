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
                    {{-- @if(isset($message))
                        <div class=" popup alert alert-success">
                            {{ $message }}
                        </div>
                    @endif --}}

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

