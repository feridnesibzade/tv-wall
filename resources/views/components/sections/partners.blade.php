<div class="partners__slider">
    <div class="swiper">
        <div class="swiper-wrapper">
            @foreach ($data['partners'] as $partner)
                <div class="swiper-slide">
                    <img src="/storage/{{ $partner->image }}" alt="{{ $partner->name }}" />
                </div>
            @endforeach
        </div>
    </div>
</div>
