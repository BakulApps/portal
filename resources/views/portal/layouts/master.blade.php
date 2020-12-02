<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
    @include('portal.layouts.head')
    <body>
    <script type="text/javascript">
        var baseurl = '{{route('portal.home')}}'
    </script>
        @include('portal.layouts.navbar')
        <div class="page-content">
            <div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">
                <div class="sidebar-mobile-toggler text-center">
                    <a href="#" class="sidebar-mobile-main-toggle"><i class="icon-arrow-left8"></i></a>
                    Navigasi
                    <a href="#" class="sidebar-mobile-expand"><i class="icon-screen-full"></i><i class="icon-screen-normal"></i></a>
                </div>
                <div class="sidebar-content">
                    <div class="sidebar-user">
                        <div class="card-body">
                            <div class="media">
                                <div class="mr-2">
                                    <a href="#"><img src="{{asset('assets/portal/images/logo.png')}}" width="40" height="40" alt=""></a>
                                </div>
                                <div class="media-body">
                                    <div class="media-title font-weight-semibold">Yayasan Darul Hikmah</div>
                                    <div class="font-size-xs opacity-50">
                                        <i class="icon-pin font-size-sm"></i> &nbsp;Jl. Raya Bugel - Jepara KM 7 Menganti
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('portal.layouts.mainmenu')
                </div>
            </div>
            <div class="content-wrapper">
                @include('portal.layouts.header')
                <div class="content">
                    @yield('content')
                </div>
                @include('portal.layouts.footer')
            </div>
        </div>
    @yield('modal')
    </body>
</html>
