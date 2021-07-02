@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-header pb-3 d-flex justify-content-between">
                <span>{{ __('Room') }}</span>
                <a href="/rooms" class="btn btn-info btn-sm">Back</a>
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
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <p class="h3">Detail Note</p>
                <p>{!! $room->room_detail_type !!}</p>
                {{-- Reservation form --}}
                <hr>
                {{-- if this form is only seen by customers user_type --}}
                @auth

                @if (auth()->user()->is_customer)
                <div class="col-md-12">
                    <p class="font-weight-bold">Reserve a room</p>
                    <form method="post" action="/rooms">
                        @csrf
                        {{-- hidden values --}}
                        <input type="hidden" name="room_id" value="{{ $room->id }}">
                        <input type="hidden" name="start_date" value="{{ $start_date }}">
                        <input type="hidden" name="end_date" value="{{ $end_date }}">
                        <div class="form-group row">
                            <label for="trf" class="col-12 col-form-label">TRF - Bank recepet trf number</label>
                            <div class="col-12">
                                <input value="{{ old('trf') }}" id="trf" name="trf"
                                    placeholder="Enter your bank recept transaction number"
                                    class="form-control  @error('trf') is-invalid @enderror" type="text">
                                @error('trf')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                @error('room_id')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">

                                @error('start_date')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                @error('end_date')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <button name="submit" type="submit" class="btn btn-primary">Reserve a room</button>
                            </div>
                        </div>

                    </form>
                </div>
                @endif
                @else
                <p class="text-white bg-danger font-weight-bold p-5 text-center h4">
                    To reserve this room you must have
                    to login.
                    <br>
                    <a href="/login" target="_blank" class="btn btn-link btn-success text-white mt-2">Login</a>
                </p>
                @endauth
            </div>



        </div>
    </div>
</div>
@endsection
