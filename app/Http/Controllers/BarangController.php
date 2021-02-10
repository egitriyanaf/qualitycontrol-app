<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BahanBaku;
use App\KodeBahanBaku;
use App\BahanKemas;
use App\KodeBahanKemas;
use App\BarangJadi;
use DB;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function bahanBaku()
    {
        $header = 'BAHAN BAKU';
        $no = 1;
        $data = BahanBaku::all();

        return view('bahan_baku', [
            'header' => $header,
            'no' => $no,
            'data' => $data
        ]);
    }

    public function tambahBahanBaku()
    {
        $header = 'TAMBAH BAHAN BAKU';
        $kode = KodeBahanBaku::all();

        return view('tambah_bahan_baku',[
            'header' => $header,
            'kode' => $kode
        ]);
    }

    public function kodeBahanBaku()
    {
        $header = 'KODE BAHAN BAKU';
        $data = KodeBahanBaku::all();
        $no = 1;

        return view('kode_bahan_baku', [
            'header' => $header,
            'data' => $data,
            'no' => $no
        ]);
    }

    public function simpanKodeBahan(Request $r)
    {
        $tambah = new KodeBahanBaku();
        $tambah->nama = $r['nama'];
        $tambah->save();

        return back()->with('sukses_simpan','Berhasil menambahkan kode bahan!');
    }

    public function hapusKodeBahanBaku($id)
    {
        DB::table('tbl_kode_bahan_baku')->where('id', '=', $id)->delete();

        return back()->with('sukses_hapus','Data kode barang berhasil dihapus!');
    }

    public function updateKodeBahan(Request $r, $id)
    {
        DB::table('tbl_kode_bahan_baku')->where('id',$id)->update([
            'nama' => $r['edit_kode_bahan']
        ]);

        return back()->with('sukses_ubah','Data kode barang berhasil diubah!');
    }

    public function simpanBahanBaku(Request $r)
    {
        $tambah = new BahanBaku();
        $tambah->kode = $r['kode_bahan'];
        $tambah->nama = $r['nama_bahan'];
        $tambah->save();

        return back()->with('sukses','Tambah data bahan baku berhasil!');
    }

    public function editBahanBaku($id)
    {
        $header = 'EDIT BAHAN BAKU';
        $data = collect(\DB::select("select * from tbl_bahan_baku where id = '".$id."'"))->first();
        $kode = KodeBahanBaku::all();

        return view('edit_bahan_baku', [
            'header' => $header,
            'kode' => $kode,
            'data' => $data
        ]);
    }

    public function updateBahanBaku(Request $r, $id)
    {
        DB::table('tbl_bahan_baku')->where('id',$id)->update([
            'kode' => $r['kode_bahan'],
            'nama' => $r['nama_bahan']
        ]);

        return redirect('admin/bahan_baku')->with('sukses_ubah','Data bahan baku berhasil diubah!');
    }

    public function hapusBahanBaku($id)
    {
        DB::table('tbl_bahan_baku')->where('id', '=', $id)->delete();

        return back()->with('sukses_hapus','Data bahan baku berhasil dihapus!');
    }

    public function bahanKemas()
    {
        $header = 'BAHAN KEMAS';
        $no = 1;
        $data = BahanKemas::all();

        return view('bahan_kemas',[
            'header' => $header,
            'data' => $data,
            'no' => $no
        ]);
    }

    public function kodeBahanKemas()
    {
        $header = 'KODE BAHAN KEMAS';
        $data = KodeBahanKemas::all();
        $no = 1;

        return view('kode_bahan_kemas',[
            'header' => $header,
            'no' => $no,
            'data' => $data
        ]);
    }

    public function simpanKodeBahanKemas(Request $r)
    {
        $tambah = new KodeBahanKemas();
        $tambah->nama = $r['nama'];
        $tambah->save();

        return back()->with('sukses_simpan', 'Tambah data kode bahan kemas berhasil!');
    }

    public function tambahBahanKemas()
    {
        $header = 'TAMBAH BAHAN KEMAS'; 
        $kode = KodeBahanKemas::all();

        return view('tambah_bahan_kemas',[
            'header' => $header,
            'kode' => $kode
        ]);
    }

    public function simpanBahanKemas(Request $r)
    {
        $tambah = new BahanKemas();
        $tambah->kode = $r['kode_bahan'];
        $tambah->nama = $r['nama_bahan'];
        $tambah->save();

        return back()->with('sukses','Berhasil menambah data bahan kemas!');
    }

    public function editBahanKemas($id)
    {
        $header = 'EDIT BAHAN KEMAS';
        $kode = KodeBahanKemas::all();
        $data = collect(\DB::select("select * from tbl_bahan_kemas where id = '".$id."' "))->first();
        
        return view('edit_bahan_kemas',[
            'header' => $header,
            'data' => $data,
            'kode' => $kode
        ]);
    }

    public function updateBahanKemas(Request $r, $id)
    {
        DB::table('tbl_bahan_kemas')->where('id',$id)->update([
            'kode' => $r['kode_bahan'],
            'nama' => $r['nama_bahan']
        ]);

        return redirect('admin/bahan_kemas')->with('sukses_ubah','Data bahan kemas berhasil diubah!');   
    }

    public function barangJadi()
    {
        $header = 'BARANG JADI';
        $data = BarangJadi::all();
        $no = 1;

        return view('barang_jadi',[
            'header' => $header,
            'data' => $data,
            'no' => $no
        ]);
    }

    public function tambahBarangJadi()
    {
        $header = 'TAMBAH BARANG JADI';

        return view('tambah_barang_jadi', [
            'header' => $header
        ]);
    }

    public function simpanBarangJadi(Request $r)
    {
        $tambah = new BarangJadi();
        $tambah->kode = $r['kode'];
        $tambah->nama = $r['nama'];
        $tambah->save();

        return back()->with('sukses','Tambah data barang jadi berhasil!');
    }

    public function editBarangJadi($id)
    {
        $header = 'EDIT BARANG JADI';
        $data = collect(\DB::select("select * from tbl_barang_jadi where id = '".$id."'"))->first();

        return view('edit_barang_jadi',[
            'header' => $header,
            'data' => $data
        ]);
    }

    public function updateBarangJadi(Request $r, $id)
    {
        DB::table('tbl_barang_jadi')->where('id',$id)->update([
            'kode' => $r['kode'],
            'nama' => $r['nama']
        ]);

        return redirect('admin/barang_jadi')->with('sukses_ubah','Data barang jadi berhasil diubah!');
    }

    public function hapusBarangJadi($id)
    {
        DB::table('tbl_barang_jadi')->where('id', '=', $id)->delete();

        return back()->with('sukses_hapus','Data barang jadi berhasil dihapus!');
    }
    
    public function hapusBahanKemas($id)
    {
        DB::table('tbl_bahan_kemas')->where('id', '=', $id)->delete();

        return back()->with('sukses_hapus','Data berhasil dihapus!');
    }
    
    public function hapusKodeBahanKemas($id)
    {
        DB::table('tbl_kode_bahan_kemas')->where('id', '=', $id)->delete();

        return back()->with('sukses_hapus','Data berhasil dihapus!');
    }
}
