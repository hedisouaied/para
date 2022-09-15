

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="" />
<meta name="author" content="" />
<meta name="robots" content="" />
<meta name="description" content="" />


@if (isset($meta))
    {!!$meta!!}
@else
    <meta itemprop="name" content="{{get_setting('heading')}}">
    <meta itemprop="description" content="{{substr(filter_var(get_setting('content'), FILTER_SANITIZE_STRING), 0, 200)}}...">
    <meta itemprop="image" content="{{get_setting('image')}}">
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="{{asset('')}}" />
    <meta property="twitter:title" content="{{get_setting('heading')}}" />
    <meta property="twitter:description" content="{{substr(filter_var(get_setting('content'), FILTER_SANITIZE_STRING), 0, 200)}}..." />
    <meta property="twitter:image" content="{{get_setting('image')}}" />
    <meta property="twitter:site" content="@{{get_setting('heading')}}" />
    <meta property="og:type" content="website" />
	<meta property="og:title" content="{{get_setting('heading')}}" />
	<meta property="og:description" content="{{substr(filter_var(get_setting('content'), FILTER_SANITIZE_STRING), 0, 200)}}..." />
    <meta property="og:image" content='{{get_setting('image')}}' />

@endif

@if (isset($title_page))
<title>{{$title_page}}</title>
@else
<title>{{get_setting('heading')}}</title>
@endif



<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>


<!-- Add site Favicon -->
<link rel="icon" href="{{asset('frontend/assets/images/favicon/cropped-favicon-32x32.png')}}" sizes="32x32" />
<link rel="icon" href="{{asset('frontend/assets/images/favicon/cropped-favicon-192x192.png')}}" sizes="192x192" />
<link rel="apple-touch-icon" href="{{asset('frontend/assets/images/favicon/cropped-favicon-180x180.png')}}" />
<meta name="msapplication-TileImage" content="{{asset('frontend/assets/images/favicon/cropped-favicon-270x270.png')}}" />

<!-- All CSS is here
============================================ -->

<link rel="stylesheet" href="{{asset('frontend/assets/css/vendor/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/vendor/font-cerebrisans.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/vendor/fontawesome-all.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/vendor/font-medizin.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/plugins/slick.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/plugins/animate.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/plugins/magnific-popup.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/plugins/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/plugins/jquery-ui.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">


 @yield('styles')
