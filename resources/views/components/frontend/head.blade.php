<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @if($meta != null)
        @for($i=0;$i<count($meta);$i++)
            <meta name="{{$meta[$i]->name}}" content="{{$meta[$i]->content}}">
        @endfor
    @endif
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$title}}</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{$favicon}}">
    <link rel="stylesheet" href="{{asset('assets/fronted/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fronted/css/icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fronted/css/plugins.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fronted/css/style.css')}}">

    <script src="{{asset('assets/fronted/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>
