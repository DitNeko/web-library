<x-app-layout>
    @section('title', 'Tambah Peminjaman - Perpustakaan Digital')
    <link rel="stylesheet" href="{{ asset('css/AdminAddLoan.css') }}">
    <!-- Konten Utama -->
    <main class="main-content">
        <div class="container-fluid">
            <!-- Header -->
            <div class="row mb-4 align-items-center">
                <div class="col">
                    <h1 class="h2">Tambah Peminjaman Baru</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('book.management') }}">Peminjaman</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Peminjaman</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- Form Tambah Peminjaman -->
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                <ul>
                                    <li>
                                        {{ $error }}
                                    </li>
                                </ul>
                            </div>
                        @endforeach
                    @endif
                    @if (session('success'))
                        <div class="alert alert-danger">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('add.loan') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="namaAnggota" class="form-label">Nama Siswa</label>
                            <input type="text" class="form-control" name="name" id="namaAnggota" required>
                        </div>
                        <div class="mb-3">
                            <label for="judulBuku" class="form-label">Kategori</label>
                            <select class="form-select" id="judulBuku" name="book_id" required>
                                <option value="">Pilih Buku</option>
                                @foreach ($books as $book)
                                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tanggalPeminjaman" class="form-label">Tanggal Peminjaman</label>
                            <input type="date" class="form-control" name="borrow_date" id="tanggalPeminjaman" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggalKembali" class="form-label">Tanggal Kembali</label>
                            <input type="date" class="form-control" name="return_date" id="tanggalKembali" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Simpan Peminjaman</button>
                            <a href="manajemen-peminjaman.html" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
