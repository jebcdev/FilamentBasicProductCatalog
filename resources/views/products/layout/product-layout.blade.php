<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Products')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 text-white">

        <header>
            @includeIf('products.partials.navbar')
        </header>

        <main>
            @yield('content')
        </main>


        {{-- @includeIf('products.partials.footer') --}}
    </div>
</body>

</html>
