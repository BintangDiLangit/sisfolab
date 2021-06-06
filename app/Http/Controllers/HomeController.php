<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Material;
use App\Models\Practice;
use App\Models\Reverse;
use App\Models\User;
use App\Models\Visitors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::find(Auth::user()->id);

        return view('users.index',compact('users'));
    }

    public function adminHome()
    {
        $countMhs = User::where('role_id',2)->count();
        $countDosen = User::where('role_id',3)->count();
        $countInstansi = User::where('role_id',4)->count();
        $countPinjam = Borrow::count();
        $countKembali = Reverse::count();
        $countAlat = Material::count();
        $countPraktikum = Practice::count();
        $countPengunjung= Visitors::count();
        $countBelumDikembalikan = $countPinjam - $countKembali;
        return view('admin.adminHome',compact('countMhs','countDosen','countInstansi','countPinjam','countKembali','countPengunjung','countPraktikum','countAlat','countBelumDikembalikan'));
    }
}