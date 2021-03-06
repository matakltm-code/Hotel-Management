@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @if ($messages->count() > 0)
            @foreach ($messages as $message)

            <div class="card">
                <div class="card-header">{{ $message->user->name }} - {{ $message->created_at->diffForHumans() }}</div>

                <div class="card-body">
                    <p><strong>Title:</strong> <br> {{ $message->title }}</p>
                    <p><strong>Detail</strong></p>
                    {!! $message->detail !!}

                </div>
            </div>

            @endforeach

            @else
            <p class="text-center bg-danger p-4">There is any feedback added yet!</p>

            @endif

            {{-- {{ $messages->links() }} --}}
        </div>
    </div>
</div>
@endsection
