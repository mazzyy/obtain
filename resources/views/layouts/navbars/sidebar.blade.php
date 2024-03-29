{{-- <script>
$(document).ready(function () {
    $.each($('#navbar').find('li'), function() {
        $(this).toggleClass('active',
            '/' + $(this).find('a').attr('href') == window.location.pathname);
    });
});
     </script> --}}

<nav  data-spy="scroll" data-target="spy-scroll-id" class="navbar  navbar-vertical fixed-left navbar-expand-sm navbar-light bg-white"  id="sidenav-main" >
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
            aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('argon') }}/img/brand/blue.png" class="navbar-brand-img w-75" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="false"
                    aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    <a href="company" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('Company') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>{{ __('Activity') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>{{ __('Support') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->

        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img  class="w-100" src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                            data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                            aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended"
                        placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="ni ni-tv-2 text-primary" ></i> <span style="color:black">{{ __('Dashboard') }}</span>
                    </a>
                </li>
                {{-- User Managment --}}
                {{-- <li class="nav-item">
                    <a class="nav-link active collapsed" href="#navbar-examples" data-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="navbar-examples">

                        <i class="fas fa-user-plus  text-primary "></i>
                        <span class=" nav-link-text" s>{{ __('User Management') }}</span>
                    </a>

                    <div class="collapse " id="navbar-examples">
                        <ul class="nav nav-sm flex-column bg-light">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('createEmployees') }}">
                                    {{ __('Add Employees') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index') }}">
                                    {{ __('Add Customers') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}


                {{-- Master --}}
                <li class="nav-item">
                    <a class="nav-link active collapsed" href="#navbar-master" data-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="navbar-master">
                        <i class="ni ni-briefcase-24  text-primary" ></i>
                        <span class=" nav-link-text" >{{ __('Master') }}</span>
                    </a>

                    <div class="collapse " id="navbar-master">
                        <ul class="nav nav-sm flex-column bg-light">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('createEmployees') }}">
                                    {{ __('Add Employees') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index') }}">
                                    {{ __('Add Customers') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('packages.index') }}">
                                    {{ __('Packages') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dealer') }}">
                                    {{ __('Dealer Details') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('queries') }}">
                                    {{ __('Queries') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- Transactions --}}
                <li class="nav-item">
                    <a class="nav-link active collapsed" href="#navbar-transaction" data-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="navbar-master">
                        <i class="fas fa-clone  text-primary"></i>
                        <span class=" nav-link-text" >{{ __('Transactions') }}</span>
                    </a>

                    <div class="collapse bg-light" id="navbar-transaction">
                        <ul class="nav nav-sm flex-column ">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route("bills.index") }}">
                                    {{ __('Bills creator') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                    {{-- <div class="collapse " id="navbar-transaction">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route("collection") }}">
                                    {{ __('Users Collection') }}
                                </a>
                            </li>
                        </ul>
                    </div> --}}
                    <div class="collapse bg-light" id="navbar-transaction">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route("collection") }}">
                                    {{ __('Customers Collection') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

               {{-- Accounts --}}

        <li class="nav-item">
                    <a class="nav-link active collapsed" href="#navbar-accounts" data-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="navbar-accounts">
                        <i class="fas fa-file-invoice-dollar  text-primary"></i>
                        <span class=" nav-link-text"   >{{ __('Accounts') }}</span>
                    </a>

                    <div class="collapse " id="navbar-accounts">
                        <ul class="nav nav-sm flex-column bg-light">

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('packages.index') }}">
                                    {{ __('Bills Creator') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    {{ __('Users Collections') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    {{ __('Allocated Collection') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    {{ __('Area Allocation') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    {{ __('Internet Recharge') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    {{ __('Dealers Collections') }}
                                </a>
                            </li>

                        </ul>
                    </div>
        </li>

        {{-- Messages--}}
        <li class="nav-item">
            <a class="nav-link active collapsed" href="#navbar-messages" data-toggle="collapse" role="button"
                aria-expanded="false" aria-controls="navbar-messages">
                <i class="fas fa-comment  text-primary"></i>
                <span class=" nav-link-text" >{{ __('Messages') }}</span>
            </a>

            <div class="collapse " id="navbar-messages">
                <ul class="nav nav-sm flex-column bg-light">

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            {{ __('New Messages') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            {{ __('Expire Messages') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            {{ __('Draft Messages') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            {{ __('Other Messages') }}
                        </a>
                    </li>

                </ul>
            </div>
        </li>

         {{-- Reports--}}
         <li class="nav-item">
            <a class="nav-link active collapsed" href="#navbar-reports" data-toggle="collapse" role="button"
                aria-expanded="false" aria-controls="navbar-reports">
                <i class="ni ni-single-copy-04  text-primary"></i>
                <span class=" nav-link-text" >{{ __('Reports') }}</span>
            </a>

            <div class="collapse bg-light" id="navbar-reports">
                <ul class="nav nav-sm flex-column ">
                    <li class="nav-item">
                    <a class="nav-link" href="{{route('CustomerbillReport')}}">
                            {{ __('Customers  Collection ') }}
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('Defaulter')}}">
                            {{ __('Users Defaulter') }}
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('UserList')}}">
                            {{ __('Users List ') }}
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                    <a class="nav-link" href="{{route('Deactiave')}}">
                            {{ __('User Deactivate List') }}
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            {{ __('Users Package Wise List ') }}
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            {{ __('Dealers Collection') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            {{ __('Dealers list') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            {{ __('Accounts Report') }}
                        </a>
                    </li>
                </ul>


            </div>
        </li>



          {{-- Additional Reports --}}
          <li class="nav-item">
            <a class="nav-link active collapsed" href="#navbar-Additional " data-toggle="collapse" role="button"
                aria-expanded="false" aria-controls="navbar-master">
                <i class="fas fa-clone  text-primary"></i>
                <span class=" nav-link-text" >{{ __('Additional Reports') }}</span>
            </a>

            <div class="collapse bg-light" id="navbar-Additional">
                <ul class="nav nav-sm flex-column ">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            {{ __('SALES REPORT') }}
                        </a>
                    </li>
                </ul>
            </div>
            <div class="collapse bg-light" id="navbar-Additional">
                <ul class="nav nav-sm flex-column ">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            {{ __(' EXPENCE REPORT') }}
                        </a>
                    </li>
                </ul>
            </div>

            <div class="collapse bg-light" id="navbar-Additional">
                <ul class="nav nav-sm flex-column ">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            {{ __('BUSINESS DETAILS CALENDAR WISE') }}
                        </a>
                    </li>
                </ul>
            </div>

            <div class="collapse bg-light" id="navbar-Additional">
                <ul class="nav nav-sm flex-column ">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            {{ __('INCOME REPORT') }}
                        </a>
                    </li>
                </ul>
            </div>

            <div class="collapse bg-light" id="navbar-Additional">
                <ul class="nav nav-sm flex-column ">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            {{ __('PIRCHASING REPORT LINK WITH AREA AND EXPERIENCE ') }}
                        </a>
                    </li>
                </ul>
            </div>

            <div class="collapse bg-light" id="navbar-Additional">
                <ul class="nav nav-sm flex-column ">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            {{ __('AREA WISE INCOME REPORT ') }}
                        </a>
                    </li>
                </ul>
            </div>

            <div class="collapse bg-light" id="navbar-Additional">
                <ul class="nav nav-sm flex-column ">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            {{ __('STAFF PERFORMANCE REPORT') }}
                        </a>
                    </li>
                </ul>
            </div>


        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('area') }}">
                <i class="fas fa-globe-americas text-primary"></i> <span style="color:black">{{ __('Locations') }}</span>
            </a>
        </li>


                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('icons') }}">
                        <i class="ni ni-planet text-blue"></i> {{ __('Icons') }}
                    </a>
                </li> --}}

                {{-- <li class="nav-item ">
                    <a class="nav-link" href="{{ route('map') }}">
                        <i class="ni ni-pin-3 text-orange"></i> {{ __('Maps') }}
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('table') }}">
                        <i class="ni ni-bullet-list-67 text-default"></i>
                        <span class=" nav-link-text">Tables</span>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-circle-08 text-pink"></i> {{ __('Register') }}
                    </a>
                </li> --}}
                {{-- <li class="nav-item mb-5 mr-4 ml-4 pl-1 bg-danger" style="position: absolute; bottom: 0;">
                    <a class="nav-link text-white" href="https://www.creative-tim.com/product/argon-dashboard-pro-laravel" target="_blank">
                        <i class="ni ni-cloud-download-95"></i> Upgrade to PRO
                    </a>
                </li> --}}
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">Documentation</h6>
            <!-- Navigation -->
            {{-- <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link"
                        href="https://argon-dashboard-laravel.creative-tim.com/docs/getting-started/overview.html">
                        <i class="ni ni-spaceship"></i> Getting started
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        href="https://argon-dashboard-laravel.creative-tim.com/docs/foundation/colors.html">
                        <i class="ni ni-palette"></i> Foundation
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        href="https://argon-dashboard-laravel.creative-tim.com/docs/components/alerts.html">
                        <i class="ni ni-ui-04"></i> Components
                    </a>
                </li>
            </ul> --}}
        </div>
    </div>
</nav>
