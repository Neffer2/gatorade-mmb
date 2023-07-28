@extends('layouts.main')
   @section('content')
   <img id="gatorade_logo" src="{{ asset('assets/LANDING/LOGO_GATORADE_99X108PX.png') }}" alt="">
   
   <div class="row" id="desktop">
      <div class="col-md-6 left-side" id="bg-left"></div>
      <div class="col-md-6 right-side">  
         <div class="image-container">
            <img id="imagen" class="shadow-lg">
         </div>

         <div class="button-container">
            <a id="image-download" href="" class="btn btn-primary py-2 px-4 mt-2 me-1" download="Gatorade Runnig Series">
               <h5 class="bold"><i class="fa-solid fa-download"></i> DESCARGAR</h5>
            </a>
            {{-- <a id="image-download1" href="" class="btn btn-primary py-1 px-5 mt-2 me-1" download="Gatorade Runnig Series">
               <h3 class="bold"><i class="fa-solid fa-share"></i> COMPARTIR</h3>
            </a> --}}
         </div>
      </div>
      <div id="logos"> 
         <div class="logos-container">
            <img id="mmb" src="{{ asset('assets/LANDING/LOGO_MMB_141X45PX.png') }}" width="90">
            <img id="team-gatorade" src="{{ asset('assets/LANDING/LOGO_TEAM_GATOA.png') }}" width="90">
         </div>
         <div class="logos-container">
            <img id="text_3" src="{{ asset('assets/LANDING/TEXTO_3.png') }}">
         </div>
      </div>
   </div>

   <div class="row" id="phone">
      <div id="hero" class="col-md-12 d-flex justify-content-center align-items-center">
         <img src="{{ asset('assets/LANDING/LOGO_GATORADE_99X108PX.png') }}" class="mt-3">
         <img src="{{ asset('assets/LANDING/TEXTO_RESPONSIVE_312X330PX.png') }}">
      </div>
      <div class="col-md-12 px-1 mt-2">
         <div class="image-container">
            <img id="imagenPhone">
         </div>
         <div id="botella"> 
            <img src="{{ asset('assets/LANDING/ASSETS_IMAGEN_BEBIDA_365x746px.png') }}" width="150">
         </div>
      </div>
      <div class="col-md-12">
         <div class="button-container">
            <a id="image-downloadPhone" href="" class="btn btn-primary py-2 px-4 mt-2" download="Gatorade Runnig Series">
               <h5 class="bold"><i class="fa-solid fa-download"></i> DESCARGAR</h5>
            </a>
            {{-- <a id="image-download1" href="" class="btn btn-primary py-1 px-5 mt-2 me-1" download="Gatorade Runnig Series">
               <h3 class="bold"><i class="fa-solid fa-share"></i> COMPARTIR</h3>
            </a> --}}
         </div>
      </div>
      
      {{-- ABSOLUITES --}}
      <div id="fecha">
         <img src="{{ asset('assets/LANDING/TEXTO-RESPONSIVE-285X120PX.png') }}" width="120">
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

      {{-- <form action="{{ route('logout') }}" method="POST">
               @csrf
               <button>Salir</button>
            </form>             --}}
    @endsection 
    @section('scripts')
      @php 
         $aux = Auth::user()->foto;
      @endphp
      <script>
         let imagenLogo = "";
         const canvas = document.createElement('canvas');
         const ctx = canvas.getContext('2d');
         const originalImage = new Image();
         originalImage.src = "{{ asset("fotos/$aux") }}";

         const logo2 = new Image();
         logo2.src = "{{ asset('logos/logo.png') }}";      
         const logo2Width = 900;
         const logo2Height = 356;
      // 219
         Promise.all([
            new Promise((resolve) => originalImage.onload = resolve),
            new Promise((resolve) => logo2.onload = resolve)
         ]).then(() => {
         canvas.width = originalImage.width;
         canvas.height = originalImage.height;
         ctx.drawImage(originalImage, 0, 0);

         const logo2X = canvas.width - (logo2Width + 40);
         const logo2Y = canvas.height - (logo2Height + 20);
         ctx.drawImage(logo2, logo2X, logo2Y, logo2Width, logo2Height);

         const imageWithLogo = new Image();
         imageWithLogo.src = canvas.toDataURL();

         /* ***** */
         // Decodificar la imagen Base64
         const imageData = imageWithLogo.src.split(',')[1];
         const decodedImageData = atob(imageData);

         // Convertir la imagen decodificada en un arreglo de bytes
         const byteCharacters = decodedImageData.split('').map(char => char.charCodeAt(0));
         const byteArray = new Uint8Array(byteCharacters);

         // Crear un objeto Blob a partir del arreglo de bytes
         const blob = new Blob([byteArray], { type: 'image/png' }); // Ajusta el tipo MIME según el formato de la imagen

         // Crear un objeto FormData y agregar el blob
         const formData = new FormData();
         formData.append('image', blob, 'image.png'); // El último parámetro es el nombre del archivo
         
         const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
         fetch('updateLogo', {
         method: 'POST',
         body: formData,
         headers: {
               'X-CSRF-TOKEN': csrfToken
            }    
         })
         .then(response => response.json())
         .then(response => {
            if (response.status == 'ok') {
               imagenLogo = response.data.logo;
            }
         })
         .catch(error => {
            // Manejar el error en caso de fallo en la solicitud
            // console.error('Error en la solicitud:', error);
         });
         /* ***** */

         document.getElementById('imagen').src = imageWithLogo.src;
         document.getElementById('imagenPhone').src = imageWithLogo.src;
         document.getElementById('image-download').href = imageWithLogo.src;
         document.getElementById('image-downloadPhone').href = imageWithLogo.src;
         });
      </script>
    
      <script>
         // Get all share buttons
         const shareButtons = document.querySelectorAll('.share-button');
         // Add click event listener to each button
         shareButtons.forEach(button => {
            button.addEventListener('click', () => {
               // Get the URL of the current page
               const url = window.location.href;
               // Get the social media platform from the button's class name
               const platform = button.classList[1];
               // Set the URL to share based on the social media platform
               let shareUrl;
               switch (platform) {
                  case 'facebook':
                  shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${window.location.hostname}/fotos_logo/${imagenLogo}`;
                  break;
                  case '':
                  shareUrl = `https://www.instagram.com/add/?url=${window.location.hostname}/fotos_logo/${imagenLogo}`;
                  break;
                  case 'whatsapp':
                  shareUrl = `https://api.whatsapp.com/send?text=${window.location.hostname}/fotos_logo/${imagenLogo}`;
                  break;
               }
               // Open a new window to share the URL
               window.open(shareUrl, '_blank');
            });
         });
    </script>
    @endsection