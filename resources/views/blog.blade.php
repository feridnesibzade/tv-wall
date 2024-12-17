@extends('layouts.app', [
    'title' => $data['blog']->title,
    'description' => strip_tags($data['blog']->description),
    'image' => $data['blog']->cover,
])

@section('content')
    <section class="services__banner">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="/blogs">Blogs</a></li>
                <li><a href="#">{{ $data['blog']->title }}</a></li>
            </ul>
            <div class="services__banner__inner">
                <h1>@staticText('page.blogs.title')</h1>
                <div style="align-items: start; margin-top:40px; gap:10rem">
                    <ul style="line-height:0px;">
                        <h3 style="font-size: 30px; margin-bottom: 30px;">Related</h3>
                        @foreach ($data['blogs'] as $blog)
                            <li style="line-height:40px !important; font-size:16px">
                                <a href="/blogs/{{ $blog->slug }}">{{ $blog->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <div style="position: relative; width:100%; display:flex; flex-direction:column; gap:24px">
                        <div style="line-height:34px; font-size:18px; font-weight: 500">
                            <h1 style="font-size: 40px;font-weight:500">{{ $data['blog']->title }}</h1>
                            <img style="width: 100%" src="/storage/{{ $data['blog']->cover }}" alt="">
                            {!! $data['blog']->description !!}
                        </div>

                        <!-- Swiper Carousel -->
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                @foreach ($data['blog']->images as $img)
                                    <a href="/storage/{{ $img }}" data-fancybox="gallery" class="swiper-slide"
                                        style="background: url('/storage/{{ $img }}') no-repeat center center; background-size: cover;">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <div style="display: flex; gap:32px; align-items:center; height:64px;">
                            <span style="text-transform: uppercase; font-size:18px; font-weight:600">Share it</span>
                            <div style="display: flex; gap:24px">
                                <a target="_blank"
                                    href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"><img
                                        src="/storage/img/facebook.png" alt=""></a>
                                <a target="_blank"
                                    href="https://telegram.me/share/url?url={{ url()->current() }}&text={{ $data['blog']->title }}"><img
                                        src="/storage/img/telegram.png" alt=""></a>
                                <a target="_blank" href="https://twitter.com/intent/tweet?url={{ url()->current() }}"><img
                                        src="/storage/img/twitter.png" alt=""></a>
                                <a target="_blank" href="https://wa.me/?text={{ url()->current() }}"><img
                                        src="/storage/img/whatsapp.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
                <x-sections.call-us />
            </div>
        </div>
    </section>
@endsection

@once
    @push('header')
        <!-- Swiper CSS -->
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
        <style>
            .swiper-container {
                /* width: 100%; */
                width: 65rem;
                height: 300px;
                overflow: hidden;
            }

            .swiper-slide {
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 20px;
                color: white;
                background-repeat: no-repeat;
                background-position: center;
                background-size: cover;
            }
        </style>
    @endpush

    @push('footer')
        <!-- Swiper JS -->
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const swiper = new Swiper('.swiper-container', {
                    loop: true, // Enable continuous loop mode
                    autoplay: {
                        delay: 2000, // Auto-slide every 3 seconds
                        disableOnInteraction: false, // Continue autoplay after user interaction
                    },
                    // Remove pagination and navigation
                    pagination: false,
                    navigation: false,
                    slidesPerView: 3, // Show 3 slides at once
                    spaceBetween: 8,

                    breakpoints: {
                        0: {
                            slidesPerView: 1, // Show 1 slide on small screens
                        },
                        768: {
                            slidesPerView: 2, // Show 2 slides on medium screens
                        },
                        1024: {
                            slidesPerView: 3, // Show 3 slides on larger screens
                        },
                    },
                });
            });
        </script>
    @endpush
@endonce
