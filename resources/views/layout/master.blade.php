<!doctype html>
<html class="no-js" lang="{{config('app.locale')}}">
    @include('layout.head')
    <body>
        @include('layout.header')
        @yield('content')
        @include('layout.footer')
        <script src="{{asset('assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
        <script src="{{asset('assets/js/popper.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins.js')}}"></script>
        <script src="{{asset('assets/js/ajax-mail.js')}}"></script>
        <script src="{{asset('assets/js/main.js')}}"></script>
        @yield('js')
        @yield('script')
    </body>
</html>