<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LibraryNest - Advanced User Profile</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/phosphor-icons"></script>
    <!-- Chart.js for Data Visualization -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            line-height: 1.6;
        }

        /* Enhanced Profile Header */
        .profile-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            position: relative;
            overflow: hidden;
        }

        .profile-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.1);
        }

        .profile-avatar {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            border: 6px solid white;
            object-fit: cover;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        /* Advanced Card Design */
        .profile-card {
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            border: none;
        }

        .profile-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0,0,0,0.1);
        }

        /* Interactive Badges */
        .badge-interactive {
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .badge-interactive:hover {
            opacity: 0.8;
            transform: scale(1.05);
        }

        /* Advanced Tabs */
        .nav-tabs-custom {
            border-bottom: 3px solid #e9ecef;
        }

        .nav-tabs-custom .nav-link {
            color: var(--text-secondary);
            font-weight: 600;
            position: relative;
            transition: all 0.3s ease;
        }

        .nav-tabs-custom .nav-link.active {
            color: var(--primary-color);
        }

        .nav-tabs-custom .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: var(--primary-color);
        }

        /* Book Card Enhanced */
        .book-card-advanced {
            transition: all 0.4s ease;
            overflow: hidden;
            border-radius: 15px;
        }

        .book-card-advanced:hover {
            transform: scale(1.05);
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }

        .book-card-advanced .book-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
            overflow: hidden;
            width: 100%;
            height: 0;
            transition: 0.5s ease;
        }

        .book-card-advanced:hover .book-overlay {
            height: 100%;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .profile-header {
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">LibraryNest</a>
            <div class="navbar-nav ms-auto">
                <div class="d-flex align-items-center">
                    <a href="#" class="btn btn-outline-primary me-3">
                        <i class="ph-book-open me-2"></i>My Loans
                    </a>
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" id="userMenu" data-bs-toggle="dropdown">
                            <img src="https://via.placeholder.com/40" class="rounded-circle me-2" alt="Profile">
                            John Doe
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="userMenu">
                            <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="#">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Profile Header -->
    <div class="profile-header py-5">
        <div class="container">
            <div class="text-center">
                <img src="https://via.placeholder.com/180" class="profile-avatar mb-4" alt="Profile Picture">
                <h2 class="mb-2">John Doe</h2>
                <p class="lead mb-3">Passionate Reader | Book Enthusiast</p>
                <div class="d-flex justify-content-center gap-3">
                    <span class="badge bg-light text-dark badge-interactive">
                        <i class="ph-medal me-2"></i>Premium Member
                    </span>
                    <span class="badge bg-light text-dark badge-interactive">
                        <i class="ph-book me-2"></i>24 Books Read
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Content -->
    <div class="container py-5">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-4 mb-4">
                <!-- Reading Stats Card -->
                <div class="card profile-card mb-4">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Reading Statistics</h5>
                        <canvas id="readingStatsChart" height="250"></canvas>
                    </div>
                </div>

                <!-- Quick Actions Card -->
                <div class="card profile-card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Quick Actions</h5>
                        <div class="d-grid gap-3">
                            <button class="btn btn-outline-primary">
                                <i class="ph-plus me-2"></i>Add New Book
                            </button>
                            <button class="btn btn-outline-secondary">
                                <i class="ph-book-bookmark me-2"></i>Reading List
                            </button>
                            <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                                <i class="ph-trash me-2"></i>Delete Account
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-8">
                <!-- Tabs -->
                <ul class="nav nav-tabs nav-tabs-custom mb-4" id="profileTabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#currentLoans">Current Loans</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#readingHistory">Reading History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#recommendations">Recommendations</a>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content">
                    <!-- Current Loans Tab -->
                    <div class="tab-pane fade show active" id="currentLoans">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="card book-card-advanced position-relative">
                                    <img src="https://via.placeholder.com/200x300" class="card-img-top" alt="Book Cover">
                                    <div class="book-overlay d-flex align-items-center justify-content-center">
                                        <div class="text-white">
                                            <h5 class="card-title">The Great Gatsby</h5>
                                            <p class="card-text">Return Date: 15 July 2023</p>
                                            <button class="btn btn-light">Renew</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="card book-card-advanced position-relative">
                                    <img src="https://via.placeholder.com/200x300" class="card-img-top" alt="Book Cover">
                                    <div class="book-overlay d-flex align-items-center justify-content-center">
                                        <div class="text-white">
                                            <h5 class="card-title">1984</h5>
                                            <p class="card-text">Return Date: 10 July 2023</p>
                                            <button class="btn btn-light">Renew</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Reading History Tab -->
                    <div class="tab-pane fade" id="readingHistory">
                        <ul class="list-group">
                            <li class="list-group-item">To Kill a Mockingbird - Returned on 20 June 2023</li>
                            <li class="list-group-item">Pride and Prejudice - Returned on 15 May 2023</li>
                            <li class="list-group-item">The Catcher in the Rye - Returned on 10 April 2023</li>
                        </ul>
                    </div>

                    <!-- Recommendations Tab -->
                    <div class="tab-pane fade" id="recommendations">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="card book-card-advanced position-relative">
                                    <img src="https://via.placeholder.com/200x300" class="card-img-top" alt="Book Cover">
                                    <div class="book-overlay d-flex align-items-center justify-content-center">
                                        <div class="text-white">
                                            <h5 class="card-title">The Alchemist</h5>
                                            <p class="card-text">A journey of self-discovery and adventure.</p>
                                            <button class="btn btn-light">Borrow</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="card book-card-advanced position-relative">
                                    <img src="https://via.placeholder.com/200x300" class="card-img-top" alt="Book Cover">
                                    <div class="book-overlay d-flex align-items-center justify-content-center">
                                        <div class="text-white">
                                            <h5 class="card-title">The Hobbit</h5>
                                            <p class="card-text">An epic fantasy adventure awaits.</p>
                                            <button class="btn btn-light">Borrow</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Profile Modal -->
    <div class ="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="editEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="editEmail" value="johndoe@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="editPhone" class="form-label">Phone</label>
                            <input type="tel" class="form-control" id="editPhone" value="+1 (555) 123-4567" required>
                        </div>
                        <div class="mb-3">
                            <label for="editMembership" class="form-label">Membership Type</label>
                            <select class="form-select" id="editMembership">
                                <option value="premium" selected>Premium Member</option>
                                <option value="standard">Standard Member</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Account Modal -->
    <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteAccountModalLabel">Delete Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete your account? This action cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger">Delete Account</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="py-4 bg-white">
        <div class="container text-center">
            <p class="text-muted mb-0">© 2023 LibraryNest. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Chart.js for Reading Stats
        const ctx = document.getElementById('readingStatsChart').getContext('2d');
        const readingStatsChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'Books Read',
                    data: [3, 5, 2, 4, 6, 7, 1],
                    backgroundColor: 'rgba(99, 102, 241, 0.6)',
                    borderColor: 'rgba(99, 102, 241, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>