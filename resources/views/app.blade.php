<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>WelcomeCTF</title>
        <script>
//        m=["log","debug","warn","error","dir","trace","assert","dirxml","group","groupEnd","time","timeEnd","count","profile","profileEnd","network"];n=1;function z(){window.console={};m.forEach(function(b){(function(a){if(console[a]&&n){window.console[a]=function(d){return}}else{window.console[a]=function(){}}})(b)})}z();
        </script>
        <script>
            window.Laravel = {};
            window.Laravel.csrfToken = "{{ csrf_token() }}";
            window.Laravel.message = "{{ Session::get('success') }}";
            window.problems = [];
        </script>
        <link rel="stylesheet" href="{{mix('css/app.css')}}">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" />
    </head>
    <body>
        <div id="head">
            <vuehead :show=show></vuehead>
        </div>
        <div id="app">
            <vuebody :show=show></vuebody>
        </div>
        <div id="foot">
            <vuefoot></vuefoot>
        </div>
    </body>
    <script src="{{ mix('js/app.js') }}"></script>

</html>
