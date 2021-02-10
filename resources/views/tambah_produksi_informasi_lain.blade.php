@extends('index')

@section('content')
    <form id="demo-form2" data-pars metley-validate class="form-horizontal form-label-left" method="post" action="{{ url('admin/simpan_proses_produksi_informasi_lain') }}">
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
            <a href="#tambah_detail" id="tambah_detail" onclick="myFunction()"><i class="fa fa-plus"></i> Tambah Detail</a>
          </div>
          <div class="x_content">
              <table id="produksi_informasi_lain" class="table table-bordered">
              <thead>
                <tr>
                  <th><center>Jam</center></th>
                  <th width="150px;"><center>Bahan Baku</center></th>
                  <th><center>No Lot</center></th>
                  <th><center>Kadar Air Tepung</center></th>
                  <th><center>Bulk Density Adukan</center></th>
                  <th><center>Air (kg)</center></th>
                  <th><center>Aksi</center></th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="x_panel">
          <div class="own-title">
            <h2><b>HASIL ANALISA : STATUS (kg)</b></h2>
          </div>
          <div class="x_content">
              <div class="row">
                <div class="col-md-6">
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="lolos">Lolos
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="lolos" name="lolos" required="required" class="form-control">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="blending">Blending
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="blending" name="blending" required="required" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                 <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="p_">P 08
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="p_" name="p_" required="required" class="form-control">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="scrap">Scrap
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="scrap" name="scrap" required="required" class="form-control">
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
            <h2><b>INFORMASI LAIN</b></h2>
          </div>
          <div class="x_content">
              <div class="row">
                <div class="col-md-12">
                 <div class="item form-group">
                    <div class="col-md-12 col-sm-12 ">
                      <textarea rows="5" class="form-control" id="informasi_lain" name="informasi_lain"></textarea>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <a href="{{ url('admin/proses_produksi_informasi_lain') }}" class="btn btn-danger" type="button">Kembali</a>
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
<script>
  function myFunction() {
    var table = document.getElementById("produksi_informasi_lain");
    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);
    var cell7 = row.insertCell(6);
<?php $select = ''; ?>

<?php foreach ($bahanBaku as $key): ?>
  <?php $select .="<option>".$key->nama."</option>"; ?>
<?php endforeach ?>
    cell1.innerHTML = "<input type='time' class='form-control' name='jam[]' required>";
    cell2.innerHTML = "<select class='form-control' id='bahan_baku' name='bahan_baku' required><?php echo $select; ?></select>";
    // cell2.innerHTML = "<input type='text' class='form-control' name='bahan_baku[]' required>";
    cell3.innerHTML = "<input type='text' class='form-control' name='no_lot_info[]' required>";
    cell4.innerHTML = "<input type='number' min='0' step='0.01' class='form-control' name='kadar_air_tepung[]' required>";
    cell5.innerHTML = "<input type='number' min='0' step='0.01' class='form-control' name='bulk[]' required>";
    cell6.innerHTML = "<input type='number' min='0' step='0.01' class='form-control' name='air[]' required>";
    cell7.innerHTML = "<button type='button' class='btn btn-danger'><i class='fa fa-trash'></i></button>";
    cell7.onclick = function() {
      myDeleteFunction(this.parentNode.rowIndex);
    }
  }

  function myDeleteFunction(x) {
    document.getElementById("produksi_informasi_lain").deleteRow(x);
  }
</script>
@endsection