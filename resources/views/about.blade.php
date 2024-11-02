@extends('layouts.app')

@section('content')
    <section class="about">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="#">{{ $data['about']->title }}</a></li>
            </ul>
        </div>
        <div class="container">
            <div class="about__text">
                <h1>About</h1>
                <div class="container__sm">
                    <img src="/storage/{{ $data['about']->logo }}" alt="" />

                    {!! $data['about']->description !!}
                    <ul class="counter">
                        @foreach (json_decode($data['about']->statistics) as $statistic)
                            <li>
                                <h3>{{ $statistic->count }}</h3>
                                <p>
                                    {{ $statistic->title }}
                                </p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <section class="cities__we__serve">
            <h1 class="section__title">Cities we serve</h1>
            <div>
                <img class="location__banner" src="/storage/img/location.png" alt="" />
                <ul>
                    @foreach ($data['cities'] as $city)
                        <li>
                            <img src="/storage/{{ $city->image }}" alt="" />
                            <p>{{ $city->title }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    </div>


    {{-- @include('components.sections.cities') --}}
    @include('components.sections.find-city')
@endsection
