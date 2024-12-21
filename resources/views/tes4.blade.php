<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LibraryNest - Advanced Book Loan Management</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/phosphor-icons"></script>
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
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
        }

        /* Enhanced Card Design */
        .loan-card {
            border-radius: 15px;
            box-shadow: 0 12px 30px -10px rgba(0,0,0,0.1);
            transition: all 0.4s ease;
            overflow: hidden;
        }

        .loan-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px -15px rgba(0,0,0,0.2);
        }

        /* Status Badges */
        .status-badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.8rem;
        }

        .status-active {
            background-color: rgba(16, 185, 129, 0.15);
            color: #10b981;
        }

        .status-overdue {
            background-color: rgba(244, 63, 94, 0.15);
            color: #f43f5e;
        }

        .status-returned {
            background-color: rgba(59, 130, 246, 0.15);
            color: #3b82f6;
        }

        /* Advanced Search Styling */
        .advanced-search {
            background-color: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 10px 25px -5px rgba(0,0,0,0.1);
        }

        /* DataTables Custom */
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 5px 10px !important;
            margin: 0 3px;
            border-radius: 5px;
        }

        /* Responsive Design Enhancements */
        @media (max-width: 768px) {
            .responsive-stack {
                flex-direction: column;
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
                    <button class="btn btn-outline-primary me-3" data-bs-toggle="modal" data-bs-target="#newLoanModal">
                        <i class="ph-plus me-2"></i>New Loan
                    </button>
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown">
                            <img src="https://via.placeholder.com/40" class="rounded-circle me-2" alt="User">
                            John Doe
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="#">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container py-5">
        <!-- Quick Stats -->
        <div class="row mb-4">
            <div class="col-md-4 mb-3">
                <div class="card border-0 bg-white p-4 d-flex flex-row align-items-center">
                    <div class="me-4">
                        <i class="ph-book-open text-primary fs-2"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-2">Total Loans</h6>
                        <h3 class="mb-0">24</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card border-0 bg-white p-4 d-flex flex-row align-items-center">
                    <div class="me-4">
                        <i class="ph-clock text-warning fs-2"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-2">Active Loans</h6>
                        <h3 class="mb-0">7</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card border-0 bg-white p-4 d-flex flex-row align-items-center">
                    <div class="me-4">
                        <i class="ph-check-circle text-success fs-2"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-2">Returned Loans</h6>
                        <h3 class="mb-0">17</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Advanced Search & Filters -->
        <div class="advanced-search mb-4">
            <div class="row g-3">
                <div class="col-md-3">
                    <select class="form-select" id="statusFilter">
                        <option value="">All Statuses</option>
                        <option value="active">Active</option>
                        <option value="overdue">Overdue</option>
                        <option value="returned">Returned</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="date" class="form-control" placeholder="Borrow Date">
                </div>
                <div class="col-md-3">
                    <input type="date" class="form-control" placeholder="Return Date">
                </div>
                <div class="col-md-3">
                    <button class="btn btn-primary w-100">
                        <i class="ph-magnifying-glass me-2"></i>Search
                    </button>
                </div>
            </div>
        </div>

        <!-- Loan Table -->
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <table id="loanTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Book</th>
                            <th> Borrowed On</th>
                            <th>Return Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>The Great Gatsby</td>
                            <td>15 June 2023</td>
                            <td>15 July 2023</td>
                            <td><span class="status-badge status-active">Active</span></td>
                            <td>
                                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#loanDetailsModal">Details</button>
                                <button class="btn btn-primary">Extend</button>
                            </td>
                        </tr>
                        <tr>
                            <td>1984</td>
                            <td>10 June 2023</td>
                            <td>10 July 2023</td>
                            <td><span class="status-badge status-overdue">Overdue</span></td>
                            <td>
                                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#loanDetailsModal">Details</button>
                                <button class="btn btn-primary">Extend</button>
                            </td>
                        </tr>
                        <tr>
                            <td>To Kill a Mockingbird</td>
                            <td>20 May 2023</td>
                            <td>20 June 2023</td>
                            <td><span class="status-badge status-returned">Returned</span></td>
                            <td>
                                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#loanDetailsModal">Details</button>
                                <button class="btn btn-secondary" disabled>Extend</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- New Loan Modal -->
    <div class="modal fade" id="newLoanModal" tabindex="-1" aria-labelledby="newLoanModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newLoanModalLabel">New Book Loan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="bookTitle" class="form-label">Book Title</label>
                            <input type="text" class="form-control" id="bookTitle" required>
                        </div>
                        <div class="mb-3">
                            <label for="borrowDate" class="form-label">Borrow Date</label>
                            <input type="date" class="form-control" id="borrowDate" required>
                        </div>
                        <div class="mb-3">
                            <label for="returnDate" class="form-label">Return Date</label>
                            <input type="date" class="form-control" id="returnDate" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Add Loan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Loan Details Modal -->
    <div class="modal fade" id="loanDetailsModal" tabindex="-1" aria-labelledby="loanDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loanDetailsModalLabel">Loan Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>The Great Gatsby</h5>
                    <p><strong>Borrowed on:</strong> 15 June 2023</p>
                    <p><strong>Return Date:</strong> 15 July 2023</p>
                    <p><strong>Status:</strong> Active</p>
                    <h6>Loan History</h6>
                    <div class="timeline-item">
                        <p>Loan created on 15 June 2023</p>
                    </div>
                    <div class="timeline-item">
                        <p>Reminder sent on 10 July 2023</p>
                    </div>
 </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#loanTable').DataTable();
        });
    </script>
</body>
</html>