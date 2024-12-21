<x-app-layout>
    @section('title', 'Manajemen Buku - Perpustakaan Digital')
    <link rel="stylesheet" href="{{ asset('css/AdminManagementBook.css') }}">
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
                <div class="col-md-6">
                    <h1 class="h2 mb-2">Manajemen Buku</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manajemen Buku</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('create.book') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-2"></i>Tambah Buku Baru
                    </a>
                </div>
            </div>

            <!-- Tabel Daftar Buku -->
            <div class="table-responsive">
                <table id="daftarBuku" class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>Penulis</th>
                            <th>ISBN</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $index => $book)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->isbn }}</td>
                            <td>{{ $book->category->name }}</td>
                            <td>
                                <div class="d-flex p-0 justify-content-center">
                                    <a href="{{ route('book.edit', $book->id) }}" class="btn btn-warning d-flex mx-1"><i class="bi bi-pencil"></i> Edit</a>
                                <form action="{{ route('book.delete', $book->id) }}" method="post" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger d-flex" onclick="confirmDelete(event, '{{ route('book.delete', $book->id) }}')"><i class="bi bi-trash"></i> Hapus</button>
                                </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
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
                $('#daftarBuku').DataTable();
            })
        </script>
        <script>
            function confirmDelete(event, route) {
                event.preventDefault();
        
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data buku akan dihapus permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!',
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

