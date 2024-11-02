<section class="section__tv">
    <h3>Can you help lift the TV?</h3>
    <div>
        @foreach ($data['lifting'] as $row)
            <button type="button" :class="{ 'activeBtn': formData.liftAssistance.value === {{ $row->price }} }"
                @click="formData.liftAssistance.value = {{ $row->price }}; formData.liftAssistance.price = {{ $row->price }}; formData.liftAssistance.title = '{{ $row->title }}'">
                {{ $row->title }}
            </button>
        @endforeach
    </div>
</section>
