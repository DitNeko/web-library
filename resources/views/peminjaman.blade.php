<x-app-layout>
    @section('title', 'Manajemen Peminjaman - Perpustakaan Digital')
    <link rel="stylesheet" href="{{ asset('css/AdminLoan.css') }}">
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
        <div class="container-fluid">
            <!-- Header -->
            <div class="row mb-4 align-items-center">
                <div class="col">
                    <h1 class="h2">Manajemen Peminjaman Buku</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Peminjaman</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-auto">
                    <a class="btn btn-primary" href="{{ route('create.loan') }}">
                        <i class="bi bi-plus-circle me-2"></i> Tambah Peminjaman
                    </a>
                </div>
            </div>

            <!-- Statistik Peminjaman -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card card-stats">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="card-title text-muted mb-2">Total Peminjaman</h6>
                                    <h3 class="card-text">{{ Number::abbreviate($data->count()) }}</h3>
                                </div>
                                <div class="bg-primary text-white rounded-circle p-3">
                                    <i class="bi bi-book"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-stats">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="card-title text-muted mb-2">Sedang Dipinjam</h6>
                                    <h3 class="card-text">{{ $data->where('status', 'Dipinjam')->count() }}</h3>
                                </div>
                                <div class="bg-warning text-white rounded-circle p-3">
                                    <i class="bi bi-arrow-return-left"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-stats">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="card-title text-muted mb-2">Terlambat Kembali</h6>
                                    <h3 class="card-text">{{ $data->where('status', 'Terlambat')->count() }}</h3>
                                </div>
                                <div class="bg-danger text-white rounded-circle p-3">
                                    <i class="bi bi-exclamation-triangle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Daftar Peminjaman -->
            <div class="table-responsive">
                <table id="peminjamanTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Anggota</th>
                            <th>Judul Buku</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->book->title }}</td>
                            <td>{{ $item->borrow_date }}</td>
                            <td>{{ $item->return_date }}</td>
                            <td><span class="{{ $item->status == 'Terlambat' ? 'status-badge status-terlambat' : 'status-badge status-dipinjam' }}">{{ $item->status }}</span></td>
                            <td>
                                <div class="d-flex p-0 justify-content-center">
                                    <a href="{{ route('loan.edit',$item->id) }}" class="btn btn-warning btn-edit d-flex"><i class="bi bi-pencil"></i> Edit</a>
                                <form action="{{ route('loan.return', $item->id) }}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-primary btn-return d-flex" onclick="confirmReturn(event, '{{ route('loan.return', $item->id) }}')"><i class="bi bi-arrow-return-right"></i> Dikembalikan</button>
                                </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        <!-- Tambahkan lebih banyak baris sesuai kebutuhan -->
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#peminjamanTable').DataTable();
        });
    </script>
        <script>
            function confirmReturn(event, route) {
                event.preventDefault();
        
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Apakah anda ingin mengembalikan buku ini?",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Kembalikan!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        event.target.closest('form').submit();
                    }
                });
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
</x-app-layout>