<!doctype html>
<html class="no-js" lang="{{config('app.locale')}}">
    <x-frontend.head :meta=null :page=$title />
    <body>
        <x-frontend.header />
        @yield('content')
        <x-frontend.footer />
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
