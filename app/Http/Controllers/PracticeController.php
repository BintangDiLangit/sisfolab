<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use App\Models\Visitors;
use App\Models\Lab;
use App\Models\Matkul;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PracticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except('create','store');
    }
    public function index()
    {

        $practice = Practice::orderBy('created_at', 'desc')->get();
        return view('admin.attendance.practice',compact('practice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $matkuls = Matkul::orderBy('created_at', 'desc')->get();
        $labs = Lab::orderBy('created_at', 'desc')->get();
        $tkp = User::where('role_id', '3')->get();
        $users = User::where('role_id', '2')->get();
        // dd($matkuls);
        return view('users.practice', compact('users','tkp','labs','matkuls'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'matkul_id' => 'required',
            'lab_id' => 'required',
            'lecturerName' => 'required',
            'namaAnggota' => 'required',

        ]);
        $practice = new Practice();
        $practice->matkul_id = $request->matkul_id;
        $practice->lab_id = $request->lab_id;
        $practice->lecturerName = $request->lecturerName;
        $practice->namaAnggota = $request->namaAnggota;
        $practice->save();
        Alert::success('Success', 'Data Absensi Praktikum Berhasil Disimpan');
        return redirect(route('practice.create'));

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Practice  $practice
     * @return \Illuminate\Http\Response
     */
    public function show(Practice $practice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Practice  $practice
     * @return \Illuminate\Http\Response
     */
    public function edit(Practice $practice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Practice  $practice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Practice $practice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Practice  $practice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Practice $practice)
    {
        $practice = Practice::find($practice->id);
        $practice->delete();
        return redirect(route('practice.index'));
    }
}