<section class="feedback">
    <div class="swiper">
        <div class="swiper-wrapper">
            @foreach ($data['feedback'] as $feedback)
                <a href="https://www.google.com/maps/place/MyWall/@37.3115741,-122.0300764,3249m/data=!3m1!1e3!4m8!3m7!1s0x4d0214a5dd1e921f:0xc13eb53e9ab7c1!8m2!3d37.3116076!4d-122.0299293!9m1!1b1!16s%2Fg%2F11wr3gpl5m?entry=ttu&g_ep=EgoyMDI0MTIxMS4wIKXMDSoASAFQAw%3D%3D"
                    target="_blank" class="swiper-slide">
                    <div class="feedback__item">
                        <div class="feedback__item__header">
                            <div>
                                <img src="{!! $feedback->profile_photo_url !!}" alt="" />
                                <div>
                                    <p>{{ ucfirst($feedback->author_name) }}</p>
                                    <span>{{ $feedback->relative_time_description }}</span>
                                </div>
                            </div>
                            {{-- <img src="/storage/{{ $feedback->logo }}" alt="" /> --}}
                        </div>
                        <div class="feedback___item__content">
                            {!! substr($feedback->text, 0, 350) . '...' !!}
                        </div>
                    </div>
                </a>
            @endforeach

        </div>
    </div>
    <img class="slider-prev" src="img/slider-prev.png" alt="" />
    <img class="slider-next" src="img/slider-next.png" alt="" />
</section>
@push('footer')
    <script></script>
@endpush
