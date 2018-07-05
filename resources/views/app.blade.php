<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Test Vue</title>

        <link rel="stylesheet" href="{{mix('css/app.css')}}">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" />

        <script>
            window.Laravel = {};
            window.Laravel.csrfToken = "{{ csrf_token() }}";
        </script>
    </head>
    <body>
        <div id="head">
            <vuehead v-if="show"></vuehead>
            <vueheadauth v-else></vueheadauth>
        </div>
        <div id="app">
            <vuebody v-if="show"></vuebody>
            <vuemain v-else></vuemain>
        </div>
        <div id="foot">
            <vuefoot></vuefoot>
        </div>
    </body>
    <script src="{{ mix('js/app.js') }}"></script>
</html>
