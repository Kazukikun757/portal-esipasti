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
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div class="position-sticky px-3">
                    <a href="/admin" class="sidebar-brand">MENU ADMIN SIPASTI</a>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?= strpos(current_url(), 'admin/menu') !== false ? 'active' : '' ?>" href="/admin/menu">
                                <i class="fas fa-bars fa-fw me-2"></i> Kelola Menu
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link bg-danger <?= strpos(current_url(), 'admin/menu') !== false ? 'active' : '' ?>" href="/logout">
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <main class="col-md-9 ms-sm-auto col-lg-10">
                <div class="top-navbar">
                    <h1 class="page-title"><?= $title ?? 'Dashboard' ?></h1>
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

    <?= $this->renderSection('scripts') ?>
</body>

</html>