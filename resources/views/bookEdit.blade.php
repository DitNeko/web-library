<x-app-layout>
    @section('title', 'Edit Buku')
    <link rel="stylesheet" href="{{ asset('css/AdminEditBook.css') }}">
    
        <!-- Konten Utama -->
        <main class="main-content">
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                </ul>
            @endif
            <div class="container-fluid">
                <!-- Header -->
                <div class="row mb-4 align-items-center">
                    <div class="col">
                        <h1 class="h2 mb-2">Edit Buku</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('index.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('book.management') }}">Manajemen Buku</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Buku</li>
                            </ol>
                        </nav>
                    </div>
                </div>
    
                <!-- Form Edit Buku -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-edit-buku">
                            <form action="{{ route('book.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="judul" class="form-label">Judul Buku</label>
                                        <input type="text" class="form-control" name="title" id="judul"
                                            value="{{ $book->title }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="penulis" class="form-label">Penulis</label>
                                        <input type="text" class="form-control" name="author" id="penulis"
                                            value="{{ $book->author }}">
                                    </div>
                                </div>
    
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="isbn" class="form-label">ISBN</label>
                                        <input type="text" class="form-control" name="isbn" id="isbn"
                                            value="{{ $book->isbn }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="kategori" class="form-label">Kategori</label>
                                        <select class="form-select" name="category_id" id="kategori">
                                            <option value="">Pilih Kategori</option>
                                            @foreach ($categories as $category)
                                                <option
                                                    value="{{ $category->id }}"{{ $category->id == $book->category_id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
    
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="description" placeholder="{{ $book->description }}" rows="3"></textarea>
                                </div>
    
                                <div class="mb-3">
                                    <label for="cover" class="form-label">Cover Buku</label>
                                    <input type="file" class="form-control" name="cover" id="cover" accept="image/*"
                                        onchange="previewImage(event)">
                                    <img id="coverPreview" class="preview-image"
                                        src="{{ asset('storage/' . $book->cover) }}" alt="Preview Cover"
                                        style="display:block;">
                                </div>
    
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    
        <script>
            function previewImage(event) {
                const preview = document.getElementById('coverPreview');
                const file = event.target.files[0];
                const reader = new FileReader();
    
                reader.onload = function() {
                    preview.src = reader.result;
                    preview.style.display = 'block';
                }
    
                if (file) {
                    reader.readAsDataURL(file);
                } else {
                    preview.src = 'https://via.placeholder.com/200';
                    preview.style.display = 'block';
                }
            }
        </script>
</x-app-layout>
