<section class="section__tv" style="z-index: 100">
    <h3>Do you need a wall mount for your TV?</h3>
    <p>If you already have a mount, fantastic! If not, we can provide one.</p>
    <div class="section__tv__already" style="z-index: 100; max-width:900px;">
        @foreach ($data['wallMounts'] as $row)
            <button :class="{ 'activeBtn': formData.wallMount.value === {{ $row->id }} }"
                @click="formData.wallMount.price = {{ $row->price }}; formData.wallMount.value = {{ $row->id }}; formData.wallMount.title = '{{ $row->title }}'">
                @if ($row->image)
                    <img src="/storage/{{ $row->image }}" />
                @endif
                {{ $row->title }}
            </button>
        @endforeach
    </div>
</section>
