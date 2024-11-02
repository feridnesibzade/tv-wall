<section class="section__tv" style="z-index: 100">
    <h3>What size is your TV?</h3>
    <p>Please select the size of your TV from the options provided.</p>
    <div>
        @foreach ($data['tvSize'] as $row)
            <button :class="{ 'activeBtn': formData.tvSize.value === {{ $row->id }} }"
                @click="formData.tvSize.value = {{ $row->id }}; formData.tvSize.price = '{{ $row->price }}'; formData.tvSize.title = '{{ $row->title }}'">{{ $row->title }}</button>
        @endforeach
    </div>
</section>
