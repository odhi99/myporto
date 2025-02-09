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
                    <form action="{{ route('project.update', $project) }}" method="POST" enctype="multipart/form-data">
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
                                    name="title" value="{{ $project->title }}">
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
                                    name="slug" value="{{ $project->slug }}">
                                @error('slug')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <input type="text"
                                    class="form-control @error('description')
                                is-invalid
                            @enderror"
                                    name="description" value="{{ $project->description }}">
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Images</label>
                                {{-- Tampilkan foto lama jika ada --}}
                                @if ($project->images)
                                    <div class="mb-3">
                                        <img src="{{ asset('images_uploads/projek/' . $project->images) }}"
                                            alt="images Lama" width="150">
                                    </div>
                                @endif

                                <input type="file" class="form-control @error('images') is-invalid @enderror"
                                    name="images">

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
                                    name="client_name" value="{{ $project->client_name }}">
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
                                    name="client_industry" value="{{ $project->client_industry }}">
                                @error('client_industry')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Tech Stack (Pilih Beberapa)</label>
                                <div class="row">
                                    @foreach ($techOptions as $tech)
                                        <div class="col-md-3">
                                            <label>
                                                <input type="checkbox" name="tech_stack[]" value="{{ $tech }}"
                                                    @if (is_array($project->tech_stack) && in_array($tech, $project->tech_stack)) checked
                                                @elseif (is_string($project->tech_stack))
                                                    @php
                                                        // Jika tech_stack adalah string JSON, decode dulu
                                                        $techStack = json_decode($project->tech_stack, true);
                                                    @endphp
                                                    @if (is_array($techStack) && in_array($tech, $techStack))
                                                        checked @endif
                                                    @endif>
                                                <img src="https://skillicons.dev/icons?i={{ $tech }}"
                                                    width="30" alt="{{ $tech }}">
                                                {{ ucfirst($tech) }}
                                            </label>
                                        </div>
                                    @endforeach
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
@endpush
