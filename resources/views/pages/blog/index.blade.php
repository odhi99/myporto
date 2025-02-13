@extends('layouts.app')

@section('title', 'Blog')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Blog</h1>
                <div class="section-header-button">
                    <a href="{{ route('blog.create') }}" class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Blog</a></div>
                    <div class="breadcrumb-item">All Blog</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">Blog</h2>
                <p class="section-lead">
                    You can manage all Blog, such as editing, deleting and more.
                </p>


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Posts</h4>
                            </div>
                            <div class="card-body">

                                <div class="float-right">
                                    <form method="GET" action="">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search by patient id"
                                                name="name">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>No</th>
                                            <th>Title</th>
                                            <th>Meta Description</th>
                                            {{-- <th>Tech Stack</th>
                                            <th>Code Snippets</th> --}}
                                            <th>Publish Date</th>
                                            <th>Thumbnail</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($blogs as $no => $data)
                                            <tr>
                                                <td>{{ $no + 1 }}</td>
                                                <td>{{ $data->title }}</td>
                                                <td>{{ $data->meta_description }}</td>
                                                {{-- <td>{{ is_array($data->tech_stack) ? implode(', ', $data->tech_stack) : '' }}
                                                </td> --}}
                                                {{-- <td>
                                                    @if (is_array($data->code_snippets))
                                                        <pre>{{ implode("\n", $data->code_snippets) }}</pre>
                                                    @endif
                                                </td> --}}
                                                <td>{{ $data->publish_date }}</td>
                                                <td>
                                                    <img src="{{ asset('images_uploads/thumbnail/' . $data->thumbnail) }}"
                                                        alt="" width="50">
                                                </td>
                                                <td>
                                                    <a href="{{ route('blog.edit', $data->id) }}"
                                                        class="btn btn-sm btn-info btn-icon">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{-- {{ $abouts->withQueryString()->links() }} --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
