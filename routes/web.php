<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('admin/dashboard');;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function () {
	Route::get('dashboard', 'DashboardController@index');

	//MANAGEMENT DATA USERS
	Route::get('management_data_user', 'SettingController@index');
	Route::get('tambah_user', 'SettingController@tambahUser');
	Route::post('simpan_user', 'SettingController@simpanUser');
	Route::get('edit_user/{id}', 'SettingController@editUser');
	Route::post('update_user/{id}', 'SettingController@updateUser');
	Route::get('hapus_user/{id}', 'SettingController@hapusUser');

	Route::post('change_password/{id}', 'SettingController@changePassword');

	Route::get('hak_akses', 'SettingController@hakAkses');
	Route::post('simpan_perubahan_hak_akses', 'SettingController@simpanHakAkses');

	Route::get('bahan_baku', 'BarangController@bahanBaku');
	Route::get('tambah_bahan_baku', 'BarangController@tambahBahanBaku');
	Route::get('kode_bahan_baku', 'BarangController@kodeBahanBaku');
	Route::post('simpan_kode_bahan_baku', 'BarangController@simpanKodeBahan');
	Route::get('hapus_kode_bahan_baku/{id}', 'BarangController@hapusKodeBahanBaku');
	Route::post('update_kode_bahan_baku/{id}', 'BarangController@updateKodeBahan');
	Route::post('simpan_bahan_baku', 'BarangController@simpanBahanBaku');
	Route::get('edit_bahan_baku/{id}', 'BarangController@editBahanBaku');
	Route::post('update_bahan_baku/{id}', 'BarangController@updateBahanBaku');
	Route::get('hapus_bahan_baku/{id}', 'BarangController@hapusBahanBaku');
    Route::get('hapus_kode_bahan_kemas/{id}', 'BarangController@hapusKodeBahanKemas');
    
	//BAHAN KEMAS
	Route::get('bahan_kemas', 'BarangController@bahanKemas');
	Route::get('kode_bahan_kemas', 'BarangController@kodeBahanKemas');
	Route::post('simpan_kode_bahan_kemas', 'BarangController@simpanKodeBahanKemas');
	Route::get('tambah_bahan_kemas', 'BarangController@tambahBahanKemas');
	Route::post('simpan_bahan_kemas', 'BarangController@simpanBahanKemas');
	Route::get('edit_bahan_kemas/{id}', 'BarangController@editBahanKemas');
	Route::get('hapus_bahan_kemas/{id}', 'BarangController@hapusBahanKemas');
	Route::post('update_bahan_kemas/{id}', 'BarangController@updateBahanKemas');

	//BARANG JADI
	Route::get('barang_jadi', 'BarangController@barangJadi');
	Route::get('tambah_barang_jadi', 'BarangController@tambahBarangJadi');
	Route::post('simpan_barang_jadi', 'BarangController@simpanBarangJadi');
	Route::get('edit_barang_jadi/{id}', 'BarangController@editBarangJadi');
	Route::post('update_barang_jadi/{id}', 'BarangController@updateBarangJadi');
	Route::get('hapus_barang_jadi/{id}', 'BarangController@hapusBarangJadi');

	//QC BAHAN BAKU
	Route::get('cek_bahan_baku', 'QualityControlController@bahanBaku');
	Route::get('tambah_cek_bahan_baku', 'QualityControlController@tambahBahanBaku');
	Route::post('simpan_cek_bahan_baku', 'QualityControlController@simpanBahanBaku');
	Route::get('hapus_cek_bahan_baku/{id}', 'QualityControlController@hapusBahanBaku');
	Route::get('edit_cek_bahan_baku/{id}', 'QualityControlController@editBahanBaku');
	Route::post('update_cek_bahan_baku/{id}', 'QualityControlController@updateBahanBaku');

	//BAHAN KEMAS
	Route::get('cek_bahan_kemas', 'QualityControlController@bahanKemas');
	Route::get('tambah_cek_bahan_kemas', 'QualityControlController@qcBahanKemas');
	Route::post('simpan_cek_bahan_kemas', 'QualityControlController@simpanBahanKemas');
	Route::get('hapus_cek_bahan_kemas/{id}', 'QualityControlController@hapusBahanKemas');
	Route::get('edit_cek_bahan_kemas/{id}', 'QualityControlController@editBahanKemas');
	Route::post('update_cek_bahan_kemas/{id}', 'QualityControlController@updateBahanKemas');
	Route::get('cek_bahan_kemas_detail', 'QualityControlController@bahanKemasDetail');
	Route::get('tambah_cek_bahan_kemas_detail', 'QualityControlController@tambahBahanKemasDetail');
	Route::post('simpan_cek_bahan_kemas_detail', 'QualityControlController@simpanBahanKemasDetail');
	Route::get('hapus_cek_bahan_kemas_detail/{id}', 'QualityControlController@hapusBahanKemasDetail');
	Route::get('edit_cek_bahan_kemas_detail/{id}', 'QualityControlController@editBahanKemasDetail');
	Route::post('update_cek_bahan_kemas_detail/{id}', 'QualityControlController@updateBahanKemasDetail');

	//PEMERIKSAAN PACKING
	Route::get('pemeriksaan_packing', 'QualityControlController@pemeriksaanPacking');
	Route::get('tambah_pemeriksaan_packing', 'QualityControlController@tambahPemeriksaanPacking');
	Route::post('simpan_pemeriksaan_packing', 'QualityControlController@simpanPemeriksaanPacking');
	Route::get('hapus_pemeriksaan_packing/{id}', 'QualityControlController@hapusPemeriksaanPacking');
	Route::get('edit_pemeriksaan_packing/{id}', 'QualityControlController@editPemeriksaanPacking');
	Route::post('update_pemeriksaan_packing/{id}', 'QualityControlController@updatePemeriksaanPacking');
	Route::get('wip', 'QualityControlController@wip');
	Route::get('tambah_wip', 'QualityControlController@tambahWip');
	Route::post('simpan_wip', 'QualityControlController@simpanWip');
	Route::get('edit_wip/{id}', 'QualityControlController@editWip');
	Route::post('update_wip/{id}', 'QualityControlController@updateWip');
	Route::get('hapus_wip/{id}', 'QualityControlController@hapusWip');
	
	//PEMERIKSAAN BAHAN KEMAS
	Route::get('pemeriksaaan_bahan_kemas', 'QualityControlController@pemeriksaanBahanKemas');
	Route::get('tambah_packing_bahan_kemas', 'QualityControlController@tambahPackingBahanKemas');
	Route::post('simpan_packing_bahan_kemas', 'QualityControlController@simpanPackingBahanKemas');
	Route::get('edit_packing_bahan_kemas/{id}', 'QualityControlController@editPackingBahanKemas');
	Route::post('update_packing_bahan_kemas/{id}', 'QualityControlController@updatePackingBahanKemas');
	Route::get('hapus_packing_bahan_kemas/{id}', 'QualityControlController@hapusPackingBahanKemas');

	//PEMERIKSAAN HASIL KEMAS
	Route::get('pemeriksaaan_hasil_kemas', 'QualityControlController@packingHasilKemas');
	Route::get('tambah_packing_hasil_kemas', 'QualityControlController@tambahPackingHasilKemas');
	Route::post('simpan_packing_hasil_kemas', 'QualityControlController@simpanPackingHasilKemas');
	Route::get('edit_packing_hasil_kemas/{id}', 'QualityControlController@editPackingHasilKemas');
	Route::post('update_packing_hasil_kemas/{id}', 'QualityControlController@updatePackingHasilKemas');
	Route::get('hapus_packing_hasil_kemas/{id}', 'QualityControlController@hapusPackingHasilKemas');

	//PEMERIKSAAN HASIL KARTON
	Route::get('pemeriksaaan_hasil_karton', 'QualityControlController@packingHasilKarton');
	Route::get('tambah_packing_hasil_karton', 'QualityControlController@tambahPackingHasilKarton');
	Route::post('simpan_packing_hasil_karton', 'QualityControlController@simpanPackingHasilKarton');
	Route::get('edit_packing_hasil_karton/{id}', 'QualityControlController@editPackingHasilKarton');
	Route::post('update_packing_hasil_karton/{id}', 'QualityControlController@updatePackingHasilKarton');
	Route::get('hapus_packing_hasil_karton/{id}', 'QualityControlController@hapusPackingHasilKarton');

	//PROSES PRODUKSI
	Route::get('proses_produksi', 'QualityControlController@prosesProduksi');
	Route::get('tambah_proses_produksi', 'QualityControlController@tambahProsesProduksi');
	Route::post('simpan_proses_produksi', 'QualityControlController@simpanProsesProduksi');
	Route::get('edit_proses_produksi/{id}', 'QualityControlController@editProsesProduksi');
	Route::post('update_proses_produksi/{id}', 'QualityControlController@updateProsesProduksi');
	Route::get('hapus_proses_produksi/{id}', 'QualityControlController@hapusProsesProduksi');
	
	Route::get('proses_produksi_detail', 'QualityControlController@prosesProduksiDetail');
	Route::get('tambah_proses_produksi_detail', 'QualityControlController@tambahProduksiDetail');
	Route::post('simpan_proses_produksi_detail', 'QualityControlController@simpanProduksiDetail');
	Route::get('edit_proses_produksi_detail/{id}', 'QualityControlController@editProduksiDetail');
	Route::post('update_proses_produksi_detail/{id}', 'QualityControlController@updateProduksiDetail');
	Route::get('hapus_proses_produksi_detail/{id}', 'QualityControlController@hapusProduksiDetail');

	Route::get('proses_produksi_informasi_lain', 'QualityControlController@produksiInformasiLain');
	Route::get('tambah_proses_produksi_informasi_lain', 'QualityControlController@tambahProduksiInformasiLain');
	Route::post('simpan_proses_produksi_informasi_lain', 'QualityControlController@simpanProduksiInformasiLain');
	Route::get('edit_proses_produksi_informasi_lain/{id}', 'QualityControlController@editProduksiInformasiLain');
	Route::post('update_proses_produksi_informasi_lain/{id}', 'QualityControlController@updateProduksiInformasiLain');
	Route::get('hapus_proses_produksi_detail/{id}', 'QualityControlController@hapusProduksiInformasiLain');


	//QC BARANG JADI
	Route::get('qc_barang_jadi', 'QualityControlController@qcBarangJadi');
	Route::get('tambah_qc_barang_jadi', 'QualityControlController@tambahQCBarangJadi');
	Route::post('simpan_qc_barang_jadi', 'QualityControlController@simpanQCBarangJadi');
	Route::get('edit_qc_barang_jadi/{id}', 'QualityControlController@editQCBarangJadi');
	Route::post('update_qc_barang_jadi/{id}', 'QualityControlController@updateQCBarangJadi');
	Route::get('hapus_qc_barang_jadi/{id}', 'QualityControlController@hapusQCBarangJadi');


	//LAPORAN

	// Route::get('test', 'LaporanController@export');
	Route::get('report_bahan_baku', 'LaporanController@bahanBaku');
	Route::post('report_bahan_baku_filter', 'LaporanController@bahanBakuFilter');
	Route::get('export_bahan_baku/{tanggal}/{area}', 'LaporanController@exportBahanBaku');

	Route::get('report_proses_produksi', 'LaporanController@prosesProduksi');
	Route::post('report_proses_produksi_filter', 'LaporanController@prosesProduksiFilter');
	Route::get('export_proses_produksi/{tanggal}/{nama}', 'LaporanController@exportProsesProduksi');

	Route::get('report_packing', 'LaporanController@packing');
	Route::post('report_packing_filter', 'LaporanController@packingFilter');
	Route::get('export_packing/{tanggal}/{nama_barang}', 'LaporanController@exportPacking');

	Route::get('report_barang_jadi', 'LaporanController@brangJadi');
	Route::post('report_barang_jadi_filter', 'LaporanController@brangJadiFilter');
	Route::get('export_barang_jadi/{tanggal}/{kendaraan}', 'LaporanController@exportBrangJadi');
	
	Route::get('report_bahan_kemas', 'LaporanController@bahanKemas');
	Route::post('report_bahan_kemas_filter', 'LaporanController@bahanKemasFilter');
	Route::get('export_bahan_kemas/{tanggal}/{area}', 'LaporanController@exportBahanKemas');


});
