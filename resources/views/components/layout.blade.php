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

    {{-- liverwire --}}
    @livewireStyles

    {{-- sweetalert css --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- bootstrap css -->
    {{-- <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"> --}}
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('/css/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href="{{ asset('/images/fevicon.png') }}" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}"> --}}
    <!-- Tweaks for older IEs-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
    <link rel="stylesheet" href="https://rawgit.com/LeshikJanz/libraries/master/Bootstrap/baguetteBox.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <style>
        .swal2-success-line-long {
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

    <button style="z-index: 1000;" id="scrollUpBtn" onclick="scrollToTop()"><i class="fa-solid fa-angles-up fa-fade"></i></button>

    <div style="background: url(/images/header.jpg); background-repeat: no-repeat; background-size: 100% 100%; background-position: center; 
      border-top: #00274a solid 5px; z-index: 999; position: relative;"
        class="container-fluid py-2 ">
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">
                            <img src="{{ asset('/images/l.png') }}" alt="">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse ms-auto" id="navbarNavDropdown">
                            <ul class="navbar-nav ms-auto ">
                                <li class="nav-item ps-3 fw-medium">
                                    <a class="nav-link {{ request()->is('') ? '' : 'active' }}" aria-current="page"
                                        href="/">HOME</a>
                                </li>
                                <li class="nav-item ps-3 fw-medium">
                                    <a class="nav-link {{ request()->is('about*') ? 'active' : '' }}"
                                        href="/about">ABOUT</a>
                                </li>
                                <li class="nav-item dropdown ps-3 fw-medium">
                                    <a class="nav-link dropdown-toggle {{ request()->is('trainers*') || request()->is('courses*') || request()->is('products*') ? 'active' : '' }}"
                                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        SERVICES
                                    </a>
                                    <ul class="dropdown-menu ps-2 fw-medium">
                                        <li class="nav-item">
                                            <a class="nav-link {{ request()->is('trainers*') ? 'active' : '' }}"
                                                href="/trainers"><i class="me-1 ps-1 fas fa-user-tie"></i>
                                                TRAINERS</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ request()->is('courses*') ? 'active' : '' }}"
                                                href="/courses"><i class="me-1 ps-1 fas fa-clipboard-list"></i>
                                                COURSES</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ request()->is('products*') ? 'active' : '' }}"
                                                href="/products"><i class="me-1 ps-1 fas fa-shopping-bag"></i>
                                                PRODUCTS
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item ps-3 fw-medium">
                                    <a class="nav-link {{ request()->is('blog*') ? 'active' : '' }}"
                                        href="/blogs">BLOGS</a>
                                </li>
                                <li class="nav-item dropdown ps-3 fw-medium">
                                    <a class="nav-link dropdown-toggle {{ request()->is('gallery*') || request()->is('bmicalc*') ? 'active' : '' }}"
                                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        EXPLORE
                                    </a>
                                    <ul class="dropdown-menu ps-2 fw-medium">
                                        <li class="nav-item">
                                            <a class="nav-link {{ request()->is('gallery*') ? 'active' : '' }}"
                                                href="/gallery"><i class="me-1 ps-1 fas fa-images"></i> GALLERY</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ request()->is('bmicalc*') ? 'active' : '' }}"
                                                href="/bmicalc"><i style="padding-left: 6.1px;" class="me-1 fas fa-heartbeat"></i>
                                                 BMI CALC</a>
                                        </li>

                                    </ul>
                                </li>


                                <li class="nav-item ps-3 fw-medium">
                                    <a class="nav-link {{ request()->is('contact*') ? 'active' : '' }}"
                                        href="/contact">CONTACT</a>
                                </li>
                                @guest
                                    <li class="nav-item ps-3 fw-medium">
                                        <a class="nav-link {{ request()->is('login*') ? 'active' : '' }}"
                                            href="/login">LOGIN</a>
                                    </li>
                                @else
                                    <li class="nav-item dropdown ps-3 fw-medium">
                                        <a class="nav-link dropdown-toggle {{ request()->is('trainer/dashboard') ||
                                        request()->is('trainer/course') ||
                                        request()->is('trainer/profile') ||
                                        request()->is('admin*') ||
                                        request()->is('member/' . auth()->user()->id . '/profile*') ||
                                        request()->is('trainer/' . auth()->user()->id . '/profile*') ||
                                        request()->is('myblog*') ||
                                        request()->is('wishlist*') || request()->is('order*')
                                            ? 'active'
                                            : '' }}"
                                            href="#" role="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            {{ strtoupper(auth()->user()->first_name) }}
                                        </a>
                                        <ul style="z-index: 1001;" class="dropdown-menu ps-2 fw-medium">
                                            @auth
                                                {{-- member --}}
                                                @if (auth()->user()->status == 0)
                                                    <li class="nav-item">
                                                        <a class="nav-link {{ request()->is('member/' . auth()->user()->id . '/profile*') ? 'active' : '' }}"
                                                            href="/member/{{ auth()->user()->id }}/profile"><i class="me-1 ps-1 fa-solid fa-user"></i> PROFILE</a>
                                                    </li>
                                                @endif
                                                {{-- trainer --}}
                                                @if (auth()->user()->status == 1)
                                                    <li class="nav-item">
                                                        <a class="nav-link {{ request()->is('trainer/' . auth()->user()->id . '/profile*') ? 'active' : '' }}"
                                                            href="/trainer/{{ auth()->user()->id }}/profile"><i class="me-1 ps-1 fa-solid fa-user"></i> PROFILE</a>
                                                    </li>
                                                    <li class="nav-item ">
                                                        <a class="nav-link {{ request()->is('trainer/'.auth()->user()->id.'/dashboard*') ? 'active' : '' }}"
                                                            href="/trainer/{{ auth()->user()->id }}/dashboard"><i class="me-1 ps-1 fas fa-clipboard"></i>
                                                            DASHBOARD</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link {{ request()->is('trainer/courses*') ? 'active' : '' }}"
                                                            href="/trainer/courses"><i class="me-1 ps-1 fas fa-clipboard-list"></i> COURSE</a>
                                                    </li>
                                                @endif
                                                {{-- admin --}}
                                                @if (auth()->user()->status == 2)
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="/admin"><i style="padding-left: 5px;" class="me-2 fas fa-clipboard"></i>DASHBOARD</a>
                                                    </li>   
                                                @endif
                                            @endauth
                                            <li class="nav-item">
                                                <a class="nav-link {{ request()->is('wishlist*') ? 'active' : '' }}"
                                                    href="/wishlist"><i style="padding-left: 3px;" class="me-1 fas fa-heart"></i>
                                                    WHISLIST</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link {{ request()->is('order*') ? 'active' : '' }}"
                                                    href="/order"><i style="padding-left: 2px;" class="me-1 fas fa-shopping-cart"></i>
                                                    ORDER</a>
                                            </li>
                                            {{-- <li class="nav-item">
                                                <form action="{{ route('logout') }}" method="POST" id="logoutForm">
                                                    @csrf
                                                    <button class="text-black nav-link" type="submit" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                                        <i style="padding-left: 4px;" class="me-1 ps-1 fas fa-sign-out-alt"></i> LOGOUT
                                                    </button>
                                                </form>
                                            </li> --}}

                                            <li class="nav-item">
                                                <form action="{{ route('logout') }}" method="POST" id="logoutForm">
                                                    @csrf
                                                    <button class="text-black nav-link" type="button" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                                        <i style="padding-left: 4px;" class="me-1 ps-1 fas fa-sign-out-alt"></i> LOGOUT
                                                    </button>
                                                </form>
                                            </li>
                                            
                                            <!-- Logout Confirmation Modal -->
                                            
                                            
                                        </ul>
                                        
                                    </li>
                                @endguest

                            </ul>
                        </div>
                    </div>
                </nav>
                
            </div>
           
        </div>
    </div>
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
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
    </div>


    {{ $slot }}

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
                            <li><a href="service.html">Trainers</a></li>
                            <li><a href="service.html">Courses</a></li>
                            <li><a href="service.html">Products</a></li>
                            <li><a href="news.html">Blogs</a></li>
                            <li><a href="gallery.html">Gallery</a></li>
                            <li><a href="trainer.html">BMI Calculator</a></li>
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="contact.html">Contact</a></li> 

                        </ul>
                    </div>
                    <div class=" col-md-5">
                        <h3>Contact US</h3>
                        <ul class="conta">
                            <li><i class="fa fa-map-marker" aria-hidden="true"></i>Address : Thingangyn Tsp;
                                Yangon;<br>simply dummy
                            </li>
                            <li><i class="fa fa-mobile" aria-hidden="true"></i> Phone : +(1234) 567 890</li>
                            <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="#">Email :
                                    fitnessguru@gmail.com</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h3>News letter</h3>
                        <form class="bottom_form">
                            <input class="enter" placeholder="Enter your email" type="text"
                                name="Enter your email">
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


    {{-- liverwire --}}
    @livewireScripts

    {{-- <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script> --}}
    {{-- <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script> 
    <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script> --}}

    <!-- end footer -->
    <!-- Javascript files-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>


    {{-- Start --}}
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>


    {{-- admin lte javascript --}}

    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

    {{-- <script src="{{ asset('dist/js/demo.js') }}"></script> --}}

    {{-- admin lte javascript --}}

    <script>
        $(function() {
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>



    <script>
        baguetteBox.run('.tz-gallery');
    </script>

    {{-- Sweet Alerts --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

window.addEventListener('pageshow', function(event) {
            if (event.persisted) {
                location.reload();
            }
        });

        window.onscroll = function() {
            showScrollUpButton();
        };

        function showScrollUpButton() {
            var scrollUpBtn = document.getElementById('scrollUpBtn');
            if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                scrollUpBtn.style.display = 'block';
            } else {
                scrollUpBtn.style.display = 'none';
            }
        }

        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

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
            @if (session('review'))
                Swal.fire(
                    'Cannot Give Review !',
                    'You already given a review !',
                    'error'
                )
            @endif
            @if (session('password'))
                Swal.fire(
                    'Password Incorrect!',
                    'Please Try Again !',
                    'info'
                )
            @endif
        });
    </script>

</body>

</html>
