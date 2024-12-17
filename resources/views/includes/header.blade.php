<div id="blur"></div>
<div class="bg__dark__blue" style="position: fixed; width: 100%">
    <div class="container">
        <header>
            <a href="/">
                <img src="/storage/{{ $settings->logo }}" alt="{{ config('app.name') }}" />
            </a>
            <ul class="navigation">
                <li><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/blogs">Blogs</a></li>
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
                        @foreach ($locations as $location)
                            <div>
                                <h3>{{ $location->title }}</h3>
                                <ul class="dropdown">
                                    @if ($location->has('cities'))
                                        @foreach ($location->cities as $city)
                                            <li><a href="/locations/{{ $city->slug }}">{{ $city->title }}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </li>
            </ul>
            <ul class="social">
                <li>
                    <a class="tel"
                        href="tel:{{ trim(str_replace(' ', '', $settings->phone)) }}">{{ $settings->phone }}</a>
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
                    <li><a href="/">Home</a></li>
                    <li><a href="/about">About</a></li>
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
            <div>
                <ul class="side_foot">
                    <li><a href="tel:{{ trim(str_replace(' ', '', $settings->phone)) }}">{{ $settings->phone }}</a>
                    </li>
                    <li><a href="mailto:{{ trim($settings->email) }}">{{ $settings->email }}</a></li>
                    <li><a href="/book" class="btn" style="color:black">Book now</a></li>
                </ul>
            </div>
            <div>
                <ul style="display:flex; justify-content:center; gap:16px">
                    @foreach ($settings->social_medias as $media)
                        <li class="icon">
                            <a href="{{ $media['link'] }}">
                                <img src="/storage/{{ $media['icon'] }}" alt="{{ $media['title'] }}" />
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<div style="height:74px"></div>
