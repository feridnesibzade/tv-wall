<div class="container">
    <section class="cities__we__serve">
        <h1 class="section__title">Cities we serve</h1>
        <div>
            <img class="location__banner" src="/storage/img/location.png" alt="" />
            <ul>
                @foreach ($data['cities'] as $city)
                    <li>
                        <img src="/storage/{{ $city->image }}" alt="" />
                        <p>{{ $city->city }}</p>
                    </li>
                @endforeach
                {{-- <li>
                    <img src="img/city (2).png" alt="" />

                    <p>Lakewood</p>
                </li>
                <li>
                    <img src="img/city (3).png" alt="" />
                    <p>Redmond</p>
                </li>
                <li>
                    <img src="img/city (4).png" alt="" />
                    <p>Seattle</p>
                </li>
                <li>
                    <img src="img/city (5).png" alt="" />
                    <p>Bellevue</p>
                </li> --}}
            </ul>
        </div>
    </section>
</div>
