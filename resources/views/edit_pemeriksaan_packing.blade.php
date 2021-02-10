@extends('index')

@section('content')
  <div class="row">
    <form id="demo-form2" data-pars metley-validate class="form-horizontal form-label-left" method="post" action="{{ url('admin/update_pemeriksaan_packing/'.$data->id) }}">
        @csrf
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_content">
              <div class="row">
                <div class="col-md-6">

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="id">ID
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="int" id="id" name="id" readonly class="form-control" value="{{ $data->id }}">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="control-label col-md-2 col-sm-2 label-align">Nama Produk</label>
                    <div class="col-md-10 col-sm-10 ">
                      <select class="form-control" id="nama_produk" name="nama_produk" required>
                        @foreach($produk as $p)
                          <option value="{{ $p->nama }}" {{ ($data->nama_produk == $p->nama) ? 'selected' : '' }}>{{ $p->nama }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="tanggal_produksi">Tanggal Produksi
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="date" id="tanggal_produksi" name="tanggal_produksi" required="required" class="form-control" value="{{ $data->tanggal_produksi }}">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="mesin">Shift/Mesin
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="mesin" name="mesin" required="required" class="form-control" value="{{ $data->mesin }}">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="no_so">No. SO
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" value="{{ $data->no_so }}" id="no_so" name="no_so" class="form-control">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="no_md">No. MD
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="no_md" name="no_md" value="{{ $data->no_md }}" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="setting_md">Setting MD
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="setting_md" name="setting_md" value="{{ $data->setting_md }}" class="form-control">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="hopper_mesin_kemas">Hopper Mesin Kemas
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="hopper_mesin_kemas" name="hopper_mesin_kemas" value="{{ $data->hopper_mesin_kemas }}" class="form-control">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="mesin_kemas">Mesin Kemas
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="mesin_kemas" value="{{ $data->mesin_kemas }}" name="mesin_kemas" class="form-control">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="karton_sealer">Karton Sealer
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="karton_sealer" name="karton_sealer" value="{{ $data->karton_sealer }}" class="form-control">
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <a href="{{ url('admin/pemeriksaan_packing') }}" class="btn btn-danger" type="button">Kembali</a>
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

    });
</script>

@endsection