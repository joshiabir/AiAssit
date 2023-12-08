<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="title" content="Talk to Donna">
    <meta name="description"
        content="Hi, I'm Donna, yes, from Suits and I'm here as a virtual assistant for your social life. I know darling, you need me. Alright come right on.">
    <meta name="keywords" content="AI Assistant, Donna, Suits, Social Assistant">
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta name="author" content="pinkclouds.space">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon-16x16.png">

    <!-- Primary Meta Tags -->
    <title>TalkToDonna</title>
    <meta name="title" content="TalkToDonna" />
    <meta name="description"
        content="Hi, I'm Donna, yes, from Suits and I'm here as a virtual assistant for your social life. I'm here to spice up your social life, honey, so spill the beans and let's get this party started. What's been going on? Any scandalous gossip, thrilling adventures, or romantic encounters that need my expert advice? Don't be shy, I'm all ears." />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://talktodonna.xyz/login" />
    <meta property="og:title" content="TalkToDonna" />
    <meta property="og:description"
        content="Hi, I'm Donna, yes, from Suits and I'm here as a virtual assistant for your social life. I'm here to spice up your social life, honey, so spill the beans and let's get this party started. What's been going on? Any scandalous gossip, thrilling adventures, or romantic encounters that need my expert advice? Don't be shy, I'm all ears." />
    <meta property="og:image" content="https://talktodonna.xyz/images/meta-tags.png" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="https://talktodonna.xyz/login" />
    <meta property="twitter:title" content="TalkToDonna" />
    <meta property="twitter:description"
        content="Hi, I'm Donna, yes, from Suits and I'm here as a virtual assistant for your social life. I'm here to spice up your social life, honey, so spill the beans and let's get this party started. What's been going on? Any scandalous gossip, thrilling adventures, or romantic encounters that need my expert advice? Don't be shy, I'm all ears." />
    <meta property="twitter:image" content="https://talktodonna.xyz/images/meta-tags.png" />

    <!-- Meta Tags Generated with https://talktodonna.xyz -->

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-WB26TSW914"></script>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-989MV3F36Q"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-989MV3F36Q');
</script>

<body class="font-sans antialiased">

    <script>
        // It's best to inline this in `head` to avoid FOUC (flash of unstyled content) when changing pages or themes
        if (
            localStorage.getItem('color-theme') === 'dark' ||
            (!('color-theme' in localStorage) &&
                window.matchMedia('(prefers-color-scheme: dark)').matches)
        ) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    <div class="min-h-screen bg-gradient-to-r from-red-800 to-orange-400 dark:from-pink-800 dark:to-orange-600">
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
