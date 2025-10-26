<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin Panel' ?> - Portal Sipasti</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="/assets/css/admin_style.css">
    <?= $this->renderSection('styles') ?>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-2 d-md-block sidebar collapse" id="sidebar">
                <div class="position-sticky px-3">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <a href="/admin" class="sidebar-brand">MENU ADMIN SIPASTI</a>
                        <button class="btn btn-link text-dark d-md-none sidebar-close" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="/">
                                Beranda
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= strpos(current_url(), 'admin/menu') !== false ? 'active' : '' ?>"
                                href="/admin/menu">
                                Kelola Menu
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= strpos(current_url(), 'admin/add-account') !== false ? 'active' : '' ?>"
                                href="/admin/add-account">
                                Tambah Akun
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link bg-danger <?= strpos(current_url(), 'admin') !== false ? 'active' : '' ?>"
                                href="/logout">
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <main class="col-md-9 ms-sm-auto col-lg-10">
                <div class="top-navbar">
                    <div class="d-flex align-items-center gap-3">
                        <!-- Mobile Menu Toggle Button -->
                        <button class="btn btn-mobile-toggle d-md-none" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
                        <h1 class="page-title mb-0"><?= $title ?? 'Dashboard' ?></h1>
                    </div>
                </div>

                <div class="content-wrapper">
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

                    <?= $this->renderSection('content') ?>
                </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Mobile menu handling
        $(document).ready(function() {
            // Handle mobile menu toggle
            $('.btn-mobile-toggle').on('click', function() {
                $('#sidebar').toggleClass('show');
                // Add backdrop when mobile menu is open
                if ($('#sidebar').hasClass('show')) {
                    if ($('.sidebar-collapse-backdrop').length === 0) {
                        $('body').append('<div class="sidebar-collapse-backdrop"></div>');
                        $('.sidebar-collapse-backdrop').fadeIn(200);
                    }
                }
            });

            // Close sidebar when clicking outside
            $(document).on('click', '.sidebar-collapse-backdrop', function() {
                $('#sidebar').removeClass('show');
                $(this).fadeOut(200, function() {
                    $(this).remove();
                });
            });

            // Close sidebar when clicking close button
            $('.sidebar-close').on('click', function() {
                $('#sidebar').removeClass('show');
                $('.sidebar-collapse-backdrop').fadeOut(200, function() {
                    $(this).remove();
                });
            });

            // Close sidebar when clicking a nav link on mobile
            $(window).on('resize', function() {
                if ($(window).width() >= 768) {
                    $('#sidebar').removeClass('show');
                    $('.sidebar-collapse-backdrop').remove();
                }
            });
        });
    </script>

    <?= $this->renderSection('scripts') ?>
</body>

</html>