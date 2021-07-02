<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\BookedRoom;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function checkDateIsAvailableForReservation($start_date, $end_date, $db_start_date, $db_end_date)
    {
        if ($start_date == $db_start_date) return false;
        if ($end_date == $db_end_date) return false;
        if ($start_date <= $db_end_date) return false;
        return true;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get available rooms
        // http://hotel-management.test/rooms?start_date=12-34-45&end_date=34-23-45
        $start_date = (isset($_GET['start_date'])) ? $_GET['start_date'] : '';
        $end_date = (isset($_GET['end_date'])) ? $_GET['end_date'] : '';

        $rooms = Room::with('booked_rooms')->orderBy('created_at', 'DESC')->paginate(10);
        return view('rooms.index', [
            'rooms' => $rooms,
            'start_date' => $start_date,
            'end_date' => $end_date,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'room_id' => ['required', 'int'],
            // 'start_date' => ['required', 'date', 'after:now'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after:start_date'],
            'trf' => ['required', 'unique:booked_rooms,trf'],
            'bank_book' => ['required', 'string'],
            'total_price' => ['required', 'integer'],
        ]);
        //  Check the user insertes true available date : this might chage in the html or url se we must do this check
        // $room = Room::with('booked_rooms')->where('id', '=', $data['room_id'])->get();
        $room = Room::findorfail($data['room_id']);

        // dd($room->booked_rooms);
        $skip_room = false;
        foreach ($room->booked_rooms as $booked_room) {
            if ($this->checkDateIsAvailableForReservation($data['start_date'], $data['end_date'], $booked_room->start_date, $booked_room->end_date)) {
                $skip_room = false;
            } else {
                $skip_room = true;
            }
        }
        if ($skip_room) {
            return back()->with('error', 'Room is reserved btween your selected date. <br/> Please select different date!');
        }



        // Reserve a room
        BookedRoom::create([
            'room_id' => $data['room_id'],
            'user_id' => auth()->user()->id,
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'trf' => $data['trf'],
            'status' => 'pending',
            'bank_book' => $data['bank_book'],
            'total_price' => $data['total_price'],
        ]);
        return back()->with('success', 'Room is successfuly reserved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        // This wiil shown in the user room reservation form as hidden input
        // http://hotel-management.test/rooms/5?start_date=12-34-45&end_date=34-23-45
        $start_date = (isset($_GET['start_date'])) ? $_GET['start_date'] : '';
        $end_date = (isset($_GET['end_date'])) ? $_GET['end_date'] : '';
        return view('rooms.show', [
            'room' => $room,
            'start_date' => $start_date,
            'end_date' => $end_date,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}
