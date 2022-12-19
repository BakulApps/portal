<!doctype html>
<html class="no-js" lang="{{config('app.locale')}}">
    <x-frontend.head :meta="$meta" :page="$page"/>
    <body>
        <x-frontend.header />
        @yield('content')
        @include('frontend.layout.footer')
        <script src="{{asset('assets/frontend/js/vendor/jquery-1.12.4.min.js')}}"></script>
        <script src="{{asset('assets/frontend/js/popper.min.js')}}"></script>
        <script src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/frontend/js/plugins.js')}}"></script>
        <script src="{{asset('assets/frontend/js/ajax-mail.js')}}"></script>
        <script src="{{asset('assets/frontend/js/main.js')}}"></script>
        @yield('js')
        @yield('script')
    </body>
</html>
