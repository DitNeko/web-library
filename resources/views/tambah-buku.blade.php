<x-app-layout>
    @section('title', 'Tambah Buku - Perpustakaan Digital')
    <link rel="stylesheet" href="{{ asset('css/AdminAddBook.css') }}">
    <!-- Konten Utama -->
    <main class="main-content">
        @if (session('success'))
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                Swal.fire({
                    title: 'Sukses!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    timer: 3000,
                    showConfirmButton: false
                });
            </script>
        @endif

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
                    <h1 class="h2 mb-2">Tambah Buku Baru</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('book.management') }}">Manajemen Buku</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Buku</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- Form Tambah Buku -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-tambah-buku">
                        <form action="/tambah-buku" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="judul" class="form-label">Judul Buku</label>
                                    <input type="text" class="form-control" name="title" id="judul" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="penulis" class="form-label">Penulis</label>
                                    <input type="text" class="form-control" name="author" id="penulis" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="isbn" class="form-label">ISBN</label>
                                    <input type="text" class="form-control" name="isbn" id="isbn">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="kategori" class="form-label">Kategori</label>
                                    <select class="form-select" id="kategori" name="category_id" required>
                                        <option value="">Pilih Kategori</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="description" rows="3"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="cover" class="form-label">Cover Buku</label>
                                <input type="file" class="form-control" id="cover" name="cover" accept="image/*"
                                    onchange="previewImage(event)">
                                <img id="coverPreview" class="preview-image" src="#" alt="Preview Cover"
                                    style="display:none;">
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan Buku</button>
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
                preview.src = '#';
                preview.style.display = 'none';
            }
        }
    </script>
</x-app-layout>