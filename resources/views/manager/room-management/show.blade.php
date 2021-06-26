@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-header pb-3 d-flex justify-content-between">
                <span>{{ __('Room') }}</span>
                <a href="/room-management" class="btn btn-info btn-sm">Back</a>
            </div>
        </div>

        <div class="col-md-12 mt-4 d-flex justify-content-center">

            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="/{{ $room->image_url }}" alt="Room Photo">
                    <div class="card-body">
                        <h5 class="card-title">Room Number: {{ $room->room_number }}</h5>
                        <p class="card-text">
                            <p>Price: {{ $room->price }}</p>
                            <p>Category Type: {{ $room->category_type }}</p>
                            <p>Room status: {{ $room->activated == true ? 'Active':'Deactivated' }}</p>
                        </p>
                        <a href="/room-management/{{ $room->id }}/edit" class="btn btn-primary w-100">Edit</a>

                        <form action="/room-management/{{ $room->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-danger mt-1 w-100" />
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <p class="h3">Detail Note</p>
                <p>{!! $room->room_detail_type !!}</p>
                <hr>
                <div class="col-md-12">
                    <form method="POST" action="/room-management/enable-disable">
                        @csrf
                        <input type="hidden" name="room_id" value="{{ $room->id }}">
                        <input type="hidden" name="status" value="{{ $room->activated }}">
                        @if ($room->activated)
                        <button type="submit" class="btn btn-danger">
                            {{ __('Disable Room') }}
                        </button>
                        @else
                        <button type="submit" class="btn btn-primary">
                            {{ __('Enable Room') }}
                        </button>
                        @endif
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
