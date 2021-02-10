<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CekBahanBakuDetail;
use App\CekBahanBaku;
use App\PemeriksaanPacking;
use App\BarangJadi;
use App\WIPModel;
use App\PackingBahanKemas;
use App\PackingHasilKemas;
use App\PackingHasilKemasDetail;
use App\PackingHasilKarton;
use App\PackingHasilKartonDetail;
use App\ProsesProduksi;
use App\ProsesProduksiDetail;
use App\ProsesProduksiInformasiLain;
use App\QCBarangJadi;
use App\QCBarangJadiDetail;
use App\QCBahanKemas;
use App\QCBahanKemasDetail;
use App\BahanBaku;
use App\BahanKemas;
use DB;

class QualityControlController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function bahanBaku()
    {
    	$header = 'CEK BAHAN BAKU';
        $data = CekBahanBaku::all();
        $no = 1;

    	return view('cek_bahan_baku',[
    		'header' => $header,
            'no' => $no,
            'data' => $data,
    	]);
    }

    public function tambahBahanBaku()
    {
        $header = 'TAMBAH CEK BAHAN BAKU';
        // $data = DB::select("SELECT * FROM tbl_cek_bahan_baku GROUP BY tanggal_datang, area, jenis");
        $data = CekBahanBaku::all();
        $jenisBahanBaku = BahanBaku::all();
        return view('tambah_cek_bahan_baku',[
            'header' => $header,
            'jenisBahanBaku' => $jenisBahanBaku,
            'data' => $data
        ]);
    }

    public function simpanBahanBaku(Request $r)
    {
        $cekData = DB::select("select * from tbl_cek_bahan_baku where tanggal_datang = '".$r['tanggal_kedatangan']."' AND area = '".$r['area']."' AND jenis = '".$r['jenis_bahan_baku']."' ");

        if (empty($cekData)) {
            $tambahMaster = new CekBahanBaku();
            $tambahMaster->tanggal_datang = $r['tanggal_kedatangan'];
            $tambahMaster->area = $r['area'];
            $tambahMaster->jam_sample = $r['jam_sample'];
            $tambahMaster->jenis = $r['jenis_bahan_baku'];
            $tambahMaster->merk = $r['merk'];
            $tambahMaster->produsen = $r['produsen'];
            $tambahMaster->negara_asal = $r['negara_asal'];
            $tambahMaster->pemasok = $r['pemasok'];
            $tambahMaster->no_po = $r['no_po'];
            $tambahMaster->jumlah = $r['jumlah'];
            $tambahMaster->satuan = $r['satuan'];
            $tambahMaster->no_lot = $r['no_lot'];
            $tambahMaster->exp_date = $r['expired_date'];
            // $tambahMaster->kode_cek_bahan_baku = $r[''];
            $tambahMaster->save();
        }


        $cekData2 = collect(\DB::select("select * from tbl_cek_bahan_baku where tanggal_datang = '".$r['tanggal_kedatangan']."' AND area = '".$r['area']."' AND jenis = '".$r['jenis_bahan_baku']."' "))->first();


        $tambahDetail = new CekBahanBakuDetail();
        $tambahDetail->kode_cek_bahan_baku = $cekData2->id;
        $tambahDetail->sanitasi_produk = $r['sanitasi_produk'];
        $tambahDetail->jenis_kemasan = $r['jenis_kemasan'];
        $tambahDetail->berat = $r['berat'];
        $tambahDetail->coa = $r['coa'];
        $tambahDetail->label = $r['label_halal'];
        $tambahDetail->sertifikasi = $r['sertifikasi_halal'];
        $tambahDetail->status = $r['status_halal'];
        $tambahDetail->tekstur = $r['tekstur'];
        $tambahDetail->aroma = $r['aroma'];
        $tambahDetail->warna = $r['warna'];
        $tambahDetail->cemaran_fisik = $r['cemaran_fisik'];
        $tambahDetail->particle_size = $r['particle_size'];
        $tambahDetail->mc = $r['mc'];
        $tambahDetail->ph = $r['ph'];
        $tambahDetail->kelarutan = $r['kelarutan'];
        $tambahDetail->aroma_b = $r['aroma_arga'];
        $tambahDetail->warna_b = $r['warna_arga'];
        $tambahDetail->rasa = $r['rasa'];
        $tambahDetail->no_mobil = $r['nomor_mobil'];
        $tambahDetail->no_container = $r['nomor_container'];
        $tambahDetail->kondisi_mobil = $r['kondisi_mobil'];
        $tambahDetail->keterangan = $r['keterangan'];
        $tambahDetail->save();

        return back()->with('sukses','Tambah data berhasil!');
    }

    public function hapusBahanBaku($id)
    {
        DB::table('tbl_cek_bahan_baku')->where('id', '=', $id)->delete();

        return back()->with('sukses_hapus','Data berhasil dihapus!');
    }

    public function editBahanBaku($id)
    {
        $header = 'EDIT DATA CEK BAHAN BAKU';
        $dataMaster = collect(\DB::select("select * from tbl_cek_bahan_baku where id = '".$id."'"))->first();
        $dataDetail = DB::select("select * from tbl_cek_bahan_baku_detail where kode_cek_bahan_baku = '".$id."'");
        
        return view('edit_cek_bahan_baku',[
            'header' => $header,
            'dataMaster' => $dataMaster,
            'dataDetail' => $dataDetail
        ]);
    }

    public function updateBahanBaku(Request $r, $id)
    {
        DB::table('tbl_cek_bahan_baku')->where('id',$id)->update([
            'tanggal_datang' => $r['tanggal_kedatangan'],
            'area' => $r['area'],
            'jam_sample' => $r['jam_sample'],
            'jenis' => $r['jenis_bahan_baku'],
            'merk' => $r['merk'],
            'produsen' => $r['produsen'],
            'negara_asal' => $r['negara_asal'],
            'pemasok' => $r['pemasok'],
            'no_po' => $r['no_po'],
            'jumlah' => $r['jumlah'],
            'satuan' => $r['satuan'],
            'no_lot' => $r['no_lot'],
            'exp_date' => $r['expired_date']
        ]);

        for ($i=0; $i < count($r['sanitasi_produk']); $i++) { 
            DB::table('tbl_cek_bahan_baku_detail')->where('id',$r['detail_id'][$i])->update([
                'sanitasi_produk' => $r['sanitasi_produk'][$i],
                'jenis_kemasan' => $r['jenis_kemasan'][$i],
                'berat' => $r['berat'][$i],
                'coa' => $r['coa'][$i],
                'label' => $r['label_halal'][$i],
                'sertifikasi' => $r['sertifikasi_halal'][$i],
                'status' => $r['status_halal'][$i],
                'tekstur' => $r['tekstur'][$i],
                'aroma' => $r['aroma'][$i],
                'warna' => $r['warna'][$i],
                'cemaran_fisik' => $r['cemaran_fisik'][$i],
                'particle_size' => $r['particle_size'][$i],
                'mc' => $r['mc'][$i],
                'ph' => $r['ph'][$i],
                'kelarutan' => $r['kelarutan'][$i],
                'aroma_b' => $r['aroma_arga'][$i],
                'warna_b' => $r['warna_arga'][$i],
                'rasa' => $r['rasa'][$i],
                'no_mobil' => $r['nomor_mobil'][$i],
                'no_container' => $r['nomor_container'][$i],
                'kondisi_mobil' => $r['kondisi_mobil'][$i],
                'keterangan' => $r['keterangan'][$i]
            ]);            
        }

        return redirect('admin/cek_bahan_baku')->with('sukses_ubah','Data berhasil diubah!');
    }

    

    //PEMERIKSAAN PACKING
    public function pemeriksaanPacking()
    {
        $header = 'PEMERIKSAAN PACKING';
        $data = PemeriksaanPacking::all(); 
        $no = 1;

        return view('pemeriksaan_packing', [
            'header' => $header,
            'data' => $data,
            'no' => $no
        ]);
    }

    public function tambahPemeriksaanPacking()
    {
        $header = 'TAMBAH PEMERIKSAAN PACKING';
        $produk = BarangJadi::all();
        return view('tambah_pemeriksaan_packing', [
            'header' => $header,
            'produk' => $produk
        ]);
    }

    public function simpanPemeriksaanPacking(Request $r)
    {
        $tambah = new PemeriksaanPacking();
        $tambah->nama_produk = $r['nama_produk'];
        $tambah->tanggal_produksi = $r['tanggal_produksi'];
        $tambah->mesin = $r['mesin'];
        $tambah->no_so = $r['no_so'];
        $tambah->no_md = $r['no_md'];
        $tambah->setting_md = $r['setting_md'];
        $tambah->hopper_mesin_kemas = $r['hopper_mesin_kemas'];
        $tambah->mesin_kemas = $r['mesin_kemas'];
        $tambah->karton_sealer = $r['karton_sealer'];
        $tambah->save();

        return back()->with('sukses','Tambah data berhasil!');
    }

    public function hapusPemeriksaanPacking($id)
    {
        DB::table('tbl_pemeriksaan_packing')->where('id', '=', $id)->delete();

        return back()->with('sukses_hapus','Data berhasil dihapus!');   
    }

    public function editPemeriksaanPacking($id)
    {
        $header = 'EDIT PEMERIKSAAN PACKING';
        $produk = BarangJadi::all();
        $data = collect(\DB::select("select * from tbl_pemeriksaan_packing where id = '".$id."' "))->first();
        
        return view('edit_pemeriksaan_packing', [
            'header' => $header,
            'data' => $data,
            'produk' => $produk
        ]);
    }

    public function updatePemeriksaanPacking(Request $r, $id)
    {
        DB::table('tbl_pemeriksaan_packing')->where('id',$id)->update([
            'nama_produk' => $r['nama_produk'],
            'tanggal_produksi' => $r['tanggal_produksi'],
            'mesin' => $r['mesin'],
            'no_so' => $r['no_so'],
            'no_md' => $r['no_md'],
            'setting_md' => $r['setting_md'],
            'hopper_mesin_kemas' => $r['hopper_mesin_kemas'],
            'mesin_kemas' => $r['mesin_kemas'],
            'karton_sealer' => $r['karton_sealer']            
        ]);

        return redirect('admin/pemeriksaan_packing')->with('sukses_ubah','Data berhasil diubah!');   
    }

    public function wip()
    {
        $header = 'PEMERIKSAAN PACKING - WIP';
        $data = DB::select("SELECT a.id, a.nama_produk, a.tanggal_produksi, a.mesin, a.no_so, a.no_md, a.setting_md, a.hopper_mesin_kemas, a.mesin_kemas, a.karton_sealer, b.id AS id_wip, b.jam, b.warna, b.bentuk, b.kode_packing FROM tbl_pemeriksaan_packing a INNER JOIN tbl_p_wip b ON a.id = b.kode_packing ORDER BY b.id ASC");
        $no = 1;

        return view('wip' ,[
            'header' => $header,
            'data' => $data,
            'no' => $no
        ]);
    }

    public function tambahWip()
    {
        $header = 'PEMERIKSAAN PACKING - TAMBAH DATA WIP';
        $packing = PemeriksaanPacking::all();
        $no = 1;
        return view('tambah_wip', [
            'header' => $header,
            'packing' => $packing,
            'no' => $no
        ]);
    }

    public function simpanWip(Request $r)
    {
        $tambah = new WIPModel();
        $tambah->jam = $r['jam'];
        $tambah->warna = $r['warna'];
        $tambah->bentuk = $r['bentuk'];
        $tambah->kode_packing = $r['kode_packing'];
        $tambah->save();

        return back()->with('sukses','Tambah data berhasil!');
    }

    public function editWip($id)
    {
        $header = 'PEMERIKSAAN PACKING - EDIT DATA WIP';
        $data = collect(\DB::select("SELECT a.id, a.nama_produk, a.tanggal_produksi, a.mesin, a.no_so, a.no_md, a.setting_md, a.hopper_mesin_kemas, a.mesin_kemas, a.karton_sealer, b.id AS id_wip, b.jam, b.warna, b.bentuk, b.kode_packing FROM tbl_pemeriksaan_packing a INNER JOIN tbl_p_wip b ON a.id = b.kode_packing where b.id = '".$id."'"))->first();
        $packing = PemeriksaanPacking::all();
        $no = 1;
        return view('edit_wip' ,[
            'header' => $header,
            'data' => $data,
            'no' => $no,
            'packing' => $packing
        ]);
    }

    public function updateWip(Request $r, $id)
    {
        DB::table('tbl_p_wip')->where('id',$id)->update([
            'jam' => $r['jam'],
            'warna' => $r['warna'],
            'bentuk' => $r['bentuk'],
            'kode_packing' => $r['kode_packing']
        ]);   

        return redirect('admin/wip')->with('sukses_ubah' ,'Data berhasil dirubah!');
    }

    public function hapusWip($id)
    {
        DB::table('tbl_p_wip')->where('id', '=', $id)->delete();

        return back()->with('sukses_hapus','Data berhasil dihapus!');
    }

    public function pemeriksaanBahanKemas()
    {
        $header = 'PEMERIKSAAN PACKING - BAHAN KEMAS';
        $data = DB::select("SELECT a.id, a.nama_produk, a.tanggal_produksi, a.mesin, a.no_so, a.no_md, a.setting_md, a.hopper_mesin_kemas, a.mesin_kemas, a.karton_sealer, b.id AS id_bahan_kemas, b.supplier, b.lot, b.warna, b.delaminasi, b.jumlah FROM tbl_pemeriksaan_packing a INNER JOIN tbl_p_bahan_kemas b ON a.id = b.kode_packing ORDER BY b.id ASC");
        $no = 1;

        return view('pemeriksaan_bahan_kemas', [
            'header' => $header,
            'data' => $data,
            'no' => $no,
        ]);
    }

    public function tambahPackingBahanKemas()
    {
        $header = 'PEMERIKSAAN PACKING - TAMBAH DATA BAHAN KEMAS';
        $packing = PemeriksaanPacking::all();
        $no = 1;

        return view('tambah_packing_bahan_kemas', [
            'header' => $header,
            'packing' => $packing,
            'no' => $no
        ]);
    }

    public function simpanPackingBahanKemas(Request $r)
    {
        $tambah = new PackingBahanKemas();
        $tambah->supplier = $r['supplier'];
        $tambah->lot = $r['lot'];
        $tambah->warna = $r['warna'];
        $tambah->delaminasi = $r['delaminasi'];
        $tambah->jumlah = $r['jumlah'];
        $tambah->kode_packing = $r['kode_packing'];
        $tambah->save();

        return back()->with('sukses','Tambah data berhasil!');
    }

    public function editPackingBahanKemas($id)
    {
        $header = 'PEMERIKSAAN PACKING - EDIT DATA BAHAN KEMAS';
        $data = collect(\DB::select("SELECT a.id, a.nama_produk, a.tanggal_produksi, a.mesin, a.no_so, a.no_md, a.setting_md, a.hopper_mesin_kemas, a.mesin_kemas, a.karton_sealer, b.id AS id_bahan_kemas, b.supplier, b.lot, b.warna, b.delaminasi, b.jumlah, b.kode_packing FROM tbl_pemeriksaan_packing a INNER JOIN tbl_p_bahan_kemas b ON a.id = b.kode_packing where b.id = '".$id."'"))->first();
        $packing = PemeriksaanPacking::all();
        $no = 1;

        return view('edit_packing_bahan_kemas',[
            'header' => $header,
            'packing' => $packing,
            'no' => $no,
            'data' => $data
        ]);
    }

    public function updatePackingBahanKemas(Request $r, $id)
    {
        DB::table('tbl_p_bahan_kemas')->where('id',$id)->update([
            'supplier' => $r['supplier'],
            'lot' => $r['lot'],
            'warna' => $r['warna'],
            'delaminasi' => $r['delaminasi'],
            'jumlah' => $r['jumlah'],
            'kode_packing' => $r['kode_packing']
        ]);

        return redirect('admin/pemeriksaaan_bahan_kemas')->with('sukses_ubah','Data berhasil diubah!');
    }

    public function hapusPackingBahanKemas($id)
    {
        DB::table('tbl_p_bahan_kemas')->where('id', '=', $id)->delete();

        return back()->with('sukses_hapus','Data berhasil dihapus!');   
    }

    public function packingHasilKemas()
    {
        $header = 'PEMERIKSAAN PACKING - HASIL KEMAS';
        $data = DB::select("SELECT a.id, a.nama_produk, a.tanggal_produksi, a.mesin, a.no_so, a.no_md, a.setting_md, a.hopper_mesin_kemas, a.mesin_kemas, a.karton_sealer, b.id AS id_hasil_kemas, b.no_lot, b.exp_date FROM tbl_pemeriksaan_packing a INNER JOIN tbl_p_hasil_kemas b ON a.id = b.kode_packing ORDER BY b.id ASC");
        $no = 1;

        return view('packing_hasil_kemas', [
            'header' => $header,
            'data' => $data,
            'no' => $no
        ]);
    }

    public function tambahPackingHasilKemas()
    {
        $header = 'PEMERIKSAAN PACKING - HASIL KEMAS';
        $packing = PemeriksaanPacking::all();
        $no = 1;

        return view('tambah_packing_hasil_kemas', [
            'header' => $header,
            'packing' => $packing,
            'no' => $no
        ]);
    }

    public function simpanPackingHasilKemas(Request $r)
    {
        $tambah = new PackingHasilKemas();
        $tambah->no_lot = $r['no_lot'];
        $tambah->exp_date = $r['exp_date'];
        $tambah->kode_packing = $r['kode_packing'];
        $tambah->save();

        $getId = collect(\DB::select("select * from tbl_p_hasil_kemas order by id desc limit 1"))->first();

        for ($i=0; $i < count($r['jam']) ; $i++) { 

            $tambahDetail = new PackingHasilKemasDetail();
            $tambahDetail->jam = $r['jam'][$i];
            $tambahDetail->berat = $r['berat'][$i];
            $tambahDetail->kemasan = $r['kemasan'][$i];
            $tambahDetail->seal = $r['seal'][$i];
            $tambahDetail->kodefikasi = $r['kodefikasi'][$i];
            $tambahDetail->kebocoran = $r['kebocoran'][$i];
            $tambahDetail->metal_detector = $r['metal_detector'][$i];
            $tambahDetail->id_hasil_kemas = $getId->id;
            $tambahDetail->save();

        }

        return back()->with('sukses','Tambah data berhasil!');
    }

    public function editPackingHasilKemas($id)
    {
        $header = 'PEMERIKSAAN PACKING - EDIT DATA HASIL KEMAS';
        $data = collect(\DB::select("SELECT a.id, a.nama_produk, a.tanggal_produksi, a.mesin, a.no_so, a.no_md, a.setting_md, a.hopper_mesin_kemas, a.mesin_kemas, a.karton_sealer, b.id AS id_hasil_kemas, b.no_lot, b.exp_date, b.kode_packing FROM tbl_pemeriksaan_packing a INNER JOIN tbl_p_hasil_kemas b ON a.id = b.kode_packing WHERE b.id = '".$id."'"))->first();
        $dataDetail = DB::select("select * from tbl_p_hasil_kemas_detail where id_hasil_kemas = '".$data->id_hasil_kemas."'");
        $packing = PemeriksaanPacking::all();
        $no = 1;
        $j = 1;

        return view('edit_packing_hasil_kemas',[
            'header' => $header,
            'dataDetail' => $dataDetail,
            'packing' => $packing,
            'no' => $no,
            'j' => $j,
            'data' => $data
        ]);
    }

    public function updatePackingHasilKemas(Request $r, $id)
    {
        DB::table('tbl_p_hasil_kemas')->where('id',$id)->update([
            'no_lot' => $r['no_lot'],
            'exp_date' => $r['exp_date']
        ]);

        DB::table('tbl_p_hasil_kemas_detail')->where('id_hasil_kemas', '=', $id)->delete();

        for ($i=0; $i < count($r['jam']) ; $i++) { 

            $tambahDetail = new PackingHasilKemasDetail();
            $tambahDetail->jam = $r['jam'][$i];
            $tambahDetail->berat = $r['berat'][$i];
            $tambahDetail->kemasan = $r['kemasan'][$i];
            $tambahDetail->seal = $r['seal'][$i];
            $tambahDetail->kodefikasi = $r['kodefikasi'][$i];
            $tambahDetail->kebocoran = $r['kebocoran'][$i];
            $tambahDetail->metal_detector = $r['metal_detector'][$i];
            $tambahDetail->id_hasil_kemas = $id;
            $tambahDetail->save();

        }

        return redirect('admin/pemeriksaaan_hasil_kemas')->with('sukses_ubah','Data berhasil diubah!');
    }

    public function hapusPackingHasilKemas($id)
    {
        DB::table('tbl_p_hasil_kemas')->where('id', '=', $id)->delete();
        DB::table('tbl_p_hasil_kemas_detail')->where('id_hasil_kemas', '=', $id)->delete();

        return back()->with('sukses_hapus','Data berhasil dihapus!');   
    }

    public function packingHasilKarton()
    {
        $header = 'PEMERIKSAAN PACKING - HASIL KARTON';
        $data = DB::select("SELECT a.id, a.nama_produk, a.tanggal_produksi, a.mesin, a.no_so, a.no_md, a.setting_md, a.hopper_mesin_kemas, a.mesin_kemas, a.karton_sealer, b.id AS id_hasil_karton, b.no_lot FROM tbl_pemeriksaan_packing a INNER JOIN tbl_p_hasil_karton b ON a.id = b.kode_packing ORDER BY b.id ASC");
        $no = 1;

        return view('packing_hasil_karton',[
            'header' => $header,
            'data' => $data,
            'no' => $no
        ]);
    }

    public function tambahPackingHasilKarton()
    {
        $header = 'PEMERIKSAAN PACKING - TAMBAH DATA HASIL KARTON';
        $packing = PemeriksaanPacking::all();
        $no = 1;

        return view('tambah_packing_hasil_karton',[
            'header' => $header,
            'packing' => $packing,
            'no' => $no
        ]);        
    }

    public function simpanPackingHasilKarton(Request $r)
    {
        $tambah = new PackingHasilKarton();
        $tambah->no_lot = $r['no_lot'];
        $tambah->kode_packing = $r['kode_packing'];
        $tambah->save();

        $getId = collect(\DB::select("select * from tbl_p_hasil_karton order by id desc limit 1"))->first();

        for ($i=0; $i < count($r['jam']) ; $i++) { 

            $tambahDetail = new PackingHasilKartonDetail();
            $tambahDetail->jam = $r['jam'][$i];
            $tambahDetail->berat = $r['berat'][$i];
            $tambahDetail->kodefikasi = $r['kodefikasi'][$i];
            $tambahDetail->visual_karton = $r['visual_karton'][$i];
            $tambahDetail->id_hasil_karton = $getId->id;
            $tambahDetail->save();

        }

        return back()->with('sukses','Tambah data berhasil!');
    }

    public function editPackingHasilKarton($id)
    {
        $header = 'PEMERIKSAAN PACKING - EDIT DATA HASIL KARTON';
        $data = collect(\DB::select("SELECT a.id, a.nama_produk, a.tanggal_produksi, a.mesin, a.no_so, a.no_md, a.setting_md, a.hopper_mesin_kemas, a.mesin_kemas, a.karton_sealer, b.id AS id_hasil_karton, b.no_lot, b.kode_packing FROM tbl_pemeriksaan_packing a INNER JOIN tbl_p_hasil_karton b ON a.id = b.kode_packing where b.id = '".$id."'"))->first();
        $dataDetail = DB::select("select * from tbl_p_hasil_karton_detail where id_hasil_karton = '".$id."'");               
        $packing = PemeriksaanPacking::all();
        $no = 1;
        $j = 1;

        return view('edit_packing_hasil_karton',[
            'header' => $header,
            'data' => $data,
            'dataDetail' => $dataDetail,
            'packing' => $packing,
            'j' => $j,
            'no' => $no
        ]);
    }

    public function updatePackingHasilKarton(Request $r, $id)
    {
        DB::table('tbl_p_hasil_karton')->where('id',$id)->update([
            'no_lot' => $r['no_lot']
        ]);

        DB::table('tbl_p_hasil_karton_detail')->where('id_hasil_karton', '=', $id)->delete();

        for ($i=0; $i < count($r['jam']) ; $i++) { 
            $tambahDetail = new PackingHasilKartonDetail();
            $tambahDetail->jam = $r['jam'][$i];
            $tambahDetail->berat = $r['berat'][$i];
            $tambahDetail->kodefikasi = $r['kodefikasi'][$i];
            $tambahDetail->visual_karton = $r['visual_karton'][$i];
            $tambahDetail->id_hasil_karton = $id;
            $tambahDetail->save();
        }

        return redirect('admin/pemeriksaaan_hasil_karton')->with('sukses_ubah','Data berhasil diubah!');        
    }

    public function hapusPackingHasilKarton($id)
    {
        DB::table('tbl_p_hasil_karton')->where('id', '=', $id)->delete();
        DB::table('tbl_p_hasil_karton_detail')->where('id_hasil_karton', '=', $id)->delete();

        return back()->with('sukses_hapus','Data berhasil dihapus!');
    }

    public function prosesProduksi()
    {
        $header = 'PROSES PRODUKSI';
        $data = ProsesProduksi::all();
        $no = 1;

        return view('proses_produksi',[
            'header' => $header,
            'data' => $data,
            'no' => $no
        ]);
    }

    public function tambahProsesProduksi()
    {
        $header = 'TAMBAH PROSES PRODUKSI';
        $produk = BarangJadi::all();

        return view('tambah_proses_produksi',[
            'header' => $header,
            'produk' => $produk
        ]);
    }

    public function simpanProsesProduksi(Request $r)
    {
        $tambah = new ProsesProduksi();
        $tambah->nama_produk = $r['nama_produk'];
        $tambah->tanggal_produksi = $r['tanggal_produksi'];
        $tambah->shift = $r['shift'];
        $tambah->no_mesin = $r['no_mesin'];
        $tambah->no_microwave = $r['no_microwave'];
        $tambah->no_lot = $r['no_lot'];
        $tambah->save();

        return back()->with('sukses','Tambah data berhasil!');
    }

    public function editProsesProduksi($id)
    {
        $header = 'EDIT PROSES PRODUKSI';
        $data = collect(\DB::select("select * from tbl_proses_produksi where id = '".$id."'"))->first();    
        $produk = BarangJadi::all();

        return view('edit_proses_produksi',[
            'header' => $header,
            'produk' => $produk,
            'data' => $data
        ]);
    }

    public function updateProsesProduksi(Request $r, $id)
    {
        DB::table('tbl_proses_produksi')->where('id',$id)->update([
            'nama_produk' => $r['nama_produk'],
            'tanggal_produksi' => $r['tanggal_produksi'],
            'shift' => $r['shift'],
            'no_mesin' => $r['no_mesin'],
            'no_microwave' => $r['no_microwave'],
            'no_lot' => $r['no_lot']
        ]);

        return redirect('admin/proses_produksi')->with('sukses_ubah','Data berhasil diubah!');
    }

    public function hapusProsesProduksi($id)
    {
        DB::table('tbl_proses_produksi')->where('id', '=', $id)->delete();

        return back()->with('sukses_hapus','Data berhasil dihapus!');        
    }

    public function prosesProduksiDetail()
    {
        $header = 'PROSES PRODUKSI - DETAIL';
        $data = DB::select("SELECT a.nama_produk,a.tanggal_produksi, a.shift, a.no_mesin, a.no_microwave, a.no_lot, b.* FROM tbl_proses_produksi a INNER JOIN tbl_pp_detail b ON a.id=b.kode_proses_produksi");
        $no = 1;

        return view('proses_produksi_detail',[
            'header' => $header,
            'data' => $data,
            'no' => $no
        ]);
    }

    public function tambahProduksiDetail()
    {
        $header = 'PROSES PRODUKSI - DETAIL';
        $produksi = ProsesProduksi::all();
        $no = 1;

        return view('tambah_produksi_detail' ,[
            'header' => $header,
            'no' => $no,
            'produksi' => $produksi
        ]);
    }

    public function simpanProduksiDetail(Request $r)
    {
        $tambah = new ProsesProduksiDetail();
        $tambah->jam_ambil_sample = $r['jam_ambil_sample'];
        $tambah->kadar_air = $r['kadar_air'];
        $tambah->berat_sample = $r['berat_sample'];
        $tambah->bd = $r['bd_berat_sample'];
        $tambah->volume_kering = $r['volume_kering'];
        $tambah->volume_basah = $r['volume_basah'];
        $tambah->berat_kering = $r['berat_kering'];
        $tambah->berat_basah = $r['berat_basah'];
        $tambah->berat_kemasan = $r['berat_kemasan'];
        $tambah->tidak_ada_cemaran = $r['tidak_ada_cemaran'];
        $tambah->kenyal = $r['kenyal'];
        $tambah->serat = $r['serat'];
        $tambah->aroma = $r['aroma'];
        $tambah->rasa = $r['rasa'];
        $tambah->bentuk = $r['bentuk'];
        $tambah->warna = $r['warna'];
        $tambah->test_apung = $r['test_apung'];
        $tambah->bubuk = $r['bubuk'];
        $tambah->percent = $r['percent'];
        $tambah->status = $r['status'];
        $tambah->kode_proses_produksi = $r['kode_proses_produksi'];
        $tambah->save();

        return back()->with('sukses','Tambah data berhasil!');
    }

    public function editProduksiDetail($id)
    {
        $header = 'PROSES PRODUKSI - EDIT DATA DETAIL DETAIL';
        $data = collect(\DB::select("SELECT a.nama_produk,a.tanggal_produksi, a.shift, a.no_mesin, a.no_microwave, a.no_lot, b.* FROM tbl_proses_produksi a INNER JOIN tbl_pp_detail b ON a.id=b.kode_proses_produksi where b.id = '".$id."'"))->first();
        $produksi = ProsesProduksi::all();
        $no = 1;

        return view('edit_produksi_detail',[
            'header' => $header,
            'data' => $data,
            'produksi' => $produksi,
            'no' => $no
        ]);
    }

    public function produksiInformasiLain()
    {
        $header = 'PROSES PRODUKSI - INFORMASI LAIN';
        $data = DB::select("SELECT a.nama_produk,a.tanggal_produksi, a.shift, a.no_mesin, a.no_microwave, a.no_lot, b.* FROM tbl_proses_produksi a INNER JOIN tbl_pp_informasi_lain b ON a.id=b.kode_proses_produksi");
        $no = 1;

        return view('proses_produksi_informasi_lain',[
            'header' => $header, 
            'data' => $data, 
            'no' => $no 
        ]);
    }

    public function tambahProduksiInformasiLain()
    {
        $header = 'PROSES PRODUKSI - TAMBAH DATA INFORMASI LAIN';
        $produksi = ProsesProduksi::all();
        $no = 1;
        $bahanBaku = BahanBaku::all();

        return view('tambah_produksi_informasi_lain',[
            'header' => $header,
            'bahanBaku' => $bahanBaku,
            'no' => $no,
            'produksi' => $produksi
        ]);
    }

    public function simpanProduksiInformasiLain(Request $r)
    {
        for ($i=0; $i < count($r['jam']); $i++) { 
            $tambah = new ProsesProduksiInformasiLain();
            $tambah->jam = $r['jam'][$i];        
            $tambah->bahan_baku = $r['bahan_baku'][$i];        
            $tambah->no_lot = $r['no_lot_info'][$i];        
            $tambah->kadar_air_tepung = $r['kadar_air_tepung'][$i];        
            $tambah->bulk = $r['bulk'][$i];        
            $tambah->air = $r['air'][$i];        
            $tambah->kode_proses_produksi = $r['kode_proses_produksi'];     
            $tambah->save();   
        }

        DB::table('tbl_proses_produksi')->where('id',$r['kode_proses_produksi'])->update([
            'lolos' => $r['lolos'],
            'blending' => $r['blending'],
            'p_' => $r['p_'],
            'scrap' => $r['scrap'],
            'informasi_lain' => $r['informasi_lain']
        ]);

        return back()->with('sukses','Tambah data berhasil!');
    }

    public function updateProduksiDetail(Request $r, $id)
    {
        DB::table('tbl_pp_detail')->where('id',$id)->update([
            'jam_ambil_sample' => $r['jam_ambil_sample'],
            'kadar_air' => $r['kadar_air'],
            'berat_sample' => $r['berat_sample'],
            'bd' => $r['bd_berat_sample'],
            'volume_kering' => $r['volume_kering'],
            'volume_basah' => $r['volume_basah'],
            'berat_kering' => $r['berat_kering'],
            'berat_basah' => $r['berat_basah'],
            'berat_kemasan' => $r['berat_kemasan'],
            'tidak_ada_cemaran' => $r['tidak_ada_cemaran'],
            'kenyal' => $r['kenyal'],
            'serat' => $r['serat'],
            'aroma' => $r['aroma'],
            'rasa' => $r['rasa'],
            'bentuk' => $r['bentuk'],
            'warna' => $r['warna'],
            'test_apung' => $r['test_apung'],
            'bubuk' => $r['bubuk'],
            'percent' => $r['percent'],
            'status' => $r['status'],
            'kode_proses_produksi' => $r['kode_proses_produksi']
        ]);

        return redirect('admin/proses_produksi_detail')->with('sukses_ubah','Data berhasil diubah!');        
    }

    public function hapusProduksiDetail($id)
    {
        DB::table('tbl_pp_detail')->where('id', '=', $id)->delete();

        return back()->with('sukses_hapus','Data berhasil dihapus!');        
    }

    public function editProduksiInformasiLain($id)
    {
        $header = 'PROSES PRODUKSI - EDIT DATA INFORMASI LAIN';
        $data = collect(\DB::select("SELECT a.nama_produk,a.tanggal_produksi, a.shift, a.no_mesin, a.no_microwave, a.no_lot as no_lot_head, a.lolos, a.blending, a.p_, a.scrap, a.informasi_lain, b.* FROM tbl_proses_produksi a INNER JOIN tbl_pp_informasi_lain b ON a.id=b.kode_proses_produksi where b.id = '".$id."'"))->first();
        $produksi = ProsesProduksi::all();
        $no = 1;

        return view('edit_produksi_informasi_lain',[
            'header' => $header,
            'data' => $data,
            'produksi' => $produksi,
            'no' => $no
        ]);
    }

    public function updateProduksiInformasiLain(Request $r, $id)
    {
        DB::table('tbl_pp_informasi_lain')->where('id',$id)->update([
            'jam' => $r['jam'],        
            'bahan_baku' => $r['bahan_baku'],        
            'no_lot' => $r['no_lot_info'],        
            'kadar_air_tepung' => $r['kadar_air_tepung'],        
            'bulk' => $r['bulk'],        
            'air' => $r['air'],        
            'kode_proses_produksi' => $r['kode_proses_produksi']
        ]);

        DB::table('tbl_proses_produksi')->where('id',$r['kode_proses_produksi'])->update([
            'lolos' => $r['lolos'],
            'blending' => $r['blending'],
            'p_' => $r['p_'],
            'scrap' => $r['scrap'],
            'informasi_lain' => $r['informasi_lain']
        ]);

        return redirect('admin/proses_produksi_informasi_lain')->with('sukses_ubah','Data berhasil diubah!');    
    }

    public function hapusProduksiInformasiLain($id)
    {
        DB::table('tbl_pp_informasi_lain')->where('id', '=', $id)->delete();

        return back()->with('sukses_hapus','Data berhasil dihapus!');
    }

    public function qcBarangJadi()
    {
        $header = 'QC BARANG JADI';
        $data = DB::select("SELECT a.tanggal, a.kendaraan, b.* FROM tbl_qc_barang_jadi a INNER JOIN tbl_qc_barang_jadi_detail b ON a.id = b.kode_qc_barang_jadi");
        $no = 1;

        return view('qc_barang_jadi', [
            'header' => $header,
            'data' => $data,
            'no' => $no

        ]);
    }

    public function tambahQCBarangJadi()
    {
        $header = 'TAMBAH DATA QC BARANG JADI';
        $data = DB::select("select * from tbl_qc_barang_jadi group by tanggal,kendaraan");
        $no = 1;

        return view('tambah_qc_barang_jadi',[
            'header' => $header,
            'data' => $data,
            'no' => $no
        ]);
    }

    public function simpanQCBarangJadi(Request $r)
    {
        

              
        if ($r['kode_qc_barang_jadi'] == '') {
            $tambah = new QCBarangJadi();
            $tambah->tanggal = $r['tanggal'];
            $tambah->kendaraan = $r['kendaraan'];
            $tambah->save();

            $getLastId = collect(\DB::select("select * from tbl_qc_barang_jadi order by id desc limit 1 "))->first();
            
            $kode_qc_barang_jadi = $getLastId->id;    
        }else{
            $kode_qc_barang_jadi = $r['kode_qc_barang_jadi'];
        }
        $tambahDetail = new QCBarangJadiDetail();
        $tambahDetail->no_do = $r['no_do'];
        $tambahDetail->mulai = $r['mulai'];
        $tambahDetail->selesai = $r['selesai'];
        $tambahDetail->tujuan = $r['tujuan'];
        $tambahDetail->no_polisi = $r['no_polisi'];
        $tambahDetail->bersih = $r['bersih'];
        $tambahDetail->suku_cadang = $r['suku_cadang'];
        $tambahDetail->bau = $r['bau'];
        $tambahDetail->bocor = $r['bocor'];
        $tambahDetail->basah = $r['basah'];
        $tambahDetail->identitas_produk = $r['identitas_produk'];
        $tambahDetail->no_lot = $r['nomor_lot'];
        $tambahDetail->kondisi_jahitan = $r['kondisi_jahitan'];
        $tambahDetail->paper_zak = $r['paper_zak'];
        $tambahDetail->karton = $r['karton'];
        $tambahDetail->status = $r['status'];
        $tambahDetail->verifikasi = $r['verifikasi'];
        $tambahDetail->keterangan = $r['keterangan'];
        $tambahDetail->kode_qc_barang_jadi = $kode_qc_barang_jadi;
        $tambahDetail->save();

        return back()->with('sukses','Tambah data berhasil!');
    }

    public function editQCBarangJadi($id)
    {
        $header = 'EDIT DATA QC BARANG JADI';
        $getData = collect(\DB::select("SELECT a.tanggal, a.kendaraan, b.* FROM tbl_qc_barang_jadi a INNER JOIN tbl_qc_barang_jadi_detail b ON a.id = b.kode_qc_barang_jadi where b.id = '".$id."'"))->first();
        $data = QCBarangJadi::all();
        $no = 1;

        return view('edit_qc_barang_jadi',[
            'header' => $header,
            'getData' => $getData,
            'data' => $data,
            'no' => $no
        ]);   
    }

    public function updateQCBarangJadi(Request $r, $id)
    {
        DB::table('tbl_qc_barang_jadi')->where('id',$r['kode_qc_barang_jadi_old'])->update([
            'tanggal' => $r['tanggal'],
            'kendaraan' => $r['kendaraan']            
        ]);

        DB::table('tbl_qc_barang_jadi_detail')->where('id',$id)->update([
            'no_do' => $r['no_do'], 
            'mulai' => $r['mulai'], 
            'selesai' => $r['selesai'], 
            'tujuan' => $r['tujuan'], 
            'no_polisi' => $r['no_polisi'], 
            'bersih' => $r['bersih'], 
            'suku_cadang' => $r['suku_cadang'], 
            'bau' => $r['bau'], 
            'bocor' => $r['bocor'], 
            'basah' => $r['basah'], 
            'identitas_produk' => $r['identitas_produk'], 
            'no_lot' => $r['nomor_lot'], 
            'kondisi_jahitan' => $r['kondisi_jahitan'], 
            'paper_zak' => $r['paper_zak'], 
            'karton' => $r['karton'], 
            'status' => $r['status'], 
            'verifikasi' => $r['verifikasi'], 
            'keterangan' => $r['keterangan']                       
        ]);

        return redirect('admin/qc_barang_jadi')->with('sukses_ubah','Data berhasil diubah!');   
    }

    public function hapusQCBarangJadi($id)
    {
        DB::table('tbl_qc_barang_jadi_detail')->where('id', '=', $id)->delete();

        return back()->with('sukses_hapus','Data berhasil dihapus!');        
    }

    //BAHAN KEMAS
    public function bahanKemas()
    {
        $header = 'CEK BAHAN KEMAS';
        $data = QCBahanKemas::all();
        $no = 1;

        return view('cek_bahan_kemas', [
            'header' => $header,
            'data' => $data,
            'no' => $no
        ]);
    }

    public function qcBahanKemas()
    {
        $header = 'TAMBAH QC BAHAN KEMAS';
        $produk = BarangJadi::all();
        $data = QCBahanKemas::all();
        $bahanKemas = BahanKemas::all();
        $no = 1;

        return view('tambah_qc_bahan_kemas', [
            'header' => $header,
            'bahanKemas' => $bahanKemas,
            'data' => $data,
            'no' => $no,
            'produk' => $produk
        ]);
    }

    public function simpanBahanKemas(Request $r)
    {

        // $cekHead = collect(\DB::select("select * from tbl_qc_bahan_kemas where tanggal = '".$r['tanggal']."' and area = '".$r['area']."' and jam_sample = '".$r['jam_sample']."' and jenis = '".$r['jenis']."'"))->first();

        // if (empty($cekHead)) {       
            $tambah = new QCBahanKemas();
            $tambah->tanggal = $r['tanggal'];
            $tambah->area = $r['area'];
            $tambah->jam_sample = $r['jam_sample'];
            $tambah->jenis = $r['jenis'];
            $tambah->supplier = $r['supplier'];
            $tambah->no_po = $r['no_po'];
            $tambah->jumlah = $r['jumlah'];
            $tambah->satuan = $r['satuan'];
            $tambah->no_mobil = $r['no_mobil'];
            $tambah->no_lot = $r['no_lot'];
            $tambah->coa = $r['coa'];
            $tambah->no_md = $r['no_md'];
            $tambah->status = $r['status'];
            $tambah->save();
        // }

        // $cekHead2 = collect(\DB::select("select * from tbl_qc_bahan_kemas where tanggal = '".$r['tanggal']."' and area = '".$r['area']."' and jam_sample = '".$r['jam_sample']."' and jenis = '".$r['jenis']."'"))->first();

        // $tambahDetail = new QCBahanKemasDetail();
        // $tambahDetail->nama_produk = $r['nama_produk'];
        // $tambahDetail->netto = $r['netto'];
        // $tambahDetail->komposisi = $r['komposisi'];
        // $tambahDetail->alamat_produsen = $r['alamat_produsen'];
        // $tambahDetail->label_halal = $r['label_halal'];
        // $tambahDetail->barcode = $r['barcode'];
        // $tambahDetail->bau = $r['bau_menyimpang'];
        // $tambahDetail->warna = $r['warna'];
        // $tambahDetail->printing = $r['printing'];
        // $tambahDetail->delaminasi = $r['delaminasi'];
        // $tambahDetail->seal = $r['seal'];
        // $tambahDetail->creasing = $r['creasing'];
        // $tambahDetail->kondisi_core = $r['kondisi_core'];
        // $tambahDetail->cut_off = $r['cut_off'];
        // $tambahDetail->kondisi_mobil = $r['kondisi_mobil'];
        // $tambahDetail->jumlah_karton = $r['jumlah_ikatan_karton'];
        // $tambahDetail->tinggi_fluts_karton = $r['tinggi_fluts'];
        // $tambahDetail->panjang_karton = $r['panjang'];
        // $tambahDetail->lebar_karton = $r['lebar'];
        // $tambahDetail->tinggi_karton = $r['tinggi'];
        // $tambahDetail->berat_roll = $r['berat_roll'];
        // $tambahDetail->core_roll = $r['core_roll'];
        // $tambahDetail->panjang_roll = $r['panjang_roll'];
        // $tambahDetail->lebar_roll = $r['lebar_roll'];
        // $tambahDetail->tebal_roll = $r['tebal_roll'];
        // $tambahDetail->jumlah_bag = $r['jumlah_bag'];
        // $tambahDetail->gaset_bag = $r['gaset_bag'];
        // $tambahDetail->lebar_bag = $r['lebar_bag'];
        // $tambahDetail->tinggi_bag = $r['tinggi_bag'];
        // $tambahDetail->ketebalan_inner_bag = $r['ketebalan_inner'];
        // $tambahDetail->berat_plastik = $r['berat_plastik'];
        // $tambahDetail->ketebalan_plastik = $r['ketebalan_plastik'];
        // $tambahDetail->gaset_plastik = $r['gaset_plastik'];
        // $tambahDetail->lebar_plastik = $r['lebar_plastik'];
        // $tambahDetail->tinggi_plastik = $r['tinggi_plastik'];
        // $tambahDetail->keterangan = $r['keterangan'];
        // $tambahDetail->kode_bahan_kemas = $cekHead2->id;
        // $tambahDetail->save();

        return back()->with('sukses','Tambah data berhasil!');
    }

    public function hapusBahanKemas($id)
    {
        DB::table('tbl_qc_bahan_kemas')->where('id', '=', $id)->delete();
        // DB::table('tbl_qc_bahan_kemas_detail')->where('kode_bahan_kemas', '=', $id)->delete();

        return back()->with('sukses_hapus','Data berhasil dihapus!');
    }

    public function editBahanKemas($id)
    {
        $header = 'UPDATE CEK BAHAN KEMAS';
        $data = collect(\DB::select("select * from tbl_qc_bahan_kemas where id = '".$id."'"))->first();

        return view('edit_qc_bahan_kemas',[
            'header' => $header,
            'data' => $data
        ]);
    }

    public function updateBahanKemas(Request $r, $id)
    {
        DB::table('tbl_qc_bahan_kemas')->where('id',$id)->update([
            'tanggal' => $r['tanggal'],
            'area' => $r['area'],
            'jam_sample' => $r['jam_sample'],
            'jenis' => $r['jenis'],
            'supplier' => $r['supplier'],
            'no_po' => $r['no_po'],
            'jumlah' => $r['jumlah'],
            'satuan' => $r['satuan'],
            'no_mobil' => $r['no_mobil'],
            'no_lot' => $r['no_lot'],
            'coa' => $r['coa'],
            'status' => $r['status']
        ]);  

        return redirect('admin/cek_bahan_kemas')->with('sukses_ubah','Data berhasil diubah!');
    }

    public function bahanKemasDetail()
    {
        $header = 'CEK BAHAN KEMAS DETAIL';
        $data = DB::select("SELECT * FROM tbl_qc_bahan_kemas a INNER JOIN tbl_qc_bahan_kemas_detail b ON a.id = b.kode_bahan_kemas");
        $no = 1;

        return view('cek_bahan_kemas_detail',[
            'header' => $header,
            'data' => $data,
            'no' => $no
        ]);
    }

    public function tambahBahanKemasDetail()
    {
        $header = 'TAMBAH DATA BAHAN KEMAS DETAIL';
        $produk = BarangJadi::all();
        $data = QCBahanKemas::all();

        return view('tambah_qc_bahan_kemas_detail',[
            'header' => $header,
            'produk' => $produk,
            'data' => $data
        ]);
    }

    public function simpanBahanKemasDetail(Request $r)
    {
        $tambahDetail = new QCBahanKemasDetail();
        $tambahDetail->nama_produk = $r['nama_produk'];
        $tambahDetail->netto = $r['netto'];
        $tambahDetail->komposisi = $r['komposisi'];
        $tambahDetail->alamat_produsen = $r['alamat_produsen'];
        $tambahDetail->label_halal = $r['label_halal'];
        $tambahDetail->barcode = $r['barcode'];
        $tambahDetail->bau = $r['bau_menyimpang'];
        $tambahDetail->warna = $r['warna'];
        $tambahDetail->printing = $r['printing'];
        $tambahDetail->delaminasi = $r['delaminasi'];
        $tambahDetail->seal = $r['seal'];
        $tambahDetail->creasing = $r['creasing'];
        $tambahDetail->kondisi_core = $r['kondisi_core'];
        $tambahDetail->cut_off = $r['cut_off'];
        $tambahDetail->kondisi_mobil = $r['kondisi_mobil'];
        $tambahDetail->jumlah_karton = $r['jumlah_ikatan_karton'];
        $tambahDetail->tinggi_fluts_karton = $r['tinggi_fluts'];
        $tambahDetail->panjang_karton = $r['panjang'];
        $tambahDetail->lebar_karton = $r['lebar'];
        $tambahDetail->tinggi_karton = $r['tinggi'];
        $tambahDetail->berat_roll = $r['berat_roll'];
        $tambahDetail->core_roll = $r['core_roll'];
        $tambahDetail->panjang_roll = $r['panjang_roll'];
        $tambahDetail->lebar_roll = $r['lebar_roll'];
        $tambahDetail->tebal_roll = $r['tebal_roll'];
        $tambahDetail->jumlah_bag = $r['jumlah_bag'];
        $tambahDetail->gaset_bag = $r['gaset_bag'];
        $tambahDetail->lebar_bag = $r['lebar_bag'];
        $tambahDetail->tinggi_bag = $r['tinggi_bag'];
        $tambahDetail->ketebalan_inner_bag = $r['ketebalan_inner'];
        $tambahDetail->berat_plastik = $r['berat_plastik'];
        $tambahDetail->ketebalan_plastik = $r['ketebalan_plastik'];
        $tambahDetail->gaset_plastik = $r['gaset_plastik'];
        $tambahDetail->lebar_plastik = $r['lebar_plastik'];
        $tambahDetail->tinggi_plastik = $r['tinggi_plastik'];
        $tambahDetail->keterangan = $r['keterangan'];
        $tambahDetail->kode_bahan_kemas = $r['kode'];
        $tambahDetail->save();

        return back()->with('sukses','Tambah data berhasil!');
    }

    public function hapusBahanKemasDetail($id)
    {
        DB::table('tbl_qc_bahan_kemas_detail')->where('id', '=', $id)->delete();

        return back()->with('sukses_hapus','Data berhasil dihapus!');   
    }

    public function editBahanKemasDetail($id)
    {
        $header = 'EDIT DATA BAHAN KEMAS DETAIL';
        $getData = collect(\DB::select("SELECT b.*, a.tanggal, a.area, a.jam_sample, a.jenis, a.supplier, a.no_po, a.jumlah, a.satuan, a.no_mobil, a.no_lot, a.status, a.coa, a.no_md FROM tbl_qc_bahan_kemas a INNER JOIN tbl_qc_bahan_kemas_detail b ON a.id = b.kode_bahan_kemas where b.id = '".$id."';"))->first();
        $produk = BarangJadi::all();
        $data = QCBahanKemas::all();

        return view('edit_qc_bahan_kemas_detail',[
            'header' => $header,
            'data' => $data,
            'getData' => $getData,
            'produk' => $produk
        ]);
    }

    public function updateBahanKemasDetail(Request $r, $id)
    {
        DB::table('tbl_qc_bahan_kemas_detail')->where('id',$id)->update([
            'nama_produk' => $r['nama_produk'],
            'netto' => $r['netto'],
            'komposisi' => $r['komposisi'],
            'alamat_produsen' => $r['alamat_produsen'],
            'label_halal' => $r['label_halal'],
            'barcode' => $r['barcode'],
            'bau' => $r['bau_menyimpang'],
            'warna' => $r['warna'],
            'printing' => $r['printing'],
            'delaminasi' => $r['delaminasi'],
            'seal' => $r['seal'],
            'creasing' => $r['creasing'],
            'kondisi_core' => $r['kondisi_core'],
            'cut_off' => $r['cut_off'],
            'kondisi_mobil' => $r['kondisi_mobil'],
            'jumlah_karton' => $r['jumlah_ikatan_karton'],
            'tinggi_fluts_karton' => $r['tinggi_fluts'],
            'panjang_karton' => $r['panjang'],
            'lebar_karton' => $r['lebar'],
            'tinggi_karton' => $r['tinggi'],
            'berat_roll' => $r['berat_roll'],
            'core_roll' => $r['core_roll'],
            'panjang_roll' => $r['panjang_roll'],
            'lebar_roll' => $r['lebar_roll'],
            'tebal_roll' => $r['tebal_roll'],
            'jumlah_bag' => $r['jumlah_bag'],
            'gaset_bag' => $r['gaset_bag'],
            'lebar_bag' => $r['lebar_bag'],
            'tinggi_bag' => $r['tinggi_bag'],
            'ketebalan_inner_bag' => $r['ketebalan_inner'],
            'berat_plastik' => $r['berat_plastik'],
            'ketebalan_plastik' => $r['ketebalan_plastik'],
            'gaset_plastik' => $r['gaset_plastik'],
            'lebar_plastik' => $r['lebar_plastik'],
            'tinggi_plastik' => $r['tinggi_plastik'],
            'keterangan' => $r['keterangan'],
            'kode_bahan_kemas' => $r['kode']
        ]);  

        return redirect('admin/cek_bahan_kemas_detail')->with('sukses_ubah','Data berhasil diubah!');        
    }
}

