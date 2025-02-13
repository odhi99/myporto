@extends('layouts.frontend2')

@section('title', 'MyPorto - Detail Project')

@section('content')
    <section class="detail-project">
        <div class="container">
            <h1>{{ $detail->title }}</h1>

            <div class="project-info">
                <div class="project-description">
                    <h2>Deskripsi Project</h2>
                    <p>{{ $detail->description }}</p>
                </div>

                <div class="project-images">
                    <h2>Gambar Project</h2>
                    <div class="thumbnail-grid">
                        @foreach ($detail->galleries as $gallery)
                            <img src="{{ asset('images_uploads/projek/' . $gallery->image) }}" alt="Project Image"
                                class="thumbnail"
                                onclick="openModal('{{ asset('images_uploads/projek/' . $gallery->image) }}')" />
                        @endforeach
                    </div>
                </div>

                <div class="tech-stack">
                    <h2>Tech Stack</h2>
                    <div class="tech-icons">
                        @foreach ($detail->tech_stack as $item)
                            <img src="https://skillicons.dev/icons?i={{ $item }}" alt="{{ $item }} icon"
                                class="tech-icon">
                        @endforeach
                    </div>
                </div>

                <div class="client-info">
                    <h2>Client</h2>
                    <p><strong>Nama Perusahaan:</strong> {{ $detail->client_name }}</p>
                    <p><strong>Industri:</strong> {{ $detail->client_industry }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal untuk Gambar Besar -->
    <div id="imageModal" class="modal">
        <span class="close-modal" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="modalImage" />
    </div>

    <script src="main.js"></script>
@endsection
