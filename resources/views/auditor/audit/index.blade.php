@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Audits') }}
                    @if (auth()->user()->user_type == 'auditor')
                    <a href="/audits/create" class="btn btn-sm btn-link">Add New Audit Record</a>
                    @endif
                </div>

                <div class="card-body">
                    <p>Last 10 added audits</p>
                    {{-- </div> --}}
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Reason</th>
                                <th scope="col">Audit Type</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Added at</th>
                                @if (auth()->user()->user_type == 'auditor')
                                <th scope="col">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @if ($audits->count() > 0)
                            @foreach ($audits as $audit)

                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td class="text-capitalize">{{ $audit->title }}</td>
                                <td>{{ $audit->reason }}</td>
                                <td>{{ $audit->audit_type_text($audit->audit_type) }}</td>
                                <td>{{ $audit->amount }}</td>
                                <td>{{ $audit->created_at->diffForHumans() }}</td>
                                @if (auth()->user()->user_type == 'auditor')
                                <td>
                                    <form method="POST" action="/audits/{{ $audit->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            {{ __('Delete') }}
                                        </button>
                                    </form>
                                    <a href="/audits/{{ $audit->id }}/edit" class="btn btn-primary btn-sm">Edit</a>
                                </td>
                                @endif
                            </tr>
                            @endforeach

                            @else
                            <tr>
                                @if (auth()->user()->user_type == 'auditor')
                                <th colspan="7">There is no any added audits</th>
                                @else
                                <th colspan="6">There is no any added audits</th>
                                @endif
                            </tr>
                            @endif


                        </tbody>
                    </table>
                    {{ $audits->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
