<?php

namespace App\Http\Controllers;

use App\Models\BookedRoom;
use App\Models\Room;
use Illuminate\Http\Request;

class Reservation extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function receptionist_reservation()
    {
        // Check user is receptionist
        if (auth()->user()->user_type != 'receptionist') {
            return redirect('/')->with('error', 'Your are not allowed to see this page');
        }
        // Get all reservation
        $booked_rooms = BookedRoom::orderBy('created_at', 'DESC')->paginate(10);
        return view('receptionist.reservation.receptionist_reservation', [
            'booked_rooms' => $booked_rooms
        ]);
    }


    public function cancel_or_approve_customer_reservation(Request $request, BookedRoom $BookedRoom)
    {
        // dd($BookedRoom->user_id . ' and ' . auth()->user()->id);
        if (auth()->user()->user_type != 'receptionist') {
            return redirect('/')->with('error', 'Your are not allowed to see this page');
        }
        $data = $request->validate([
            'action_name' => 'required|string',
        ]);

        $message = ($data['action_name'] == 'cancel') ? 'Reservation is canceled. <br/> <b>Refund the total price to our customer payed.</b>' : 'Reservation is Approved';
        $data = [
            'status' => $data['action_name'],
            'cancel_by' => ($data['action_name'] == 'cancel') ? 'receptionist' : '',
        ];

        $BookedRoom->update($data);
        return back()->with('success', $message);
    }


    // Customer
    public function customer_reservation()
    {
        // Check user is customer
        if (auth()->user()->user_type != 'customer') {
            return redirect('/')->with('error', 'Your are not allowed to see this page');
        }
        $booked_rooms = BookedRoom::orderBy('created_at', 'DESC')->where('user_id', '=', auth()->user()->id)->paginate(10);
        return view('customer.reservation.customer_reservation', [
            'booked_rooms' => $booked_rooms
        ]);
    }


    public function cancel_customer_reservation(Request $request, BookedRoom $BookedRoom)
    {
        // dd($BookedRoom->user_id . ' and ' . auth()->user()->id);
        if ($BookedRoom->user_id != auth()->user()->id) {
            return back()->with('error', 'You can not permitted to cancel reservation');
        }
        $data = [
            'status' => 'cancel',
            'cancel_by' => 'customer'
        ];

        $BookedRoom->update($data);
        return back()->with('success', 'Success: Our receptionist staff memeber will return your money by using your bank account. <strong>Our staff memebers take 72 hours to return you money!</strong>');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
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
