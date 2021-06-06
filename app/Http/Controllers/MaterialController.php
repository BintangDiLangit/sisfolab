<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class MaterialController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    public function index()
    {
        $materials = Material::orderBy('updated_at', 'desc')->get();
        return view('admin.material.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.material.create');
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
            'moreFields.*.kategori'    => 'required',
            'moreFields.*.name'    => 'required',
            'moreFields.*.desc'    => 'required',
            'moreFields.*.stock'    => 'required',
        ]);
        $material = [];
        // dd($request->moreFields[1]['name']);
        $count = count($request->moreFields);
        for ($i=0; $i < $count; $i++) {

                $material[] = [
                    'kategori' => $request->moreFields[$i]['kategori'],
                    'name' => $request->moreFields[$i]['name'],
                    'desc' => $request->moreFields[$i]['desc'],
                    'stock' => $request->moreFields[$i]['stock'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            // Material::insert($request->moreFields[$value]);
        }
        // dd($material);
        Material::insert($material);
        // return redirect(route('material.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $material = Material::where('id', $id)->first();
        return view('admin.material.edit', compact('material'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'kategori'    => 'required',
            'name'    => 'required',
            'desc'    => 'required',
            'stock'    => 'required',
        ]);
        $material = Material::find($id);
        $material->kategori = $request['kategori'];
        $material->name = $request['name'];
        $material->desc = $request['desc'];
        $material->stock = $request['stock'];

        $material->save();
        toast('Data Material', 'Berhasil Diupdate');
        return redirect('material');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $material = Material::find($id);
        $material->delete();
        return redirect(route('material.index'));
    }
}