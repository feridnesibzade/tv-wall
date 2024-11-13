<section class="section__tv" style="z-index: 100">
    <h3>@staticText('order.wallType.title')</h3>
    <div>
        @foreach ($data['wallTypes'] as $row)
            <button :class="{ 'activeBtn': formData.wallType.value === {{ $row->id }} }" style="z-index: 100"
                @click="formData.wallType.price = {{ $row->price }}; formData.wallType.value = {{ $row->id }}; formData.wallType.title = '{{ $row->title }}'">{{ $row->title }}</button>
        @endforeach
        {{-- <button :class="{ 'activeBtn': formData.wallType === 'alreadyHave' }">Brick or concrete</button>
        <button :class="{ 'activeBtn': formData.wallType === 'alreadyHave' }">Stucco</button>
        <button :class="{ 'activeBtn': formData.wallType === 'alreadyHave' }">Tile</button> --}}
    </div>
</section>
