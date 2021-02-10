@extends('index')

@section('content')
    <form id="demo-form2" data-pars metley-validate class="form-horizontal form-label-left" method="post" action="{{ url('admin/update_proses_produksi_informasi_lain/'.$data->id) }}">
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
                      <input type="text" id="nama_produk" value="{{ $data->nama_produk }}" name="nama_produk" required="required" class="form-control" readonly>
                    </div>
                  </div>
                  <input type="hidden" name="kode_proses_produksi" value="{{ $data->kode_proses_produksi }}" id="kode_proses_produksi" >
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="tanggal_produksi">Tanggal Produksi
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="date" id="tanggal_produksi" name="tanggal_produksi" value="{{ $data->tanggal_produksi }}" required="required" class="form-control" readonly>
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="shift">Shift
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" value="{{ $data->shift }}" readonly id="shift" name="shift" required="required" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="no_mesin">No. Mesin
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="no_mesin" readonly value="{{ $data->no_mesin }}" name="no_mesin" class="form-control">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="no_microwave">No. Microwave
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="no_microwave" readonly name="no_microwave" value="{{ $data->no_microwave }}" class="form-control">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="no_lot">No. Lot
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" value="{{ $data->no_lot_head }}" id="no_lot" name="no_lot" readonly class="form-control">
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
            <h3>Edit Detail</h3>
          </div>
          <div class="x_content">
              <table id="produksi_informasi_lain" class="table table-bordered">
              <thead>
                <tr>
                  <th><center>Jam</center></th>
                  <th><center>Bahan Baku</center></th>
                  <th><center>No Lot</center></th>
                  <th><center>Kadar Air Tepung</center></th>
                  <th><center>Bulk Density Adukan</center></th>
                  <th><center>Air (kg)</center></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><input type="time" name="jam" id="jam" class="form-control" required value="{{ $data->jam }}"></td>
                  <td><input type="text" name="bahan_baku" id="bahan_baku" class="form-control" required value="{{ $data->bahan_baku }}"></td>
                  <td><input type="text" name="no_lot_info" id="no_lot_info" class="form-control" required value="{{ $data->no_lot }}"></td>
                  <td><input type="number" min="0" step="0.01" name="kadar_air_tepung" id="kadar_air_tepung" class="form-control" required value="{{ $data->kadar_air_tepung }}"></td>
                  <td><input type="number" min="0" step="0.01" name="bulk" id="bulk" class="form-control" required value="{{ $data->bulk }}"></td>
                  <td><input type="number" min="0" step="0.01" name="air" id="air" class="form-control" required value="{{ $data->air }}"></td>
                </tr>
              </tbody>
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
                      <input type="text" id="lolos" name="lolos" required="required" value="{{ $data->lolos }}" class="form-control">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="blending">Blending
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="blending" value="{{ $data->blending }}" name="blending" required="required" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                 <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="p_">P 08
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="p_" name="p_" required="required" value="{{ $data->p_ }}" class="form-control">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="scrap">Scrap
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="scrap" name="scrap" required="required" class="form-control" value="{{ $data->scrap }}">
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
                      <textarea rows="5" class="form-control" id="informasi_lain" name="informasi_lain">{{ $data->informasi_lain }}</textarea>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <a href="{{ url('admin/proses_produksi') }}" class="btn btn-danger" type="button">Kembali</a>
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