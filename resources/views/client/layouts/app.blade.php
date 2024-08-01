<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Shoppers &mdash; Colorlib e-Commerce Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="\theme\client\fonts/icomoon/style.css">

    <link rel="stylesheet" href="\theme\client\css/bootstrap.min.css">
    <link rel="stylesheet" href="\theme\client\css/magnific-popup.css">
    <link rel="stylesheet" href="\theme\client\css/jquery-ui.css">
    <link rel="stylesheet" href="\theme\client\css/owl.carousel.min.css">
    <link rel="stylesheet" href="\theme\client\css/owl.theme.default.min.css">


    <link rel="stylesheet" href="\theme\client\css/aos.css">

    <link rel="stylesheet" href="\theme\client\css/style.css">
    
  </head>
  <body>
  
  <div class="site-wrap">
    <header class="site-navbar" role="banner">
      @include('client.layouts.header')
      @include('client.layouts.nav')
    </header>

    @yield('content')

    <footer class="site-footer border-top">
      @include('client.layouts.footer')
    </footer>
  </div>

  <script src="\theme\client\js/jquery-3.3.1.min.js"></script>
  <script src="\theme\client\js/jquery-ui.js"></script>
  <script src="\theme\client\js/popper.min.js"></script>
  <script src="\theme\client\js/bootstrap.min.js"></script>
  <script src="\theme\client\js/owl.carousel.min.js"></script>
  <script src="\theme\client\js/jquery.magnific-popup.min.js"></script>
  <script src="\theme\client\js/aos.js"></script>

  <script src="\theme\client\js/main.js"></script>
    
  </body>
</html>