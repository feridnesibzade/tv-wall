<section class="mount__tv__size">
    <h3 class="section__title">{{ $data['mountTvSizes']->title }}</h3>
    {!! $data['mountTvSizes']->description !!}
    <ul>
        @foreach (json_decode($data['mountTvSizes']->detail) as $detail)
        <li>
            <img src="/storage/{{ $detail->image }}" alt="" />
            <p>{{ $detail->title }}</p>
        </li>
        @endforeach
        {{-- <li>
            <img src="img/size2.png" alt="" />
            <p>60″ – 80″</p>
        </li>
        <li>
            <img src="img/size3.png" alt="" />
            <p>Over 80″</p>
        </li> --}}
    </ul>
</section>
