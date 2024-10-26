<div class="container">
    <section class="hero">
        <div class="content">
            <img src="/storage/{{ $data['hero']->background_image }}" alt="" />
            <div>
                <h1>{{ $data['hero']->title }}</h1>
                <div class="content__inner">
                    {!! $data['hero']->description !!}
                    <a href="{{ $data['hero']->button_link }}" class="btn">{{ $data['hero']->button_title }}</a>
                </div>
            </div>
        </div>
    </section>
</div>
