<?php

namespace App\Http\Controllers;

use App\Models\Visitors;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class VisitorsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('create', 'store');
    }
    public function index()
    {
        $visitors = Visitors::orderBy('created_at', 'desc')->get();
        return view('admin.attendance.visitors', compact('visitors'));
    }

    public function create()
    {
        return view('users.visitor');
    }

    public function store(Request $request)
    {

        // dd($request);
        $this->validate(request(), [
            'identityNum'    => 'required',
            'name'    => 'required',
        ]);
        // to question
        $visitors = new Visitors();
        $visitors->identityNum = $request->identityNum;
        $visitors->name = $request->name;
        $visitors->save();
        Alert::success('Success', 'Data Absensi Pengunjung Berhasil Disimpan');
        return redirect(route('visitor.create'));
    }

    public function show(Visitors $visitors)
    {
        //
    }

    public function edit(Visitors $visitors)
    {
        //
    }

    public function update(Request $request, Visitors $visitors)
    {
        //
    }

    public function destroy(Visitors $visitors)
    {
        $visitors = Visitors::find($visitors->id);
        $visitors->delete();
        return redirect(route('visitors.index'));
    }
}