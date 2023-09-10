@extends('layout.main')

@section('content')
     <!-- Navbar -->
     <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light">petugas</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">  
          <div class="info">
            <a href="#" class="d-block">Logout</a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-3">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/admin" class="nav-link">
                    <i class="far fa-circle nav-icon "></i>
                    <p>Admin</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/list-peminjaman" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List Peminjaman</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/tambah_peminjaman" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tambah Peminjam</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/tambah_buku" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tambah buku</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/list-buku" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List buku</p>
                  </a>
                </li>
              </ul>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row-cols-1">
            <div class="card"> 
              <h4 class="mt-3 ml-4 text-bold h5">Tambah Buku</h4>
              <label for="" class="mt-4 ml-4">
                Judul_buku<input type="text" name="judul_buku" placeholder="data wajib diisi" class="ml-4 input-group-lg pl-5 text-sm-left">
              </label> 
               <label for="" class="mt-3 ml-4">
                jumlah <input type="number" name="jumlah" placeholder="data wajib diisi" class="ml-4 input-group-lg pl-5 text-sm-left">
              </label> 
               <label for="" class="mt-3 ml-4">
                id_peminjam <input type="text" name="id_peminjam" placeholder="data wajib diisi" class="ml-4 input-group-lg pl-5 text-sm-left">
              </label>
               <label for="" class="mt-3 ml-1 mr-2">
                tanggal_pinjam<input type="date" name="tanggal_pinjam" placeholder="data wajib diisi" class="ml-5 input-group-lg pl-5 text-sm-left">
              </label>
              <label for="" class="mt-3 ml-1 mr-2">
                batas_pinjam<input type="date" name="batas_pinjam" placeholder="data wajib diisi" class="ml-5 input-group-lg pl-5 text-sm-left">
              </label>
              <label for="" class="mt-4 ml-4 mb-4">
                <button class="btn btn-primary">Kirim</button>
              </label>
            </div>
          </div>
        </div>
      </section>
      <!-- /.content -->
@endsection