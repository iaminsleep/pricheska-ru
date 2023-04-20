<!DOCTYPE html>
<html lang="en">

@include('front.blog.posts.layouts.head')

<body>
    <div class="wrapper table-layout">
        @include('front.blog.posts.layouts.navbar')

        @yield('header')

        <section class="section lb" style="background-color: #EDE9E6">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        @yield('content')
                    </div><!-- end col -->

                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        @include('front.blog.posts.layouts.sidebar')
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

        <x-footer></x-footer>

        <div class="dmtop">Scroll to Top</div>

    </div><!-- end wrapper -->

    @include('front.blog.posts.layouts.front-js')
</body>

</html>
