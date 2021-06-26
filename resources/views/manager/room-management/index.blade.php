@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        {{-- <div class="col-md-12"> --}}
        <div class="card-header col-md-12 pb-3 d-flex justify-content-between">
            <span>{{ __('Rooms') }}</span>
            <a href="/room-management/create" class="btn btn-primary btn-sm">Add new room</a>
        </div>
        {{-- </div> --}}
        <div class="row mt-3">

            @if ($rooms->count() > 0)
            @foreach ($rooms as $room)
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="{{ $room->image_url }}" alt="Room Photo">
                    <div class="card-body">
                        <h5 class="card-title">Room Number: {{ $room->room_number }}</h5>
                        <p class="card-text">
                            <p>Price: {{ $room->price }}</p>
                            <p>Category Type: {{ $room->category_type }}</p>
                            <p>Room status: {{ $room->activated == true ? 'Active':'Deactivated' }}</p>
                        </p>
                        <a href="/room-management/{{ $room->id }}" class="btn btn-primary">Show Detail</a>
                    </div>
                </div>
            </div>
            @endforeach

            @else
            <p class="p-4 bg-danger text-white">There is no any rooms added</p>
            @endif

            {{ $rooms->links() }}

        </div>
    </div>
</div>
@endsection
