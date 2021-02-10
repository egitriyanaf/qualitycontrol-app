@extends('index')

@section('content')
  <div class="row">
    <form id="demo-form2" data-pars metley-validate class="form-horizontal form-label-left" method="post" action="{{ url('admin/update_qc_barang_jadi/'.$getData->id) }}">
        @csrf
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_content">
              <input type="hidden" name="kode_qc_barang_jadi" value="{{ $getData->kode_qc_barang_jadi }}" id="kode_qc_barang_jadi">
              <input type="hidden" name="kode_qc_barang_jadi_old" value="{{ $getData->kode_qc_barang_jadi }}" id="kode_qc_barang_jadi_old">
              <div class="row">
                <div class="col-md-6">

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="id">ID
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="Int" id="id" name="id" value="{{ $getData->id }}" readonly class="form-control">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="tanggal">Hari/Tanggal
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="date" id="tanggal" name="tanggal" value="{{ $getData->tanggal }}" required="required" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="ekspedisi">Kendaraan
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <select class="form-control" id="kendaraan" name="kendaraan" required>
                        <option value="Internal" {{ ($getData->kendaraan == 'Internal') ? 'selected':''}}>Internal</option>
                        <option value="Ekspedisi" {{ ($getData->kendaraan == 'Ekspedisi') ? 'selected':'' }}>Ekspedisi</option>
                      </select>
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
            <h2><b>Detail</b></h2>
          </div>
          <div class="x_content">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th rowspan="2"><center>No. DO</center></th>
                  <th colspan="2"><center>Jam Muat</center></th>
                  <th rowspan="2"><center>Tujuan/Destinasi</center></th>
                  <th rowspan="2"><center>No. Polisi</center></th>
                </tr>
                <tr>
                  <th>Mulai</th>
                  <th>Selesai</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><input type="text" id="no_do" name="no_do" value="{{ $getData->no_do }}" class="form-control" required></td>
                  <td><input type="time" id="mulai" name="mulai" value="{{ $getData->mulai }}" class="form-control" required></td>
                  <td><input type="time" id="selesai" name="selesai" class="form-control" value="{{ $getData->selesai }}" required></td>
                  <td><input type="text" value="{{ $getData->tujuan }}" id="tujuan" name="tujuan" class="form-control" required></td>
                  <td><input type="text" id="no_polisi" name="no_polisi" value="{{ $getData->no_polisi }}" class="form-control" required></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="x_panel">
          <div class="own-title">
            <h2><b>KONDISI KENDARAAN</b></h2>
          </div>
          <div class="x_content">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th><center>Bersih</center></th>
                  <th><center>Tidak ada paku/baut yang keluar/lepas</center></th>
                  <th><center>Tidak Berbau Asing</center></th>
                  <th><center>Tidak Bocor</center></th>
                  <th><center>Tidak basah/Berminyak</center></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <select class="form-control" id="bersih" name="bersih" required>
                        <option value="OK" {{ ($getData->bersih == 'OK') ? 'selected':''}}>OK</option>
                        <option value="NOT OK" {{ ($getData->bersih == 'NOT OK') ? 'selected':'' }}>NOT OK</option>
                      </select>
                  </td>
                  <td>
                    <select class="form-control" id="suku_cadang" name="suku_cadang" required>
                        <option value="OK" {{ ($getData->suku_cadang == 'OK') ? 'selected':''}}>OK</option>
                        <option value="NOT OK" {{ ($getData->suku_cadang == 'NOT OK') ? 'selected':'' }}>NOT OK</option>
                      </select>
                  </td>
                  <td>
                    <select class="form-control" id="bau" name="bau" required>
                        <option value="OK" {{ ($getData->bau == 'OK') ? 'selected':''}}>OK</option>
                        <option value="NOT OK" {{ ($getData->bau == 'NOT OK') ? 'selected':'' }}>NOT OK</option>
                      </select>
                  </td>
                  <td>
                    <select class="form-control" id="bocor" name="bocor" required>
                        <option value="OK" {{ ($getData->bocor == 'OK') ? 'selected':''}}>OK</option>
                        <option value="NOT OK" {{ ($getData->bocor == 'NOT OK') ? 'selected':'' }}>NOT OK</option>
                      </select>
                  </td>
                  <td>
                    <select class="form-control" id="basah" name="basah" required>
                        <option value="OK" {{ ($getData->basah == 'OK') ? 'selected':''}}>OK</option>
                        <option value="NOT OK" {{ ($getData->basah == 'NOT OK') ? 'selected':'' }}>NOT OK</option>
                      </select>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="x_panel">
          <div class="own-title">
            <h2><b>KONDISI BARANG JADI</b></h2>
          </div>
          <div class="x_content">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th><center>Identitas Produk</center></th>
                  <th><center>Nomor Lot</center></th>
                  <th><center>Kondisi Jahitan</center></th>
                  <th><center>Paper Zak</center></th>
                  <th><center>Karton</center></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <select class="form-control" id="identitas_produk" name="identitas_produk" required>
                        <option value="OK" {{ ($getData->identitas_produk == 'OK') ? 'selected':''}}>OK</option>
                        <option value="NOT OK" {{ ($getData->karton == 'NOT OK') ? 'selected':''}}>NOT OK</option>
                      </select>
                  </td>
                  <td>
                    <select class="form-control" id="nomor_lot" name="nomor_lot" required>
                        <option value="OK" {{ ($getData->no_lot == 'OK') ? 'selected':''}}>OK</option>
                        <option value="NOT OK" {{ ($getData->no_lot == 'NOT OK') ? 'selected':''}}>NOT OK</option>
                      </select>
                  </td>
                  <td>
                    <select class="form-control" id="kondisi_jahitan" name="kondisi_jahitan" required>
                        <option value="OK" {{ ($getData->kondisi_jahitan == 'OK') ? 'selected':''}}>OK</option>
                        <option value="NOT OK" {{ ($getData->kondisi_jahitan == 'NOT OK') ? 'selected':''}}>NOT OK</option>
                      </select>
                  </td>
                  <td>
                    <select class="form-control" id="paper_zak" name="paper_zak" required>
                        <option value="OK" {{ ($getData->paper_zak == 'OK') ? 'selected':''}}>OK</option>
                        <option value="NOT OK" {{ ($getData->paper_zak == 'NOT OK') ? 'selected':''}}>NOT OK</option>
                      </select>
                  </td>
                  <td>
                    <select class="form-control" id="karton" name="karton" required>
                        <option value="OK" {{ ($getData->karton == 'OK') ? 'selected':''}}>OK</option>
                        <option value="NOT OK" {{ ($getData->karton == 'NOT OK') ? 'selected':''}}>NOT OK</option>
                      </select>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="x_panel">
          <div class="own-title">
            <h2><b>STATUS & CATATAN</b></h2>
          </div>
          <div class="x_content">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th><center>Status</center></th>
                  <th><center>Verifikasi Hasil Vakum</center></th>
                  <th><center>Keterangan</center></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <select class="form-control" id="status" name="status" required>
                        <option value="OK" {{ ($getData->status == 'OK') ? 'selected':''}}>OK</option>
                        <option value="NOT OK" {{ ($getData->status == 'NOT OK') ? 'selected':''}}>NOT OK</option>
                      </select>
                  </td>
                  <td><input type="text" name="verifikasi" id="verifikasi" value="{{ $getData->verifikasi }}" class="form-control" required></td>
                  <td><textarea class="form-control" name="keterangan" id="keterangan" rows="4">{{ $getData->keterangan }}</textarea></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <a href="{{ url('admin/qc_barang_jadi') }}" class="btn btn-danger" type="button">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>

  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Tampil Data</h4>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-striped table-bordered dt-responsive nowrap datatable-responsive" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th hidden>ID</th>
                  <th>HARI/TANGGAL</th>
                  <th>KENDARAAN</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $d)
                  <tr onclick="setValue(this)">
                    <td hidden>{{ $d->id }}</td>
                    <td>{{ $d->tanggal }}</td>
                    <td>{{ $d->kendaraan }}</td>
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
            $("input[name='tanggal']").removeAttr( "readonly" );
            $("input[name='kendaraan']").removeAttr( "readonly" );

            document.getElementById('kode_qc_barang_jadi').value = '';
            document.getElementById('tanggal').value = '';
            document.getElementById('kendaraan').value = 'Internal';
        });
    });
</script>

<script type="text/javascript">
  function setValue(x) {
    var tds = x.children;
    var a = tds[0].innerHTML;
    var b = tds[1].innerHTML;
    var c = tds[2].innerHTML;

    document.getElementById('kode_qc_barang_jadi').value = a;
    document.getElementById('tanggal').value = b;
    document.getElementById('kendaraan').value = c;

    document.getElementById('kode_qc_barang_jadi').readOnly = true;
    document.getElementById('tanggal').readOnly = true;
    document.getElementById('kendaraan').readOnly = true;
    
    $('.modal').modal('hide');
  }

</script>
@endsection