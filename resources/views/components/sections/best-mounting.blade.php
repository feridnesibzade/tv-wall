<section class="mount__tv__space">
    <h3 class="section__title">
        {{ $data['bestTypeOfMount']->title }}
    </h3>
    {!! $data['bestTypeOfMount']->description !!}
    <ul>
        @foreach (json_decode($data['bestTypeOfMount']->detail) as $detail)
            <li>
                <img src="/storage/{{ $detail->image }}" alt="" />

                <h3>{{ $detail->title }}</h3>
                {!! $detail->description !!}
            </li>
        @endforeach

    </ul>
</section>
