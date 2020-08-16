<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=5">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app_name', 'A.R. Enterprise') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">  -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <main id="app">
        <div class="py-0">
            @include('inc.mnavbar')
            <div class="container mt-5">
                @include('inc.messages')
                @yield('content')
            </div>
        </div>
    </main>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" defer ></script>
<script src="https://use.fontawesome.com/7d6f8dee5d.js"></script>
<script type="text/javascript"> //Show function
    $(document).ready(function() {

        $('#ClientTable').DataTable({
            "pageLength": 5,
            "lengthMenu": [ 5, 10, 25, 50, 100 ]
        });

        $('#AgentTable').DataTable({
            "pageLength": 5,
            "lengthMenu": [ 5, 10, 25, 50, 100 ]
        });

        $('#ProductTable').DataTable({
            "pageLength": 5,
            "lengthMenu": [ 5, 10, 25, 50, 100 ]
        });
    });

    $(document).on('click', '.show-modal', function() {
        $('#show').modal('show');
        $('#i').text($(this).data('id'));
        //$('#ti').text($(this).data('title'));
        //$('#by').text($(this).data('body'));
        $('.modal-title').text('Show Post');
    });

</script>
</html>
