<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use App\User;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$header = 'MANAGEMENT DATA USER';
    	$data = User::all();
    	$no = 1;

    	return view('user',[
    		'header' => $header,
    		'data' => $data,
    		'no' => $no
    	]);
    }

    public function tambahUser()
    {
    	$header = 'TAMBAH USER';

    	return view('tambah_user',[
    		'header' => $header
    	]);
    }

    public function simpanUser(Request $r)
    {
    	$tambah = new User();

    	$tambah->name = $r['nama_lengkap'];
    	$tambah->email = $r['email'];
    	$tambah->password = Hash::make($r->password);
    	$tambah->save();

    	return back()->with('sukses','Baerhasil menambahkan user baru!');
    }

    public function editUser($id)
    {
    	$header = 'EDIT USER';
    	$data = collect(\DB::select("select * from users where id = '".$id."'"))->first();
    	
    	return view('edit_user', [
    		'header' => $header,
    		'data' => $data
    	]);
    }

    public function updateUser(Request $r, $id)
    {
    	if ($r['password'] == '') {
    		$pass = $r['password_old'];
    	}else{
    		$pass = Hash::make($r->password);
    	}

    	DB::table('users')->where('id',$id)->update([
            'name' => $r['nama_lengkap'],
            'email' => $r['email'],
            'password' => $pass
        ]);

        return redirect('admin/management_data_user')->with('sukses_ubah','Ubah data user berhasil!');
    }

    public function hapusUser($id)
    {
    	DB::table('users')->where('id', '=', $id)->delete();

        return back()->with('sukses_hapus','Data barang berhasil dihapus!');
    }

    public function hakAkses()
    {
        $header = 'HAK AKSES';
        $data = User::all();
        $no = 1;

        return view('hak_akses',[
            'header' => $header,
            'data' => $data,
            'no' => $no
        ]);        
    }

    public function simpanHakAkses(Request $r)
    {
        // echo $r['id'][0];
        // exit;

        for ($i=0; $i < count($r['id']); $i++) { 
            DB::table('users')->where('id',$r['id'][$i])->update([
                'hak_admin' => (empty($r['admin'.$r['id'][$i]])) ? 0 : 1,
                'hak_master' => (empty($r['master'.$r['id'][$i]])) ? 0 : 1,
                'hak_qc' => (empty($r['qc'.$r['id'][$i]])) ? 0 : 1,
                'hak_report' => (empty($r['report'.$r['id'][$i]])) ? 0 : 1
            ]);
        }
        return back()->with('sukses_ubah','Ubah data berhasil!');
    }

    public function changePassword(Request $r, $id)
    {
        DB::table('users')->where('id',$id)->update([
            'password' => Hash::make($r->password)
        ]);

        return redirect('admin/dashboard')->with('change_password','Password berhasil diubah!');    
    }
}
