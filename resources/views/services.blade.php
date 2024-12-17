@extends('layouts.app')

@section('content')
    <section class="services__banner">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="/services">Services</a></li>
                @if (isset($data['service']))
                    <li><a href="#">{{ $data['service']->title }}</a></li>
                @endisset
        </ul>
        <div class="services__banner__inner">
            <h1>@staticText('page.services.title')</h1>
            <div>
                <ul>
                    @foreach ($data['services'] as $service)
                        <li><a href="/services/{{ $service->slug }}">{{ $service->title }}</a></li>
                    @endforeach
                </ul>
                @if (isset($data['service']))
                    <div>
                        {!! $data['service']->text !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- <div class="container__sm"> --}}
@include('components.sections.find-city')
{{-- </div> --}}
@include('components.sections.services')
@include('components.sections.partners ')

<div class="container__sm">
    @include('components.sections.best-mounting')
    @include('components.sections.projects')

    @include('components.sections.questions')
</div>
@endsection
