<!DOCTYPE html> 
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
    <script src="https://kit.fontawesome.com/15bc5276a1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="icon" href="https://gatorade.lat/wp-content/media/2021/04/cropped-favicons-32x32.png" sizes="32x32" />
    <link rel="icon" href="https://gatorade.lat/wp-content/media/2021/04/cropped-favicons-192x192.png" sizes="192x192" />
    <link rel="apple-touch-icon" href="https://gatorade.lat/wp-content/media/2021/04/cropped-favicons-180x180.png" />
    <title>Gatorade Runnig Series</title>
    @livewireStyles
</head> 
<body>  
    @yield('content') 
    @livewireScripts
    <script>
         @if ($errors->any())
         Swal.fire(
            'Oops!',
            `@foreach ($errors->all() as $error)
                {{$error}}
            @endforeach`,
            'error'
            )
        @endif
    </script>
    @yield('scripts')
</body>
</html>