@extends('layouts.app')

@section('title', 'Tambah Blog')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Blog</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>Form Tambah Blog</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" value="{{ old('title') }}">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Meta Description</label>
                                <textarea name="meta_description" class="form-control">{{ old('meta_description') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="content" class="form-control" rows="10">{{ old('content') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Tech Stack (Pisahkan dengan koma)</label>
                                <input type="text" id="tech_stack_input" class="form-control"
                                    value="{{ old('tech_stack') }}" placeholder="Contoh: Laravel, Vue.js, Tailwind">
                                <input type="hidden" name="tech_stack" id="tech_stack_hidden">
                            </div>

                            <div class="form-group">
                                <label>Code Snippets (Gunakan format JSON)</label>
                                <textarea id="code_snippets_input" name="code_snippets" class="form-control" rows="5">{{ old('code_snippets', '[]') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Thumbnail</label>
                                <input type="file" class="form-control" name="thumbnail">
                            </div>

                            <div class="form-group">
                                <label>Publish Date</label>
                                <input type="date" class="form-control" name="publish_date"
                                    value="{{ old('publish_date') }}">
                            </div>
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

    <script>
        // Mengubah input tech_stack menjadi JSON array
        document.getElementById('tech_stack_input').addEventListener('input', function() {
            let techArray = this.value.split(',').map(item => item.trim());
            document.getElementById('tech_stack_hidden').value = JSON.stringify(techArray);
        });

        // Validasi code_snippets agar selalu format JSON yang benar
        document.getElementById('code_snippets_input').addEventListener('blur', function() {
            try {
                let parsed = JSON.parse(this.value);
                if (!Array.isArray(parsed)) throw new Error("Invalid JSON");
            } catch (error) {
                alert("Format JSON tidak valid.");
                this.value = "[]";
            }
        });
    </script>
@endsection
