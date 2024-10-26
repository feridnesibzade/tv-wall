<section class="services">
    <div class="container__sm">
        <h3 class="section__title">Services</h3>
        <ul>
            @foreach ($data['services'] as $service)
                <li>
                    <img src="/storage/{{ $service->image }}" alt="" />
                    <p>{{ $service->title }}</p>
                </li>
            @endforeach
            {{-- <li>
                <img src="img/service (2).png" alt="" />
                <p>Soundbar installation</p>
            </li>
            <li>
                <img src="img/service (3).png" alt="" />
                <p>TV dismount & remount</p>
            </li>
            <li>
                <img src="img/service (4).png" alt="" />
                <p>Wall shelf installation</p>
            </li>
            <li>
                <img src="img/service (5).png" alt="" />
                <p>Home cinema installation</p>
            </li> --}}
        </ul>
    </div>
</section>
