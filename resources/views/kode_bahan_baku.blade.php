@extends('index')

@section('content')
  <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#kode-bahan-baku"><i class="fa fa-plus"></i> Tambah</button>
          </div>
          <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th width="10px">No</th>
                  <th>NAMA</th>
                  <th width="100px">Control</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $d)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $d->nama }}</td>
                    <td>
                      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{ $d->id }}"><i class="fa fa-edit"></i></button>
                      <button type="button" class="btn btn-danger btn-sm" onclick="return del('{{ $d->id }}')"><i class="fa fa-trash"></i></button>
                    </td>
                  </tr>

                  <div class="modal fade bs-example-modal-sm" id="edit{{ $d->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <form method="post" action="{{ url('admin/update_kode_bahan_baku/'.$d->id) }}">
                          @csrf
                          <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel2">Update Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="item form-group">
                              <!-- <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama">Nama Kode Bahan -->
                              </label>
                              <div class="col-md-12 col-sm-12 ">
                                <input type="text" id="id" name="id" required value="{{ $d->id }}" readonly class="form-control">
                              </div>
                            </div>
                            <div class="item form-group">
                              <!-- <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama">Nama Kode Bahan -->
                              </label>
                              <div class="col-md-12 col-sm-12 ">
                                <input type="text" id="edit_kode_bahan" name="edit_kode_bahan" required value="{{ $d->nama }}" class="form-control">
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                        </form>

                      </div>
                    </div>
                  </div>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

<div class="modal fade bs-example-modal-sm" id="kode-bahan-baku" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <form method="post" action="{{ url('admin/simpan_kode_bahan_baku') }}">
        @csrf
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel2">Tambah Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="item form-group">
            <!-- <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama">Nama Kode Bahan -->
            </label>
            <div class="col-md-12 col-sm-12 ">
              <input type="text" id="nama" name="nama" required="required" class="form-control ">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>

    </div>
  </div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.9/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        <?php 
          if (Session::get('sukses_ubah')) {
            ?>
                Swal.fire({
                  icon: 'success',
                  title: '<?php echo Session::get("sukses_ubah"); ?>',
                  showConfirmButton: false,
                  timer: 2000
                })
        <?php
          }elseif(Session::get('sukses_hapus')){
        ?>
            Swal.fire({
              icon: 'success',
              title: '<?php echo Session::get("sukses_hapus"); ?>',
              showConfirmButton: false,
              timer: 2000
            })
        <?php
          }elseif(Session::get('sukses_simpan')){
        ?>
        Swal.fire({
              icon: 'success',
              title: '<?php echo Session::get("sukses_simpan"); ?>',
              showConfirmButton: false,
              timer: 2000
            })
        <?php
          }
        ?>
    });
</script>

<script type="text/javascript">
  function del(id) {
    Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Data yang telah dihapus tidak dapat dikembalikan lagi!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.value) {
        window.location.href = "{{ url('admin/hapus_kode_bahan_baku') }}"+'/'+id; 
      }
    })
  }
</script>
@endsection