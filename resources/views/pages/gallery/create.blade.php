@extends('layouts.app')

@section('title', 'Advanced Forms')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Advanced Forms</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms Tambah</a></div>
                    <div class="breadcrumb-item">Users</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Tambah Gallery</h2>



                <div class="card">
                    <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="projects_id">Project</label>
                                <select
                                    class="form-control @error('projects_id')is-invalid
                                @enderror"
                                    name="projects_id">
                                    @error('projects_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                    </div @enderror>
                                    <option value="">Pilih Project</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}">
                                            {{ $project->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Foto</label>

                                {{-- Tempat preview gambar --}}
                                <div class="mb-3">
                                    <img id="imagePreview" src="" alt="Preview Foto"
                                        style="display: none; width: 150px;">
                                </div>

                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    name="image" id="fotoInput" accept="image/*">

                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById("fotoInput").addEventListener("change", function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById("imagePreview");

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = "block"; // Tampilkan gambar setelah dipilih
                };

                reader.readAsDataURL(file);
            } else {
                preview.style.display = "none"; // Sembunyikan jika tidak ada gambar
            }
        });
    </script>
@endpush
