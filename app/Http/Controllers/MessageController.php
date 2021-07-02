<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Customer
    public function customer_feedback()
    {
        // Check user is customer
        if (auth()->user()->user_type != 'customer') {
            return redirect('/')->with('error', 'Your are not allowed to see this page');
        }
        return view('customer.feed-back.index');
    }

    public function store_customer_feedback(Request $request)
    {
        // Check user is customer
        if (auth()->user()->user_type != 'customer') {
            return redirect('/')->with('error', 'Your are not allowed to see this page');
        }
        // dd($request);
        $data = $request->validate([
            'reciver_user_type' => 'required',
            'title' => 'required|string',
            'detail' => 'required|string'
        ]);

        Message::create([
            'user_id' => auth()->user()->id,
            'sender_user_type' => 'customer',
            'reciver_user_type' => $data['reciver_user_type'],
            'title' => $data['title'],
            'detail' => $data['detail'],
            'message_type' => 'feedback',
        ]);
        return back()->with('success', 'Thank you for your feedback!');
    }


    // Manager
    public function feedback_from_customer_to_manager()
    {
        // Check user is manager
        if (auth()->user()->user_type != 'manager') {
            return redirect('/')->with('error', 'Your are not allowed to see this page');
        }
        // Get all reservation
        $messages = Message::where('reciver_user_type', 'manager')->orderBy('created_at', 'DESC')->paginate(10);
        return view('manager.feed-back.index', [
            'messages' => $messages
        ]);
    }

    // Auditor
    public function auditor_report_from_receptionist()
    {
        // Check user is manager
        if (auth()->user()->user_type != 'auditor') {
            return redirect('/')->with('error', 'Your are not allowed to see this page');
        }
        // Get all reservation
        $messages = Message::where('reciver_user_type', 'auditor')->orderBy('created_at', 'DESC')->paginate(10);
        return view('manager.feed-back.index', [
            'messages' => $messages
        ]);
    }

    // Receptionist
    public function feedback_from_customer_to_receptionist()
    {
        // Check user is manager
        if (auth()->user()->user_type != 'receptionist') {
            return redirect('/')->with('error', 'Your are not allowed to see this page');
        }
        // Get all reservation
        $messages = Message::where('reciver_user_type', 'receptionist')->orderBy('created_at', 'DESC')->paginate(10);
        return view('manager.feed-back.index', [
            'messages' => $messages
        ]);
    }

    public function generate_report_to_auditor()
    {
        // Check user is manager
        if (auth()->user()->user_type != 'receptionist') {
            return redirect('/')->with('error', 'Your are not allowed to see this page');
        }
        return view('receptionist.report.index');
    }

    public function store_generate_report_to_auditor(Request $request)
    {
        // Check user is manager
        if (auth()->user()->user_type != 'receptionist') {
            return redirect('/')->with('error', 'Your are not allowed to see this page');
        }
        // dd($request);
        $data = $request->validate([
            'title' => 'required|string',
            'detail' => 'required|string'
        ]);

        Message::create([
            'user_id' => auth()->user()->id,
            'sender_user_type' => 'receptionist',
            'reciver_user_type' => 'auditor',
            'title' => $data['title'],
            'detail' => $data['detail'],
            'message_type' => 'report',
        ]);
        return back()->with('success', 'Your report sent successfly to auditor account!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
