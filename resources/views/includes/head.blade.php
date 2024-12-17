<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="google-site-verification" content="FUP0Bm_jkxry8LnNgtWcwlnQ7c3AOxI23uyZ5F1sVY4" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="{{ implode(',', @$page?->tags ?? []) }}">
    <meta name="description" content="{!! isset($description) ? $description : htmlspecialchars(@$page?->description) !!}">
    <meta property="og:image" content="{{ isset($image) ? $image : url('/storage/' . $settings->logo) }}">

    <title>{{ config('app.name') . ' | ' . (isset($title) ? $title : ($page?->title ? $page->title : '')) }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <link rel="stylesheet" href="/assets/css/style.css" />
    <link rel="stylesheet" href="/assets/css/responsive.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.3/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-MC9BTGB7');
    </script>
    <!-- End Google Tag Manager -->


    @stack('header')
    <style>
        .section__tv div .activeBtn {
            border: 1px solid #418DFF;
            outline: 1px solid #418DFF;
        }

        /* .section__tv__card {
        position: fixed;
        top: 10%;
        right: 50px;
        z-index: 99999;
    } */
    </style>

</head>

<body>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MC9BTGB7" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
