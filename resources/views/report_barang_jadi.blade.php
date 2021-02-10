@extends('index')

@section('content')
<form action="{{ url('admin/report_barang_jadi_filter') }}" method="POST">
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
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="tanggal">Tanggal
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <input type="date" id="tanggal" name="tanggal" required="required" class="form-control" value="{{ $tanggal }}">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="kendaraan">Kendaraan
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <select class="form-control" id="kendaraan" name="kendaraan" required>
                          <option value="Internal" {{ ($kendaraan == 'Internal') ? 'selected':''}}>Internal</option>
                          <option value="Ekspedisi" {{ ($kendaraan == 'Ekspedisi') ? 'selected':''}}>Ekspedisi</option>
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
            <a href="{{ url('admin/export_barang_jadi/'.$tanggal.'/'.$kendaraan) }}" class="btn btn-success btn-sm"><i class="fa fa-file-excel-o"></i> Export</a>
          </div>
          <div class="x_content">
            <table class="table table-striped table-bordered dt-responsive nowrap datatable-responsive" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th width="10px">NO</th>
                  <th>TANGGAL</th>
                  <th>KENDARAAN</th>
                  <th>NO_DO</th>
                  <th>JAM MULAI</th>
                  <th>JAM SELESAI</th>
                  <th>TUJUAN</th>
                  <th>NO_POLISI</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $d)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $d->tanggal }}</td>
                    <td>{{ $d->kendaraan }}</td>
                    <td>{{ $d->no_do }}</td>
                    <td>{{ $d->mulai }}</td>
                    <td>{{ $d->selesai }}</td>
                    <td>{{ $d->tujuan }}</td>
                    <td>{{ $d->no_polisi }}</td>
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