<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Reservasi - Perpustakaan Digital</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        /* Style yang sama seperti halaman sebelumnya */
        :root {
            --primary-color: #6a11cb;
            --secondary-color: #2575fc;
            --bg-light: #f4f6f9;
            --text-dark: #2c3e50;
            --sidebar-width: 280px;
        }

        /* ... (gunakan style dari halaman sebelumnya) ... */

        .timeline-item {
            border-left: 3px solid var(--primary-color);
            padding-left: 20px;
            margin-bottom: 20px;
            position: relative;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            width: 12px;
            height: 12px;
            background-color: var(--primary-color);
            left: -7px;
            top: 0;
            border-radius: 50%;
        }

        .card-detail {
            background-color: rgba(106, 17, 203, 0.05);
            border-left: 4px solid var(--primary-color);
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Gunakan sidebar yang sama seperti halaman sebelumnya -->
    </div>

    <!-- Konten Utama -->
    <main class="main-content">
        <div class="container-fluid">
            <!-- Header -->
            <div class="row mb-4 align-items-center">
                <div class="col">
                    <h1 class="h2 mb-2">Detail Reservasi</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Reservasi</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Reservasi</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-auto">
                    <a href="#" class="btn btn-outline-secondary me-2">
                        <i class="bi bi-arrow-left me-2"></i> Kembali
                    </a>
                    <a href="#" class="btn btn-custom">
                        <i class="bi bi-pencil me-2"></i> Edit Reservasi
                    </a>
                </div>
            </div>

            <!-- Informasi Detail Reservasi -->
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="card-header bg-white">
                            <h5 class="mb-0">Informasi Reservasi</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="card card-detail p-3">
                                        <h6 class="text-muted mb-2">Nama Anggota</h6>
                                        <p class="mb-0">Maria Garcia</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card card-detail p-3">
                                        <h6 class="text-muted mb-2">Email</h6>
                                        <p class="mb-0">maria.garcia@email.com</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="card card-detail p-3">
                                        <h6 class="text-muted mb-2">Judul Buku</h6>
                                        <p class="mb-0">Filosofi Terbang</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card card-detail p-3">
                                        <h6 class="text-muted mb-2">Penulis</h6>
                                        <p class="mb-0">Andrea Hirata</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card card-detail p-3">
                                        <h6 class="text-muted mb-2">Tanggal Reservasi</h6>
                                        <p class="mb-0">10 Oktober 2023</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card card-detail p-3">
                                        <h6 class="text-muted mb-2">Status</h6>
                                        <span class="badge bg-success-soft text-success">Aktif</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Riwayat Aktivitas -->
                    <div class="card">
                        <div class="card-header bg-white">
                            <h5 class="mb-0">Riwayat Aktivitas</h5>
                        </div>
                        <div class="card-body">
                            <div class="timeline-item">
                                <h6 class="mb-1">Reservasi Dibuat</h6>
                                <p class="text-muted mb-2">10 Oktober 2023 - 14:30 WIB</p>
                                <span class="badge bg-primary-soft text-primary">Baru</span>
                            </div>
                            <div class="timeline-item">
                                <h6 class="mb-1">Konfirmasi Reservasi</h6>
                                <p class="text-muted mb-2">11 Oktober 2023 - 09:15 WIB</p>
                                <span class="badge bg-success-soft text-success">Disetujui</span>
                            </div>
                            <div class="timeline-item">
                                <h6 class="mb-1">Perpanjangan Reservasi</h6>
                                <p class="text-muted mb-2">15 Oktober 2023 - 10:45 WIB</p>
                                <span class="badge bg-warning-soft text-warning">Menunggu</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Informasi Buku -->
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header bg-white">
                             <h5 class="mb-0">Informasi Buku</h5>
                        </div>
                        <div class="card-body text-center">
                            <img src="{{asset('assets/images/filosofi-terbang.jpg')}}" alt="Filosofi Terbang" class="img-fluid mb-3" style="max-height: 200px;">
                            <h6 class="text-muted mb-2">Judul Buku</h6>
                            <p class="mb-0">Filosofi Terbang</p>
                            <h6 class="text-muted mb-2">Penulis</h6>
                            <p class="mb-0">Andrea Hirata</p>
                            <h6 class="text-muted mb-2">Penerbit</h6>
                            <p class="mb-0">Gramedia</p>
                            <h6 class="text-muted mb-2">Tahun Terbit</h6>
                            <p class="mb-0">2006</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>