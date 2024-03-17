<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Fitness Guru</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">


  {{-- sweetalert css --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{ asset('dist/css/adminstyle.css') }}">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

  {{-- chart js --}}
  {{-- <script src="https://cdnjs.com/libraries/Chart.js"></script> --}}


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <style>
      .tab {
     display: flex;
     justify-content: center;
     display: none;
     animation: moving .5s ease;
}
.tab.active {
     display: block;
}
.bmi {
     border: 2px solid black;
     border-radius: 6px;
     color: black;
}

.bmi:hover{
     background: black;
     color: whitesmoke;
}

.bmiactive 
{
     border: 2px solid black;
     background: black;
     border-radius: 6px;
     color: whitesmoke;    
}

    </style>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

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
     

      
      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
      <li class="nav-item">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="nav-link" type="submit">
                <i class="fas fa-sign-out-alt"></i>
            </button>
            {{-- <button class="nav-link" type="button" data-bs-toggle="modal" data-bs-target="#logoutModal">
              <i style="padding-left: 4px;" class="me-1 ps-1 fas fa-sign-out-alt"></i>
          </button> --}}
        </form>
    </li>
     
    </ul>
  </nav>


  {{-- <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Logout Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body fs-5 fw-medium">
                Are you sure you want to logout?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" onclick="document.getElementById('logoutForm').submit()">Logout</button>
            </div>
        </div>
    </div>
</div> --}}
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 position-fixed">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Fitness Guru</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
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
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="/admin" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                DASHBOARD
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/members" class="nav-link {{ request()->is('admin/members*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-dumbbell"></i>
              <p>
                MEMBERS
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/trainers" class="nav-link {{ request()->is('admin/trainers*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-dumbbell"></i>
              <p>
                TRAINER
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/sports" class="nav-link {{ request()->is('admin/sports*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-dumbbell"></i>
              <p>
                SPORT TYPES
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/topics" class="nav-link {{ request()->is('admin/topics*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-dumbbell"></i>
              <p>
                TOPICS
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/courses" class="nav-link {{ request()->is('admin/courses*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-dumbbell"></i>
              <p>
                COURSES
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/categories" class="nav-link {{ request()->is('admin/categories*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-dumbbell"></i>
              <p>
                CATEGORIES
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/products" class="nav-link {{ request()->is('admin/products*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-dumbbell"></i>
              <p>
                PRODUCTS
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/orders" class="nav-link {{ request()->is('admin/orders*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-dumbbell"></i>
              <p>
                ORDERS
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/blogs" class="nav-link {{ request()->is('admin/blogs*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-dumbbell"></i>
              <p>
                BLOGS
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/galleries" class="nav-link {{ request()->is('admin/galleries*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-dumbbell"></i>
              <p>
                GALLERIES
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/regions" class="nav-link {{ request()->is('admin/regions*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-dumbbell"></i>
              <p>
                REGIONS
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

  {{$slot}}
  
</div>


  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2023-2024 <a href="#">FitnessGuru</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
{{-- sweetalerts  --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- chart js script --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>



  {{-- Ajax script --}}

<script>
  $(document).ready(function() {
      let token = document.head.querySelector('meta[name="csrf-token"]');
      if (token) {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
              }
          });
      }
      const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 5000,
          timerProgressBar: true,
          didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
      })
      @if (session('create'))
          Toast.fire({
              icon: 'success',
              title: 'Created successfully!'
          })
      @endif
      @if (session('update'))
          Toast.fire({
              icon: 'success',
              title: 'Updated successfully!'
          })
      @endif
      @if (session('delete'))
          Toast.fire({
              icon: 'success',
              title: 'Deleted successfully!'
          })
      @endif
      @if (session('success'))
          Toast.fire({
              icon: 'success',
              title: '{{ session('success') }}'
          });
      @endif
  });
</script>
</body>
</html>