@extends('layouts.app', ['title' => $page->title ?? 'Blogs', 'description' => strip_tags($page?->description ?? 'blogs')])

@section('content')
    <section class="services__banner" x-data="blogs">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="/blogs">Blogs</a></li>
                {{-- @if (isset($data['service']))
                    <li><a href="#">{{ $data['service']->title }}</a></li>
                @endisset --}}
            </ul>
            <div class="services__banner__inner">
                <h1>@staticText('page.blogs.title')</h1>
                <div class="blog__body">
                    <template x-for="blog in data">
                        <a class="blog__item" :href="'/blogs/' + blog.slug" style="z-index: 400">
                            <div class="img__Box" :style="'background-image: url(/storage/' + blog.cover + ')'">
                            </div>
                            <div class="item_content_box">
                                <h2 x-text="blog.title"></h2>
                                <p x-text="blog.shortDescription"></p>
                                <span class="date" x-text="blog.diffForHumans"></span>
                            </div>
                        </a>
                    </template>

                </div>
                <div style="justify-content: center;align-items: center; margin-top:30px;">
                    <span style="z-index:600" class="load__more__btn" x-show="hasMore" x-on:click="loadMore">Load
                        more</span>
                </div>
            </div>
        </div>
    </section>
    @include('components.sections.find-city')
@endsection

@push('footer')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('blogs', () => ({
                init() {
                    this.fetchBlogs();
                },
                page: 1,
                hasMore: false,
                data: [],
                fetchBlogs() {
                    fetch(`/ajax/blogs?page=${this.page}`, {
                            method: 'GET',
                            headers: {
                                'Content-Type': 'application/json'
                            }
                        }).then(response => response.json())
                        .then(data => {
                            this.hasMore = data.hasMore;
                            this.data = this.data.concat(data.data);
                            console.log(data.data.data)
                        });
                },
                loadMore() {
                    this.page += 1;
                    this.fetchBlogs()
                }
            }))
        })
    </script>
@endpush
