@extends('layouts.app')

@section('title', 'Edit About')

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
                    <div class="breadcrumb-item"><a href="#">Forms Edit</a></div>
                    <div class="breadcrumb-item">Blog</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Blog</h2>
                <div class="card">
                    <form action="{{ route('blog.update', $blog) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
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
                                    name="title" value="{{ $blog->title }}">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Thumbnail</label>

                                {{-- Tampilkan foto lama jika ada --}}
                                @if ($blog->thumbnail)
                                    <div class="mb-3">
                                        <img id="preview-image"
                                            src="{{ asset('images_uploads/thumbnail/' . $blog->thumbnail) }}"
                                            alt="Foto Lama" width="150">
                                    </div>
                                @else
                                    <div class="mb-3">
                                        <img id="preview-image" src="#" alt="Foto Baru" width="150"
                                            style="display: none;">
                                    </div>
                                @endif

                                <input type="file" class="form-control @error('thumbnail') is-invalid @enderror"
                                    name="thumbnail" id="thumbnail" onchange="previewFile()">

                                @error('thumbnail')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="content" value="{{ old('content') }}" class="form-control" cols="30" rows="10" "></textarea>
                            </div>

                            <div class="form-group">
                                <label>Publish</label>
                                <input type="date"
                                    class="form-control @error('publish_date')
                                is-invalid
                            @enderror"
                                    name="publish_date" value="{{ $blog->publish_date }}">
                                @error('publish_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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
    @push('scripts')
        <script>
            function previewFile() {
                var preview = document.getElementById('preview-image');
                var file = document.getElementById('thumbnail').files[0];
                var reader = new FileReader();

                reader.onloadend = function() {
                    preview.src = reader.result;
                    preview.style.display = 'block';
                }

                if (file) {
                    reader.readAsDataURL(file);
                }
            }
        </script>
    @endpush
@endpush
