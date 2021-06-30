@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Employee Management') }}</div>

                <div class="card-body">
                    <p>Last logged in of 10 employee</p>
                    {{-- </div> --}}
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Account Type</th>
                                <th scope="col">Created</th>
                                <th scope="col">Last Logged In</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($employees->count() > 0)
                            @foreach ($employees as $user)

                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td class="text-capitalize">{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td> {{ $user->phone }} </td>
                                <td>{{ $user->account_type_text($user->user_type) }}</td>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                <td>{{ \Carbon\Carbon::parse($user->last_login_at)->diffForHumans() }}</td>

                            </tr>
                            @endforeach

                            @else
                            <tr>
                                <th colspan="7">There is no any user added</th>
                            </tr>
                            @endif


                        </tbody>
                    </table>
                    {{ $employees->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
