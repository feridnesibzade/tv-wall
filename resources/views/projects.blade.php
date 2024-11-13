@extends('layouts.app')

@section('content')
    <section class="services__banner" style="min-height: 83vh">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="/projects">@staticText('page.projects.title')</a></li>
                @if (isset($data['project']))
                    <li><a href="#">{{ $data['project']->title }}</a></li>
                @endif
            </ul>
            <div class="location__banner__inner">
                <h1>@staticText('page.projects.title')</h1>
                <div>
                    <div class="location__banner__inner__right">
                        @if (!empty($data['projects']))
                            @foreach ($data['projects'] as $year => $projects)
                                <p>{{ $year }}</p>
                                <ul>
                                    @foreach ($projects as $project)
                                        <li><a href="/projects/{{ $project->id }}">{{ $project->title }}</a></li>
                                    @endforeach
                                </ul>
                            @endforeach
                        @endif
                    </div>
                    @if (isset($data['project']))
                        <div class="location__banner__inner__left">
                            <h2 style="width: auto !important;">
                                {{ $data['project']->city->city . '. ' . $data['project']->year }}
                            </h2>
                            {!! $data['project']->description !!}
                            <div class="projects__grid">
                                @foreach ($data['project']->images as $key => $image)
                                    <div class="image-{{ $key }}">
                                        <a href="/storage/{{ $image }}" data-fancybox="gallery">
                                            <img src="/storage/{{ $image }}" alt="" />
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </div>
            </div>
            @if (isset($data['project']))
                {{-- <section class="mount__tv__size">
                    <ul>
                        @foreach ($data['project']->wallMounts as $row)
                            <li>
                                <img src="/storage/{{ $row->image }}" alt="" />
                                <p>{{ $row->title }}</p>
                            </li>
                        @endforeach
                    </ul>
                </section> --}}
            @endif
        </div>
    </section>
    @if (isset($data['project']))
        <div class="container__sm">
            <section class="section__tv" style="z-index: 999">
                <div class="section__tv__already">
                    @foreach ($data['project']->wallMounts as $row)
                        <button>
                            @if ($row->image)
                                <img src="/storage/{{ $row->image }}">
                            @endif
                            {{ $row->title }}
                        </button>
                    @endforeach

                </div>
            </section>
        </div>
    @endif
@endsection
