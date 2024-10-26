<div id="blur"></div>
<div class="bg__dark__blue">
    <div class="container">
        <header>
            <a href="index.html">
                <img src="/storage/{{ $settings->logo }}" alt="" />
            </a>
            <ul class="navigation">
                <li><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <li class="has__dropdown">
                    <a href="/services">Services</a>
                    <div class="dropdown__container">
                        <ul class="dropdown">
                            @foreach ($services as $service)
                                <li><a href="/services/{{ $service->slug }}">{{ $service->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li class="has__dropdown">
                    <a href="/locations">Locations</a>
                    <div class="dropdown__container">
                        <div>
                            @foreach ($locations as $location)
                                <h3>{{ $location->title }}</h3>
                                <ul class="dropdown">
                                    @if ($location->has('cities'))
                                        @foreach ($location->cities as $city)
                                            <li><a href="/locations/{{ $city->slug }}">{{ $city->title }}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="social">
                <li>
                    <a class="tel" href="tel:{{ $settings->phone }}">{{ $settings->phone }}</a>
                </li>
                <li><a href="/book" class="btn">Book now</a></li>
                <li class="menu"><img src="/storage/img/menu.svg" alt="" /></li>
                @foreach ($settings->social_medias as $media)
                    <li class="icon">
                        <a href="{{ $media['link'] }}">
                            <img src="/storage/{{ $media['icon'] }}" alt="{{ $media['title'] }}" />
                        </a>
                    </li>
                @endforeach
            </ul>
        </header>
        <div id="sideMenu" class="side__menu">
            <div>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li class="has__dropdown__rwd">
                        <a href="/services">Services &rAarr;</a>

                        <div class="dropdown__container__rwd">
                            <ul class="dropdown__rwd">
                                @foreach ($services as $service)
                                    <li><a href="/services/{{ $service->slug }}">{{ $service->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    <li class="has__dropdown__rwd">
                        <a href="/locations">Locations &rAarr;</a>
                        <div class="dropdown__container__rwd">
                            <div class="dropdown__container__rwd__inner">
                                @foreach ($locations as $location)
                                    <div>
                                        <h3>{{ $location->title }}</h3>
                                        <ul class="dropdown__rwd">
                                            @if ($location->has('cities'))
                                                @foreach ($location->cities as $city)
                                                    <li><a
                                                            href="/locations/{{ $city->slug }}">{{ $city->title }}</a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                @endforeach
                            </div>
                        </div>
                    </li>
                </ul>
                <button class="close__menu">X</button>
            </div>
        </div>
    </div>
</div>
