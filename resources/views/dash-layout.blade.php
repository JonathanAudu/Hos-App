<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="76x76" href="/dashboard/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/dashboard/img/favicon.png">
    <title>
        <a class="navbar-brand" href="#index.html">
            <img src="../assets/images/SUMAS-logo.png" alt="SUMAS logo" title="SUMAS logo" width="957px" />
        </a>
    </title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="/dashboard/css/nucleo-icons.css" rel="stylesheet" />
    <link href="/dashboard/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="/dashboard/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Argon Dashboard CSS -->
    <link id="pagestyle" href="/dashboard/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="@yield('body-tag')">

    @yield('body')

    <script src="/dashboard/js/core/popper.min.js"></script>
    <script src="/dashboard/js/core/bootstrap.min.js"></script>
    <script src="/dashboard/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="/dashboard/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="/dashboard/js/plugins/chartjs.min.js"></script>
    <!-- jQuery should be included before other scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


    @yield('script')
</body>

</html>
