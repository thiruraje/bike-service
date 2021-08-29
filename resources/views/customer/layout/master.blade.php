<!DOCTYPE html>
<html>
@include('customer.layout.headerscript')
<body class="hold-transition sidebar-mini skin-black-light">
<div class="wrapper">
    <!-- header -->
@include('customer.layout.header')
<!-- color for side bar -->

    <!-- Nav Bar -->
@include('customer.layout.navbar')
<!-- Content -->
    <div class="content-wrapper">
        <section class="content">
            @include('error')
            @yield('content')

        </section>
    </div>
    <!-- End Content -->
    <!-- Footer -->
@include('customer.layout.footer')
<!-- End Footer -->
</div>
</body>
</html>