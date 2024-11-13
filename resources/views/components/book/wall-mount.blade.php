<section class="section__tv" style="z-index: 100">
    <h3>@staticText('section.wallMount.title')</h3>
    <p>@staticText('section.wallMount.descriptions')</p>
    <div class="section__tv__already" style="z-index: 100; max-width:900px;">
        @foreach ($data['wallMounts'] as $row)
            {{-- @dd(collect($row->prices)->toJson()) --}}
            <button :class="{ 'activeBtn': formData.wallMount.value === {{ $row->id }} }"
                @click="formData.wallMount.prices = {{ collect($row->prices)->toJson() }}; formData.wallMount.value = {{ $row->id }}; formData.wallMount.title = '{{ $row->title }}'">
                @if ($row->image)
                    <img src="/storage/{{ $row->image }}" />
                @endif
                {{ $row->title }}
            </button>
        @endforeach
    </div>
</section>
