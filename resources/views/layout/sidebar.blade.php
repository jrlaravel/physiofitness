<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Dashboard - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
    <!-- CSS files -->
    <link href="{{asset('css/tabler.min.css?1692870487')}}" rel="stylesheet"/>
    <link href="{{asset('css/tabler-flags.min.css?1692870487')}}" rel="stylesheet"/>
    <link href="{{asset('css/tabler-payments.min.css?1692870487')}}" rel="stylesheet"/>
    <link href="{{asset('css/tabler-vendors.min.css?1692870487')}}" rel="stylesheet"/>
    <link href="{{asset('css/demo.min.css?1692870487')}}" rel="stylesheet"/>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
  </head>
  <body >
    <script src="{{asset('js/demo-theme.min.js?1692870487')}}"></script>
    <div class="page">
      <!-- Sidebar -->
      <aside class="navbar navbar-vertical navbar-expand-lg navbar-transparent">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <h1 class="navbar-brand navbar-brand-autodark">
            <a href="{{route('dashboard')}}">
              <img src="{{asset('img/logo.svg')}}" width="150" height="42" alt="PF" class="navbar-brand-image">
            </a>
          </h1>
          <div class="collapse navbar-collapse" id="sidebar-menu">
            <ul class="navbar-nav pt-lg-3">
              <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard')}}" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <rect x="4" y="4" width="6" height="6" rx="1" />
                      <rect x="14" y="4" width="6" height="6" rx="1" />
                      <rect x="4" y="14" width="6" height="6" rx="1" />
                      <rect x="14" y="14" width="6" height="6" rx="1" />
                    </svg>                    
                  </span>
                  <span class="nav-link-title">
                    Dashboard
                  </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('navbar-detail')}}" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->          
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11l3 3l8 -8" /><path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" /></svg>
                  </span>
                  <span class="nav-link-title">
                    Navbar details
                  </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('home-banner')}}" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l-2 0l9 -9l9 9l-2 0" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                  </span>
                  <span class="nav-link-title">
                    Home-banner
                  </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('blog-list')}}" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <path d="M3 4h18a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-18a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2z" />
                      <path d="M9 8h6" />
                      <path d="M9 12h6" />
                      <path d="M9 16h6" />
                    </svg>                    
                  </span>
                  <span class="nav-link-title">
                    Blogs
                  </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('service-list')}}" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <path d="M11.5 4.5l-1 -1.732a1 1 0 0 0 -1.732 0l-1 1.732a2.5 2.5 0 0 1 -1.232 .832l-1.997 .287a1 1 0 0 0 -.608 1.552l1.448 1.396a2.5 2.5 0 0 1 0 2.924l-1.448 1.396a1 1 0 0 0 .608 1.552l1.997 .287a2.5 2.5 0 0 1 1.232 .832l1 1.732a1 1 0 0 0 1.732 0l1 -1.732a2.5 2.5 0 0 1 1.232 -.832l1.997 -.287a1 1 0 0 0 .608 -1.552l-1.448 -1.396a2.5 2.5 0 0 1 0 -2.924l1.448 -1.396a1 1 0 0 0 -.608 -1.552l-1.997 -.287a2.5 2.5 0 0 1 -1.232 -.832z" />
                      <circle cx="12" cy="12" r="3" />
                      <path d="M19.5 16l.5 1l1.5 -.5" />
                      <path d="M5 8l-1 -.5l.5 -1.5" />
                    </svg>
                    
                  </span>
                  <span class="nav-link-title">
                    Services
                  </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('team-member')}}" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <circle cx="9" cy="7" r="4" />
                      <path d="M17 11a3 3 0 1 0 -3 -3" />
                      <path d="M3 21v-2a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v2" />
                      <path d="M16 21v-2a3 3 0 0 0 -3 -3h-2" />
                    </svg>                    
                  </span>
                  <span class="nav-link-title">
                    Team Members
                  </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('appointment')}}" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <rect x="4" y="5" width="16" height="16" rx="2" />
                      <line x1="16" y1="3" x2="16" y2="7" />
                      <line x1="8" y1="3" x2="8" y2="7" />
                      <line x1="4" y1="11" x2="20" y2="11" />
                      <path d="M12 16v-4h2" />
                    </svg>                    
                  </span>
                  <span class="nav-link-title">
                   Appoitments
                  </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('testimonial')}}" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <path d="M3 20v-2a4 4 0 0 1 4 -4h6a4 4 0 0 1 4 4v2" />
                      <path d="M7 10v-1a4 4 0 1 1 8 0v1" />
                      <line x1="8" y1="14" x2="10" y2="14" />
                      <line x1="14" y1="14" x2="16" y2="14" />
                    </svg>                    
                  </span>
                  <span class="nav-link-title">
                   Testimonials
                  </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('logout')}}" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <path d="M14 8v-2a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2 -2v-2" />
                      <path d="M9 12h12l-3 -3m0 6l3 -3" />
                    </svg>                    
                  </span>
                  <span class="nav-link-title">
                   Logout
                  </span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </aside>
      <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
            
                <h2 class="page-title">
                  {{-- page title --}}
                  @yield('pagetitle')
                </h2>
              </div>
            </div>
          </div>
        </div>
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-deck row-cards">
              <!-- Page content here -->
              @yield('content')
            </div>
          </div>  
        </div>
        <footer class="footer footer-transparent d-print-none">
          <div class="container-xl">
            <div class="row text-center align-items-center flex-row-reverse">
              <div class="col-lg-auto ms-lg-auto">
              </div>
              <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item">
                    Copyright &copy; 2023
                    <a href="." class="link-secondary">Tabler</a>.
                    All rights reserved.
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- Libs JS -->
    <script src="{{asset('libs/apexcharts/dist/apexcharts.min.js?1692870487')}}" defer></script>
    <script src="{{asset('libs/jsvectormap/dist/js/jsvectormap.min.js?1692870487')}}" defer></script>
    <script src="{{asset('libs/jsvectormap/dist/maps/world.js?1692870487')}}" defer></script>
    <script src="{{asset('libs/jsvectormap/dist/maps/world-merc.js?1692870487')}}" defer></script>
    <!-- Tabler Core -->
    <script src="{{asset('js/tabler.min.js?1692870487')}}" defer></script>
    <script src="{{asset('js/demo.min.js?1692870487')}}" defer></script>
  </body>
</html>