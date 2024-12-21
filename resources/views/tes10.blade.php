<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Anggota - Perpustakaan Digital</title>
    
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

        .member-card {
            display: flex;
            align-items: center;
            background-color: white;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }

        .member-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-right: 15px;
            object-fit: cover;
        }

        .member-info {
            flex-grow: 1;
        }

        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
        }

        .status-aktif {
            background-color: rgba(40, 167, 69, 0.1);
            color: #28a745;
        }

        .status-nonaktif {
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
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manajemen-buku.html">
                        <i class="bi bi-book"></i> Manajemen Buku
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">
                        <i class="bi bi-people"></i> Anggota
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
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
                    <h1 class="h2 mb-2">Manajemen Anggota</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Anggota</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-auto">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahAnggotaModal">
                        <i class="bi bi-plus-circle me-2"></i>Tambah Anggota
                    </button>
                </div>
            </div>

            <!-- Statistik Anggota -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Anggota</h5>
                            <h2 class="card-text">782</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Anggota Aktif</h5>
                            <h2 class="card-text">650</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Anggota Non-Aktif</h5>
                            <h2 class="card-text">132</h2>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Daftar Anggota -->
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Anggota</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Anggota 1</td>
                            <td>anggota1@example.com</td>
                            <td><span class="status-badge status-aktif">Aktif</span></td>
                            <td>
                                <button class="btn btn-warning btn-edit"><i class="bi bi-pencil"></i> Edit</button>
                                <button class="btn btn-danger btn-delete"><i class="bi bi-trash"></i> Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Anggota 2</td>
                            <td>anggota2@example.com</td>
                            <td><span class="status-badge status-nonaktif">Non-Aktif</span></td>
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

    <!-- Modal Tambah Anggota -->
    <div class="modal fade" id="tambahAnggotaModal" tabindex="-1" aria-labelledby="tambahAnggotaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahAnggotaModalLabel">Tambah Anggota Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="namaAnggota" class="form-label">Nama Anggota</label>
                            <input type="text" class="form-control" id="namaAnggota" required>
                        </div>
                        <div class="mb-3">
                            <label for="emailAnggota" class="form-label">Email</label>
                            <input type="email" class="form-control" id="emailAnggota" required>
                        </div>
                        <div class="mb-3">
                            <label for="statusAnggota" class="form-label">Status</label>
                            <select class="form-select" id="statusAnggota" required>
                                <option value="aktif">Aktif</option>
                                <option value="nonaktif">Non-Aktif</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">Simpan Anggota</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>