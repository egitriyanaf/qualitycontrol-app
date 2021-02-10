<nav class="nav navbar-nav">
  <ul class=" navbar-right">
    <li class="nav-item dropdown open" style="padding-left: 15px;">
      <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
        <img src="{{ asset('file/logo.png') }}" alt="">{{ Auth::user()->name}}
      </a>
      <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item"  data-toggle="modal" data-target="#change-password">Change Password</a>
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i> Log Out</a>      
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
      </div>
    </li>
  </ul>
</nav>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="change-password">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form action="{{ url('admin/change_password/'.Auth::user()->id) }}" method="post">
        @csrf
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel2">Change Password</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="password" placeholder="New password . . ." id="password" name="password" required="required" class="form-control ">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
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
          if (Session::get('change_password')) {
            ?>
                Swal.fire({
                  icon: 'success',
                  title: '<?php echo Session::get("change_password"); ?>',
                  showConfirmButton: false,
                  timer: 2000
                })
        <?php
          }
        ?>
    });
</script>
