<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Fitness Guru</title>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      {{-- sweetalert css --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- bootstrap css -->
      {{-- <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"> --}}
      <!-- style css -->
      <link rel="stylesheet" href="{{asset('css/style.css')}}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
      <!-- fevicon -->
      <link rel="icon" href="{{asset('images/fevicon.png')}}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{asset('css/jquery.mCustomScrollbar.min.css')}}">
      <!-- Tweaks for older IEs-->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <link rel="stylesheet" href="https://rawgit.com/LeshikJanz/libraries/master/Bootstrap/baguetteBox.min.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<style>
   .swal2-success-line-long{
      left: 7px;
      bottom: 12px;
   }  
   .swal2-success-ring {
      padding-top: 15px;
      padding-left: 12px;
      padding-bottom: 16px;
      padding-right: 20px;
   }
   .swal2-success-circular-line-right {
      left: 7px;
      bottom: 12px;
   }
   
   
   
</style>
      <!--[if lt IE 9]>
         
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      {{-- <div class="loader_bg">
         <div class="loader">
            <img style="width: 100%; height: 100%; border-radius: 50%;
            max-width: 100px; max-height: 100px; object-fit: cover; 
            object-position: center;"
            src="{{asset('/images/weight.gif')}}" alt="#"/></div>
      </div> --}}
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="/"><img src="{{asset('/images/l.png')}}" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item active">
                                 <a class="nav-link" href="/">Home</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="/about">About</a>
                              </li>
                              
                              <li class="nav-item  dropdown ">
                                 <div class="dropdown">
                                     <a class="nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                         aria-expanded="false">
                                        Services
                                 </a>
                                     <ul class="dropdown-menu">
                                       
                                       <li class="nav-item">
                                          <a class="nav-link" href="/trainers">Trainers</a>
                                       </li> 
                                       <li class="nav-item">
                                          <a class="nav-link" href="/courses">Courses</a>
                                       </li>
                                       <li class="nav-item">
                                          <a class="nav-link" href="/products">Products</a>
                                       </li>
                                       
                                     </ul>
                                 </div>
                             </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="/blogs">Blogs</a>
                              </li>
                              
                              <li class="nav-item">
                                 <a class="nav-link" href="/gallery">Gallery</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="/contact">Contact</a>
                              </li>
                              @guest
                                <li class="nav-item {{ request()->is('login*') ? 'light' : '' }}
                                    {{ request()->is('register*') ? 'light' : '' }}">
                                    <a class="nav-link" href="/login">Login</a>
                                </li>
                              @else
                              <li class="nav-item  dropdown ">
                                 <div class="dropdown">
                                     <a class="nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                         aria-expanded="false">
                                         {{ auth()->user()->name }}
                                 </a>
                                     <ul class="dropdown-menu">
                                       @auth
                                       @if (auth()->user()->status == 1)
                                       <li class="nav-item">
                                          <a class="nav-link" href="/trainer/dashboard">Dashboard</a>
                                       </li>
                                       
                                       @endif
                                       @if (auth()->user()->status == 2)
                                       <li class="nav-item">
                                          <a class="nav-link" href="/admin">Dashboard</a>
                                       </li> 
                                       <li class="nav-item">
                                          <a class="nav-link" href="/myblog">My Blog</a>
                                       </li>  
                                       @endif
                                       @endauth
                                       <li class="nav-item">
                                          <a class="nav-link" href="/wishlist">My Wishlist</a>
                                       </li>
                                       <li class="nav-item">
                                                 <form action="{{ route('logout') }}" method="POST">
                                                     @csrf
                                                     <button class="text-black nav-link" type="submit">
                                                         Logout
                                                     </button>
                                                 </form>
                                       </li>
                                     </ul>
                                 </div>
                             </li>
                            @endguest
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>

       <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
      


     <!--  footer -->
     <footer>
        <div class="footer">
           <div class="container">
              <div class="row">
                 <div class="col-md-3">
                    <h3>Link Menu</h3>
                    <ul class="link_menu">
                       <li><a href="#">Home</a></li>
                       <li><a href="about.html"> About</a></li>
                       <li><a href="service.html">Services</a></li>
                       <li><a href="news.html">Blogs</a></li>
                       <li><a href="trainer.html">Trainer</a></li>     
                       <li><a href="gallery.html">Gallery</a></li>
                       <li><a href="contact.html">Contact</a></li>
                    </ul>
                 </div>
                 <div class=" col-md-5">
                    <h3>Contact US</h3>
                    <ul class="conta">
                       <li><i class="fa fa-map-marker" aria-hidden="true"></i>Address : Thingangyn Tsp; Yangon;<br>simply dummy 
                       </li>
                       <li><i class="fa fa-mobile" aria-hidden="true"></i> Phone :  +(1234) 567 890</li>
                       <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="#">Email : fitnessguru@gmail.com</a></li>
                    </ul>
                 </div>
                 <div class="col-md-4">
                    <h3>News letter</h3>
                    <form class="bottom_form">
                       <input class="enter" placeholder="Enter your email" type="text" name="Enter your email">
                       <button class="sub_btn">subscribe</button>
                    </form>
                 </div>
              </div>
           </div>
           <div class="copyright">
              <div class="container">
                 <div class="row">
                    <div class="col-md-10 offset-md-1">
                       <p>© Fitness Guru 2023 </p>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </footer>
     <!-- end footer -->
     <!-- Javascript files-->
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
       {{-- <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script> --}}
     <script src="{{asset('js/jquery.min.js')}}"></script>
     <script src="{{asset('js/jquery-3.0.0.min.js')}}"></script>
     <!-- sidebar -->
     <script src="{{asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
     <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
     <script src="{{asset('js/custom.js')}}"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
     <script>
      baguetteBox.run('.tz-gallery');
   </script>

     {{-- Sweet Alerts --}}
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
              timer: 4000,
              timerProgressBar: true,
              didOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
              }
          })
          
          @if (session('success'))
              Toast.fire({
                  icon: 'success',
                  title: '{{ session('success') }}'
              });
          @endif
          @if (session('error'))
          Swal.fire(
                        'OUT OF STOCK !',
                        'Unable add to cart.',
                        'error'
                    )
          @endif
      });
    </script>

     </body>
</html>