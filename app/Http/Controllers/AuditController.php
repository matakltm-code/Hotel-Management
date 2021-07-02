<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use Illuminate\Http\Request;

class AuditController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // dd(auth()->user()->user_type);
        // Check user is admin
        // if (auth()->user()->user_type !== 'auditor' || auth()->user()->user_type !== 'manager') {
        //     return redirect('/')->with('error', 'Your are not allowed to see this page');
        // }

        $audits = Audit::orderBy('created_at', 'DESC')->paginate(10);

        return view('auditor.audit.index', [
            'audits' => $audits,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auditor.audit.create');
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
            'title' => ['required', 'string', 'max:255'],
            'reason' => ['required', 'string', 'max:255'],
            'audit_type' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'int'],
        ]);
        // dd($data);
        Audit::create([
            'title' => $data['title'],
            'reason' => $data['reason'],
            'audit_type' => $data['audit_type'],
            'amount' => $data['amount'],
        ]);
        return back()->with('success', 'Audit recorde added successfuly!');
    }


    public function show(Audit $audit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Audit  $audit
     * @return \Illuminate\Http\Response
     */
    public function edit(Audit $audit)
    {
        // Check user is admin
        if (auth()->user()->user_type != 'auditor') {
            return redirect('/')->with('error', 'Your are not allowed to see this page');
        }
        // $audit = Audit::all()->paginate(10);
        return view('auditor.audit.edit', [
            'audit' => $audit,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Audit  $audit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Audit $audit)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'reason' => ['required', 'string', 'max:255'],
            'audit_type' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'int'],
        ]);
        // dd($data);
        $audit->update([
            'title' => $data['title'],
            'reason' => $data['reason'],
            'audit_type' => $data['audit_type'],
            'amount' => $data['amount'],
        ]);
        return back()->with('success', 'Audit recorde updated successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Audit  $audit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Audit $audit)
    {
        $audit->delete();
        return back()->with('success', 'Audit recorde deleted successfuly!');
    }


    public function audit_dashboard()
    {
        $total_expense = 0;
        $total_revenue = 0;

        return view('auditor.audit.audit-dashboard', [
            'total_expense' => $total_expense,
            'total_revenue' => $total_revenue,
        ]);
    }
}
