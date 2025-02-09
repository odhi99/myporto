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
                    <div class="breadcrumb-item">About</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit About</h2>
                <div class="card">
                    <form action="{{ route('about.update', $about) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>About</label>
                                <input type="text"
                                    class="form-control @error('about')
                                is-invalid
                            @enderror"
                                    name="about" value="{{ $about->about }}">
                                @error('about')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Foto</label>

                                {{-- Tampilkan foto lama jika ada --}}
                                @if ($about->foto)
                                    <div class="mb-3">
                                        <img src="{{ asset('images_uploads/' . $about->foto) }}" alt="Foto Lama"
                                            width="150">
                                    </div>
                                @endif

                                <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                    name="foto">

                                @error('foto')
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
@endpush
