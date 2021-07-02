@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Reservation history') }}</div>

                <div class="card-body">
                    <p>Your last 10 reserved rooms</p>
                    {{-- </div> --}}
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Reservation Date</th>
                                <th scope="col">Bank Detail</th>
                                <th scope="col">Reserved on</th>
                                <th scope="col">Room Detail</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($booked_rooms->count() > 0)
                            @foreach ($booked_rooms as $booked_room)

                            <tr>
                                <th class="text-capitalize" scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    From <strong>{{ $booked_room->start_date }}</strong> <br>
                                    To: <strong>{{ $booked_room->end_date }}</strong> <br>
                                    {{-- {{ $booked_room->start_date - $booked_room->end_date }} --}}
                                </td>
                                <td>
                                    TRF: {{ $booked_room->trf }} <br>
                                    Book Number: {{ $booked_room->bank_book }} <br>
                                    Total Payed: {{ $booked_room->total_price }} <br>
                                    Status: {!! $booked_room->room_status_text($booked_room->status) !!}
                                </td>
                                <td>{{ $booked_room->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="/rooms/{{ $booked_room->room->id }}" class="btn btn-link btn-sm">Show
                                        Room</a> <br>
                                    R.Price: {{ $booked_room->room->price }} <br>
                                    R.Number: {{ $booked_room->room->room_number }} <br>
                                    R.Type: {{ $booked_room->room->category_type }}
                                </td>
                                <td>

                                    @if($booked_room->status == 'cancel')
                                    {{-- Check this reservation is cnceled by --}}
                                    <p>{!! $booked_room->room_status_canceled_by_text($booked_room->cancel_by) !!}</p>
                                    <p class="text-danger">Refund is done in 72 hours</p>
                                    <p>Your bank book: <strong>{{$booked_room->bank_book}}</strong> </p>
                                    @endif
                                    {{-- approved --}}
                                    @if($booked_room->status == 'approved')
                                    {{-- Check this reservation is cnceled by --}}
                                    <p class="h6 text-success">Reservation is approved</p>
                                    @endif
                                    {{-- --}}
                                    @if ($booked_room->status != 'cancel')
                                    <form action="/room/r/reservation/{{$booked_room->id}}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="action_name" value="cancel">
                                        <button type="submit" class="btn btn-danger btn-sm mt-1">Cancel
                                            Reservation</button>
                                    </form>
                                    @endif
                                    @if ($booked_room->status != 'approved')
                                    <form action="/room/r/reservation/{{$booked_room->id}}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="action_name" value="approved">
                                        <button type="submit" class="btn btn-success btn-sm mt-1">Approve
                                            Reservation</button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach

                            @else
                            <tr>
                                <th colspan="6">There is no any Booked Room yet!</th>
                            </tr>
                            @endif


                        </tbody>
                    </table>
                    {{ $booked_rooms->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
