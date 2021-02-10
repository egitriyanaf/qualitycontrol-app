@extends('index')

@section('content')
<form action="{{ url('admin/report_proses_produksi_filter') }}" method="POST">
  @csrf

  <div class="row">
    <div class="col-md-3"></div>
    
      <div class="col-md-6">
        <div class="x_panel">
          <!-- <div class="x_title">
            <h2>Inbox Design<small>User Mail</small></h2>
            <div class="clearfix"></div>
          </div> -->
          <div class="x_content">
            <div class="row">
                <div class="col-md-12">
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="tanggal_kedatangan">Tanggal Kedatangan
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
                    <label class="col-form-label col-md-2 col-sm-2 label-align">
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
            <a href="{{ url('admin/export_proses_produksi/'.$tanggal.'/'.$nama) }}" class="btn btn-success btn-sm"><i class="fa fa-file-excel-o"></i> Export</a>
          </div>
          <div class="x_content">
            <table class="table table-striped table-bordered dt-responsive nowrap datatable-responsive" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th width="10px">No</th>
                  <th>NAMA PRODUK</th>
                  <th>TANGGAL PRODUKSI</th>
                  <th>SHIFT</th>
                  <th>NO MESIN</th>
                  <th>NO MICROWAVE</th>
                  <th>NO LOT</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $d)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $d->nama_produk }}</td>
                    <td>{{ $d->tanggal_produksi }}</td>
                    <td>{{ $d->shift }}</td>
                    <td>{{ $d->no_mesin }}</td>
                    <td>{{ $d->no_microwave }}</td>
                    <td>{{ $d->no_lot }}</td>
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