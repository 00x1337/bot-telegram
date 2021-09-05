<x-app-layout>
    <style>
        .zoom-in-zoom-out{
            background-image: url("https://www.popsci.com/uploads/2021/08/24/0x0-KJC_5055-1.jpg?width=1440");
            background-position-x: center;
            background-size: auto 20vh;
            background-color: #2563eb;
            opacity: 30%;
            height: 180px;
            transform: scale(1, 1);

            animation: zoom-in-zoom-out 2s ease-out infinite;
        }
        @keyframes zoom-in-zoom-out {
            0% {
                transform: scale(1, 1);
            }
            50% {
                transform: scale(2, 2);
            }
            100% {
                transform: scale(1, 1);

            }
        }
    </style>
    <br><br><br><br>


    <!-- Hero content: will be in the middle -->
    <div class="content">

    <div class="hero-bodyy">
        <div style="            height: 18px;">
        <div class="zoom-in-zoom-out" ></div>
    </div>
        <div class="container has-text-centered">
            <p class="title">
                سوي بوتك عندنا ولا تشيل هم
            </p>
            <div class="">
            <a href="/dashboard" class="button is-link">انشاء بوت</a>
{{--                <a href="" class="button is-dark">تصفح البوتات</a>--}}

            </div>
        </div>
    </div>

    </div>


</x-app-layout>
