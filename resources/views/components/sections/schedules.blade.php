<section class="schedule">
    <h3 class="section__title">
        {{ $data['schedule']->title }}
    </h3>
    <ul>
        @foreach (json_decode($data['schedule']->detail) as $detail)
            <li>
                <img src="{{ $detail->image }}" alt="" />
                <h4>{{ $detail->title }}</h4>
                {!! $detail->description !!}
            </li>
        @endforeach
    </ul>
</section>
