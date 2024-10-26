<div class="bg__gradient">
    <div class="container__sm">
        <section class="what__makes__us__special">
            <h3 class="section__title">{{ $data['weSpecial']->title }}</h3>
            {!! $data['weSpecial']->description !!}
            <ul>

                @foreach (json_decode($data['weSpecial']->detail) as $detail)
                    <li>
                        <img src="/storage/{{ $detail->image }}" alt="" />
                        <div class="text">
                            <h4>{{ $detail->title }}</h4>
                            {!! $detail->description !!}
                        </div>
                    </li>
                @endforeach

            </ul>
        </section>
    </div>
</div>
