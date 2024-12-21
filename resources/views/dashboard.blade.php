<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/AdminDashboard.css') }}">
    <!-- Konten Utama -->
    <main class="main-content">
        @if (session('success'))
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                Swal.fire({
                    title: 'Haii!',
                    text: '{{ session('success') }}',
                    icon: 'info',
                    timer: 3000,
                    showConfirmButton: false
                });
            </script>
        @endif
        <div class="container-fluid">
            <!-- Header -->
            <div class="row mb-4 align-items-center">
                <div class="col">
                    <h1 class="h2 mb-2">Dashboard Perpustakaan</h1>
                    <p class="text-muted">Selamat datang, Admin!</p>
                </div>
                <div class="col-auto quick-actions">
                    <a class="btn btn-primary" href="{{ route('create.book') }}">
                        <i class="bi bi-plus-circle me-2"></i>Tambah Buku
                    </a>
                </div>
            </div>

            <!-- Statistik Utama -->
            <div class="row">
                <div class="col-md-3">
                    <div class="card dashboard-card">
                        <div class="card-body d-flex align-items-center">
                            <div class="me-3">
                                <i class="bi bi-book stat-icon"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-2">Total Buku</h6>
                                <h4 class="mb-0">{{ Number::abbreviate($countBook) }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card dashboard-card">
                        <div class="card-body d-flex align-items-center">
                            <div class="me-3">
                                <i class="bi bi-arrow-return-left stat-icon"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-2">Pengembalian</h6>
                                <h4 class="mb-0">{{ $borrow->where('status', 'Dikembalikan')->count() }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card dashboard-card">
                        <div class="card-body d-flex align-items-center">
                            <div class="me-3">
                                <i class="bi bi-arrow-left-right stat-icon"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-2">Peminjaman</h6>
                                <h4 class="mb-0">{{ Number::abbreviate($borrow->whereIn('status', ['Dipinjam', 'Terlambat'])->count()) }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card dashboard-card">
                        <div class="card-body d-flex align-items-center">
                            <div class="me-3">
                                <i class="bi bi-gear stat-icon"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-2">Pengaturan</h6>
                                <h4 class="mb-0">Aktif</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grafik Peminjaman -->
            <div class="row mt-4">
                <div class="col">
                    <h3>Grafik Peminjaman</h3>
                    <div class="chart-container">
                        <canvas id="loanChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Tabel Peminjaman Terakhir -->
            <div class="row mt-4">
                <div class="col">
                    <h3>Peminjaman Terakhir</h3>
                    <div class="table-responsive">
                        <table id="peminjamanTerakhir" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Peminjam</th>
                                    <th>Judul Buku</th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Tanggal Kembali</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($borrow->whereIn('status', ['Dipinjam', 'Terlambat']) as $index => $item )
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->book->title }}</td>
                                    <td>{{ $item->borrow_date }}</td>
                                    <td>{{ $item->return_date }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Grafik Peminjaman Bulanan -->
            <div class="row mt-4">
                <div class="col">
                    <h3>Grafik Peminjaman Bulanan</h3>
                    <div class="chart-container">
                        <canvas id="monthlyLoanChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <h3>Daftar Buku Perpustakaan</h3>
                    <div class="table-responsive">
                        <table id="daftarBuku" class="table table-striped table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Judul Buku</th>
                                    <th>Penulis</th>
                                    <th>Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($BookData as $index => $data)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ $data->author }}</td>
                                    <td>{{ $data->category->name }}</td>
                                    <td>
                                        <a href="{{ route('show-book-detailed', $data->id) }}" class="btn btn-primary btn-sm">
                                            <i class="bi bi-eye me-2"></i>Lihat Detail
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
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
            $('#peminjamanTerakhir').DataTable();
            $('#daftarBuku').DataTable();
        })
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('loanChart').getContext('2d');
            const loanChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                    datasets: [{
                        label: 'Peminjaman',
                        data: [120, 150, 180, 200, 170, 220, 250],
                        borderColor: 'rgba(38, 198, 218, 1)',
                        backgroundColor: 'rgba(38, 198, 218, 0.2)',
                        borderWidth: 2,
                        fill: true,
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            const monthlyCtx = document.getElementById('monthlyLoanChart').getContext('2d');
            const monthlyLoanChart = new Chart(monthlyCtx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                    datasets: [{
                        label: 'Peminjaman Bulanan',
                        data: [300, 400, 350, 500, 450, 600, 700],
                        backgroundColor: 'rgba(106, 17, 203, 0.5)',
                        borderColor: 'rgba(106, 17, 203, 1)',
                        borderWidth: 1,
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</x-app-layout>
    