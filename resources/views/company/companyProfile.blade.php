@extends('layouts.app', ['title' => __('Company Profile')])

@section('content')
    @include('users.partials.header', [
        'title' => __('') . ' '.$company->companyName ,
        'description' => __('This is your company profile page. You can see information or update it'),
        'class' => 'col-lg-12'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        {{-- <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-sm btn-info mr-4">{{ __('Connect') }}</a>
                            <a href="#" class="btn btn-sm btn-default float-right">{{ __('Message') }}</a>
                        </div> --}}
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">

                                    @foreach ($groupBy as $user)
                                    @if($user->role==1 )
                                        <div class="pl-0">
                                        <span class="heading">
                                            {{$user->total}}
                                        </span>
                                            <span class="description">{{ __('Admin') }}</span>
                                        </div>
                                        @elseif ($user->role==2 )
                                        <div class="pl-0">

                                            <span class="heading">
                                                {{$user->total}}
                                            </span>
                                                <span class="description">{{ __('Employee') }}</span>
                                        </div>
                                        @elseif ($user->role==3 )
                                        <div class="pl-0">
                                            <span class="heading">
                                                {{$user->total}}
                                            </span>
                                                <span class="description">{{ __('Staff') }}</span>
                                        </div>
                                        @elseif ($user->role==4 )
                                        <div class="pl-0">
                                            <span class="heading">
                                                {{$user->total}}
                                            </span>
                                                <span class="description">{{ __('Customer') }}</span>
                                        </div>

                                    @endif

                                    @endforeach
                                    {{-- <div>
                                        <span class="heading">
                                            {{$Admin}}
                                        </span>
                                        <span class="description">{{ __('Admin') }}</span>
                                    </div>
                                    <div>
                                        <span class="heading">
                                            {{$Employee}}
                                        </span>
                                        <span class="description">{{ __('Employees') }}</span>
                                    </div>
                                    <div>
                                        <span class="heading">
                                            @if (isset($groubBy[2]->total))
                                            {{$groubBy[2]->total}}
                                            @else
                                                0
                                            @endif
                                            {{$Staff}}
                                        </span>
                                        <span class="description">{{ __('Staff') }}</span>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3>
                                {{ $company->companyName }}<span class="font-weight-light"></span>
                            </h3>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>{{ $company->address}}
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>{{ $company->phone1}} <b>-</b> {{ $company->phone2 }}
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>{{ $company->email}}
                            </div>
                            <hr class="my-4" />
                            <p>{{ $company->description}}</p>
                            {{-- <a href="#">{{ __('Show more') }}</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Company Profile') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="company.update" >
                            @csrf


                            <h6 class="heading-small text-muted mb-4">{{ __('Company information') }}</h6>

                            <div class="pl-lg-4">
                                {{-- hidden owner id --}}
                                <div class="form-group" >
                                <input type="hidden" name="ownerid" id="ownerid" class="form-control form-control-alternative" value="{{auth()->id()}}" required autofocus>
                                </div>
                                {{-- Company name --}}
                                <div class="form-group" >
                                    <label class="form-control-label" for="input-name">{{ __('Company name') }}</label>
                                <input type="text" name="companyName" id="companyName" class="form-control form-control-alternative"  autofocus value="{{$company->companyName}}" readonly>
                                </div>
                                 {{-- address --}}
                                 <div class="form-group" >
                                    <label class="form-control-label" for="input-name">{{ __('Address') }}</label>
                                    <input type="text" name="address" id="address" class="form-control form-control-alternative" value="{{$company->address}}"  autofocus>
                                </div>
                                 {{-- Phone --}}
                                 <div class="form-group" >
                                    <label class="form-control-label" for="input-name">{{ __('Phone') }}</label>
                                    <input type="text" name="phone" id="phone" class="form-control form-control-alternative" value="{{$company->phone1}}"  autofocus>
                                </div>
                                 {{-- Phone2 --}}
                                 <div class="form-group" >
                                    <label class="form-control-label" for="input-name">{{ __('Phone2') }}</label>
                                    <input type="text" name="phone2" id="phone2" class="form-control form-control-alternative" value="{{$company->phone2}}"  autofocus>
                                </div>
                                {{-- Email --}}
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{$company->email}}" >

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                {{-- description --}}
                                <div class="form-group" >
                                    <label class="form-control-label" for="input-name">{{ __('Description') }}</label>
                                    <textarea  name="description" id="input-name" class="form-control form-control-alternative"   rows="5">{{$company->description}}</textarea>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                        <hr class="my-4" />
                        {{-- <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Password') }}</h6>

                            @if (session('password_status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('password_status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-current-password">{{ __('Current Password') }}</label>
                                    <input type="password" name="old_password" id="input-current-password" class="form-control form-control-alternative{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Current Password') }}" value="" required>

                                    @if ($errors->has('old_password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('old_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-password">{{ __('New Password') }}</label>
                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm New Password') }}" value="" required>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Change password') }}</button>
                                </div>
                            </div>
                        </form> --}}
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
