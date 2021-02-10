@extends('index')

@section('content')
    <form id="demo-form2" data-pars metley-validate class="form-horizontal form-label-left" method="post" action="{{ url('admin/simpan_proses_produksi_detail') }}">
  <div class="row">
        @csrf
      <div class="col-md-12">
        <div class="x_panel">
          <div class="own-title">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Tampil Data</button>
            <hr>
          </div>
          <div class="x_content">
              <div class="row">
                <div class="col-md-6">
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="nama_produk">Nama Produk
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="nama_produk" name="nama_produk" required="required" class="form-control" readonly>
                    </div>
                  </div>
                  <input type="hidden" name="kode_proses_produksi" id="kode_proses_produksi" >
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="tanggal_produksi">Tanggal Produksi
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="date" id="tanggal_produksi" name="tanggal_produksi" required="required" class="form-control" readonly>
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="shift">Shift
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" readonly id="shift" name="shift" required="required" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="no_mesin">No. Mesin
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="no_mesin" readonly name="no_mesin" class="form-control">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="no_microwave">No. Microwave
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="no_microwave" readonly name="no_microwave" class="form-control">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="no_lot">No. Lot
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="no_lot" name="no_lot" readonly class="form-control">
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="x_panel">
          <div class="own-title">
            <h2>Data Detail</h2>
            <hr>
          </div>
          <div class="x_content">
              <table class="table table-bordered">
              <thead>
                <tr>
                  <th rowspan="2"><center>Jam Ambil Sample</center></th>
                  <th rowspan="2"><center>Kadar Air (%)</center></th>
                  <th colspan="2"><center>Bulk Density (g/100ml)</center></th>
                  <th colspan="2"><center>Volume (ml)</center></th>
                  <th colspan="2"><center>Berat (gr)</center></th>
                </tr>
                <tr>
                  <th><center>Berat Sample (g)</center></th>
                  <th><center>BD* (Berat Sample)</center></th>
                  <th><center>Kering</center></th>
                  <th><center>Basah</center></th>
                  <th><center>Kering</center></th>
                  <th><center>Basah</center></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><input type="time" name="jam_ambil_sample" id="jam_ambil_sample" class="form-control" required=""></td>
                  <td><input type="number" min="0" step="0.01" name="kadar_air" id="kadar_air" class="form-control" required=""></td>
                  <td><input type="number" min="0" step="0.01" name="berat_sample" id="berat_sample" class="form-control" required=""></td>
                  <td><input type="number" min="0" step="0.01" name="bd_berat_sample" id="bd_berat_sample" class="form-control" required=""></td>
                  <td><input type="number" min="0" step="0.01" name="volume_kering" id="volume_kering" class="form-control" required=""></td>
                  <td><input type="number" min="0" step="0.01" name="volume_basah" id="volume_basah" class="form-control" required=""></td>
                  <td><input type="number" min="0" step="0.01" name="berat_kering" id="berat_kering" class="form-control" required=""></td>
                  <td><input type="number" min="0" step="0.01" name="berat_basah" id="berat_basah" class="form-control" required=""></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="x_panel">
          <div class="own-title">
            <h2>Fisik Dan Organoleptik</h2>
            <hr>
          </div>
          <div class="x_content">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th><center>Berat/Kemasan (kg)</center></th>
                  <th><center>Tidak Ada Cemaran</center></th>
                  <th><center>Kenyal</center></th>
                  <th><center>Serat</center></th>
                  <th><center>Aroma</center></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><input type="number" min="0" step="0.01" name="berat_kemasan" id="berat_kemasan" class="form-control" required=""></td>
                  <td><input type="text" name="tidak_ada_cemaran" id="tidak_ada_cemaran" class="form-control" required=""></td>
                  <td><input type="text" name="kenyal" id="kenyal" class="form-control" required=""></td>
                  <td><input type="text" name="serat" id="serat" class="form-control" required=""></td>
                  <td><input type="text" name="aroma" id="aroma" class="form-control" required=""></td>
                  <!-- <td><input type="text" name="rasa" id="rasa" class="form-control" required=""></td>
                  <td><input type="text" name="bentuk" id="bentuk" class="form-control" required=""></td>
                  <td><input type="text" name="warna" id="warna" class="form-control" required=""></td>
                  <td><input type="text" name="test_apung" id="test_apung" class="form-control" required=""></td>
                  <td><input type="number" min="0" step="1" name="bubuk" id="bubuk" class="form-control" required=""></td>
                  <td><input type="number" min="0" step="0.01" name="percent" id="percent" class="form-control" required=""></td>
                  <td><input type="text" name="status" id="status" class="form-control" required=""></td> -->
                </tr>
              </tbody>
            </table>
            <br>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th><center>Rasa</center></th>
                  <th><center>Bentuk</center></th>
                  <th><center>Warna</center></th>
                  <th><center>Test Apung</center></th>
                </tr>
              </thead>
              <tbody>
                <tr>

                  <td><input type="text" name="rasa" id="rasa" class="form-control" required=""></td>
                  <td><input type="text" name="bentuk" id="bentuk" class="form-control" required=""></td>
                  <td><input type="text" name="warna" id="warna" class="form-control" required=""></td>
                  <td><input type="text" name="test_apung" id="test_apung" class="form-control" required=""></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="x_panel">
          <div class="own-title">
            <h2>Hasil Ayak mm (g/100ml) & Status Kelolosan</h2>
            <hr>
          </div>
          <div class="x_content">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th><center>Bubuk</center></th>
                  <th><center>100%</center></th>
                  <th><center>Status Kelolosan</center></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><input type="number" min="0" step="1" name="bubuk" id="bubuk" class="form-control" required=""></td>
                  <td><input type="number" min="0" step="0.01" name="percent" id="percent" class="form-control" required=""></td>
                  <td><input type="text" name="status" id="status" class="form-control" required=""></td> 
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <a href="{{ url('admin/proses_produksi_detail') }}" class="btn btn-danger" type="button">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
  </div>
    </form>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Pilih Data Proses Produksi</h4>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-striped table-bordered dt-responsive nowrap datatable-responsive" cellspacing="0" width="100%" style="font-size: 11px;">
              <thead>
                <tr>
                  <th>NO</th>
                  <th hidden>ID</th>
                  <th>NAMA PRODUK</th>
                  <th>TANGGAL PRODUKSI</th>
                  <th>SHIFT</th>
                  <th>NO MESIN</th>
                  <th>NO MICROWAVE</th>
                  <th>NO LOT</th>
                </tr>
              </thead>
              <tbody>
                @foreach($produksi as $p)
                  <tr onclick="setValue(this)">
                    <td>{{ $no++ }}</td>
                    <td hidden>{{ $p->id }}</td>
                    <td>{{ $p->nama_produk }}</td>
                    <td>{{ $p->tanggal_produksi }}</td>
                    <td>{{ $p->shift }}</td>
                    <td>{{ $p->no_mesin }}</td>
                    <td>{{ $p->no_microwave }}</td>
                    <td>{{ $p->no_lot }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.9/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        <?php 
          if (Session::get('sukses')) {
            ?>
                Swal.fire({
                  icon: 'success',
                  title: '<?php echo Session::get("sukses"); ?>',
                  showConfirmButton: false,
                  timer: 2000
                })
        <?php
          }
        ?>

    });
</script>

<script type="text/javascript">
  function setValue(x) {
    var tds = x.children;
    var a = tds[1].innerHTML;
    var b = tds[2].innerHTML;
    var c = tds[3].innerHTML;
    var d = tds[4].innerHTML;
    var e = tds[5].innerHTML;
    var f = tds[6].innerHTML;
    var g = tds[7].innerHTML;

    document.getElementById('kode_proses_produksi').value = a;
    document.getElementById('nama_produk').value = b;
    document.getElementById('tanggal_produksi').value = c;
    document.getElementById('shift').value = d;
    document.getElementById('no_mesin').value = e;
    document.getElementById('no_microwave').value = f;
    document.getElementById('no_lot').value = g;

    $('.modal').modal('hide');
  }
</script>

@endsection