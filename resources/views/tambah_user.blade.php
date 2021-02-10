@extends('index')

@section('content')
  <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <!-- <div class="x_title">
            <h2>Inbox Design<small>User Mail</small></h2>
            <div class="clearfix"></div>
          </div> -->
          <div class="x_content">
            <form id="demo-form2" data-pars metley-validate class="form-horizontal form-label-left" method="post" action="{{ url('admin/simpan_user') }}">
              @csrf
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_lengkap">Nama Lengkap
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" id="nama_lengkap" name="nama_lengkap" required="required" class="form-control ">
                </div>
              </div>
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="email" id="email" name="email" required="required" class="form-control">
                </div>
              </div>
              <div class="item form-group">
                <label for="password" class="col-form-label col-md-3 col-sm-3 label-align">Password</label>
                <div class="col-md-6 col-sm-6 ">
                  <input id="password" class="form-control" type="password" name="password" id="password" required>
                </div>
              </div>
              <!-- <div class="ln_solid"></div> -->
              <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                  <a href="{{ url('admin/management_data_user') }}" class="btn btn-danger" type="button">Kembali</a>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
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