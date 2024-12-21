<x-app-layout>
    @section('title', 'Edit Peminjaman - Perpustakaan Digital')
    <link rel="stylesheet" href="{{ asset('css/AdminEditLoan.css') }}">
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
                    <h1 class="h2">Edit Peminjaman</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="manajemen-peminjaman.html">Peminjaman</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Peminjaman</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- Form Edit Peminjaman -->
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('loan.update', $loan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="namaAnggota" class="form-label">Nama Anggota</label>
                            <input type="text" class="form-control" value="{{ $loan->name }}" name="name" id="namaAnggota" required>
                        </div>
                        <div class="mb-3">
                            <label for="judulBuku" class="form-label">Judul Buku</label>
                            <select class="form-select" id="judulBuku" name="book_id" required>
                                <option value="">Pilih Buku</option>
                                @foreach ($books as $item)
                                    <option value="{{ $item->id }}"{{ $item->id == $loan->book_id ? 'selected' : ''}}>{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tanggalPeminjaman" class="form-label">Tanggal Peminjaman</label>
                            <input type="date" class="form-control" value="{{ $loan->borrow_date }}" name="borrow_date" id="tanggalPeminjaman" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggalKembali" class="form-label">Tanggal Kembali</label>
                            <input type="date" class="form-control" value="{{ $loan->return_date }}" name="return_date" id="tanggalKembali" required>
                        </div>
                        <div class="mb-3">
                            <label for="statusPeminjaman" class="form-label">Status Peminjaman</label>
                            <select class="form-select" id="statusPeminjaman" name="status" required>
                                <option value="" disabled selected>Pilih Status</option>
                                <option value="Dipinjam">Dipinjam</option>
                                <option value="Terlambat">Terlambat</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="{{ route('book.loan') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>