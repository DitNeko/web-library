<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Peminjaman - Perpustakaan Digital</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #6a11cb;
            --secondary-color: #2575fc;
            --bg-light: #f4f6f9;
            --text-dark: #2c3e50;
            --sidebar-width: 280px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
        }

        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background-color: white;
            border-right: 1px solid #e9ecef;
            padding: 20px;
            overflow-y: auto;
            z-index: 1000;
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e9ecef;
        }

        .sidebar-logo img {
            width: 40px;
            margin-right: 15px;
        }

        .sidebar-logo h3 {
            margin: 0;
            font-weight: 600;
            color: var(--primary-color);
        }

        .nav-link {
            color: #6c757d;
            display: flex;
            align-items: center;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 10px;
            transition: all 0.3s ease;
        }

        .nav-link i {
            margin-right: 15px;
            font-size: 1.2rem;
        }

        .nav-link:hover, .nav-link.active {
            background-color: rgba(106, 17, 203, 0.1);
            color: var(--primary-color);
        }

        .main-content {
            margin-left: var(--sidebar-width);
            padding: 20px;
        }

        .table-responsive {
            margin-top: 20px;
        }

        .btn-edit, .btn-delete {
            margin-right: 5px;
        }

        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
        }

        .status-dipinjam {
            background-color: rgba(255, 193, 7, 0.1);
            color: #ffc107;
        }

        .status-dikembalikan {
            background-color: rgba(40, 167, 69, 0.1);
            color: #28a745;
        }

        .status-terlambat {
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: static;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-logo">
            <img src="https://via.placeholder.com/40" alt="Logo">
            <h3>Perpustakaan</h3>
        </div>

        <nav>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.html">
                        <i class="bi bi-grid-fill"></i> Dashboard
                    </a>
                <li class="nav-item">
                    <a class="nav-link" href="manajemen-buku.html">
                        <i class="bi bi-book"></i> Manajemen Buku
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manajemen-anggota.html">
                        <i class="bi bi-people"></i> Anggota
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">
                        <i class="bi bi-arrow-left-right"></i> Peminjaman
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-gear"></i> Pengaturan
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Konten Utama -->
    <main class="main-content">
        <div class="container-fluid">
            <!-- Header -->
            <div class="row mb-4 align-items-center">
                <div class="col">
                    <h1 class="h2">Manajemen Peminjaman Buku</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Peminjaman</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-auto">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahPeminjamanModal">
                        <i class="bi bi-plus-circle me-2"></i> Tambah Peminjaman
                    </button>
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
                                    <h3 class="card-text">250</h3>
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
                                    <h3 class="card-text">45</h3>
                                </div>
                                <div class="bg-warning text-white rounded-circle p-3">
                                    <i class="bi bi-arrow-right-left"></i>
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
                                    <h3 class="card-text">10</h3>
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
                        <tr>
                            <td>1</td>
                            <td>Anggota 1</td>
                            <td>Buku 1</td>
                            <td>2023-10-01</td>
                            <td>2023-10-15</td>
                            <td><span class=" status-badge status-dipinjam">Dipinjam</span></td>
                            <td>
                                <button class="btn btn-warning btn-edit"><i class="bi bi-pencil"></i> Edit</button>
                                <button class="btn btn-danger btn-delete"><i class="bi bi-trash"></i> Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Anggota 2</td>
                            <td>Buku 2</td>
                            <td>2023-10-05</td>
                            <td>2023-10-20</td>
                            <td><span class="status-badge status-dikembalikan">Dikembalikan</span></td>
                            <td>
                                <button class="btn btn-warning btn-edit"><i class="bi bi-pencil"></i> Edit</button>
                                <button class="btn btn-danger btn-delete"><i class="bi bi-trash"></i> Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Anggota 3</td>
                            <td>Buku 3</td>
                            <td>2023-09-25</td>
                            <td>2023-10-10</td>
                            <td><span class="status-badge status-terlambat">Terlambat</span></td>
                            <td>
                                <button class="btn btn-warning btn-edit"><i class="bi bi-pencil"></i> Edit</button>
                                <button class="btn btn-danger btn-delete"><i class="bi bi-trash"></i> Hapus</button>
                            </td>
                        </tr>
                        <!-- Tambahkan lebih banyak baris sesuai kebutuhan -->
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Modal Tambah Peminjaman -->
    <div class="modal fade" id="tambahPeminjamanModal" tabindex="-1" aria-labelledby="tambahPeminjamanModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahPeminjamanModalLabel">Tambah Peminjaman Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="namaAnggota" class="form-label">Nama Anggota</label>
                            <input type="text" class="form-control" id="namaAnggota" required>
                        </div>
                        <div class="mb-3">
                            <label for="judulBuku" class="form-label">Judul Buku</label>
                            <input type="text" class="form-control" id="judulBuku" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggalPeminjaman" class="form-label">Tanggal Peminjaman</label>
                            <input type="date" class="form-control" id="tanggalPeminjaman" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggalKembali" class="form-label">Tanggal Kembali</label>
                            <input type="date" class="form-control" id="tanggalKembali" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">Simpan Peminjaman</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
</body>
</html>