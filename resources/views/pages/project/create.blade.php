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
                <h2 class="section-title">Tambah Project</h2>



                <div class="card">
                    <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text"
                                    class="form-control @error('title')
                                is-invalid
                            @enderror"
                                    name="title">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Slug</label>
                                <input type="text"
                                    class="form-control @error('slug')
                                is-invalid
                            @enderror"
                                    name="slug">
                                @error('slug')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text"
                                    class="form-control @error('description')
                                is-invalid
                            @enderror"
                                    name="description">
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Foto</label>

                                {{-- Tempat preview gambar --}}
                                <div class="mb-3">
                                    <img id="imagePreview" src="" alt="Preview Foto"
                                        style="display: none; width: 150px;">
                                </div>

                                <input type="file" class="form-control @error('images') is-invalid @enderror"
                                    name="images" id="fotoInput" accept="image/*">

                                @error('images')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Nama Client</label>
                                <input type="text"
                                    class="form-control @error('client_name')
                                is-invalid
                            @enderror"
                                    name="client_name">
                                @error('client_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Client Industry</label>
                                <input type="text"
                                    class="form-control @error('client_industry')
                                is-invalid
                            @enderror"
                                    name="client_industry">
                                @error('client_industry')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Tech Stack</label>
                                <div class="row">
                                    @foreach ($techOptions as $tech)
                                        <div class="col-md-3">
                                            <label>
                                                <input type="checkbox" name="tech_stack[]" value="{{ $tech }}">
                                                <img src="https://skillicons.dev/icons?i={{ $tech }}"
                                                    width="30" alt="{{ $tech }}">
                                                {{ ucfirst($tech) }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>

                                @error('tech_stack')
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
