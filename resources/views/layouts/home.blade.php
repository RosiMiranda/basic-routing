<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- font -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../../css/main.css" />
        <link rel="stylesheet" href="../../css/style.css">
        <!-- google icons -->
        <link href="https://fonts.googleapis.com/icon?family=Ubuntu"rel="stylesheet">


        <title>Static Routing</title>
    </head>
<body>

    <header>
        <div class="flex-row text-center d-flex justify-content-around">
            <h1 class="align-middle">Actividades</h1>
        </div>
    </header>

    @yield('content')
</body>
</html>