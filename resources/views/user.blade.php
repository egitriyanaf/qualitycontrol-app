@extends('index')

@section('content')
  <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <a href="{{ url('admin/tambah_user') }}" class="btn btn-secondary"><i class="fa fa-plus"></i> Tambah User</a>
            <a href="{{ url('admin/hak_akses') }}" class="btn btn-primary"><i class="fa fa-key"></i> Hak Akses</a>
          </div>
          <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th width="10px">No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th width="100px">Control</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $d)
                  <tr>
                    <td width="10px">{{ $no++ }}</td>
                    <td>{{ $d->name }}</td>
                    <td>{{ $d->email }}</td>
                    <td width="100px">
                      <a href="{{ url('admin/edit_user/'.$d->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                      <button type="button" class="btn btn-danger btn-sm" onclick="return del('{{ $d->id }}')"><i class="fa fa-trash"></i></button>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
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