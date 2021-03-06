@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 ">
            @include('profile.sahred.side-nav')
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="font-weight-bold">
                                {{ $user->is_admin ? 'Admin':'' }}
                                {{ $user->is_manager ? 'Manager':'' }}
                                {{ $user->is_auditor ? 'Auditor':'' }}
                                {{ $user->is_receptionist ? 'Receptionist':'' }}
                                {{ $user->is_customer ? 'Customer':'' }}
                                User Profile
                            </h4>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="h5 pb-1">
                                Name: {{ $user->name }}
                            </p>
                            <p class="h5 pb-1">
                                Email: {{ $user->email }}
                            </p>
                            <p class="h5 pb-1">
                                Phone: {{ $user->phone }}
                            </p>
                            <p class="h5 pb-1">
                                address: {{ $user->address }}
                            </p>
                            <p class="h5 pb-1">
                                Account status: {{ ($user->active_account == true ? 'Active' : 'Disabled') }}
                            </p>
                            <p class="h5 pb-1">
                                User Type: {{ $user->user_type }}
                            </p>
                            <p class="h5 pb-1">
                                Account created at: {{ $user->created_at->diffForHumans() }}
                            </p>
                            <p class="h5 pb-1">
                                Last logged in: {{ \Carbon\Carbon::parse($user->last_login_at)->diffForHumans() }}
                            </p>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
