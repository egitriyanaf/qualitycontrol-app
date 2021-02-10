@extends('index')

@section('content')
  <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
          <!--   <h2>Inbox Design<small>User Mail</small></h2>
            <div class="clearfix"></div> -->
            <a href="{{ url('admin/tambah_pemeriksaan_packing') }}" class="btn btn-secondary"><i class="fa fa-plus"></i> Tambah</a>
          </div>
          <div class="x_content">
            <table class="table table-striped table-bordered dt-responsive nowrap datatable-responsive" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th width="10px">No</th>
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
                    <td>
                      <a href="{{ url('admin/edit_pemeriksaan_packing/'.$d->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
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
        window.location.href = "{{ url('admin/hapus_pemeriksaan_packing') }}"+'/'+id; 
      }
    })
  }
</script>
@endsection