<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $heading }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Styles -->

</head>

<body class="font-sans antialiase">
    <div class="min-h-full">
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                <div class="relative flex h-16 items-center justify-between">

                    <div class="flex flex-1 items-center justify-center sm:items-stretch ">

                        <div class="hidden sm:ml-6 sm:block">
                            <div class="flex space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->

                                <x-nav-link :active="request()->is(['/products', 'products'])" href="/products">products</x-nav-link>
                                <x-nav-link :active="request()->is(['/suppliers', 'suppliers'])" href="/suppliers">suppliers</x-nav-link>
                                <x-nav-link :active="request()->is(['/categories', 'categories'])" href="/categories">categories</x-nav-link>
                                <x-nav-link :active="request()->is(['/farmers', 'farmers'])" href="/farmers">farmers</x-nav-link>
                                <x-nav-link :active="request()->is(['/buyers', 'buyers'])" href="/buyers">buyers</x-nav-link>
                                <x-nav-link :active="request()->is(['/orders', 'orders'])" href="/orders">orders</x-nav-link>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </nav>
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 text-black">
                {{ $slot }}
            </div>
        </main>
    </div>

</body>

</html>
