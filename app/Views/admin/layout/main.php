<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin Panel' ?> - Portal Sipasti</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- jQuery UI CSS -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <!-- Custom Shadcn-like CSS -->
    <style>
        body {
            background: #fafafa;
            font-family: 'Inter', sans-serif;
            color: #1f1f1f;
        }

        /* Sidebar */
        .sidebar {
            min-height: 100vh;
            background: #ffffff;
            /* putih bersih */
            border-right: 1px solid #e5e7eb;
            padding-top: 1rem;
        }

        .sidebar .nav-link {
            color: #374151;
            font-weight: 500;
            border-radius: 8px;
            margin: 4px 0;
            transition: all 0.2s ease-in-out;
            padding: 10px 14px;
        }

        .sidebar .nav-link:hover {
            background: #f3f4f6;
            color: #111827;
        }

        .sidebar .nav-link.active {
            background: linear-gradient(90deg, #d8b4fe, #fbcfe8);
            color: #111;
            font-weight: 600;
        }

        /* Main content */
        .main-content {
            padding: 24px;
            background-color: #fff;
            border-radius: 16px;
            margin: 20px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04);
        }

        /* Heading */
        h1.h2 {
            background: #000;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
        }

        /* Flash messages */
        .alert {
            border-radius: 12px;
            font-weight: 500;
        }

        /* Preview menu item */
        .menu-item-preview {
            background: linear-gradient(135deg, #d8b4fe, #fbcfe8);
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            color: #333;
            margin-bottom: 15px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
        }

        .menu-item-preview .menu-icon img {
            width: 50px;
            height: 50px;
            object-fit: contain;
            margin-bottom: 10px;
            filter: brightness(0.2);
        }

        /* Sortable placeholder */
        .sortable-placeholder {
            border: 2px dashed #e5e7eb;
            background-color: #f9fafb;
            height: 80px;
            border-radius: 8px;
            margin-bottom: 10px;
        }
    </style>


</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div class="position-sticky px-3">
                    <h4 class="fw-bold mb-3">Admin Panel</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?= strpos(current_url(), 'admin/menu') !== false ? 'active' : '' ?>" href="/admin/menu">
                                <i class="fas fa-bars me-2"></i> Kelola Menu
                            </a>
                        </li>
                        <!-- Tambahkan menu admin lainnya di sini -->
                    </ul>
                </div>
            </div>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="main-content">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-3 mb-3 border-bottom">
                        <h1 class="h2"><?= $title ?? 'Admin Panel' ?></h1>
                    </div>

                    <!-- Flash Messages -->
                    <?php if (session()->has('message')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= session('message') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->has('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= session('error') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <!-- Content -->
                    <?= $this->renderSection('content') ?>
                </div>
            </main>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom Admin JS -->
    <?= $this->renderSection('scripts') ?>
</body>

</html>