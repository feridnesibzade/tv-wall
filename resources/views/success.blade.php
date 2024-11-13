@extends('layouts.app')

@section('content')
    <section class="services__banner">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="/book">@staticText('page.book.title')</a></li>
                <li><a href="#">@staticText('page.orderSuccess.title')</a></li>
            </ul>
            <div class="services__banner__inner">
                <h1>@staticText('page.orderSuccess.title')</h1>
                <div class="container"
                    style="margin-left: auto; margin-right: auto; width: 50rem;gap:25px !important; display: flex; justify-content:center; padding:10px; height:auto; text-align: center; line-height: 32px; flex-direction:column; padding-top:5rem">
                    <div>
                        <img src="/storage/img/checked-ico.png" alt="">
                    </div>
                    <p>@staticText('success.congrats.title')
                        </br>
                        @staticText('success.congrats.message')</p>
                </div>
                {{-- <div>
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
                </div> --}}
            </div>
        </div>
    </section>
@endsection
