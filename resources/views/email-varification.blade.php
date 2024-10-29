<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta20
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Sign in - PhysioFitness</title>
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
  <body  class=" d-flex flex-column">
    <script src="{{asset('js/demo-theme.min.js?1692870487')}}"></script>
    <div class="page page-center">
      <div class="container container-tight py-4">
        <div class="text-center mb-4">
          <a href="." class="navbar-brand navbar-brand-autodark">
            <img src="{{asset('img/logo.svg')}}" width="110" height="32" alt="PhysioFitness" class="navbar-brand-image">
          </a>
        </div>
        <div class="card card-md">
          <div class="card-body">
            <h2 class="h2 text-center mb-4">Reset Password</h2>
            @if(Session::has('message'))
            <div class="alert alert-danger">{{Session::get('message')}}</div>
            @endif
            @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            <form action="{{route('varify-email')}}" method="POST">
                @csrf
              <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" required placeholder="your@email.com">
              </div>
              <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">Verify</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{asset('js/tabler.min.js?1692870487')}}" defer></script>
    <script src="{{asset('js/demo.min.js?1692870487')}}" defer></script>
  </body>
</html>