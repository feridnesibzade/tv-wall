<section class="find__your__city">
    <h3 class="section__title section__title__sm">
        @staticText('section.findYourCity.title')
    </h3>
    <form method="GET" action="/book">
        <input type="text" name="zip_code" placeholder="@staticText('placeholder.zipCode')" />
        <button type="submit">
            <img src="/storage/img/right_arrow.svg" alt="" />
        </button>
    </form>
</section>
