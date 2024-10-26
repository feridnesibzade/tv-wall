<section class="section__tv" style="z-index: 999">
    <h3>Extra services</h3>

    <div>
        @foreach ($data['extraServices'] as $row)
            <button :class="{ 'activeBtn': formData.extraService.value === {{ $row->id }} }"
                @click="formData.extraService.value = {{ $row->id }}; formData.extraService.price = {{ $row->price }}; formData.extraService.title = '{{ $row->title }}'">{{ $row->title }}</button>
        @endforeach
        {{-- <button>External cord hider</button>
        <button>Install soundbar</button>
        <button>Install wall shelf</button> --}}
    </div>
</section>
