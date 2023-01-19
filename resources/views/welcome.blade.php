<!DOCTYPE html>
<html lang="en">

@include('visitor.head')

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    @include('visitor.topbar')
    <!-- Topbar End -->

    <!-- Navbar Start -->
    @include('visitor.navbar')
    <!-- Navbar End -->


    <!-- Carousel Start -->
    @include('visitor.slide')
    <!-- Carousel End -->

    <!-- Facts Start -->
    @include('visitor.stat')
    <!-- Facts End -->

    <!-- Footer Start -->
    @include('visitor.footer')
    <!-- Footer End -->


    <!-- Copyright Start -->
    @include('visitor.copyright')
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    @include('visitor.scripts')
</body>

</html>
