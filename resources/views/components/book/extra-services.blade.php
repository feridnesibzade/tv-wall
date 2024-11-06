<section class="section__tv" style="z-index: 100">
    <h3>Extra services</h3>

    <div>
        @foreach ($data['extraServices'] as $row)
            <button
                :class="{
                    'activeBtn': formData.extraService.some(service =>
                        service.value === Number({{ $row->id }}) &&
                        service.price === Number({{ $row->price }}) &&
                        service.title === '{{ $row->title }}'
                    )
                }"
                @click="toggleExtraServie( {{ $row }} );">{{ $row->title }}</button>
        @endforeach
        {{-- <button>External cord hider</button>
        <button>Install soundbar</button>
        <button>Install wall shelf</button> --}}
    </div>
</section>
