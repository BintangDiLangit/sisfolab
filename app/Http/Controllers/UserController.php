<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function indexMahasiswa()
    {
        $mhs = User::where('role_id','2')->orderBy('created_at', 'desc')->get();
        return view('admin.user.mahasiswa.index',compact('mhs'));
    }
    public function indexDosen()
    {
        $tkp = User::where('role_id','3')->orderBy('created_at', 'desc')->get();
        return view('admin.user.tenagaKep.index',compact('tkp'));
    }
    public function indexInstansi()
    {
        $instansi = User::where('role_id','4')->orderBy('created_at', 'desc')->get();
        return view('admin.user.instansiLain.index',compact('instansi'));
    }

    public function createMahasiswa()
    {
        return view('admin.user.mahasiswa.create');
    }
    public function createDosen()
    {
        return view('admin.user.tenagaKep.create');
    }
    public function createInstansi()
    {
        return view('admin.user.instansiLain.create');
    }

    public function storeMahasiswa(Request $request)
    {
        $this->validate(request(), [
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'noId' => 'required',
            'tlp' => 'required',
            'address' => 'required',
        ]);
        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_admin' => 0,
            'noId' => $request->noId,
            'username' => $request->username,
            'tlp' => $request->tlp,
            'address' => $request->address,
            'role_id'=> 2,
        ]);


        toast('Your Data has been submited!','success');
        $user->save();
        return redirect(route('user.mahasiswa.index'));
    }

    public function storeInstansi(Request $request)
    {
        $this->validate(request(), [
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'noId' => 'required',
            'tlp' => 'required',
            'address' => 'required',
        ]);
        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_admin' => 0,
            'noId' => $request->noId,
            'username' => $request->username,
            'tlp' => $request->tlp,
            'address' => $request->address,
            'role_id'=> 4,
        ]);


        toast('Your Data has been submited!','success');
        $user->save();
        return redirect(route('user.instansi.index'));
    }

    public function storeDosen(Request $request)
    {
        $this->validate(request(), [
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'noId' => 'required',
            'tlp' => 'required',
            'address' => 'required',
        ]);
        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_admin' => 0,
            'noId' => $request->noId,
            'username' => $request->username,
            'tlp' => $request->tlp,
            'address' => $request->address,
            'role_id'=> 3,
        ]);


        toast('Your Data has been submited!','success');
        $user->save();
        return redirect(route('user.dosen.index'));
    }

    public function editMahasiswa($id)
    {
        $list = User::all();
        $user = $list->find($id);
        return view('admin.user.mahasiswa.edit',compact('user'));
    }
    public function editInstansi($id)
    {
        $list = User::all();
        $user = $list->find($id);
        return view('admin.user.instansiLain.edit',compact('user'));
    }
    public function editDosen($id)
    {
        $list = User::all();
        $user = $list->find($id);
        return view('admin.user.tenagaKep.edit',compact('user'));
    }

    public function updateMahasiswa(Request $request, $id)
    {
        $this->validate(request(), [
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'noId' => 'required',
            'tlp' => 'required',
            'address' => 'required',
        ]);
        $user = User::find($id);

        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->is_admin = 0;
        $user->noId = $request['noId'];
        $user->username = $request['username'];
        $user->tlp = $request['tlp'];
        $user->address = $request['address'];
        $user->role_id = 2;

        $user->save();
        Alert::success('Success', 'Data mahasiswa has been updated');
        return redirect(route('user.mahasiswa.index'));
    }
    public function updateInstansi(Request $request, $id)
    {
        $this->validate(request(), [
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'noId' => 'required',
            'tlp' => 'required',
            'address' => 'required',
        ]);
        $user = User::find($id);

        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->is_admin = 0;
        $user->noId = $request['noId'];
        $user->username = $request['username'];
        $user->tlp = $request['tlp'];
        $user->address = $request['address'];
        $user->role_id = 4;

        $user->save();
        Alert::success('Success', 'Data instansi lain has been updated');
        return redirect(route('user.instansi.index'));
    }
    public function updateDosen(Request $request, $id)
    {
        $this->validate(request(), [
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'noId' => 'required',
            'tlp' => 'required',
            'address' => 'required',
        ]);
        $user = User::find($id);

        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->is_admin = 0;
        $user->noId = $request['noId'];
        $user->username = $request['username'];
        $user->tlp = $request['tlp'];
        $user->address = $request['address'];
        $user->role_id = 3;

        $user->save();
        Alert::success('Success', 'Data tenaga kependidikan has been updated');
        return redirect(route('user.dosen.index'));
    }


    public function destroyMahasiswa($id)
    {
        $user = User::find($id);
        $user->delete();
        toast('Data mahasiswa has been deleted!','success');
        return redirect(route('user.mahasiswa.index'));
    }
    public function destroyDosen($id)
    {
        $user = User::find($id);
        $user->delete();
        toast('Data tenaga kependidikan has been deleted!','success');
        return redirect(route('user.dosen.index'));
    }
    public function destroyInstansi($id)
    {
        $user = user::find($id);
        $user->delete();
        toast('Data instansi lain has been deleted!','success');
        return redirect(route('user.instansi.index'));
    }
}