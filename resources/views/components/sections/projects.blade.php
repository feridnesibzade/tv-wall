<section class="projects">
    <h3 class="section__title">Projects</h3>
    <div class="projects__grid">
        @foreach ($data['projects'] as $key => $project)
            <div class="div{{ $key }}">
                <img src="/storage/{{ $project->image }}" alt="" />
            </div>
        @endforeach
        {{-- <div class="div2">
            <img src="img/grid-2.png" alt="" />
        </div>
        <div class="div3">
            <img src="img/grid-3.png" alt="" />
        </div>
        <div class="div4">
            <img src="img/grid-4.png" alt="" />
        </div>
        <div class="div5">
            <img src="img/grid-5.png" alt="" />
        </div>
        <div class="div6">
            <img src="img/grid-6.png" alt="" />
        </div>
        <div class="div7">
            <img src="img/grid-7.png" alt="" />
        </div>
        <div class="div8">
            <img src="img/grid-8.png" alt="" />
        </div> --}}
    </div>
    <a href="/projects" class="btn">View all</a>
</section>
