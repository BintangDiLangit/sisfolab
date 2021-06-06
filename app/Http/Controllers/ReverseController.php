<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Material;
use App\Models\Reverse;
use Illuminate\Http\Request;

class ReverseController extends Controller
{
    /**
     * Display a listing of the resource.
    *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $reverses = Reverse::orderBy('created_at', 'desc')->get();
        return view('admin.transaction.reverse.index',compact('reverses'));
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
     * @param  \App\Models\Reverse  $reverse
     * @return \Illuminate\Http\Response
     */
    public function show(Reverse $reverse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reverse  $reverse
     * @return \Illuminate\Http\Response
     */
    public function edit(Reverse $reverse)
    {
        $list = Reverse::all();
        $reverse = $list->find($reverse);
        return view('admin.transaction.reverse.edit', compact('reverse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reverse  $reverse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reverse $reverse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reverse  $reverse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reverse $reverse)
    {
        //
    }

    public function approve(Reverse $reverse){
        $borrow = $reverse->borrow;
        // dd($material);
        $material = $borrow->materials->first();
        Material::where('id',$material->id)->update([
            'stock' => ($material->stock + $borrow->borrowAmount)
        ]);
        Reverse::where('id',$reverse->id)->update([
            'returnAmount' => $borrow->borrowAmount,
            'notYetReturnAmount' => 0
        ]);

        Borrow::where('id',$borrow->id)->update([
            'status' => 0,
        ]);


        return redirect(route('reverse.index'))->with('success');
    }
}