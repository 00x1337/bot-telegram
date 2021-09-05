<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.css">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Styles --><link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles
        <style>
            body{
                font-family: 'Almarai', sans-serif;
                background-color: #16151a;
            }
            .bg-white,.bg-gray-50,.box{
                background-color: #16151a;
                border: 1px solid #222227;

                border-top-left-radius: 16px;
                border-top-right-radius: 16px;
                border-bottom-right-radius: 16px;
                border-bottom-left-radius: 16px;
                height: auto;
            }
            .button:hover {
                background-color: #333335
            }

            .context {
                width: 100%;
                position: absolute;
                top: 50vh;
            }

            .context h1 {
                text-align: center;
                color: #fff;
                font-size: 50px;
            }
            .swiper-slide {
                font-size: 18px;
                background: #fff;
                background-color: rgb(14, 16, 17);
                width: 30vh;

            }
            .swiper{
                width: 50vh;

            }
            .block,p,a,h1,h2,h3,.text-sm,.text-gray-600,.text-gray{
                color: #bdbdbd;

            }
            .text-gray-800,.text-lg,.checkbox,.title{
                color: #485fc7;
            }
            .focus,.w-full{
                background-color: #16151a;
                border: 1px solid #222227;

                border-top-left-radius: 16px;
                border-top-right-radius: 16px;
                border-bottom-right-radius: 16px;
                border-bottom-left-radius: 16px;
                height: auto;

            }
            footer{
                background-color: #485fc7;
            }
        </style>
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased" style="font-family: 'Almarai', sans-serif;">
        <x-jet-banner />

        <div class="min-h-screen">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8" >
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main >
                {{ $slot }}
            </main>
        </div>
        @stack('modals')

        @livewireScripts
        <footer >
            <div class="has-text-centered" style="margin-top: -25px">
                <p>
                    <strong>Bots Club</strong>@<a href="https://wa.me/+966547930269" class="text-white">حسين الدروره</a>
                </p>
            </div>
        </footer>

    </body>
    <script>

        window.addEventListener('swal',function(e){
            Swal.fire(e.detail);
        });

        // window.addEventListener('swal:confirm', event => {
        //     swal({
        //         title: event.detail.message,
        //         text: event.detail.text,
        //         icon: event.detail.type,
        //         buttons: true,
        //         dangerMode: true,
        //     })
        //         .then((willDelete) => {
        //             if (willDelete) {
        //                 window.livewire.emit('remove');
        //             }
        //         });
        // });
        // var modal = document.getElementById('modalContainer');
        // var btn = document.getElementById('modalBtn');
        // var span = document.getElementsByClassName('close')[0];
        //
        // btn.onclick = function() {
        //     modal.style.display = 'block';
        // }
        //
        // span.onclick = function() {
        //     modal.style.display = 'none';
        // }
        //
        // window.onclick = function(event) {
        //     if (event.target == modal) {
        //         modal.style.display = 'none';
        //     }
        // }
    </script>
    <script>

        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 10,
            loop: true,
            slidesPerGroup: 1,
            autoplay: {
                delay: 1800,
            },
            loopFillGroupWithBlank: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
</html>
