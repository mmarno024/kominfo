<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="theme-name" content="quixlab" />
    <title>CRUD</title>
    {{-- <link rel="icon" type="image/png" sizes="16x16" href="{{ url('theme') }}/images/favicon.png"> --}}
    <link href="{{ url('theme') }}/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('theme') }}/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="{{ url('theme') }}/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <link href="{{ url('theme') }}/css/style.css" rel="stylesheet">
</head>

<body>
    <div id="main-wrapper">
        @include('layouts.navbar')
        @include('layouts.sidebar')
        <div class="content-body">
            <div class="container-fluid mt-3">
                @yield('content')
            </div>
        </div>
        @include('layouts.footer')
    </div>
    <script src="{{ url('theme') }}/plugins/common/common.min.js"></script>
    <script src="{{ url('theme') }}/js/custom.min.js"></script>
    <script src="{{ url('theme') }}/js/settings.js"></script>
    <script src="{{ url('theme') }}/js/gleek.js"></script>
    <script src="{{ url('theme') }}/js/styleSwitcher.js"></script>
    @stack('scripts')

</body>

</html>
