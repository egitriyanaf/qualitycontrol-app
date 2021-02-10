@extends('index')

@section('content')
    <form id="demo-form2" data-pars metley-validate class="form-horizontal form-label-left" method="post" action="{{ url('admin/update_cek_bahan_kemas/'.$data->id) }}">
  <div class="row">
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
                      <input type="text" id="id" name="id" readonly class="form-control" value="{{ $data->id }}">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="tanggal">Tanggal
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="date" id="tanggal" name="tanggal" required="required" class="form-control" value="{{ $data->tanggal }}">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="area">Area
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="area" name="area" required="required" class="form-control" value="{{ $data->area }}">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="jam_sample">Jam Sample
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="time" id="jam_sample" name="jam_sample" required="required" class="form-control" value="{{ $data->jam_sample }}">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="jenis">Jenis
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="jenis" name="jenis" required="required" class="form-control" value="{{ $data->jenis }}">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="supplier">Supplier
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="supplier" name="supplier" required="required" class="form-control" value="{{ $data->supplier }}" >
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="no_po">No. PO
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="no_po" name="no_po" required="required" class="form-control" value="{{ $data->no_po }}">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="Jumlah">Jumlah
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="number" min="0" step="1" id="jumlah" name="jumlah" required="required" class="form-control" value="{{ $data->jumlah }}">
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="satuan">Satuan
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="satuan" name="satuan" required="required" class="form-control" value="{{ $data->satuan }}">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align"   for="no_mobil">No. Mobil
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="no_mobil" name="no_mobil" required="required" class="form-control" value="{{ $data->no_mobil }}">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align"   for="coa">COA
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="coa" name="coa" required="required" class="form-control" value="{{ $data->coa }}">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="no_md">No. MD
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="no_md" name="no_md" required="required" class="form-control" value="{{ $data->no_md }}">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="no_lot">No. Lot
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="no_lot" name="no_lot" required="required" class="form-control" value="{{ $data->no_lot }}">
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="status">Status
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="text" id="status" name="status" required="required" class="form-control" value="{{ $data->status }}">
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <a href="{{ url('admin/cek_bahan_kemas') }}" class="btn btn-danger" type="button">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
  </div>
</form>

@endsection