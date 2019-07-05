<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="/quotes-favicon.ico">

    <title>Beautiful Free Quotes & That's It</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="sticky top-0 bg-white">
            <div class="flex justify-between px-2 py-4 w-full">
                <div class="flex w-1/2 items-center">
                    <a class="font-mono text-2xl" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <div class="flex items-center mx-2 py-2 px-2 rounded-full bg-gray-200 flex-grow">
                        <i class="fas fa-search px-3 text-gray-500"></i>
                        <input class="bg-gray-200 flex-grow text-sm outline-none" type="text" placeholder="Search free high quality quotes">
                    </div>
                </div>
                <div class="flex w-1/2 justify-around items-center">
                    <a href="" class="text-gray-600 hover:font-medium hover:text-black">Collections</a>
                    <a href="" class="text-gray-600 hover:font-medium hover:text-black">Explore</a>
                    <a href="" class="text-gray-600 hover:font-medium hover:text-black"><i class="fas fa-ellipsis-h"></i></a>

                    <button class="border-2 font-thin px-2 rounded text-gray-600 hover:font-medium hover:text-black hover:border-black">Submit a quote</button>
                    @guest
                        <a href="{{@route('login')}}"><button class="border-l-2 pl-6 text-gray-600 hover:font-medium hover:text-black">Login</button></a>
                        <a href="{{@route('register')}}"><button class="bg-green-600 font-bold px-4 py-1 text-white">Join Free</button></a>
                    @endguest
                    @auth
                        <button class="border-l-2 pl-6 text-gray-600 hover:font-medium hover:text-black">Logged in</button>
                    @endauth
                </div>
            </div>
            <div class="px-2 w-full">
                <ul class="flex">
                    <a href="/" class="mx-4 text-sm pb-4 hover:font-medium hover:text-black text-gray-700">Home</a>
                    <a href="/search/quotes/1"><li class="mx-4 text-sm pb-4 hover:font-medium hover:text-black text-gray-700">Red</li></a>
                    <a href="/search/quotes/2"><li class="mx-4 text-sm pb-4 hover:font-medium hover:text-black text-gray-700">Blue</li></a>
                    <a href="/search/quotes/3"><li class="mx-4 text-sm pb-4 hover:font-medium hover:text-black text-gray-700">Yellow</li></a>
                    <a href="/search/quotes/4"><li class="mx-4 text-sm pb-4 hover:font-medium hover:text-black text-gray-700">GhostWhite</li></a>
                    <a href="/search/quotes/5"><li class="mx-4 text-sm pb-4 hover:font-medium hover:text-black text-gray-700">BlueViolet</li></a>
                    <a href="/search/quotes/6"><li class="mx-4 text-sm pb-4 hover:font-medium hover:text-black text-gray-700">DarkGoldenRod</li></a>
                    <a href="/search/quotes/7"><li class="mx-4 text-sm pb-4 hover:font-medium hover:text-black text-gray-700">Indigo</li></a>
                    <a href="/search/quotes/8"><li class="mx-4 text-sm pb-4 hover:font-medium hover:text-black text-gray-700">DarkBlue</li></a>
                    <a href="/search/quotes/9"><li class="mx-4 text-sm pb-4 hover:font-medium hover:text-black text-gray-700">Maroon</li></a>
                    <a href="/search/quotes/10"><li class="mx-4 text-sm pb-4 hover:font-medium hover:text-black text-gray-700">Orange</li></a>
                </ul>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>

    </div>
</body>
</html>
