<!doctype html>
<html class="no-js" lang="{{config('app.locale')}}">
    @include('fronted.layout.head')
    <body>
        @include('fronted.layout.header')
        @yield('content')
        @include('fronted.layout.footer')
        <script src="{{asset('assets/fronted/js/vendor/jquery-1.12.4.min.js')}}"></script>
        <script src="{{asset('assets/fronted/js/popper.min.js')}}"></script>
        <script src="{{asset('assets/fronted/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/fronted/js/plugins.js')}}"></script>
        <script src="{{asset('assets/fronted/js/ajax-mail.js')}}"></script>
        <script src="{{asset('assets/fronted/js/main.js')}}"></script>
        @yield('js')
        @yield('script')
    </body>
</html>
