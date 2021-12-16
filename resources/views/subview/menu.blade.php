<ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li>
          <a href="{{ route('home') }}">
            <i class="fa fa-home"></i> <span>Home</span>
            <span class="pull-right-container">

            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @if(Auth::user()->level == 'admin')
            <li ><a href="{{ route('user.index') }}"><i class="fa fa-circle-o"></i> User</a></li>
            @endif
            <li><a href="{{ route('pegawai.index') }}"><i class="fa fa-circle-o"></i> Pegawai</a></li>
            <li><a href="{{ route('kategori.index') }}"><i class="fa fa-circle-o"></i> Kategori</a></li>
            <li><a href="{{ route('produk.index') }}"><i class="fa fa-circle-o"></i> Produk</a></li>
            <li><a href="{{ route('gedung.index') }}"><i class="fa fa-circle-o"></i> Lokasi Gedung</a></li>

          </ul>
        </li>

        <li>
          <a href="#">
            <i class="fa fa-server"></i> <span>Inventaris</span>
            <span class="pull-right-container">

            </span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-list-alt"></i> <span>Layanan</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-circle-o"></i> Pengajuan</a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> Peminjaman Alat</a></li>
          </ul>
        </li>

        <li>
          <a href="#">
            <i class="fa fa-gears"></i> <span>Pengerjaan</span>
            <span class="pull-right-container">

            </span>
          </a>
        </li>

      </ul>
