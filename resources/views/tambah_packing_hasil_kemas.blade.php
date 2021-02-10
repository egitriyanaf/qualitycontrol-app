@extends('index')

@section('content')
    <form id="demo-form2" data-pars metley-validate class="form-horizontal form-label-left" method="post" action="{{ url('admin/simpan_packing_hasil_kemas') }}">
  <div class="row">
        @csrf
      <div class="col-md-12">
        <div class="x_panel">
          <div class="own-title">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Tampil Data</button>
            <!-- <button type="button" id="reset" class="btn btn-danger">Reset</button> -->
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
                  <input type="hidden" name="kode_packing" id="kode_packing">
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="tanggal_produksi">Tanggal Produksi
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="tanggal_produksi" name="tanggal_produksi" required="required" class="form-control" readonly>
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="mesin">Shift/Mesin
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="mesin" name="mesin" required="required" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="no_so">No. SO
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="no_so" name="no_so" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="no_md">No. MD
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="no_md" name="no_md" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="no_lot">No. Lot
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="no_lot" name="no_lot" class="form-control" required>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="setting_md">Setting MD
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="setting_md" name="setting_md" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="hopper_mesin_kemas">Hopper Mesin Kemas
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="hopper_mesin_kemas" name="hopper_mesin_kemas" class="form-control" readonly>
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="mesin_kemas">Mesin Kemas
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="mesin_kemas" name="mesin_kemas" class="form-control" readonly>
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="karton_sealer">Karton Sealer
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input readonly type="text" id="karton_sealer" name="karton_sealer" class="form-control">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="exp_date">Expired Date
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input required type="date" id="exp_date" name="exp_date" class="form-control">
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
            <a href="#tambah_detail" id="tambah_detail" onclick="myFunction()"><i class="fa fa-plus"></i> Tambah Detail</a>
          </div>
          <div class="x_content">
            <table id="packing_hasil_kemas" class="table table-bordered">
              <thead>
                <tr>
                  <th><center>Jam</center></th>
                  <th><center>Berat</center></th>
                  <th><center>Kemasan</center></th>
                  <th><center>Seal</center></th>
                  <th><center>Kodefikasi</center></th>
                  <th><center>Kebocoran</center></th>
                  <th><center>Metal Detector</center></th>
                  <th><center></center></th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <a href="{{ url('admin/pemeriksaaan_hasil_kemas') }}" class="btn btn-danger" type="button">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
  </div>
    </form>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Pilih Data Pemeriksaan Packing</h4>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-striped table-bordered dt-responsive nowrap datatable-responsive" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>NO</th>
                  <th hidden>ID</th>
                  <th>NAMA PRODUK</th>
                  <th>TANGGAL PRODUKSI</th>
                  <th>MESIN</th>
                  <th>NO SO</th>
                  <th>NO MD</th>
                  <th hidden>SETTING MD</th>
                  <th hidden>HOPPER MESIN KEMAS</th>
                  <th hidden>MESIN KEMAS</th>
                  <th hidden>KARTON SEALER</th>
                </tr>
              </thead>
              <tbody>
                @foreach($packing as $p)
                  <tr onclick="setValue(this)">
                    <td>{{ $no++ }}</td>
                    <td hidden>{{ $p->id }}</td>
                    <td>{{ $p->nama_produk }}</td>
                    <td>{{ $p->tanggal_produksi }}</td>
                    <td>{{ $p->mesin }}</td>
                    <td>{{ $p->no_so }}</td>
                    <td>{{ $p->no_md }}</td>
                    <td hidden>{{ $p->setting_md }}</td>
                    <td hidden>{{ $p->hopper_mesin_kemas }}</td>
                    <td hidden>{{ $p->mesin_kemas }}</td>
                    <td hidden>{{ $p->karton_sealer }}</td>
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

        $('#reset').click(function(){
            document.getElementById('kode_packing').value = '';
            document.getElementById('nama_produk').value = '';
            document.getElementById('tanggal_produksi').value = '';
            document.getElementById('mesin').value = '';
            document.getElementById('no_so').value = '';
            document.getElementById('no_md').value = '';
            document.getElementById('setting_md').value = '';
            document.getElementById('hopper_mesin_kemas').value = '';
            document.getElementById('mesin_kemas').value = '';
            document.getElementById('karton_sealer').value = '';
        });
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
    var h = tds[8].innerHTML;
    var i = tds[9].innerHTML;
    var j = tds[10].innerHTML;

    document.getElementById('kode_packing').value = a;
    document.getElementById('nama_produk').value = b;
    document.getElementById('tanggal_produksi').value = c;
    document.getElementById('mesin').value = d;
    document.getElementById('no_so').value = e;
    document.getElementById('no_md').value = f;
    document.getElementById('setting_md').value = g;
    document.getElementById('hopper_mesin_kemas').value = h;
    document.getElementById('mesin_kemas').value = i;
    document.getElementById('karton_sealer').value = j;

    $('.modal').modal('hide');
  }
</script>

<script>
  function myFunction() {
    var table = document.getElementById("packing_hasil_kemas");
    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);
    var cell7 = row.insertCell(6);
    var cell8 = row.insertCell(7);


    cell1.innerHTML = "<input type='time' class='form-control' name='jam[]' required>";
    cell2.innerHTML = "<input type='text' class='form-control' name='berat[]' required>";
    cell3.innerHTML = "<input type='text' class='form-control' name='kemasan[]' required>";
    cell4.innerHTML = "<input type='text' class='form-control' name='seal[]' required>";
    cell5.innerHTML = "<input type='text' class='form-control' name='kodefikasi[]' required>";
    cell6.innerHTML = "<input type='text' class='form-control' name='kebocoran[]' required>";
    cell7.innerHTML = "<input type='text' class='form-control' name='metal_detector[]' required>";
    cell8.innerHTML = "<button type='button' class='btn btn-danger'><i class='fa fa-trash'></i></button>";
    cell8.onclick = function() {
      myDeleteFunction(this.parentNode.rowIndex);
    }
  }

  function myDeleteFunction(x) {
    document.getElementById("packing_hasil_kemas").deleteRow(x);
  }
</script>
@endsection