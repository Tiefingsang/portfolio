@extends('layouts.app')

@section('title', $post->title . ' - Blog')
@section('meta_description', Str::limit($post->excerpt ?? $post->meta_description, 150))

@section('content')
<div class="section started-blog">
    <div class="slide" style="background-image: url({{ asset('images/slide-bg-1.jpg') }});"></div>
    <div class="centrize full-width">
        <div class="vertical-center">
            <div class="st-title align-center">Blog Post</div>
        </div>
    </div>
</div>

<!-- Section Blog -->
<div class="section blog-single align-left" id="blog-section">
    <div class="fw">
        <div class="row">
            <div class="col col-m-12 col-t-12 col-d-12">

                <div class="post-box">

                    <h1>{{ $post->title }}</h1>
                    <div class="blog-detail">
                        Posted <span>{{ $post->published_at ? $post->published_at->format('d F Y') : date('d F Y') }}</span>
                        by <span>{{ $post->author ?? 'Tiefing Sangare' }}</span>
                    </div>

                    @if($post->image)
                    <div class="blog-image">
                        <img src="{{ $post->image_url }}" alt="{{ $post->title }}">
                    </div>
                    @endif

                    <div class="blog-content">
                        {!! $post->content !!}
                    </div>

                    <!-- Related Posts -->
                    @if(isset($relatedPosts) && $relatedPosts->count() > 0)
                    <div class="related-posts mt-5">
                        <h3 class="subtitle">Articles similaires</h3>
                        <div class="row">
                            @foreach($relatedPosts as $related)
                            <div class="col col-m-12 col-t-4 col-d-4">
                                <div class="post-card">
                                    <a href="{{ route('blog.show', $related->slug) }}">
                                        <h4>{{ $related->title }}</h4>
                                        <p class="text-small">{{ Str::limit($related->excerpt, 100) }}</p>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Back to blog button -->
                    <div class="text-center mt-4">
                        <a href="{{ route('blog') }}" class="btn btn_animated">
                            <span class="circle">← Retour au blog</span>
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
