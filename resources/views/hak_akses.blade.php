@extends('index')

@section('content')
<form action="{{ url('admin/simpan_perubahan_hak_akses') }}" method="post">
  @csrf
  <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <a href="{{ url('admin/management_data_user') }}" class="btn btn-secondary"><i class="fa fa-plus"></i> Kembali</a>
            <button type="submit" class="btn btn-primary"><i class="fa fa-key"></i> Simpan Perubahan</button>
          </div>
          <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th width="10px">NO</th>
                  <th>NAMA</th>
                  <th>ADMIN</th>
                  <th>MASTER DATA BARANG</th>
                  <th>QUALITY CONTROL</th>
                  <th>REPORT</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $d)
                  <input type="text" name="id[]" value="{{ $d->id }}" style="display: none;">
                  <tr>
                    <td width="10px">{{ $no++ }}</td>
                    <td>{{ $d->name }}</td>
                    <td align="center">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" value="1" name="admin{{ $d->id}}" {{ ($d->hak_admin == 1) ? 'checked':''}}>
                        </label>
                      </div>
                    </td>
                    <td align="center">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" value="1" name="master{{ $d->id}}" {{ ($d->hak_master == 1) ? 'checked':''}}>
                        </label>
                      </div>
                    </td>
                    <td align="center">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" value="1" name="qc{{ $d->id}}" {{ ($d->hak_qc == 1) ? 'checked':''}}>
                        </label>
                      </div>
                    </td>
                    <td align="center">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" value="1" name="report{{ $d->id}}" {{ ($d->hak_report == 1) ? 'checked':''}}>
                        </label>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</form>

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
        window.location.href = "{{ url('admin/hapus_user') }}"+'/'+id; 
      }
    })
  }
</script>
@endsection