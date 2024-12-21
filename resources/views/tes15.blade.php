<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Reservasi - Perpustakaan Digital</title>
    
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

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .btn-custom {
            background-color: var(--primary-color);
            color: white;
            transition: background-color 0.3s;
        }

        .btn-custom:hover {
            background-color: var(--secondary-color);
        }

        .bg-primary-soft {
            background-color: rgba(106, 17, 203, 0.1);
        }

        .bg-success-soft {
            background-color: rgba(40, 167, 69, 0.1);
        }

        .bg-warning-soft {
            background-color: rgba(255, 193, 7, 0.1);
        }

        .text-primary {
            color: var(--primary-color) !important;
        }

        .text-success {
            color: #28a745 !important;
        }

        .text-warning {
            color: #ffc107 !important;
        }

        .dropdown-menu {
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .timeline {

position: relative;

padding-left: 30px;

}


.timeline-item {

position: relative;

padding-bottom: 20px;

}


.timeline-item:last-child {

padding-bottom: 0;

}


.timeline-item::before {

content: '';

position: absolute;

left: -30px;

top: 0;

width: 1px;

height : 100%;

background: #e9ecef;

}


.timeline-icon {
position: absolute;
left: -45px;
top: 0;
width: 30px;
height: 30px;
border-radius: 50%;
display: flex;
align-items: center;
justify-content: center;
font-size: 1.2rem;
}

.timeline-content {
margin-left: 10px;
}
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-logo">
            <img src="{{asset('assets/logo/book-stack.png')}}" alt="Logo">
            <h3>Perpustakaan</h3>
        </div>

        <nav>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-grid-fill"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-book"></i> Manajemen Buku
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-people"></i> Anggota
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">
                        <i class="bi bi-calendar-check"></i> Reservasi
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
                    <h1 class="h2 mb-2">Manajemen Reservasi Buku</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Reservasi</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-auto">
                    <a href="#" class="btn btn-custom">
                        <i class="bi bi-plus me-2"></i> Buat Reservasi Baru
                    </a>
                </div>
            </div>

            <!-- Statistik Ringkasan -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body d-flex align-items-center">
                            <div class="rounded-circle bg-primary-soft p-3 me-3">
                                <i class="bi bi-calendar-check text-primary fs-3"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-1">Total Reservasi</h6>
                                <h4 class="mb-0">45</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body d-flex align-items-center">
                            <div class="rounded-circle bg-success-soft p-3 me-3">
                                <i class="bi bi-check-circle text-success fs-3"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-1">Reservasi Disetujui</h6>
                                <h4 class="mb-0">30</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body d-flex align-items-center">
                            <div class="rounded-circle bg-warning-soft p-3 me-3">
                                <i class="bi bi-x-circle text-warning fs-3"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-1">Reservasi Ditolak</h6>
                                <h4 class="mb-0">15</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabel Reservasi -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Daftar Reservasi</h5>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Anggota</th>
                                    <th>Buku</th>
                                    <th>Tanggal Reservasi</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Maria Garcia</td>
                                    <td>Filosofi Terbang</td>
                                    <td>10-10-2023</td>
                                    <td>25-10-2023</td>
                                    <td>
                                        <span class="badge bg-warning-soft text-warning">Menunggu Persetujuan</span>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-custom btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Aksi
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#approvalModal">
                                                        <i class="bi bi-check-circle me-2 text-success"></i> Setujui
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#rejectModal">
                                                        <i class="bi bi-x-circle me-2 text-danger"></i> Tolak
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#detailReservasiModal">
                                                        <i class="bi bi-eye me-2 text-primary"></i> Lihat Detail
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                
                                <!-- Tambahkan baris lain dengan struktur serupa -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal Persetujuan -->
    <div class="modal fade" id="approvalModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Persetujuan Reservasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="alert bg-primary-soft text-primary d-flex align-items-center">
                        <i class="bi bi-info-circle me-3 fs-4"></i>
                        <div>
                            Anda yakin ingin menyetujui reservasi buku "Filosofi Terbang" untuk Maria Garcia?
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Catatan Tambahan (Opsional)</label>
                        <textarea class="form-control" rows="3" placeholder="Tambahkan catatan untuk anggota"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-custom">
                        <i class="bi bi-check-circle me-2"></i> Setujui
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Penolakan -->
    <div class="modal fade" id="rejectModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Penolakan Reservasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="alert bg-danger-soft text-danger d-flex align-items-center">
                        <i class="bi bi-exclamation-triangle me-3 fs-4"></i>
                        <div>
                            Anda yakin ingin menolak reservasi buku "Filosofi Terbang" untuk Maria Garcia?
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Alasan Penolakan</label>
                        <select class="form-select">
                            <option>Pilih Alasan Penolakan</option>
                            <option>Buku Tidak Tersedia</option>
                            <option>Melebihi Batas Reservasi</option>
                            <option>Sedang Dipinjam</option>
                            <option>Lainnya</option>
                        </select>
                    </div>

                    <div class="mb-3" id="alasanLainnya" style="display:none;">
                        <label class="form-label">Alasan Lainnya</label>
                        <textarea class="form-control" rows="3" placeholder="Jelaskan alasan penolakan"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger">
                        <i class="bi bi-x-circle me-2"></i> Tolak
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Lihat Detail Reservasi -->
<div class="modal fade" id="detailReservasiModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailReservasiModalLabel">Detail Reservasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Informasi Anggota -->
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Informasi Anggota</h6>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <img src="{{asset('assets/images/avatar.jpg')}}" class="rounded-circle me-3" width="60" height="60" alt="Avatar">
                                    <div>
                                        <h6 class="mb-1">Maria Garcia</h6>
                                        <p class="text-muted mb-0">maria.garcia@email.com</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <small class="text-muted">No. Anggota</small>
                                        <p class="mb-0">A2023-0045</p>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-muted">Kontak</small>
                                        <p class="mb-0">+62 812-3456-7890</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Buku -->
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Informasi Buku</h6>
                            </div>
                            <div class="card-body text-center">
                                <img src="{{asset('assets/images/filosofi-terbang.jpg')}}" class="img-fluid mb-3" style="max-height: 150px;" alt="Buku">
                                <h6 class="mb-1">Filosofi Terbang</h6>
                                <p class="text-muted mb-2">Andrea Hirata</p>
                                <div class="row">
                                    <div class="col-6">
                                        <small class="text-muted">ISBN</small>
                                        <p class="mb-0">978-602-03-2506-5</p>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-muted">Tahun Terbit</small>
                                        <p class="mb-0">2006</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Detail Reservasi -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Detail Reservasi</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <small class="text-muted">Tanggal Reservasi</small>
                                        <p class="mb-2">10 Oktober 2023</p>
                                    </div>
                                    <div class="col-md-4">
                                        <small class="text-muted">Tanggal Kembali</small>
                                        <p class="mb-2">25 Oktober 2023</p>
                                    </div>
                                    <div class="col-md-4">
                                        <small class="text-muted">Status</small>
                                        <p class="mb-2">
                                            <span class="badge bg-warning-soft text-warning">Menunggu Persetujuan</span>
                                        </p>
                                    </div>
                                </div>

                                <!-- Timeline Aktivitas -->
                                <hr class="my-3">
                                <h6 class="mb-3">Riwayat Aktivitas</h6>
                                <div class="timeline">
                                    <div class="timeline-item">
                                        <div class="timeline-icon bg-primary text-white">
                                            <i class="bi bi-calendar-check"></i>
                                        </div>
                                        <div class="timeline-content">
                                            <h6 class="mb-1">Reservasi Dibuat</h6>
                                            <p class="text-muted mb-0">10 Oktober 2023 - 14:30 WIB</p>
                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        <div class="timeline-icon bg-warning text-white">
                                            <i class="bi bi-hourglass-split"></i>
                                        </div>
                                        <div class="timeline-content">
                                            <h6 class="mb-1">Menunggu Konfirmasi</h6>
                                            <p class="text-muted mb-0">Sedang diproses oleh admin</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                <div class="dropdown">
                    <button class="btn btn-custom dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Aksi Lanjutan
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#approvalModal">
                                <i class="bi bi-check-circle me-2 text-success"></i> Setujui
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#rejectModal">
                                <i class="bi bi-x-circle me-2 text-danger"></i> Tolak
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Tambahkan script untuk menampilkan textarea alasan lainnya -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alasanSelect = document.querySelector('#rejectModal select');
            const alasanLainnya = document.getElementById('alasanLainnya');

            alasanSelect.addEventListener('change', function() {
                if (this.value === 'Lainnya') {
                    alasanLainnya.style.display = 'block';
                } else {
                    alasanLainnya.style.display = 'none';
                }
            });
        });
    </script>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>