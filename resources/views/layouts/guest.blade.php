<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="title" content="Talk to Donna">
    <meta name="description"
        content="Hi, I'm Donna, yes, from Suits and I'm here as a virtual assistant for your social life. I'm here to spice up your life, honey, so spill the beans and let's get this party started. What's been going on? Any scandalous gossip, thrilling adventures, or romantic encounters that need my expert advice? Don't be shy, I'm all ears.">
    <meta name="keywords" content="AI Assistant, Donna, Suits, Social Assistant">
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta name="author" content="pinkclouds.space">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon-16x16.png">
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
<script async src="https://www.googletagmanager.com/gtag/js?id=G-989MV3F36Q"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-989MV3F36Q');
</script>

<body>
    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>

    @livewireScripts
</body>

</html>
