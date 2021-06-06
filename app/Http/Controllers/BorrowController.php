<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Material;
use App\Models\Reverse;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class BorrowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $borrows = Borrow::orderBy('created_at', 'desc')->get();
        return view('admin.transaction.borrow.index', compact('borrows'));
    }

    function fetch_data(Request $request)
    {

        dd($request);
        if ($request->ajax()) {
            if ($request->from_date != '' && $request->to_date != '') {
                $data = DB::table('borrow')
                    ->whereBetween('created_at', array($request->from_date, $request->to_date))
                    ->get();
            } else {
                $data = DB::table('borrow')->orderBy('created_at', 'desc')->get();
            }
            echo json_encode($data);
        }
    }


    public function create()
    {
        $users = User::all();

        $materials = Material::all();
        return view('admin.transaction.borrow.create', compact('users', 'materials'));
    }


    public function store(Request $request)
    {
        $mtrl = Material::find($request->material);

        // dd($request);
        $borrow = Borrow::create([
            'need' => $request->need,
            'usedIn' => $request->usedIn,
            'user_id' => $request->noId,
        ]);

        $count = count($request->moreFields);
        for ($i = 0; $i < $count; $i++) {
            $borrow->materials()->attach($request->moreFields[$i]['material'], ['borrowAmount' => $request->moreFields[$i]['jumlah']]);
            $borrow->users()->attach($request->noId);
            $mtl = Material::find($request->moreFields[$i]['material']);
            $mtl->stock = $mtl->stock - $request->moreFields[$i]['jumlah'];
            $mtl->save();
        }
        toast('Data Peminjaman', 'Berhasil Ditambahkan');
        return redirect(route('borrow.index'));

        // }
    }

    public function show(Borrow $borrow)
    {
        $list = Borrow::all();
        $borrow = $list->find($borrow);
        $reverse = Reverse::all()->find($borrow);
        return view('admin.transaction.borrow.show', compact('borrow', 'reverse'));
    }

    public function editBorrowMaterial(Material $material, Borrow $borrow)
    {

        return view('admin.transaction.borrow.edit', compact('borrow', 'material'));
    }

    public function updateBorrowMaterial(Request $request, Material $material, Borrow $borrow)
    {
        if (($material->stock - $request->jumlah) >= 0 && $request->jumlah >= 0) {
            $borrowAmountUpdate = ($material->stock + $request->jumlahOld) - $request->jumlah;
            $borrow->materials()->updateExistingPivot($material->id, ['borrowAmount' => $request->jumlah]);

            Material::where('id', $material->id)->update([
                'stock' => $borrowAmountUpdate
            ]);

            Alert::success('Success', 'Jumlah pinjaman berhasil diupdate');
            return redirect()->back();
        }
        Alert::warning('Warning', 'Jumlah Pinjaman Melebihi Stok Barang');
        return redirect()->back();
    }

    public function destroy(Borrow $borrow)
    {

        if ($borrow->status == 0) {
            # code...
            $borrow = Borrow::find($borrow->id);
            $borrow->delete();
            Alert::success('Success', 'Loan has been deleted');
            return redirect(route('borrow.index'));
        } else {
            Alert::warning('Warning', 'The refund has not been approved');
            return redirect(route('borrow.index'));
        }
    }

    public function approve(Borrow $borrow)
    {
        $mtl = $borrow->materials->all();
        $mate = '';

        foreach ($borrow->materials as $key => $bm) {
            $mate .= $bm->name . ', ';
        }
        $reverse = Reverse::create([
            'borrow_id' => $borrow->id,
            'materials' => $mate
        ]);

        for ($i = 0; $i < count($mtl); $i++) {

            $m = Material::find($borrow->materials[$i]->id);
            $m->stock = $m->stock + $borrow->materials[$i]->pivot->borrowAmount;
            $m->save();
        }

        Borrow::where('id', $borrow->id)->update([
            'status' => 0
        ]);
        Alert::success('Success', 'Loan has been approved');

        return redirect(route('reverse.index'))->with('success');
    }
}