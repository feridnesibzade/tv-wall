@extends('layouts.app')

@section('content')
    @include('components.sections.hero')

    <div class="container__sm">
        @include('components.sections.find-city')
        @include('components.sections.projects')
        @include('components.sections.mount-tv-size')
    </div>

    @include('components.sections.services')
    @include('components.sections.partners')
    @include('components.sections.we-special')

    <div class="container__sm">
        @include('components.sections.schedules')
        @include('components.sections.feedbacks')
    </div>
@endsection
