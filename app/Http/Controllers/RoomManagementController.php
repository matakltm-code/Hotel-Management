<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomManagementController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Check user is admin
        if (auth()->user()->user_type != 'manager') {
            return redirect('/')->with('error', 'Your are not allowed to see this page');
        }

        $rooms = Room::orderBy('created_at', 'DESC')->paginate(10);
        return view('manager.room-management.index', [
            'rooms' => $rooms
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.room-management.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'room_number' => 'required|integer',
            'price' => 'required',
            'category_type' => 'required',
            'room_detail_type' => 'required',
            'image' => 'required|image',
        ]);

        $image_path = 'storage/' . $request->image->store('uploads', 'public');
        Room::create([
            'room_number' => $data['room_number'],
            'price' => $data['price'],
            'category_type' => $data['category_type'],
            'room_detail_type' => $data['room_detail_type'],
            'image_url' => $image_path,
        ]);
        return redirect('/room-management')->with('success', 'New room added successfuly!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return view('manager.room-management.show', [
            'room' => $room
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
        return view('manager.room-management.edit', [
            'room' => $room
        ]);
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
        $data = $request->validate([
            'room_number' => 'required|integer',
            'price' => 'required',
            'category_type' => 'required',
            'room_detail_type' => 'required',
            'image' => 'required|image',
        ]);

        $image_path = 'storage/' . $request->image->store('uploads', 'public');
        $room->update([
            'room_number' => $data['room_number'],
            'price' => $data['price'],
            'category_type' => $data['category_type'],
            'room_detail_type' => $data['room_detail_type'],
            'image_url' => $image_path,
        ]);
        return redirect('/room-management')->with('success', 'Room information updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect('/room-management')->with('success', 'Room information Deleted');
    }



    public function enable_disable_room(Request $request)
    {
        // Check user is manager
        if (auth()->user()->user_type != 'manager') {
            return redirect('/')->with('error', 'Your are not allowed to see this page');
        }

        $room_id = $request['room_id'];
        $status = $request['status'];
        $message = '';
        if ($status) {
            $status = false;
            $message = 'Room visibility is Disabled';
        } else {
            $status = true;
            $message = 'Room visibility is Enabled';
        }
        $data = [
            'activated' => $status
        ];

        Room::where('id', $room_id)->update($data);
        return back()->with('success', $message);
    }
}
