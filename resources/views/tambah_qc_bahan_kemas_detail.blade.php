@extends('index')

@section('content')
    <form id="demo-form2" data-pars metley-validate class="form-horizontal form-label-left" method="post" action="{{ url('admin/simpan_cek_bahan_kemas_detail') }}">
  <div class="row">
        @csrf
      <div class="col-md-12">
        <div class="x_panel">
          <div class="own-title">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Tampil Data</button>
            <button type="button" id="reset" class="btn btn-danger">Reset</button>
            <hr>
          </div>
          <div class="x_content">
              <div class="row">

                <input type="hidden" name="kode" id="kode" class="form-control">
                <div class="col-md-6">
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="tanggal">Tanggal
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="date" id="tanggal" name="tanggal" required="required" class="form-control">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="area">Area
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="area" name="area" required="required" class="form-control">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="jam_sample">Jam Sample
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="time" id="jam_sample" name="jam_sample" required="required" class="form-control">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="jenis">Jenis
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="jenis" name="jenis" required="required" class="form-control">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="supplier">Supplier
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="supplier" name="supplier" required="required" class="form-control">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="no_po">No. PO
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="no_po" name="no_po" required="required" class="form-control">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="Jumlah">Jumlah
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="number" min="0" step="1" id="jumlah" name="jumlah" required="required" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="satuan">Satuan
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="satuan" name="satuan" required="required" class="form-control">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align"   for="no_mobil">No. Mobil
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="no_mobil" name="no_mobil" required="required" class="form-control">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align"   for="coa">COA
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="coa" name="coa" required="required" class="form-control">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="no_md">No. MD
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="no_md" name="no_md" required="required" class="form-control">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="no_lot">No. Lot
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="no_lot" name="no_lot" required="required" class="form-control">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="status">Status
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="status" name="status" required="required" class="form-control">
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
            <h2><b>TEKS</b></h2>
          </div>
          <div class="x_content">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th><center>Nama Produk</center></th>
                  <th><center>Netto/Isi</center></th>
                  <th><center>Komposisi</center></th>
                  <th><center>Alamat Produsen</center></th>
                  <th><center>Label Halal</center></th>
                  <th><center>Barcode</center></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <select class="form-control" id="nama_produk" name="nama_produk" required>
                      @foreach($produk as $p)
                        <option value="{{ $p->nama}}">{{ $p->nama}}</option>
                      @endforeach
                    </select>
                  </td>
                  <td><input type="text" id="netto" name="netto" required="required" class="form-control"></td>
                  <td><input type="text" id="komposisi" name="komposisi" required="required" class="form-control"></td>
                  <td><textarea id="alamat_produsen" name="alamat_produsen" class="form-control"></textarea></td>
                  <td><input type="text" id="label_halal" name="label_halal" required="required" class="form-control"></td>
                  <td><input type="text" id="barcode" name="barcode" required="required" class="form-control"></td>
                </tr>
              </tbody>
            </table>
            <br>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th><center>Bau Menyimpang</center></th>
                  <th><center>Warna</center></th>
                  <th><center>Printing</center></th>
                  <th><center>Delaminasi</center></th>
                  <th><center>Seal</center></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><input type="text" id="bau_menyimpang" name="bau_menyimpang" class="form-control"></td>
                  <td><input type="text" id="warna" name="warna" class="form-control"></td>
                  <td><input type="text" id="printing" name="printing" class="form-control"></td>
                  <td><input type="text" id="delaminasi" name="delaminasi" class="form-control"></td>
                  <td><input type="text" id="seal" name="seal" class="form-control"></td>
                </tr>
              </tbody>
            </table>
            <br>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th><center>Creasing</center></th>
                  <th><center>Kondisi Core</center></th>
                  <th><center>Cut Off Light</center></th>
                  <th><center>Kondisi Mobil Pengangkut</center></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><input type="text" id="creasing" name="creasing" class="form-control"></td>
                  <td><input type="text" id="kondisi_core" name="kondisi_core" class="form-control"></td>
                  <td><input type="text" id="cut_off" name="cut_off" class="form-control"></td>
                  <td><input type="text" id="kondisi_mobil" name="kondisi_mobil" class="form-control"></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="x_panel">
          <div class="own-title">
            <h2><b>KARTON</b></h2>
          </div>
          <div class="x_content">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th rowspan="2"><center>Jumlah/Ikatan (pcs)</center></th>
                  <th colspan="4"><center>Dimensi (mm)</center></th>
                </tr>
                <tr>
                  <th><center>Tinggi Fluts</center></th>
                  <th><center>Panjang</center></th>
                  <th><center>Lebar</center></th>
                  <th><center>Tinggi</center></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><input type="number" step="1" min="0" id="jumlah_ikatan_karton" name="jumlah_ikatan_karton" required="required" class="form-control"></td>
                  <td><input type="number" min="0" step="0.01" id="tinggi_fluts" name="tinggi_fluts" required="required" class="form-control"></td>
                  <td><input type="number" min="0" step="0.01" id="panjang" name="panjang" required="required" class="form-control"></td>
                  <td><input type="number" min="0" step="0.01" id="lebar" name="lebar" required="required" class="form-control"></td>
                  <td><input type="number" min="0" step="0.01" id="tinggi" name="tinggi" required="required" class="form-control"></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="x_panel">
          <div class="own-title">
            <h2><b>POLLY ROLL</b></h2>
          </div>
          <div class="x_content">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th rowspan="2"><center>Berat/Roll (kotor) kg</center></th>
                  <th colspan="4"><center>Dimensi (mm)</center></th>
                </tr>
                <tr>
                  <th><center>Core</center></th>
                  <th><center>Panjang</center></th>
                  <th><center>Lebar</center></th>
                  <th><center>Tebal</center></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><input type="number" step="0.01" min="0" id="berat_roll" name="berat_roll" required="required" class="form-control"></td>
                  <td><input type="number" min="0" step="0.01" id="core_roll" name="core_roll" required="required" class="form-control"></td>
                  <td><input type="number" min="0" step="0.01" id="panjang_roll" name="panjang_roll" required="required" class="form-control"></td>
                  <td><input type="number" min="0" step="0.01" id="lebar_roll" name="lebar_roll" required="required" class="form-control"></td>
                  <td><input type="number" min="0" step="0.01" id="tebal_roll" name="tebal_roll" required="required" class="form-control"></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="x_panel">
          <div class="own-title">
            <h2><b>PAPER BAG</b></h2>
          </div>
          <div class="x_content">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th rowspan="2"><center>Jumlah/Ikatan (pcs)</center></th>
                  <th colspan="4"><center>Dimensi (mm)</center></th>
                </tr>
                <tr>
                  <th><center>Gaset</center></th>
                  <th><center>Lebar</center></th>
                  <th><center>Tinggi</center></th>
                  <th><center>Ketebalan Inner</center></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><input type="number" step="1" min="0" id="jumlah_bag" name="jumlah_bag" required="required" class="form-control"></td>
                  <td><input type="number" min="0" step="0.01" id="gaset_bag" name="gaset_bag" required="required" class="form-control"></td>
                  <td><input type="number" min="0" step="0.01" id="lebar_bag" name="lebar_bag" required="required" class="form-control"></td>
                  <td><input type="number" min="0" step="0.01" id="tinggi_bag" name="tinggi_bag" required="required" class="form-control"></td>
                  <td><input type="number" min="0" step="0.01" id="ketebalan_inner" name="ketebalan_inner" required="required" class="form-control"></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="x_panel">
          <div class="own-title">
            <h2><b>PLASTIK INNER</b></h2>
          </div>
          <div class="x_content">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th rowspan="2"><center>Berat/Bal (kg)</center></th>
                  <th colspan="4"><center>Dimensi (mm)</center></th>
                </tr>
                <tr>
                  <th><center>Ketebalan</center></th>
                  <th><center>Gaset</center></th>
                  <th><center>Lebar</center></th>
                  <th><center>Tinggi</center></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><input type="number" step="0.01" min="0" id="berat_plastik" name="berat_plastik" required="required" class="form-control"></td>
                  <td><input type="number" min="0" step="0.01" id="ketebalan_plastik" name="ketebalan_plastik" required="required" class="form-control"></td>
                  <td><input type="number" min="0" step="0.01" id="gaset_plastik" name="gaset_plastik" required="required" class="form-control"></td>
                  <td><input type="number" min="0" step="0.01" id="lebar_plastik" name="lebar_plastik" required="required" class="form-control"></td>
                  <td><input type="number" min="0" step="0.01" id="tinggi_plastik" name="tinggi_plastik" required="required" class="form-control"></td>
                </tr>
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
            <textarea id="keterangan" name="keterangan" rows="5" class="form-control"></textarea>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <a href="{{ url('admin/cek_bahan_kemas_detail') }}" class="btn btn-danger" type="button">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
  </div>
</form>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Pilih data</h4>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-striped table-bordered dt-responsive nowrap datatable-responsive" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>TANGGAL</th>
                  <th>AREA</th>
                  <th>JAM SAMPLE</th>
                  <th>JENIS BAHAN KEMAS</th>
                  <th>SUPPLIER</th>
                  <th hidden>NO PO</th>
                  <th hidden>JUMLAH</th>
                  <th hidden>SATUAN</th>
                  <th hidden>NO MOBIL</th>
                  <th hidden>NO LOT</th>
                  <th hidden>STATUS</th>
                  <th hidden>COA</th>
                  <th hidden>NO MD</th>
                  <th hidden>ID</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $d)
                  <tr onclick="setValue(this)">
                    <td>{{ $d->tanggal }}</td>
                    <td>{{ $d->area }}</td>
                    <td>{{ $d->jam_sample }}</td>
                    <td>{{ $d->jenis }}</td>
                    <td>{{ $d->supplier }}</td>
                    <td hidden>{{ $d->no_po }}</td>
                    <td hidden>{{ $d->jumlah }}</td>
                    <td hidden>{{ $d->satuan }}</td>
                    <td hidden>{{ $d->no_mobil }}</td>
                    <td hidden>{{ $d->no_lot }}</td>
                    <td hidden>{{ $d->status }}</td>
                    <td hidden>{{ $d->coa }}</td>
                    <td hidden>{{ $d->no_md }}</td>
                    <td hidden>{{ $d->id }}</td>
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
            $("input[name='area']").removeAttr( "readonly" );
            $("input[name='jenis']").removeAttr( "readonly" );
            $("input[name='jam_sample']").removeAttr( "readonly" );
            $("input[name='supplier']").removeAttr( "readonly" );
            $("input[name='no_po']").removeAttr( "readonly" );
            $("input[name='jumlah']").removeAttr( "readonly" );
            $("input[name='satuan']").removeAttr( "readonly" );
            $("input[name='no_mobil']").removeAttr( "readonly" );
            $("input[name='no_lot']").removeAttr( "readonly" );
            $("input[name='status']").removeAttr( "readonly" );
            $("input[name='coa']").removeAttr( "readonly" );
            $("input[name='no_md']").removeAttr( "readonly" );

            document.getElementById('tanggal').value = '';
            document.getElementById('area').value = '';
            document.getElementById('jenis').value = '';
            document.getElementById('jam_sample').value = '';
            document.getElementById('supplier').value = '';
            document.getElementById('no_po').value = '';
            document.getElementById('jumlah').value = '';
            document.getElementById('satuan').value = '';
            document.getElementById('no_mobil').value = '';
            document.getElementById('no_lot').value = '';
            document.getElementById('status').value = '';
            document.getElementById('coa').value = '';
            document.getElementById('no_md').value = '';
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
    var n = tds[13].innerHTML;

    document.getElementById('tanggal').value = a;
    document.getElementById('area').value = b;
    document.getElementById('jam_sample').value = c;
    document.getElementById('jenis').value = d;
    document.getElementById('supplier').value = e;
    document.getElementById('no_po').value = f;
    document.getElementById('jumlah').value = g;
    document.getElementById('satuan').value = h;
    document.getElementById('no_mobil').value = i;
    document.getElementById('no_lot').value = j;
    document.getElementById('status').value = k;
    document.getElementById('coa').value = l;
    document.getElementById('no_md').value = m;
    document.getElementById('kode').value = n;

    document.getElementById('tanggal').readOnly = true;
    document.getElementById('area').readOnly = true;
    document.getElementById('jenis').readOnly = true;
    document.getElementById('jam_sample').readOnly = true;
    document.getElementById('supplier').readOnly = true;
    document.getElementById('no_po').readOnly = true;
    document.getElementById('jumlah').readOnly = true;
    document.getElementById('satuan').readOnly = true;
    document.getElementById('no_mobil').readOnly = true;
    document.getElementById('no_lot').readOnly = true;
    document.getElementById('status').readOnly = true;
    document.getElementById('coa').readOnly = true;
    document.getElementById('no_md').readOnly = true;
    
    $('.modal').modal('hide');
  }

</script>
@endsection