<x-app-layout>
    @yield('title', 'Detail Buku - Perpustakaan Digital')
    <link rel="stylesheet" href="{{ asset('css/AdminDetailBook.css') }}">
        <!-- Konten Utama -->
    <main class="main-content">
        <div class="container-fluid">
            <!-- Header -->
            <div class="row mb-4 align-items-center">
                <div class="col">
                    <h1 class="h2 mb-2">Detail Buku</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('book.management') }}">Manajemen Buku</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Buku</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-auto">
                    <a href="{{ route('index.dashboard') }}" class="btn btn-outline-secondary me-2">
                        <i class="bi bi-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </div>

            <!-- Detail Buku -->
            <div class="row">
                <div class="col-md-4">
                    <div class="book-detail-card">
                        <img src="{{ asset('storage/'. $book->cover) }}" alt="Sampul Buku" class="book-cover w-100">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="book-info-section">
                        <h2>Laskar Pelangi</h2>
                        <div class="mb-3">
                            <span class="badge badge-custom me-2">Novel</span>
                            <span class="badge badge-custom">Tersedia</span>
                        </div>
                        <table class="table table-borderless">
                            <tr>
                                <th width="30%">Penulis</th>
                                <td>{{ $book->author }}</td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td>{{ $book->category->name }}</td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td>{{ $book->description }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>