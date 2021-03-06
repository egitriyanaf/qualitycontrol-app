@extends('index')

@section('content')
  <div class="row">
    <form id="demo-form2" data-pars metley-validate class="form-horizontal form-label-left" method="post" action="{{ url('admin/update_cek_bahan_baku/'.$dataMaster->id) }}">
        @csrf
      <div class="col-md-12">
        <div class="x_panel">
          <div class="own-title">
 <!--            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Tampil Data</button>
            <button type="button" id="reset" class="btn btn-danger">Reset</button>
            <hr> -->
          </div>
          <div class="x_content">

              <div class="row">
                <div class="col-md-6">
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="tanggal_kedatangan">ID
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="int" id="id" name="id" readonly class="form-control" value="{{ $dataMaster->id }}">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="tanggal_kedatangan">Tanggal Kedatangan
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="date" id="tanggal_kedatangan" name="tanggal_kedatangan" required="required" class="form-control" value="{{ $dataMaster->tanggal_datang }}">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="jam_sample">Jam Sample
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="time" id="jam_sample" name="jam_sample" required="required" class="form-control" value="{{ $dataMaster->jam_sample }}">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="merk">Merk
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="merk" name="merk" required="required" class="form-control" value="{{ $dataMaster->merk }}">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="negara_asal">Negara Asal
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="negara_asal" name="negara_asal" required="required" class="form-control" value="{{ $dataMaster->negara_asal }}">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="no_po">No. PO
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="no_po" name="no_po" required="required" class="form-control" value="{{ $dataMaster->no_po }}">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="satuan">Satuan
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="satuan" name="satuan" required="required" class="form-control" value="{{ $dataMaster->satuan }}">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="expired_date">Expired Date
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="date" id="expired_date" name="expired_date" required="required" class="form-control" value="{{ $dataMaster->exp_date }}">
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="area">Area
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="area" name="area" required="required" class="form-control" value="{{ $dataMaster->area }}">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="jenis_bahan_baku">Jenis Bahan Baku
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="jenis_bahan_baku" name="jenis_bahan_baku" required="required" class="form-control" value="{{ $dataMaster->jenis }}">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="produsen">Produsen
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="produsen" name="produsen" value="{{ $dataMaster->produsen }}" required="required" class="form-control">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="pemasok">Pemasok
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="pemasok" name="pemasok" required="required" class="form-control" value="{{ $dataMaster->pemasok }}">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="jumlah">Jumlah
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="number" min="0" step="1" id="jumlah" name="jumlah" required="required" class="form-control" value="{{ $dataMaster->jumlah }}">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="no_lot">No. Lot/Batch
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="no_lot" name="no_lot" value="{{ $dataMaster->no_lot }}" required="required" class="form-control">
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
            <h2><b>HASIL PENGECEKAN QC INCOMING</b> <small>Kondisi Fisik RM</small></h2>
          </div>
          <div class="x_content">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th><center>Sanitasi Produk</center></th>
                  <th><center>Jenis Kemasan</center></th>
                  <th><center>Berat (kg)</center></th>
                  <th><center>CoA</center></th>
                </tr>
              </thead>
              <tbody>
                @foreach($dataDetail as $d)
                <input type="hidden" name="detail_id[]" value="{{ $d->id}}">
                  <tr>
                    <td>
                      <select class="form-control" id="sanitasi_produk" name="sanitasi_produk[]" required>
                        <option value="OK" {{ ($d->sanitasi_produk == 'OK') ? 'selected' : ''}}>OK</option>
                        <option value="NOT OK" {{ ($d->sanitasi_produk == 'NOT OK') ? 'selected' : ''}}>NOT OK</option>
                      </select>
                    </td>
                    <td><input type="text" id="jenis_kemasan" name="jenis_kemasan[]" value="{{ $d->jenis_kemasan }}" class="form-control" required></td>
                    <td><input type="number" id="berat" name="berat[]" value="{{ $d->berat }}" min="0" step="0.01" class="form-control"></td>
                    <td><input type="text" id="coa" name="coa[]" value="{{ $d->coa }}" class="form-control"></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <br>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th colspan="3"><center>Halal</center></th>
                  <th colspan="4"><center>Organoleptik</center></th>
                </tr>
              </thead>
              <tbody>
                @foreach($dataDetail as $d)
                  <tr>
                    <td><input type="text" id="label_halal" name="label_halal[]" value="{{ $d->label }}" class="form-control"></td>
                    <td><input type="text" id="sertifikasi_halal" name="sertifikasi_halal[]" value="{{ $d->sertifikasi }}" class="form-control"></td>
                    <td><input type="text" id="status_halal" name="status_halal[]" value="{{ $d->status }}" class="form-control"></td>
                    <td><input type="text" id="tekstur" name="tekstur[]" value="{{ $d->tekstur }}" class="form-control"></td>
                    <td><input type="text" id="aroma" name="aroma[]"  value="{{ $d->aroma }}" class="form-control"></td>
                    <td><input type="text" id="warna" name="warna[]" value="{{ $d->warna }}" class="form-control"></td>
                    <td><input type="text" id="cemaran_fisik" name="cemaran_fisik[]" value="{{ $d->cemaran_fisik }}" class="form-control"></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="x_panel">
          <div class="own-title">
            <h2><b>HASIL ANALISA LABORATORIUM</b></h2>
          </div>
          <div class="x_content">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th colspan="3"><center>Kimia - Fisik</center></th>
                </tr>
                <tr>
                  <th><center>Particle Size (%)</center></th>
                  <th><center>MC (%)</center></th>
                  <th><center>pH</center></th>
                </tr>
              </thead>
              <tbody>
                @foreach($dataDetail as $d)
                  <tr>
                    <td><input type="number" min="0" step="0.01" id="particle_size" name="particle_size[]" class="form-control" value="{{ $d->particle_size }}"></td>
                    <td><input type="number" id="mc" name="mc[]" value="{{ $d->mc }}" min="0" step="0.01" class="form-control"></td>
                    <td><input type="number" step="0.01" id="ph" name="ph[]" value="{{ $d->ph }}"  class="form-control"></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <br>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th colspan="4"><center>Organoleptik</center></th>
                </tr>
                <tr>
                  <th><center>Kelarutan</center></th>
                  <th><center>Aroma</center></th>
                  <th><center>Warna</center></th>
                  <th><center>Rasa</center></th>
                </tr>
              </thead>
              <tbody>
                @foreach($dataDetail as $d)
                  <tr>
                    <td><input type="text" id="kelarutan" name="kelarutan[]" value="{{ $d->kelarutan }}" class="form-control"></td>
                    <td><input type="text" id="aroma_arga" name="aroma_arga[]" value="{{ $d->aroma_b }}" class="form-control"></td>
                    <td><input type="text" id="warna_arga" name="warna_arga[]" value="{{ $d->warna_b }}" class="form-control"></td>
                    <td><input type="text" id="rasa" name="rasa[]" value="{{ $d->rasa }}" class="form-control"></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="x_panel">
          <div class="own-title">
            <h2><b>KENDARAAN/MOBIL PENGANGKUT</b></h2>
          </div>
          <div class="x_content">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th><center>No. Mobil</center></th>
                  <th><center>No. Container</center></th>
                  <th><center>Kondisi Mobil Pengangkut</center></th>
                </tr>
              </thead>
              <tbody>
                @foreach($dataDetail as $d)
                  <tr>
                    <td><input type="text" id="nomor_mobil" name="nomor_mobil[]" value="{{ $d->no_mobil }}"class="form-control"></td>
                    <td><input type="text" id="nomor_container" name="nomor_container[]" value="{{ $d->no_container }}" class="form-control"></td>
                    <td><input type="text" id="kondisi_mobil" name="kondisi_mobil[]" value="{{ $d->kondisi_mobil }}"  class="form-control"></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="x_panel">
          <div class="own-title">
            <h2><b>KETERANGAN</b></h2>
          </div>
          <div class="x_content">
            @foreach($dataDetail as $d)
              <textarea id="keterangan" name="keterangan[]" class="form-control" rows="4">{{ $d->keterangan }}</textarea><br>
            @endforeach
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <a href="{{ url('admin/cek_bahan_baku') }}" class="btn btn-danger" type="button">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
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
            $("input[name='tanggal_kedatangan']").removeAttr( "readonly" );
            $("input[name='area']").removeAttr( "readonly" );
            $("input[name='jenis_bahan_baku']").removeAttr( "readonly" );
            $("input[name='jam_sample']").removeAttr( "readonly" );
            $("input[name='merk']").removeAttr( "readonly" );
            $("input[name='produsen']").removeAttr( "readonly" );
            $("input[name='negara_asal']").removeAttr( "readonly" );
            $("input[name='pemasok']").removeAttr( "readonly" );
            $("input[name='no_po']").removeAttr( "readonly" );
            $("input[name='jumlah']").removeAttr( "readonly" );
            $("input[name='satuan']").removeAttr( "readonly" );
            $("input[name='no_lot']").removeAttr( "readonly" );
            $("input[name='expired_date']").removeAttr( "readonly" );

            document.getElementById('tanggal_kedatangan').value = '';
            document.getElementById('area').value = '';
            document.getElementById('jenis_bahan_baku').value = '';
            document.getElementById('jam_sample').value = '';
            document.getElementById('merk').value = '';
            document.getElementById('produsen').value = '';
            document.getElementById('negara_asal').value = '';
            document.getElementById('pemasok').value = '';
            document.getElementById('no_po').value = '';
            document.getElementById('jumlah').value = '';
            document.getElementById('satuan').value = '';
            document.getElementById('no_lot').value = '';
            document.getElementById('expired_date').value = '';
        });
    });
</script>

<script type="text/javascript">
  function setValue(x) {
    var tds = x.children;
    var a = tds[0].innerHTML;
    var b = tds[1].innerHTML;
    var c = tds[2].innerHTML;
    var d = tds[3].innerHTML;
    var e = tds[4].innerHTML;
    var f = tds[5].innerHTML;
    var g = tds[6].innerHTML;
    var h = tds[7].innerHTML;
    var i = tds[8].innerHTML;
    var j = tds[9].innerHTML;
    var k = tds[10].innerHTML;
    var l = tds[11].innerHTML;
    var m = tds[12].innerHTML;

    document.getElementById('tanggal_kedatangan').value = a;
    document.getElementById('area').value = b;
    document.getElementById('jenis_bahan_baku').value = c;
    document.getElementById('jam_sample').value = d;
    document.getElementById('merk').value = e;
    document.getElementById('produsen').value = f;
    document.getElementById('negara_asal').value = g;
    document.getElementById('pemasok').value = h;
    document.getElementById('no_po').value = i;
    document.getElementById('jumlah').value = j;
    document.getElementById('satuan').value = k;
    document.getElementById('no_lot').value = l;
    document.getElementById('expired_date').value = m;

    document.getElementById('tanggal_kedatangan').readOnly = true;
    document.getElementById('area').readOnly = true;
    document.getElementById('jenis_bahan_baku').readOnly = true;
    document.getElementById('jam_sample').readOnly = true;
    document.getElementById('merk').readOnly = true;
    document.getElementById('produsen').readOnly = true;
    document.getElementById('negara_asal').readOnly = true;
    document.getElementById('pemasok').readOnly = true;
    document.getElementById('no_po').readOnly = true;
    document.getElementById('jumlah').readOnly = true;
    document.getElementById('satuan').readOnly = true;
    document.getElementById('no_lot').readOnly = true;
    document.getElementById('expired_date').readOnly = true;
    
    $('.modal').modal('hide');
  }

  // function reset() {
    
  // }
</script>
@endsection