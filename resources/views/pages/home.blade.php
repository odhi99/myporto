@extends('layouts.frontend')

@section('title', 'MyPorto')


@section('content')
    <!-- About Section -->
    <section class="about" id="about">
        <img src="{{ asset('images_uploads/' . $about->foto) }}" alt="About Me" class="about-img" />
        <div>
            <h2>👋 Hello, I'm <span class="highlight">Odii</span></h2>
            <p>
                {{ $about->about }} Based In Makassar
            </p>

            <!-- Certifications -->
            <div class="certifications">
                <h3>🏆 Certifications</h3>
                <ul class="cert-list">
                    <li>🎖️ Bootcamp Machine Learning Developer - Dicoding</li>
                    <li>🎖️ Bootcamp Mern Stack -BuildWithAngga</li>
                    <li>🎖️ Artificial Intelligence dan Data Engineering -Microsoft</li>
                    <li>🎖️ Fullstack Laravel -BuildWithAngga</li>
                    <li>🎖️ NextJs Developer</li>
                    <li>🎖️ Fullstack Mobile Developer Flutter</li>
                </ul>
            </div>

            <div class="skills">
                <img src="https://skillicons.dev/icons?i=laravel,react,nextjs,typescript,nodejs,flutter,tensorflow,pytorch,aws,gcp"
                    alt="Skills" />
            </div>
            <div class="buttons-about">
                <button class="btn btn-primary">Download CV</button>
                <!-- <button class="btn btn-secondary">Hire Me</button> -->
            </div>
        </div>
    </section>

    <!-- Projects -->
    <section class="projects" id="projects">
        <h2>My Projects</h2>
        <div class="projects-grid">
            @foreach ($projects as $project)
                <div class="project-card">
                    <img src="{{ asset('images_uploads/projek/' . $project->images) }}" class="project-img"
                        alt="{{ $project->title }}">
                    <div class="project-content">
                        <h3>{{ $project->title }}</h3>
                        <p>{{ $project->description }}</p>

                        <!-- Tech Stack yang benar -->
                        <div class="tech-stack">
                            @foreach ($project->tech_stack as $item)
                                <img src="https://skillicons.dev/icons?i={{ $item }}" alt="{{ $item }} icon"
                                    class="tech-icon">
                            @endforeach
                        </div>

                        <div class="button-projek">
                            <a href="{{ route('detail', $project->id) }}">See More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Tambahkan setelah section projects -->
    <section class="blog" id="blog">
        <h2>Latest Articles</h2>
        <div class="blog-grid">
            @foreach ($blogs as $blog)
                <div class="blog-card">
                    <img src="{{ asset('images_uploads/thumbnail/' . $blog->thumbnail) }}" alt="{{ $blog->title }}"
                        class="blog-thumbnail" />
                    <div class="blog-content">
                        <h3>{{ $blog->title }}</h3>
                        {{-- <p class="blog-subtitle">{{ $blog->content }}</p> --}}
                        <div class="blog-meta">
                            <span class="blog-date">{{ $blog->publish_date }}</span>
                            <a href="{{ route('detail-blog', $blog->id) }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Contact -->
    <section class="contact" id="contact">
        <div class="container">
            <h2>Let's Work Together!</h2>
            <div class="social-links">
                <a href="#"><i class="fab fa-whatsapp"></i></a>
                <a href="#"><i class="fab fa-github"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </section>
@endsection
