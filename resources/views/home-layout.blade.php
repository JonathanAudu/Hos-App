<!doctype html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="keywords"
    content="Medick Responsive web template, Bootstrap Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
  <title>SUMASTH</title>
  <link href="//fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&display=swap" rel="stylesheet">
  <!-- Template CSS -->
  <link rel="stylesheet" href="/assets/css/style-starter.css">
</head>

<body>
    @include('home-header')

    @yield('body')

    @include('home-footer')

    <script src="/assets/js/jquery-3.3.1.min.js"></script>
    <script src="/assets/js/theme-change.js"></script>
    <!-- owl carousel -->
    <script src="/assets/js/owl.carousel.js"></script>
    <script src="/assets/js/jquery.waypoints.min.js"></script>
    <script src="/assets/js/jquery.countup.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>

    @include('home-script')

    @yield('script')

</body>

</html>
