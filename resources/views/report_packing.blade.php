@extends('index')

@section('content')
<form action="{{ url('admin/report_packing_filter') }}" method="POST">
  @csrf

  <div class="row">
    <div class="col-md-3"></div>
    
      <div class="col-md-6">
        <div class="x_panel">
          <div class="x_content">
            <div class="row">
                <div class="col-md-12">
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="tanggal_produksi">Tanggal Kedatangan
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="date" id="tanggal_produksi" name="tanggal_produksi" required="required" class="form-control" value="{{ $tanggal }}">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="barang">Nama Barang
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <select class="form-control" id="barang" name="barang" required>
                        @foreach($barang as $b)
                          <option value="{{ $b->nama}}" {{ ($b->nama == $nama) ? 'selected':''}}>{{ $b->nama}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="area">
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    <div class="col-md-3"></div>
    </div>

  </form>

@if($param == '1')
  <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <a href="{{ url('admin/export_packing/'.$tanggal.'/'.$nama) }}" class="btn btn-success btn-sm"><i class="fa fa-file-excel-o"></i> Export</a>
          </div>
          <div class="x_content">
            <table class="table table-striped table-bordered dt-responsive nowrap datatable-responsive" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>NAMA PRODUK</th>
                  <th>HARI/TANGGAL PRODUKSI</th>
                  <th>SHIFT/MESIN</th>
                  <th>NOMOR SO</th>
                  <th>NO MD</th>
                  <th>SETTING MD</th>
                  <th>HOPPER MESIN KEMAS</th>
                  <th>MESIN KEMAS</th>
                  <th>KARTON SEALER</th>
                  <th>CONTROL</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $d)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $d->nama_produk }}</td>
                    <td>{{ $d->tanggal_produksi }}</td>
                    <td>{{ $d->mesin }}</td>
                    <td>{{ $d->no_so }}</td>
                    <td>{{ $d->no_md }}</td>
                    <td>{{ $d->setting_md }}</td>
                    <td>{{ $d->hopper_mesin_kemas }}</td>
                    <td>{{ $d->mesin_kemas }}</td>
                    <td>{{ $d->karton_sealer }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
@endif
@endsection