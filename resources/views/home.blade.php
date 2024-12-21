<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LibraryNest - Home</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/phosphor-icons"></script>
    <!-- Font Awesome 6 Free -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #6366f1;
            --secondary-color: #10b981;
            --background-color: #f8fafc;
            --text-primary: #1f2937;
            --text-secondary: #6b7280;
            --card-bg: #ffffff;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--background-color);
            color: var(--text-primary);
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg,
                    rgba(99, 102, 241, 0.1) 0%,
                    rgba(16, 185, 129, 0.1) 100%);
            padding: 100px 0;
            text-align: center;
        }

        .hero-title {
            font-weight: 900;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Book Card Styling */
        .book-card {
            transition: all 0.4s ease;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
        }

        .book-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
        }

        .book-card-img {
            height: 350px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .book-card:hover .book-card-img {
            transform: scale(1.1);
        }

        .book-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: var(--primary-color);
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
        }

        /* Categories Section */
        .category-card {
            background-color: white;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .category-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .category-icon {
            font-size: 3rem;
            margin-bottom: 15px;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .hero-section {
                padding: 50px 0;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">LibraryNest</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Catalog</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">My Loans</a></li>
                    <li class="nav-item">
                        {{-- <a class="btn btn-primary ms-3" href="#">Login</a> --}}
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle" type="button" id="userMenu" data-bs-toggle="dropdown">
                                <img src="https://via.placeholder.com/40" class="rounded-circle me-2" alt="Profile">
                                {{ Auth::user()->name }}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="userMenu">
                                <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <div class="dropdown-item">
                                        <form action="{{ route('do.logout') }}" method="POST">
                                            @csrf
                                            <button class="btn btn-link text-danger text-decoration-none">Logout</button>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
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
    <section class="hero-section">
        <div class="container">
            <h1 class="hero-title display-4 mb-4">Discover Your Next Great Read</h1>
            <p class="lead text-muted mb-5">
                Explore thousands of books across multiple genres.
                Borrow, read, and expand your knowledge.
            </p>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search books, authors, genres...">
                        <button class="btn btn-primary" type="button">
                            <i class="ph-magnifying-glass"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Books Section -->
    <section class="py-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Featured Books</h2>
                <a href="#" class="btn btn-outline-primary">View All</a>
            </div>
            <div class="row g-4">
                <!-- Book Card Template -->
                @foreach ($data as $item)
                    <div class="col-md-3 col-sm-6">
                        <div class="card book-card position-relative">
                            <span class="book-badge">New</span>
                            {{-- <img src="{{ asset('storage/' . $item->cover) }}" class="card-img-top book-card-img"
                                alt="Book Cover"> Real image --}}
                            <img src="{{ $item->cover }}" class="card-img-top book-card-img"
                                alt="Book Cover">
                            <div class="card-body">
                                <h5 class="card-title">{{ Str::limit($item->title, 20) }}</h5>
                                <div class="book-details">
                                    <p class="card-text text-muted">
                                        <strong>Author:</strong> {{ $item->author }}
                                    </p>
                                    <p class="card-text text-muted">
                                        <strong>Genre:</strong> {{ $item->category->name }}
                                    </p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="text-success">
                                        <i class="fas fa-check-circle"></i> Available
                                    </span>
                                    <button class="btn btn-sm btn-primary">
                                        <i class="fas fa-book-open"></i> Borrow
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $data->links() }}
                <!-- Repeat for other books -->
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4 bg-white">
        <div class="container text-center">
            <p class="text-muted mb-0">© 2023 LibraryNest. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
