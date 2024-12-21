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
        }

        .main-content {
            margin-left: var(--sidebar-width);
            padding: 20px;
        }

        .settings-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            padding: 20px;
        }

        .table thead {
            background-color: var(--primary-color);
            color: white;
        }

        .table tbody tr:hover {
            background-color: #f1f5ff;
        }

        .btn-primary {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, var(--secondary-color), var(--primary-color));
        }

        .stats-card {
            display: flex;
            justify-content: space-between;
            background-color: var(--primary-color);
            color: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .stats-card div {
            text-align: center;
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

            .stats-card {
                flex-direction: column;
                gap: 15px;
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
                    <a class="nav-link" href="manajemen-anggota.html">
                        <i class="bi bi-people"></i> Anggota
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="manajemen-peminjaman.html">
                        <i class="bi bi-arrow-left-right"></i> Peminjaman
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pengaturan.html">
                        <i class="bi bi-gear"></i> Pengaturan
                    </a>
                </li>
            </ul>
            <div class="mt-auto text-center">
                <hr class="my-3">
                <a href="login.html" class="nav-link text-danger">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container-fluid">
            <!-- Header -->
            <div class="row mb-4 align-items-center">
                <div class="col">
                    <h1 class="h2">Manajemen Peminjaman</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Peminjaman</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- Statistik Ringkas -->
            <div class="stats-card">
                <div>
                    <h3>150</h3>
                    <p>Total Peminjaman</p>
                </div>
                <div>
                    <h3>50</h3>
                    <p>Buku Dipinjam</p>
                </div>
                <div>
                    <h3>100</h3>
                    <p>Buku Kembali</p>
                </div>
            </div>

            <!-- Tabel Peminjaman -->
            <div class="settings-card">
                <h5><i class="bi bi-table me-2"></i>Data Peminjaman</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Peminjam</th>
                            <th>Judul Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Ahmad Fauzi</td>
                            <td>Pemrograman Web</td>
                            <td>2024-12-01</td>
                            <td>2024-12-14</td>
                            <td><span class="badge bg-success">Kembali</span></td>
                            <td>
                                <button class="btn btn-sm btn-primary me-2"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Siti Aminah</td>
                            <td>Database Dasar</td>
                            <td>2024-12-05</td>
                            <td>2024-12-19</td>
                            <td><span class="badge bg-warning">Dipinjam</span></td>
                            <td>
                                <button class="btn btn-sm btn-primary me-2"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-end">
                    <button class="btn btn-primary">Tambah Peminjaman</button>
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
