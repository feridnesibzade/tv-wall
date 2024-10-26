<section class="faq">
    <h3 class="section__title">Frequently asked questions</h3>
    <div class="faq__div">
        @foreach ($data['questions'] as $key => $questions)
            <div class="faq__item">
                <div class="faq__header" onclick="toggleFAQ(this)">
                    <span class="faq__number">#{{ $key+1 }}</span>
                    <h3 class="faq__title">{{ $questions->title }}</h3>
                    <span class="faq__icon">+</span>
                </div>
                <div class="faq__content">
                    <p>{{ $questions->answer }}</p>
                </div>
            </div>
        @endforeach


    </div>

</section>
