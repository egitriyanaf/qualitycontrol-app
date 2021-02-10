<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Symfony\Component\HttpFoundation\StreamedResponse;
use DB;

// model
use App\CekBahanBaku;
use App\ProsesProduksi;
use App\BarangJadi;
use App\PemeriksaanPacking;

class LaporanController extends Controller
{
    public function export()
    {
        $spreadsheet = IOFactory::load('export/Book1.xlsx');

        $worksheet = $spreadsheet->getActiveSheet();

        $worksheet->getCell('B2')->setValue('John');
        $worksheet->getCell('B3')->setValue('Smith');

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        // $writer->save('write.xlsx');
        $response =  new StreamedResponse(
              function () use ($writer) {
                  $writer->save('php://output');
              }
          );
          $response->headers->set('Content-Type', 'application/vnd.ms-excel');
          $response->headers->set('Content-Disposition', 'attachment;filename="ExportScan.xlsx"');
          $response->headers->set('Cache-Control','max-age=0');
          return $response;
    }

    public function bahanBaku()
    {
        $header = 'REPORT BAHAN BAKU';
        $data = CekBahanBaku::all();
        $param = 0;
        $no = 1;
        $areaData = DB::select("SELECT * FROM tbl_cek_bahan_baku GROUP BY area");
        $tanggal = date('Y-m-d');
        $area = '';

        return view('report_bahan_baku',[
          'header' => $header,
          'data' => $data,
          'param' => $param,
          'tanggal' => $tanggal,
          'no' => $no,
          'area' => $area,
          'areaData' => $areaData
        ]);
    }

    public function bahanBakuFilter(Request $r)
    {
      $header = 'REPORT BAHAN BAKU';
      $tanggal = $r['tanggal_kedatangan'];
      $area = $r['area'];

      $data = DB::select("SELECT * FROM tbl_cek_bahan_baku where tanggal_datang = '".$tanggal."' and area = '".$area."'");
      $param = 1;
      $no = 1;
      $areaData = DB::select("SELECT * FROM tbl_cek_bahan_baku GROUP BY area");
      
      return view('report_bahan_baku',[
        'header' => $header,
        'tanggal' => $tanggal,
        'area' => $area,
        'areaData' => $areaData,
        'data' => $data,
        'param' => $param,
        'no' => $no
      ]);
    }

    public function exportBahanBaku($tanggal, $area)
    {
      $spreadsheet = IOFactory::load('export/bahan_baku.xlsx');
      $worksheet = $spreadsheet->getActiveSheet();

      //custom
      $data = DB::select("select * from tbl_cek_bahan_baku where tanggal_datang = '".$tanggal."' and area = '".$area."'");
      $no = 1;
      $noCell = 5;
      $kode = null;

      $worksheet->getCell('C3')->setValue(': '.$tanggal);
      $worksheet->getCell('Q3')->setValue(': '. $area);

      foreach ($data as $d) {
        $worksheet->getCell('A'.$noCell)->setValue($no);
        $worksheet->getCell('B'.$noCell)->setValue($d->jam_sample);
        $worksheet->getCell('C'.$noCell)->setValue($d->jenis);
        $worksheet->getCell('F'.$noCell)->setValue($d->merk);
        $worksheet->getCell('K'.$noCell)->setValue($d->produsen);
        $worksheet->getCell('O'.$noCell)->setValue($d->negara_asal);
        $worksheet->getCell('P'.$noCell)->setValue($d->pemasok);
        $worksheet->getCell('T'.$noCell)->setValue($d->no_po);
        $worksheet->getCell('U'.$noCell)->setValue($d->jumlah);
        $worksheet->getCell('V'.$noCell)->setValue($d->satuan);
        $worksheet->getCell('W'.$noCell)->setValue($d->no_lot);
        $worksheet->getCell('X'.$noCell)->setValue($d->exp_date);

        $no++;
        $noCell++;

        if (count($data) == 1) {
          $kode = $d->id;
        }
      }

      $dataDetail = DB::select("SELECT * FROM tbl_cek_bahan_baku_detail where kode_cek_bahan_baku = '".$kode."'");

      $nod = 1;
      $nodCell = 13;
      foreach ($dataDetail as $dd) {
        $worksheet->getCell('A'.$nodCell)->setValue($nod);
        $worksheet->getCell('B'.$nodCell)->setValue($dd->sanitasi_produk);
        $worksheet->getCell('C'.$nodCell)->setValue($dd->jenis_kemasan);
        $worksheet->getCell('D'.$nodCell)->setValue($dd->berat);
        $worksheet->getCell('E'.$nodCell)->setValue($dd->coa);
        $worksheet->getCell('F'.$nodCell)->setValue($dd->label);
        $worksheet->getCell('G'.$nodCell)->setValue($dd->sertifikasi);
        $worksheet->getCell('H'.$nodCell)->setValue($dd->status);
        $worksheet->getCell('I'.$nodCell)->setValue($dd->tekstur);
        $worksheet->getCell('J'.$nodCell)->setValue($dd->aroma);
        $worksheet->getCell('K'.$nodCell)->setValue($dd->warna);
        $worksheet->getCell('L'.$nodCell)->setValue($dd->cemaran_fisik);
        $worksheet->getCell('M'.$nodCell)->setValue($dd->particle_size);
        $worksheet->getCell('N'.$nodCell)->setValue($dd->mc);
        $worksheet->getCell('O'.$nodCell)->setValue($dd->ph);
        $worksheet->getCell('P'.$nodCell)->setValue($dd->kelarutan);
        $worksheet->getCell('Q'.$nodCell)->setValue($dd->aroma_b);
        $worksheet->getCell('R'.$nodCell)->setValue($dd->warna_b);
        $worksheet->getCell('S'.$nodCell)->setValue($dd->rasa);
        $worksheet->getCell('T'.$nodCell)->setValue($dd->no_mobil);
        $worksheet->getCell('U'.$nodCell)->setValue($dd->no_container);
        $worksheet->getCell('V'.$nodCell)->setValue($dd->kondisi_mobil);
        $worksheet->getCell('W'.$nodCell)->setValue($dd->keterangan);
        
        $nod++;
        $nodCell++;
      }
      //end of custom


      $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
      
      $response =  new StreamedResponse(
            function () use ($writer) {
                $writer->save('php://output');
            }
        );
        $response->headers->set('Content-Type', 'application/vnd.ms-excel');
        $response->headers->set('Content-Disposition', 'attachment;filename="Bahan Baku "'.$tanggal.'"/"'.$area.'".xlsx"');
        $response->headers->set('Cache-Control','max-age=0');
        return $response; 
    }

    public function prosesProduksi()
    {
      $header = 'REPORT PROSES PRODUKSI';
      $data = ProsesProduksi::all();
      $no = 1;
      $barang = BarangJadi::all();
      $tanggal = date('Y-m-d');
      $nama = null;
      $param = 0;

      return view('report_proses_produksi',[
        'header' => $header,
        'data' => $data,
        'tanggal' => $tanggal,
        'barang' => $barang,
        'nama' => $nama,
        'param' => $param,
        'no' => $no
      ]);
    }

    public function prosesProduksiFilter(Request $r)
    {
      $header = 'REPORT PROSES PRODUKSI';
      $tanggal = $r['tanggal_produksi'];
      $nama = $r['barang'];
      $no = 1;
      $barang = BarangJadi::all();
      $param = 1;
      $data = DB::select("SELECT * FROM tbl_proses_produksi WHERE tanggal_produksi = '".$tanggal."' AND nama_produk = '".$nama."'");

      return view('report_proses_produksi',[
        'header' => $header,
        'data' => $data,
        'tanggal' => $tanggal,
        'barang' => $barang,
        'nama' => $nama,
        'param' => $param,
        'no' => $no
      ]); 
    }

    public function exportProsesProduksi($tanggal, $nama_barang)
    {
      $spreadsheet = IOFactory::load('export/proses_produksi.xlsx');

      $worksheet = $spreadsheet->getActiveSheet();

      $dataHead = collect(\DB::select("SELECT * FROM tbl_proses_produksi WHERE tanggal_produksi = '".$tanggal."' AND nama_produk = '".$nama_barang."'"))->first();

      $worksheet->getCell('D2')->setValue(': '.$dataHead->nama_produk);
      $worksheet->getCell('D3')->setValue(': '.$dataHead->tanggal_produksi);
      $worksheet->getCell('D4')->setValue(': '.$dataHead->shift);

      $worksheet->getCell('P33')->setValue(': '.$dataHead->lolos);
      $worksheet->getCell('P34')->setValue(': '.$dataHead->blending);
      $worksheet->getCell('P35')->setValue(': '.$dataHead->p_);
      $worksheet->getCell('P36')->setValue(': '.$dataHead->scrap);
      $worksheet->getCell('L26')->setValue($dataHead->informasi_lain);

      $dataDetail = DB::select("SELECT * FROM tbl_pp_detail WHERE kode_proses_produksi = '".$dataHead->id."'");

      $nodd = 1;
      $noddCell = 9;
      foreach ($dataDetail as $dd) {
        $worksheet->getCell('A'.$noddCell)->setValue($nodd);
        $worksheet->getCell('B'.$noddCell)->setValue($dd->jam_ambil_sample);
        $worksheet->getCell('C'.$noddCell)->setValue($dd->kadar_air);
        $worksheet->getCell('D'.$noddCell)->setValue($dd->berat_sample);
        $worksheet->getCell('E'.$noddCell)->setValue($dd->bd);
        $worksheet->getCell('F'.$noddCell)->setValue($dd->volume_kering);
        $worksheet->getCell('G'.$noddCell)->setValue($dd->volume_basah);
        $worksheet->getCell('H'.$noddCell)->setValue($dd->berat_kering);
        $worksheet->getCell('I'.$noddCell)->setValue($dd->berat_basah);
        $worksheet->getCell('J'.$noddCell)->setValue($dd->berat_kemasan);
        $worksheet->getCell('K'.$noddCell)->setValue($dd->tidak_ada_cemaran);
        $worksheet->getCell('L'.$noddCell)->setValue($dd->kenyal);
        $worksheet->getCell('M'.$noddCell)->setValue($dd->serat);
        $worksheet->getCell('N'.$noddCell)->setValue($dd->aroma);
        $worksheet->getCell('O'.$noddCell)->setValue($dd->rasa);
        $worksheet->getCell('P'.$noddCell)->setValue($dd->bentuk);
        $worksheet->getCell('Q'.$noddCell)->setValue($dd->warna);
        $worksheet->getCell('R'.$noddCell)->setValue($dd->test_apung);
        $worksheet->getCell('S'.$noddCell)->setValue($dd->bubuk);
        $worksheet->getCell('Y'.$noddCell)->setValue($dd->percent);
        $worksheet->getCell('Z'.$noddCell)->setValue($dd->status);

        $nodd++;
        $noddCell++;
      }

      $dataInfo = DB::select("SELECT * FROM tbl_pp_informasi_lain WHERE kode_proses_produksi = '".$dataHead->id."'");
      $nodi = 1;
      $nodiCell = 26;

      foreach ($dataInfo as $di) {
        $worksheet->getCell('A'.$nodiCell)->setValue($nodi);
        $worksheet->getCell('B'.$nodiCell)->setValue($di->jam);
        $worksheet->getCell('C'.$nodiCell)->setValue($di->bahan_baku);
        $worksheet->getCell('E'.$nodiCell)->setValue($di->no_lot);
        $worksheet->getCell('I'.$nodiCell)->setValue($di->kadar_air_tepung);
        $worksheet->getCell('J'.$nodiCell)->setValue($di->bulk);
        $worksheet->getCell('K'.$nodiCell)->setValue($di->air);

        $nodi++;
        $nodiCell++;
        
      }

      $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
      $response =  new StreamedResponse(
            function () use ($writer) {
                $writer->save('php://output');
            }
        );
        $response->headers->set('Content-Type', 'application/vnd.ms-excel');
        $response->headers->set('Content-Disposition', 'attachment;filename="PROSES PRODUKSI "'.$tanggal.'"/"'.$nama_barang.'".xlsx"');
        $response->headers->set('Cache-Control','max-age=0');
        return $response;      
    }

    public function packing()
    {
        $header = 'REPORT PACKING';
        $data = PemeriksaanPacking::all(); 
        $no = 1;
        $barang = BarangJadi::all();
        $tanggal = date('Y-m-d');
        $nama = null;
        $param = 0;

        return view('report_packing',[
            'header' => $header,
            'data' => $data,
            'barang' => $barang,
            'tanggal' => $tanggal,
            'nama' => $nama,
            'param' => $param,
            'no' => $no
        ]);
    }

    public function packingFilter(Request $r)
    {
        $header = 'REPORT PACKING';
        $tanggal = $r['tanggal_produksi'];
        $nama = $r['barang'];

        $data = DB::select("SELECT * FROM tbl_pemeriksaan_packing WHERE nama_produk = '".$nama."' AND tanggal_produksi = '".$tanggal."'"); 
        $no = 1;
        $barang = BarangJadi::all();
        $param = 1;

        return view('report_packing',[
            'header' => $header,
            'data' => $data,
            'barang' => $barang,
            'tanggal' => $tanggal,
            'nama' => $nama,
            'param' => $param,
            'no' => $no
        ]);   
    }

    public function exportPacking($tanggal, $nama_barang)
    {
      $spreadsheet = IOFactory::load('export/packing.xlsx');

      $worksheet = $spreadsheet->getActiveSheet();

      //custom
      $dataHead = collect(\DB::select("SELECT * FROM tbl_pemeriksaan_packing WHERE nama_produk = '".$nama_barang."' AND tanggal_produksi = '".$tanggal."'"))->first();

      $worksheet->getCell('C3')->setValue(': '.$dataHead->nama_produk);
      $worksheet->getCell('C4')->setValue(': '.$dataHead->tanggal_produksi);
      $worksheet->getCell('C5')->setValue(': '.$dataHead->mesin);
      $worksheet->getCell('I3')->setValue(': '.$dataHead->no_so);
      $worksheet->getCell('I4')->setValue(': '.$dataHead->no_md);
      $worksheet->getCell('I5')->setValue(': '.$dataHead->setting_md);
      $worksheet->getCell('P4')->setValue(': '.$dataHead->hopper_mesin_kemas);
      $worksheet->getCell('P5')->setValue(': '.$dataHead->mesin_kemas);
      $worksheet->getCell('P6')->setValue(': '.$dataHead->karton_sealer);
      
      //pengecekan WIP
      $dataWIP = DB::select("SELECT * FROM tbl_p_wip WHERE kode_packing = '".$dataHead->id."'");
      $colWIP = 'B';
      $colnum = 2;

      foreach ($dataWIP as $dw) {
        
        $worksheet->getCell($colWIP.'9')->setValue($dw->jam);
        $worksheet->getCell($colWIP.'10')->setValue($dw->warna);
        $worksheet->getCell($colWIP.'11')->setValue($dw->bentuk);
        
        $colWIP = chr(ord($colWIP)+$colnum);
      }

      //pengecekan bahan kemas
      $dataBK = DB::select("SELECT * FROM tbl_p_bahan_kemas WHERE kode_packing = '".$dataHead->id."'");
      $colBK = 'B';
      $colnumBK = 2;

      foreach ($dataBK as $dbk) {
        $worksheet->getCell($colBK.'14')->setValue($dbk->supplier);
        $worksheet->getCell($colBK.'15')->setValue($dbk->lot);
        $worksheet->getCell($colBK.'16')->setValue($dbk->warna);
        $worksheet->getCell($colBK.'17')->setValue($dbk->delaminasi);
        $worksheet->getCell($colBK.'18')->setValue($dbk->jumlah);
        
        $colBK = chr(ord($colBK)+$colnumBK);
      }

      //pengecekan hasil kemas
      $dataPHK = DB::select("SELECT * FROM tbl_p_hasil_kemas WHERE kode_packing = '".$dataHead->id."'");
      $colPHK = 'B';
      $colnumPHK = 4;
      $colPHKD = 'B';
      $paramPHKD = 1;

      foreach ($dataPHK as $dphk) {
        $worksheet->getCell($colPHK.'21')->setValue($dphk->no_lot);
        $worksheet->getCell($colPHK.'22')->setValue($dphk->exp_date);
        
        $colPHK = chr(ord($colPHK)+$colnumPHK);

        //pengecekan hasil kemas detail
        $dataPHKD = DB::select("SELECT * FROM tbl_p_hasil_kemas_detail WHERE id_hasil_kemas = '".$dphk->id."'");

        foreach ($dataPHKD as $dphkd) {
          
          $worksheet->getCell($colPHKD.'23')->setValue($dphkd->jam);
          $worksheet->getCell($colPHKD.'24')->setValue($dphkd->berat);
          $worksheet->getCell($colPHKD.'25')->setValue($dphkd->kemasan);
          $worksheet->getCell($colPHKD.'26')->setValue($dphkd->seal);
          $worksheet->getCell($colPHKD.'27')->setValue($dphkd->kodefikasi);
          $worksheet->getCell($colPHKD.'28')->setValue($dphkd->kebocoran);
          $worksheet->getCell($colPHKD.'29')->setValue($dphkd->metal_detector);
          
          $colPHKD++;
        }
        $paramPHKD++;
        if ($paramPHKD == 2) {
          $colPHKD = 'F';
        }elseif ($paramPHKD == 3) {
          $colPHKD = 'J';
        }elseif ($paramPHKD == 4) {
          $colPHKD = 'N';
        }
      }

      //pengecekan hasil karton
      $dataPHKT = DB::select("SELECT * FROM tbl_p_hasil_karton WHERE kode_packing = '".$dataHead->id."'");
      $colPHKT = 'B';
      $colnumPHKT = 4;
      $colPHKTD = 'B';
      $paramPHKTD = 1;

      foreach ($dataPHKT as $dphkt) {
          $worksheet->getCell($colPHKT.'32')->setValue($dphkt->no_lot);
          $colPHKT = chr(ord($colPHKT)+$colnumPHKT);
          
          $dataPHKTD = DB::select("SELECT * FROM tbl_p_hasil_karton_detail WHERE id_hasil_karton = '".$dphkt->id."'");

          foreach ($dataPHKTD as $dphktd) {
          
            $worksheet->getCell($colPHKTD.'33')->setValue($dphktd->jam);
            $worksheet->getCell($colPHKTD.'34')->setValue($dphktd->berat);
            $worksheet->getCell($colPHKTD.'35')->setValue($dphktd->kodefikasi);
            $worksheet->getCell($colPHKTD.'36')->setValue($dphktd->visual_karton);
            
            $colPHKTD++;
          }
          $paramPHKTD++;
          if ($paramPHKTD == 2) {
            $colPHKTD = 'F';
          }elseif ($paramPHKTD == 3) {
            $colPHKTD = 'J';
          }elseif ($paramPHKTD == 4) {
            $colPHKTD = 'N';
          }

      }
      //end of custom

      $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
      $response =  new StreamedResponse(
            function () use ($writer) {
                $writer->save('php://output');
            }
        );
        $response->headers->set('Content-Type', 'application/vnd.ms-excel');
        $response->headers->set('Content-Disposition', 'attachment;filename="PACKING "'.$tanggal.'"/"'.$nama_barang.'".xlsx"');
        $response->headers->set('Cache-Control','max-age=0');
        return $response;
    }

    public function brangJadi()
    {
        $header = 'REPORT BARANG JADI';
        $data = DB::select("SELECT a.tanggal, a.kendaraan, b.* FROM tbl_qc_barang_jadi a INNER JOIN tbl_qc_barang_jadi_detail b ON a.id = b.kode_qc_barang_jadi");

        $param = 0;
        $no = 1;
        $tanggal = date('Y-m-d');
        $kendaraan = 'Internal';

        return view('report_barang_jadi',[
          'header' => $header,
          'data' => $data,
          'param' => $param,
          'tanggal' => $tanggal,
          'kendaraan' => $kendaraan,
          'no' => $no
        ]);      
    }

    public function brangJadiFilter(Request $r)
    {
        $header = 'REPORT BARANG JADI';

        $param = 1;
        $no = 1;
        $tanggal = $r['tanggal'];
        $kendaraan = $r['kendaraan'];

        $data = DB::select("SELECT a.tanggal, a.kendaraan, b.* FROM tbl_qc_barang_jadi a INNER JOIN tbl_qc_barang_jadi_detail b ON a.id = b.kode_qc_barang_jadi where a.tanggal = '".$tanggal."' AND a.kendaraan = '".$kendaraan."'");

        return view('report_barang_jadi',[
          'header' => $header,
          'data' => $data,
          'param' => $param,
          'tanggal' => $tanggal,
          'kendaraan' => $kendaraan,
          'no' => $no
        ]); 
    }

    public function exportBrangJadi($tanggal, $kendaraan)
    {
        $spreadsheet = IOFactory::load('export/barang_jadi.xlsx');

        $worksheet = $spreadsheet->getActiveSheet();

        $dataHead = collect(\DB::select("SELECT * FROM tbl_qc_barang_jadi a  where tanggal = '".$tanggal."' AND kendaraan = '".$kendaraan."'"))->first();

        $worksheet->getCell('C3')->setValue(': '.$dataHead->tanggal);
        $worksheet->getCell('C4')->setValue(': '.$dataHead->kendaraan);

        $dataDetail = DB::select("SELECT * FROM tbl_qc_barang_jadi_detail where kode_qc_barang_jadi = '".$dataHead->id."'");
        $line = 8;
        $no = 1;
        foreach ($dataDetail as $d) {
          $worksheet->getCell('A'.$line)->setValue($no);
          $worksheet->getCell('B'.$line)->setValue($d->no_do);
          $worksheet->getCell('C'.$line)->setValue($d->mulai);
          $worksheet->getCell('D'.$line)->setValue($d->selesai);
          $worksheet->getCell('E'.$line)->setValue($d->tujuan);
          $worksheet->getCell('F'.$line)->setValue($d->no_polisi);
          $worksheet->getCell('G'.$line)->setValue($d->bersih);
          $worksheet->getCell('H'.$line)->setValue($d->suku_cadang);
          $worksheet->getCell('I'.$line)->setValue($d->bau);
          $worksheet->getCell('J'.$line)->setValue($d->bocor);
          $worksheet->getCell('K'.$line)->setValue($d->basah);
          $worksheet->getCell('L'.$line)->setValue($d->identitas_produk);
          $worksheet->getCell('M'.$line)->setValue($d->no_lot);
          $worksheet->getCell('N'.$line)->setValue($d->kondisi_jahitan);
          $worksheet->getCell('O'.$line)->setValue($d->paper_zak);
          $worksheet->getCell('P'.$line)->setValue($d->karton);
          $worksheet->getCell('Q'.$line)->setValue($d->status);
          $worksheet->getCell('R'.$line)->setValue($d->verifikasi);
          $worksheet->getCell('S'.$line)->setValue($d->keterangan);

          $no++;
          $line++;
        }

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        
        $response =  new StreamedResponse(
              function () use ($writer) {
                  $writer->save('php://output');
              }
          );
          $response->headers->set('Content-Type', 'application/vnd.ms-excel');
          $response->headers->set('Content-Disposition', 'attachment;filename="BARANG JADI "'.$tanggal.'"/"'.$kendaraan.'".xlsx"');
          $response->headers->set('Cache-Control','max-age=0');
          return $response;
    }

    public function bahanKemas()
    {
        $header = 'REPORT BAHAN KEMAS';
        $data = DB::select("SELECT * FROM tbl_qc_bahan_kemas a INNER JOIN tbl_qc_bahan_kemas_detail b ON a.id = b.kode_bahan_kemas");
        $no = 1;

        $param = 0;
        $areaData = DB::select("SELECT * FROM tbl_qc_bahan_kemas GROUP BY area");
        $tanggal = date('Y-m-d');
        $area = '';

        return view('report_bahan_kemas',[
          'header' => $header,
          'data' => $data,
          'param' => $param,
          'tanggal' => $tanggal,
          'area' => $area,
          'areaData' => $areaData,
          'no' => $no
        ]);
    }

    public function bahanKemasFilter(Request $r)
    {
        $header = 'REPORT BAHAN KEMAS';
        $tanggal = $r['tanggal'];
        $area = $r['area'];
        $data = DB::select("SELECT * FROM tbl_qc_bahan_kemas a INNER JOIN tbl_qc_bahan_kemas_detail b ON a.id = b.kode_bahan_kemas where a.tanggal = '".$tanggal."' and a.area = '".$area."'");
        $no = 1;

        $param = 1;
        $areaData = DB::select("SELECT * FROM tbl_qc_bahan_kemas GROUP BY area");

        return view('report_bahan_kemas',[
          'header' => $header,
          'data' => $data,
          'param' => $param,
          'tanggal' => $tanggal,
          'area' => $area,
          'areaData' => $areaData,
          'no' => $no
        ]);
    }

    public function exportBahanKemas($tanggal, $area)
    {
        $spreadsheet = IOFactory::load('export/bahan_kemas.xlsx');

        $worksheet = $spreadsheet->getActiveSheet();

        $dataHead = collect(\DB::select("select * from tbl_qc_bahan_kemas where tanggal = '".$tanggal."' and area='".$area."'"))->first();

        $worksheet->getCell('C3')->setValue($dataHead->tanggal);
        $worksheet->getCell('S3')->setValue($dataHead->area);
        $worksheet->getCell('A5')->setValue('1');
        $worksheet->getCell('B5')->setValue($dataHead->jam_sample);
        $worksheet->getCell('C5')->setValue($dataHead->jenis);
        $worksheet->getCell('I5')->setValue($dataHead->supplier);
        $worksheet->getCell('Q5')->setValue($dataHead->no_po);
        $worksheet->getCell('T5')->setValue($dataHead->jumlah);
        $worksheet->getCell('V5')->setValue($dataHead->satuan);
        $worksheet->getCell('W5')->setValue($dataHead->no_mobil);
        $worksheet->getCell('AA5')->setValue($dataHead->coa);
        $worksheet->getCell('AB5')->setValue($dataHead->no_md);
        $worksheet->getCell('AE5')->setValue($dataHead->no_lot);
        $worksheet->getCell('AK5')->setValue($dataHead->status);

        $dataDetail = DB::select("select * from tbl_qc_bahan_kemas_detail where kode_bahan_kemas = '".$dataHead->id."'");

        $nod = 17;
        $num = 1;

        foreach ($dataDetail as $d) {
          $worksheet->getCell('A'.$nod)->setValue($num);
          $worksheet->getCell('B'.$nod)->setValue($d->nama_produk);
          $worksheet->getCell('C'.$nod)->setValue($d->netto);
          $worksheet->getCell('D'.$nod)->setValue($d->komposisi);
          $worksheet->getCell('E'.$nod)->setValue($d->alamat_produsen);
          $worksheet->getCell('F'.$nod)->setValue($d->label_halal);
          $worksheet->getCell('G'.$nod)->setValue($d->barcode);
          $worksheet->getCell('H'.$nod)->setValue($d->bau);
          $worksheet->getCell('I'.$nod)->setValue($d->warna);
          $worksheet->getCell('J'.$nod)->setValue($d->printing);
          $worksheet->getCell('K'.$nod)->setValue($d->delaminasi);
          $worksheet->getCell('L'.$nod)->setValue($d->seal);
          $worksheet->getCell('M'.$nod)->setValue($d->creasing);
          $worksheet->getCell('N'.$nod)->setValue($d->kondisi_core);
          $worksheet->getCell('O'.$nod)->setValue($d->cut_off);
          $worksheet->getCell('P'.$nod)->setValue($d->kondisi_mobil);
          $worksheet->getCell('Q'.$nod)->setValue($d->jumlah_karton);
          $worksheet->getCell('R'.$nod)->setValue($d->tinggi_fluts_karton);
          $worksheet->getCell('S'.$nod)->setValue($d->panjang_karton);
          $worksheet->getCell('T'.$nod)->setValue($d->lebar_karton);
          $worksheet->getCell('U'.$nod)->setValue($d->tinggi_karton);
          $worksheet->getCell('V'.$nod)->setValue($d->berat_roll);
          $worksheet->getCell('W'.$nod)->setValue($d->core_roll);
          $worksheet->getCell('X'.$nod)->setValue($d->panjang_roll);
          $worksheet->getCell('Y'.$nod)->setValue($d->lebar_roll);
          $worksheet->getCell('Z'.$nod)->setValue($d->tebal_roll);
          $worksheet->getCell('AA'.$nod)->setValue($d->jumlah_bag);
          $worksheet->getCell('AB'.$nod)->setValue($d->gaset_bag);
          $worksheet->getCell('AC'.$nod)->setValue($d->lebar_bag);
          $worksheet->getCell('AD'.$nod)->setValue($d->tinggi_bag);
          $worksheet->getCell('AE'.$nod)->setValue($d->ketebalan_inner_bag);
          $worksheet->getCell('AF'.$nod)->setValue($d->berat_plastik);
          $worksheet->getCell('AG'.$nod)->setValue($d->ketebalan_plastik);
          $worksheet->getCell('AH'.$nod)->setValue($d->gaset_plastik);
          $worksheet->getCell('AI'.$nod)->setValue($d->lebar_plastik);
          $worksheet->getCell('AJ'.$nod)->setValue($d->tinggi_plastik);
          $worksheet->getCell('AK'.$nod)->setValue($d->keterangan);
          
          $nod++;
          $num++;
        }

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        // $writer->save('write.xlsx');
        $response =  new StreamedResponse(
              function () use ($writer) {
                  $writer->save('php://output');
              }
          );
          $response->headers->set('Content-Type', 'application/vnd.ms-excel');
          $response->headers->set('Content-Disposition', 'attachment;filename="REPORT BAHAN KEMAS "'.$tanggal.'"/"'.$area.'".xlsx"');
          $response->headers->set('Cache-Control','max-age=0');
          return $response; 
    }
}
