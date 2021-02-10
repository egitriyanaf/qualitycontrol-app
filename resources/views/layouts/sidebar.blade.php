<div class="left_col scroll-view">
  <div class="navbar nav_title" style="border: 0;">
    <a href="index.html" class="site_title"><span>QUALITY CONTROL</span></a>
  </div>

  <div class="clearfix"></div>

  <div class="profile clearfix">
    <div class="profile_pic">
      <img src="{{ asset('file/logo.png') }}" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
      <span>Welcome,</span>
      <h2>{{Auth::user()->name}}</h2>
    </div>
  </div>
  <br />

  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>General</h3>
      <ul class="nav side-menu">
        <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
        
        @if(Auth::user()->hak_admin == 1)
        <li><a><i class="fa fa-edit"></i> Admin <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{ url('admin/management_data_user') }}">Management User</a></li>
          </ul>
        </li>
        @endif
        <!-- <li><a><i class="fa fa-home"></i> Master Data Barang</a></li> -->
        @if(Auth::user()->hak_master == 1)
        <li><a><i class="fa fa-desktop"></i> Master Data Barang <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{ url('admin/bahan_baku') }}">Bahan Baku</a></li>
            <li><a href="{{ url('admin/bahan_kemas') }}">Bahan Kemas</a></li>
            <li><a href="{{ url('admin/barang_jadi') }}">Barang Jadi</a></li>
          </ul>
        </li>
        @endif

        @if(Auth::user()->hak_qc == 1)
        <li><a><i class="fa fa-desktop"></i> Quality Control <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{ url('admin/cek_bahan_baku') }}">Bahan Baku</a></li>
            <!-- <li><a href="{{ url('admin/cek_bahan_kemas') }}">Bahan Kemas</a></li> -->
            
            <li><a href="#">Bahan Kemas<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li class="sub_menu"><a href="{{ url('admin/cek_bahan_kemas') }}">Data</a></li>
                <li><a href="{{ url('admin/cek_bahan_kemas_detail') }}">Detail</a></li>
              </ul>
            </li>

            <!-- <li><a href="#">Proses Produksi</a></li> -->
            <li><a href="#">Proses Produksi<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li class="sub_menu"><a href="{{ url('admin/proses_produksi') }}">Produksi</a></li>
                <li><a href="{{ url('admin/proses_produksi_detail') }}">Produksi Detail</a></li>
                <li><a href="{{ url('admin/proses_produksi_informasi_lain') }}">Informasi Lain</a></li>
              </ul>
            </li>
            <li><a href="#">Pemeriksaan Packing<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li class="sub_menu"><a href="{{ url('admin/pemeriksaan_packing') }}">Packing</a></li>
                <li><a href="{{ url('admin/wip') }}">WIP</a></li>
                <li><a href="{{ url('admin/pemeriksaaan_bahan_kemas') }}">Bahan Kemas</a></li>
                <li><a href="{{ url('admin/pemeriksaaan_hasil_kemas') }}">Hasil Kemas</a></li>
                <li><a href="{{ url('admin/pemeriksaaan_hasil_karton') }}">Hasil Karton</a></li>
              </ul>
            </li>
            <li><a href="{{ url('admin/qc_barang_jadi') }}">Barang Jadi</a></li>
          </ul>
        </li>
        @endif
        <!-- <li><a><i class="fa fa-home"></i> Approval</a></li> -->
        @if(Auth::user()->hak_report == 1)
        <li><a><i class="fa fa-table"></i> Report <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{ url('admin/report_bahan_baku') }}">Bahan Baku</a></li>
            <li><a href="{{ url('admin/report_bahan_kemas') }}">Bahan Kemas</a></li>
            <li><a href="{{ url('admin/report_proses_produksi') }}">Proses Produksi</a></li>
            <li><a href="{{ url('admin/report_packing') }}">Packing</a></li>
            <li><a href="{{ url('admin/report_barang_jadi') }}">Barang Jadi</a></li>
          </ul>
        </li>
        @endif
      </ul>
    </div>
  </div>
</div>