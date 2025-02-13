@extends('layouts.frontend2')

@section('title', 'MyPorto - ' . $detail->title)

@section('content')
    <section class="blog-detail">
        <div class="container">
            <article class="blog-content-container">
                <img src="{{ asset('images_uploads/thumbnail/' . $detail->thumbnail) }}" alt="Blog Header"
                    class="blog-header-image" />

                <h1 class="blog-title">{{ $detail->title }}</h1>

                <div class="blog-meta-detail">
                    <span class="author">By {{ $detail->author ?? 'Admin' }}</span>
                    <span class="date">{{ date('d F Y', strtotime($detail->publish_date)) }}</span>
                </div>

                <div class="blog-content">
                    <p class="lead">
                        {{ $detail->meta_description }}
                    </p>

                    {!! $detail->content !!}

                    @if (!empty($detail->code_snippets))
                        @php
                            $snippets = is_string($detail->code_snippets)
                                ? json_decode($detail->code_snippets, true)
                                : $detail->code_snippets;
                        @endphp


                        @if (!empty($snippets))
                            <h2 class="snippet-title">🖥 Snippet Kode</h2>
                            @foreach ($snippets as $snippet)
                                @if (!empty($snippet))
                                    <pre class="code-snippet"><code class="language-{{ $detail->language ?? 'plaintext' }}">{{ is_array($snippet) ? json_encode($snippet, JSON_PRETTY_PRINT) : $snippet }}</code></pre>
                                @else
                                    <p class="no-snippet">Snippet ini tidak memiliki kode.</p>
                                @endif
                            @endforeach
                        @else
                            <p class="no-snippet">Tidak ada snippet kode.</p>
                        @endif
                    @endif
                </div>
            </article>

            @if (!empty($recent_posts) && $recent_posts->count() > 0)
                <aside class="blog-sidebar">
                    <h3 class="sidebar-title">📰 Recent Posts</h3>
                    <div class="sidebar-posts">
                        @foreach ($recent_posts->unique('id') as $post)
                            {{-- Hapus Duplikat --}}
                            <div class="sidebar-post">
                                <img src="{{ asset('storage/thumbnail/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                                    class="sidebar-img" />
                                <div class="sidebar-post-info">
                                    <h4>{{ $post->title }}</h4>
                                    <p class="post-date">{{ date('d F Y', strtotime($post->publish_date)) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </aside>
            @endif

        </div>
    </section>
@endsection
