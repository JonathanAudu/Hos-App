@extends('dash-layout')

@section('body-tag')
    g-sidenav-show bg-gray-100
@endsection

@section('body')
    @include('admin.menu')

    <main class="main-content position-relative border-radius-lg ">
        @include('admin.nav')
        <div class="container-fluid py-4">
            @yield('pages')
        </div>
    </main>
@endsection

@section('script')
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#provisional_diagnosis').select2();
        });
    </script>

    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="/dashboard/js/argon-dashboard.min.js?v=2.0.4"></script>
@endsection
