<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', '')</title>
    {{HTML::style("bootstrap/css/bootstrap.css")}}
    {{--{{HTML::style("css/select2.css")}}--}}
    {{HTML::style("css/site-style.css")}}
    {{--{{HTML::style("css/tipsy.css")}}--}}
    {{HTML::style("css/vasplus_select_plugin.css")}}
    {{HTML::style("fonts-font-awesome/css/font-awesome.min.css")}}
    {{--{{HTML::style("css/wall-script.css")}}--}}
    <link rel="shortcut icon" href="img/nopp.jpg">
    @yield('head', '')
</head>
<body>
@yield("content")
{{--@if(Session::has('error'))--}}
    {{--<div class="alert alert-danger" role="alert">{{ Session::get('error') }}</div>--}}
{{--@endif--}}
{{ HTML::script('jquery/jquery.js') }}
{{ HTML::script('js/jquery.easing.min.js') }}
{{ HTML::script('bootstrap/js/bootstrap.min.js') }}
{{ HTML::script('js/docs.min.js') }}
{{ HTML::script('js/ie10-viewport-bug-workaround.js') }}
{{ HTML::script('js/select2.js') }}
{{ HTML::script('js/vasplus_select_plugin.js') }}
{{ HTML::script('js/vasplus_others.js') }}
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>
@yield('pageScripts', '')
</body>
</html>