<section class="feedback">
    <div class="swiper">
        <div class="swiper-wrapper">
            @foreach ($data['feedback'] as $feedback)
                <div class="swiper-slide">
                    <div class="feedback__item">
                        <div class="feedback__item__header">
                            <div>
                                <img src="/storage/{{ $feedback->avatar }}"
                                    alt="" />
                                <div>
                                    <p>{{ $feedback->name }}</p>
                                    <span>{{ $feedback->created_at }}</span>
                                </div>
                            </div>
                            <img src="/storage/{{ $feedback->logo }}"
                                alt="" />
                        </div>
                        <div class="feedback___item__content">
                            {!! $feedback->description !!}
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <img class="slider-prev" src="img/slider-prev.png" alt="" />
    <img class="slider-next" src="img/slider-next.png" alt="" />
</section>
