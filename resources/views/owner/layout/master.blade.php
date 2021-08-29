<!DOCTYPE html>
<html>
@include('owner.layout.headerscript')
<body class="hold-transition sidebar-mini skin-black-light">
<div class="wrapper">
    <!-- header -->
@include('owner.layout.header')
<!-- color for side bar -->

    <!-- Nav Bar -->
@include('owner.layout.navbar')
<!-- Content -->
    <div class="content-wrapper">
        <section class="content">
            @include('error')
            @yield('content')

        </section>
    </div>
    <!-- End Content -->
    <!-- Footer -->
@include('owner.layout.footer')
<!-- End Footer -->
</div>
</body>
</html>