@extends('index')

@section('content')
<form action="{{ url('admin/report_bahan_kemas_filter') }}" method="POST">
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
                      <input type="date" id="tanggal" name="tanggal" required="required" class="form-control" value="{{ $tanggal }}">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align" for="area">Area
                    </label>
                    <div class="col-md-10 col-sm-10 ">
                      <select class="form-control" id="area" name="area" required>
                        @foreach($areaData as $a)
                          <option value="{{ $a->area}}" {{ ($a->area == $area) ? 'selected':''}}>{{ $a->area}}</option>
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
            <a href="{{ url('admin/export_bahan_kemas/'.$tanggal.'/'.$area) }}" class="btn btn-success btn-sm"><i class="fa fa-file-excel-o"></i> Export</a>
          </div>
          <div class="x_content">
            <table class="table table-striped table-bordered dt-responsive nowrap datatable-responsive" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th width="10px">No</th>
                  <th>TANGGAL</th>
                  <th>AREA</th>
                  <th>JAM SAMPLE</th>
                  <th>NAMA PRODUK</th>
                  <th>IKATAN KARTON (pcs)</th>
                  <th>POLLY ROLL (kg)</th>
                  <th>IKATAN PAPER BAG (pcs)</th>
                  <th>PLASTIK INNER (kg)</th>
                  <th>KETERANGAN</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $d)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $d->tanggal }}</td>
                    <td>{{ $d->area }}</td>
                    <td>{{ $d->jam_sample }}</td>
                    <td>{{ $d->nama_produk }}</td>
                    <td>{{ $d->jumlah_karton }}</td>
                    <td>{{ $d->berat_roll }}</td>
                    <td>{{ $d->jumlah_bag }}</td>
                    <td>{{ $d->berat_plastik }}</td>
                    <td>{{ $d->keterangan }}</td>
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