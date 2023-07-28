<!DOCTYPE html> 
<html lang="es">
<head> 
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
    <script src="https://kit.fontawesome.com/15bc5276a1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom-alerts.css') }}">
    <link rel="icon" href="https://gatorade.lat/wp-content/media/2021/04/cropped-favicons-32x32.png" sizes="32x32" />
    <link rel="icon" href="https://gatorade.lat/wp-content/media/2021/04/cropped-favicons-192x192.png" sizes="192x192" />
    <link rel="apple-touch-icon" href="https://gatorade.lat/wp-content/media/2021/04/cropped-favicons-180x180.png" />
    <title>Gatorade Runnig Series</title>
    @livewireStyles
</head>  
<body>
    <img id="gatorade_logo" src="{{ asset('assets/LANDING/LOGO_GATORADE_99X108PX.png') }}" alt="">
    <div class="row">
        <div class="col-md-12">
            <div class="custom-container">
                <div class="row px-2">
                    <div class="col-md-12">
                        <div class="form-header black rounded-top"> 
                            <h2 class="bold">INGRESA AQUÍ</h2> 
                        </div>
                    </div>
                    <div class="col-md-12 form-content px-4 pb-4 rounded-bottom">
                        @yield('content') 
                    </div>
                </div>
            </div> 
        </div>
         <div id="logos"> 
            <div class="logos-container">
               <img id="mmb" src="{{ asset('assets/LANDING/LOGO_MMB_141X45PX.png') }}" width="90">
               <img id="team-gatorade" src="{{ asset('assets/LANDING/LOGO_TEAM_GATOA.png') }}" width="90">
            </div>
            <div class="logos-container">
               <a href="https://gatorade.lat/co/eventos/" target="_blank">
                  <img id="text_3" src="{{ asset('assets/LANDING/TEXTO_3.png') }}">
               </a>
            </div>
         </div> 
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    @livewireScripts
    <script>
        @if ($errors->any())
            Swal.fire({
                title: `Oops!`,
                html: `@foreach ($errors->all() as $error) {{$error}} <br> @endforeach`,
                showConfirmButton: false,
                width: 400,
                icon: 'error',
                imageWidth: 150,
                imageHeight: 100, 
                padding: '1em',
                background: "rgba(255,255,255, 1) url({{ asset('assets/LANDING/_BACKGROUND--1920X1080-PX.png') }}) center bottom / cover no-repeat"
            })
        @endif
        @if(session('success'))
            Swal.fire({
                title: `Éxito!`,
                html: `{{ session('success') }}`,
                showConfirmButton: false,
                width: 400,
                icon: 'success',
                imageWidth: 150,
                imageHeight: 100, 
                background: "rgba(255,255,255, 1) url({{ asset('assets/LANDING/_BACKGROUND--1920X1080-PX.png') }}) center bottom / cover no-repeat"
            })
        @endif
    </script>
</body>
</html>