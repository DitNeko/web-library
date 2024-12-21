<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-logo">
        <img src="{{asset('assets/logo/book-stack.png')}}" alt="Logo">
        <h3>Perpustakaan</h3>
    </div>

    <nav>
        <ul class="nav flex-column">
            <li class ="nav-item">
                <a class="{{ Route::currentRouteName() == 'index.dashboard' ? 'nav-link active' : 'nav-link' }}" href="{{ route('index.dashboard') }}">
                    <i class="bi bi-grid-fill"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName() == 'book.management' ? 'nav-link active' : 'nav-link' }}" href="{{ route('book.management') }}">
                    <i class="bi bi-book"></i> Manajemen Buku
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName() == 'history' ? 'nav-link active' : 'nav-link' }}" href="{{ route('history') }}">
                    <i class="bi bi-clock-history"></i> History
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName() == 'book.loan' ? 'nav-link active' : 'nav-link' }}" href="{{ route('book.loan') }}">
                    <i class="bi bi-arrow-left-right"></i> Peminjaman
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-gear"></i> Pengaturan
                </a>
            </li>
        </ul>
        <div class="mt-auto text-center">
            <hr class="my-3">
            <form action="{{ route('do.logout') }}" method="post">
                @csrf
                <button class="nav-link text-danger">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </button>
            </form>
        </div>
    </nav>
</div>