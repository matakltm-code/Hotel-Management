@extends('layouts.app')

@section('content')
<div class="container">

    <div class="light bg-light">
        <main class="container">
            <div class="h1 text-center text-dark" id="pageHeaderTitle">Available Rooms</div>
            <div class="col-md-8 offset-md-2 pb-4">
                <form method="get" action="/rooms">
                    {{-- @csrf --}}
                    <div class="form-row">
                        <div class="col">
                            <input type="date" class="form-control" placeholder="Arrival Date" name="start_date"
                                id="start_date" value="{{ old('start_date') ?? $start_date }}">
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" placeholder="Departure Date" name="end_date"
                                id="end_date" value="{{ old('end_date') ?? $end_date }}">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-md btn-success">Check Availability</button>
                        </div>
                    </div>
                </form>
            </div>

            @if ($rooms->count() > 0)
            {{-- available cheker --}}
            @php
            function checkDateIsAvailableForReservation($start_date, $end_date, $db_start_date, $db_end_date)
            {
            if ($start_date == $db_start_date) return false;
            if ($end_date == $db_end_date) return false;
            if ($start_date <= $db_end_date) return false; return true; } @endphp @foreach ($rooms as $room) @php
                $article_class='postcard light blue' ; if($loop->iteration % 2 == 0){
                $article_class = 'postcard light red';
                }else{ $article_class = 'postcard light green'; }

                // check room is available or not
                $skip_room = false;
                // Check if the user select start_date and end_datefor availability
                if($start_date != '' && $end_date != '' & !empty($start_date) && !empty($end_date)){
                foreach ($room->booked_rooms as $booked_room) {
                if (checkDateIsAvailableForReservation($start_date, $end_date, $booked_room->start_date,
                $booked_room->end_date)) {
                $skip_room = false;
                } else {
                // This room is reserved so we skip this room
                $skip_room = true;
                } // else
                } // foreach ($room->booked_rooms as $booked_room) {
                } // end of if($start_date != '' && $end_date != '' & !empty($start_date) && !empty($end_date)){
                // if not available then skip the room
                // if ($skip_room) continue;
                @endphp

                @if ($skip_room)
                @continue
                @endif

                <article class="{{ $article_class }}">
                    <a class="postcard__img_link" href="#">
                        <img class="postcard__img" src="{{ $room->image_url }}" alt="Room Photo" />
                    </a>
                    <div class="postcard__text t-dark">
                        <h1 class="postcard__title blue"><a href="#">Room Number: {{ $room->room_number }}</a></h1>
                        <div class="postcard__subtitle small">
                            <time datetime="2020-05-25 12:00:00">
                                <i class="fas fa-calendar-alt mr-2"></i>{{ $room->created_at->diffForHumans() }}
                            </time>
                        </div>
                        <div class="postcard__bar"></div>
                        <div class="postcard__preview-txt">Price: {{ $room->price }}</div>
                        <ul class="postcard__tagbox">
                            <li class="tag__item"><i class="fas fa-tag mr-2"></i>Category Type:
                                {{ $room->category_type }}
                            </li>
                            <li class="tag__item"><i class="fas fa-clock mr-2"></i>Room status:
                                {{ $room->activated == true ? 'Active':'Deactivated' }}</li>
                            <li class="tag__item play blue">
                                <a href="/rooms/{{ $room->id }}?start_date={{$start_date}}&end_date={{$end_date}}"><i
                                        class="fas fa-play mr-2"></i>Show Detail</a>
                            </li>
                        </ul>
                    </div>
                </article>
                @endforeach

                @else
                <p class="p-4 bg-danger text-white">There is no any rooms added</p>
                @endif

                {{ $rooms->links() }}


        </main>
    </div>























</div>
@endsection
