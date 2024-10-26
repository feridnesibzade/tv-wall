@extends('layouts.app')

@section('content')
    <section class="services__banner location__bg__inner">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Locations</a></li>
                @if (isset($data['city']))
                    <li><a href="#">{{ $data['city']->title }}</a></li>
                @endisset
        </ul>
        <div class="location__banner__inner">
            <h1>Locations</h1>
            <div>
                <div class="location__banner__inner__right">

                    @foreach ($data['countries'] as $country)
                        <p>{{ $country->title }}</p>
                        <ul>
                            @foreach ($country->cities as $city)
                                <li><a href="/locations/{{ $city->slug }}">{{ $city->city }}</a></li>
                            @endforeach
                        </ul>
                    @endforeach
                    {{-- <ul>
                        <li>Charlotte</li>
                        <li>Charlotte</li>
                        <li>Charlotte</li>
                        <li>Charlotte</li>
                    </ul>
                    <p>Washingthon</p>
                    <ul>
                        <li>Charlotte</li>
                        <li>Charlotte</li>
                        <li>Charlotte</li>
                        <li>Charlotte</li>
                    </ul> --}}
                </div>

                @if (isset($data['city']))
                    <div class="location__banner__inner__left">
                        <h2>{{ $data['city']->title }}</h2>
                        {!! $data['city']->description !!}
                        <ul>
                            @foreach ($data['city']->detail as $detail)
                                <li>
                                    {!! $detail['description'] !!}
                                </li>
                            @endforeach
                        </ul>
                        {{--  <h4>TV Mounting Service in Charlotte, NC</h4>
                        <ul>
                            <li>
                                Expert Technicians: Our team is skilled in
                                mounting all TV sizes and brands with
                                precision.
                            </li>
                            <li>
                                Safety and Security: We use high-quality
                                mounting brackets and hardware for a secure
                                installation.
                            </li>
                            <li>
                                Customer Satisfaction: We prioritize your
                                satisfaction with our exceptional service
                                and attention to detail.
                            </li>
                        </ul>
                        <span>Book your TV mounting service in Charlotte, NC
                            by calling us at 425-800-0208 today!</span> --}}
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
