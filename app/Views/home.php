<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal SIPASTI - Sistem Informasi Pengawasan dan Tindak Lanjut</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #1a0b2e 0%, #4c1d95 100%);
            color: white;
            overflow-x: hidden;
        }

        /* Header Navigation */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(26, 11, 46, 0.8);
            backdrop-filter: blur(10px);
            z-index: 1000;
            padding: 1rem 2rem;
            border-bottom: 1px solid rgba(139, 92, 246, 0.2);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: white;
            text-decoration: none;
            font-weight: 700;
            font-size: 1.5rem;
            transition: all 0.3s;
        }

        .navbar-brand:hover {
            transform: scale(1.05);
        }

        .navbar-brand i {
            font-size: 2rem;
            background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .navbar-nav {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 1.5rem;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.8);
            font-weight: 500;
            transition: all 0.3s;
            text-decoration: none;
        }

        .nav-link:hover {
            color: #c084fc;
        }

        .btn-login {
            background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
            color: white;
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(139, 92, 246, 0.4);
        }

        /* Mobile Menu Button */
        .mobile-menu-btn {
            display: none;
            background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
            border: none;
            color: white;
            width: 45px;
            height: 45px;
            border-radius: 10px;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
        }

        .mobile-menu-btn:hover {
            transform: scale(1.1);
        }

        /* Mobile Menu Overlay */
        .mobile-menu-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            z-index: 9999;
            backdrop-filter: blur(5px);
        }

        .mobile-menu-overlay.active {
            display: block;
        }

        .mobile-menu {
            position: fixed;
            top: 0;
            right: -400px;
            width: 350px;
            height: 100vh;
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.95) 0%, rgba(236, 72, 153, 0.95) 100%);
            z-index: 10000;
            transition: right 0.3s ease;
            padding: 2rem;
            overflow-y: auto;
        }

        .mobile-menu.active {
            right: 0;
        }

        .mobile-menu-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid rgba(255, 255, 255, 0.2);
        }

        .mobile-menu-close {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .mobile-menu-close:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .mobile-nav {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .mobile-nav li {
            margin-bottom: 1rem;
        }

        .mobile-nav .nav-link {
            display: block;
            padding: 1rem;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            color: white;
            font-weight: 600;
            transition: all 0.3s;
        }

        .mobile-nav .nav-link:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateX(10px);
        }

        /* Hero Section */
        .hero-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            padding: 6rem 2rem 2rem;
            overflow: hidden;
        }

        .hero-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.3;
            background: 
                radial-gradient(circle at 20% 50%, rgb(184, 149, 255) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgb(255, 87, 171) 0%, transparent 50%);
            animation: float 20s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 1200px;
            margin: 100px;
        }

        .hero-badge {
            display: inline-block;
            background: rgba(139, 92, 246, 0.1);
            border: 1px solid rgba(139, 92, 246, 0.3);
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            margin-bottom: 2rem;
            color: #c084fc;
            font-weight: 500;
        }

        .hero-title {
            font-size: 4rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1.5rem;
        }

        .hero-title-highlight {
            background: linear-gradient(135deg, #ec4899 0%, #8b5cf6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-description {
            font-size: 1.25rem;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 2rem;
            max-width: 600px;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn-primary-glow {
            background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
            color: white;
            padding: 1rem 2rem;
            border-radius: 30px;
            border: none;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(139, 92, 246, 0.4);
        }

        .btn-primary-glow:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(139, 92, 246, 0.6);
        }

        .btn-outline-white {
            background: transparent;
            color: white;
            padding: 1rem 2rem;
            border-radius: 30px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s;
        }

        .btn-outline-white:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: white;
        }

        /* Floating Elements */
        .floating-element {
            position: absolute;
            border-radius: 20px;
            padding: 2rem;
            background: rgba(139, 92, 246, 0.1);
            border: 2px solid rgba(139, 92, 246, 0.3);
            backdrop-filter: blur(10px);
            animation: float 6s ease-in-out infinite;
        }

        .floating-left {
            top: 20%;
            left: 5%;
            animation-delay: 0s;
        }

        .floating-right {
            top: 30%;
            right: 5%;
            animation-delay: 2s;
        }

        /* Features Section */
        .features-section {
            padding: 6rem 2rem;
            position: relative;
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-title {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }

        .section-title-highlight {
            background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .section-subtitle {
            font-size: 1.25rem;
            color: rgba(255, 255, 255, 0.7);
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .feature-card {
            background: rgba(139, 92, 246, 0.1);
            border: 2px solid rgba(139, 92, 246, 0.2);
            border-radius: 20px;
            padding: 2rem;
            transition: all 0.3s;
            backdrop-filter: blur(10px);
            text-decoration: none;
            color: white;
            display: block;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            border-color: rgba(139, 92, 246, 0.5);
            box-shadow: 0 10px 40px rgba(139, 92, 246, 0.3);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            background: rgba(139, 92, 246, 0.2);
            border: 2px solid rgba(139, 92, 246, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            overflow: hidden;
        }

        .feature-icon img {
            width: 60px;
            height: 60px;
            object-fit: contain;
        }

        .feature-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            text-align: center;
        }

        .feature-description {
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.6;
            text-align: center;
        }

        /* ToTop Button Hover */
        #toTop:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(139, 92, 246, 0.6);
        }

        /* Social Media Icons Hover */
        footer a:hover {
            background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%) !important;
            border-color: #c084fc !important;
            color: white !important;
            transform: translateY(-3px);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar {
                padding: 1rem;
            }

            .navbar-brand {
                font-size: 1.2rem;
            }

            .mobile-menu-btn {
                display: flex !important;
            }

            .mobile-menu.active {
                width: 100%;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .feature-grid {
                grid-template-columns: 1fr;
            }

            .hero-section {
                padding: 5rem 1rem 2rem;
            }

            .floating-element {
                display: none;
            }

            #about h1 {
                font-size: 2rem !important;
            }

            #about p {
                font-size: 1rem !important;
            }

            footer > div > div {
                flex-direction: column;
                text-align: center;
            }

            footer > div > div > div:first-child {
                margin-bottom: 1rem;
            }

            .hero-buttons {
                flex-direction: column;
            }

            .btn-primary-glow,
            .btn-outline-white {
                width: 100%;
            }

            .mobile-menu {
                width: 0%;
            }

            .hero-content {
                margin: 50px !important;
            }

            .btn-login span {
                display: none;
            }

            .brand-text {
                display: none;
            }
        }

        @media (max-width: 576px) {
            .hero-title {
                font-size: 2rem !important;
            }

            .hero-description {
                font-size: 1rem !important;
            }

            .navbar-brand i {
                font-size: 1.5rem;
            }

            .navbar {
                padding: 0.75rem 1rem;
            }

            .feature-card {
                padding: 1.5rem;
            }

            .feature-icon {
                width: 60px;
                height: 60px;
            }

            .feature-icon img {
                width: 45px;
                height: 45px;
            }

            .section-title {
                font-size: 1.5rem !important;
            }

            .section-subtitle {
                font-size: 1rem !important;
            }
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center w-100">
                <a class="navbar-brand" href="/">
                    <i class="fas fa-file-alt"></i>
                    <span class="brand-text">SIPASTI</span>
                </a>
                
                <!-- Desktop Navigation -->
                <div class="d-none d-md-flex align-items-center gap-3">
                    <ul class="navbar-nav">
                        <li><a href="#" class="nav-link">Home</a></li>
                        <li><a href="#features" class="nav-link">Fitur</a></li>
                        <li><a href="#about" class="nav-link">Tentang</a></li>
                        <li><a href="#faq" class="nav-link">FAQ</a></li>
                    </ul>
                    <?php if (!session()->has('user_id')): ?>
                    <a href="/login" class="btn-login">
                        <i class="fas fa-lock"></i> <span>Masuk</span>
                    </a>
                    <?php else: ?>
                    <a href="/admin/menu" class="btn-login">
                        <i class="fas fa-user"></i> <span>Dashboard</span>
                    </a>
                    <?php endif; ?>
                </div>

                <!-- Mobile Menu Button -->
                <button class="mobile-menu-btn d-md-none" id="mobileMenuBtn">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu Overlay -->
    <div class="mobile-menu-overlay" id="mobileMenuOverlay"></div>

    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobileMenu">
        <div class="mobile-menu-header">
            <h2 style="margin: 0; color: white; font-weight: 800;">Menu</h2>
            <button class="mobile-menu-close" id="mobileMenuClose">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <ul class="mobile-nav">
            <li><a href="#" class="nav-link">Home</a></li>
            <li><a href="#features" class="nav-link">Fitur</a></li>
            <li><a href="#about" class="nav-link">Tentang</a></li>
            <li><a href="#faq" class="nav-link">FAQ</a></li>
            <li>
                <?php if (!session()->has('user_id')): ?>
                <a href="/login" class="nav-link">
                    <i class="fas fa-lock"></i> Masuk
                </a>
                <?php else: ?>
                <a href="/admin/menu" class="nav-link">
                    <i class="fas fa-user"></i> Dashboard
                </a>
                <?php endif; ?>
            </li>
        </ul>
    </div>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-background"></div>
        
        <!-- Floating Elements -->
        <div class="floating-element floating-left d-none d-lg-block">
            <div class="text-center">
                <div style="font-size: 2.5rem; margin-bottom: 0.5rem;">📊</div>
                <div style="font-weight: 700; font-size: 1.2rem;">Portal</div>
                <div style="font-size: 0.9rem; color: rgba(255,255,255,0.7);">SIPASTI</div>
            </div>
        </div>

        <div class="hero-content">
            <div class="hero-badge">
                <i class="fas fa-sparkles"></i> Portal Resmi SIPASTI
            </div>
            <h1 class="hero-title">
                Portal <span class="hero-title-highlight">Sipasti</span>
            </h1>
            <p class="hero-description">
                Sistem Informasi Pengawasan dan Tindak Lanjut
            </p>
            <!-- <div class="hero-buttons">
                <button class="btn btn-primary-glow" onclick="window.location.href='/app'">
                    Buka Aplikasi <i class="fas fa-arrow-right ms-2"></i>
                </button>
                <button class="btn btn-outline-white" onclick="document.getElementById('features').scrollIntoView({behavior: 'smooth'})">
                    Pelajari Lebih Lanjut
                </button>
            </div> -->
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">
                    <span class="section-title-highlight">Fitur Unggulan</span>
                </h2>
                <p class="section-subtitle">
                    Solusi lengkap untuk pengawasan dan akuntabilitas
                </p>
            </div>

            <div class="feature-grid">
                <?php if (isset($menus) && !empty($menus)): ?>
                    <?php foreach ($menus as $menu): ?>
                        <a href="<?= $menu['link'] ?>" class="feature-card">
                            <div class="feature-icon">
                                <img src="<?= $menu['icon'] ?>?v=<?= $cache_buster ?? time() ?>" alt="<?= $menu['name'] ?>">
                            </div>
                            <h3 class="feature-title"><?= $menu['name'] ?></h3>
                            <p class="feature-description">
                                Klik untuk mengakses layanan <?= strtolower($menu['name']) ?>
                            </p>
                        </a>
                    <?php endforeach; ?>
                <?php else: ?>
                    <!-- Default Features -->
                    <a href="#" class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-file-invoice" style="font-size: 2.5rem; color: #c084fc;"></i>
                        </div>
                        <h3 class="feature-title">Temuan & Tindaklanjut</h3>
                        <p class="feature-description">
                            Sistem pencatatan dan pengelolaan temuan audit serta tindak lanjutnya
                        </p>
                    </a>
                    <a href="#" class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-search" style="font-size: 2.5rem; color: #c084fc;"></i>
                        </div>
                        <h3 class="feature-title">e-Pengawasan</h3>
                        <p class="feature-description">
                            Platform pengawasan digital yang terintegrasi dan real-time
                        </p>
                    </a>
                    <a href="#" class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-tasks" style="font-size: 2.5rem; color: #c084fc;"></i>
                        </div>
                        <h3 class="feature-title">e-Penugasan</h3>
                        <p class="feature-description">
                            Manajemen penugasan dan monitoring pelaksanaan tugas
                        </p>
                    </a>
                    <a href="#" class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-handshake" style="font-size: 2.5rem; color: #c084fc;"></i>
                        </div>
                        <h3 class="feature-title">Jaminan Mutu & Konsultasi</h3>
                        <p class="feature-description">
                            Layanan konsultasi dan jaminan mutu yang profesional
                        </p>
                    </a>
                    <a href="#" class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-users" style="font-size: 2.5rem; color: #c084fc;"></i>
                        </div>
                        <h3 class="feature-title">Manajemen Tim</h3>
                        <p class="feature-description">
                            Koordinasi dan kolaborasi tim yang efektif
                        </p>
                    </a>
                    <a href="#" class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-book" style="font-size: 2.5rem; color: #c084fc;"></i>
                        </div>
                        <h3 class="feature-title">Perpustakaan Digital</h3>
                        <p class="feature-description">
                            Akses dokumen dan referensi yang komprehensif
                        </p>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" style="padding: 6rem 2rem; background: rgba(139, 92, 246, 0.05);">
        <div class="container" style="max-width: 1200px;">
            <div class="text-center" style="margin-bottom: 3rem;">
                <div style="color: #c084fc; font-weight: 600; margin-bottom: 1rem; text-transform: uppercase; letter-spacing: 2px;">
                    <span>//</span> Tentang SiPasti
                </div>
                <h1 style="font-size: 3rem; font-weight: 800; margin-bottom: 2rem;">
                    Sistem Informasi<span style="display: block; background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Pengawasan dan Tindak Lanjut</span>
                </h1>
                <p style="font-size: 1.25rem; color: rgba(255, 255, 255, 0.7); max-width: 800px; margin: 0 auto; line-height: 1.8;">
                    Merupakan Sistem Informasi yang menunjang kinerja pengawasan yang dilakukan oleh Para Auditor Inspektorat, serta merupakan sebuah sistem tindak lanjut bagi OPD yang menjadi sasaran pengawasan/pemeriksaan.
                </p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer style="background: rgba(26, 11, 46, 0.9); border-top: 1px solid rgba(139, 92, 246, 0.2); padding: 2rem 0;">
        <div class="container">
            <div style="display: flex; justify-content: space-between; align-items: center; width: 100%; flex-wrap: wrap; gap: 2rem;">
                <div>
                    <p style="margin: 0; color: rgba(255, 255, 255, 0.7);">
                        <a href="#" style="color: #c084fc; text-decoration: none; font-weight: 700;">SIPASTI</a> - 
                        Sistem Informasi Pengawasan dan Tindak Lanjut
                    </p>
                </div>
                <div style="display: flex; gap: 1rem;">
                    <a href="https://www.facebook.com/" style="width: 40px; height: 40px; border-radius: 50%; background: rgba(139, 92, 246, 0.2); border: 1px solid rgba(139, 92, 246, 0.3); display: flex; align-items: center; justify-content: center; color: #c084fc; text-decoration: none; transition: all 0.3s;">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://www.instagram.com/" style="width: 40px; height: 40px; border-radius: 50%; background: rgba(139, 92, 246, 0.2); border: 1px solid rgba(139, 92, 246, 0.3); display: flex; align-items: center; justify-content: center; color: #c084fc; text-decoration: none; transition: all 0.3s;">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.linkedin.com/" style="width: 40px; height: 40px; border-radius: 50%; background: rgba(139, 92, 246, 0.2); border: 1px solid rgba(139, 92, 246, 0.3); display: flex; align-items: center; justify-content: center; color: #c084fc; text-decoration: none; transition: all 0.3s;">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="https://www.behance.com/" style="width: 40px; height: 40px; border-radius: 50%; background: rgba(139, 92, 246, 0.2); border: 1px solid rgba(139, 92, 246, 0.3); display: flex; align-items: center; justify-content: center; color: #c084fc; text-decoration: none; transition: all 0.3s;">
                        <i class="fab fa-behance"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- ToTop Button -->
    <div id="toTop" style="position: fixed; bottom: 30px; right: 30px; width: 50px; height: 50px; background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; cursor: pointer; box-shadow: 0 4px 15px rgba(139, 92, 246, 0.4); transition: all 0.3s; z-index: 999; opacity: 0; visibility: hidden;">
        <i class="fas fa-chevron-up"></i>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
        const mobileMenuClose = document.getElementById('mobileMenuClose');

        function openMobileMenu() {
            mobileMenu.classList.add('active');
            mobileMenuOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeMobileMenu() {
            mobileMenu.classList.remove('active');
            mobileMenuOverlay.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', openMobileMenu);
        }

        if (mobileMenuClose) {
            mobileMenuClose.addEventListener('click', closeMobileMenu);
        }

        if (mobileMenuOverlay) {
            mobileMenuOverlay.addEventListener('click', closeMobileMenu);
        }

        // Close mobile menu when clicking on a link
        document.querySelectorAll('.mobile-nav .nav-link').forEach(link => {
            link.addEventListener('click', function() {
                closeMobileMenu();
            });
        });

        // Smooth scroll for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add scroll effect to navbar
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            const toTop = document.getElementById('toTop');
            
            if (window.scrollY > 50) {
                navbar.style.background = 'rgba(26, 11, 46, 0.95)';
            } else {
                navbar.style.background = 'rgba(26, 11, 46, 0.8)';
            }
            
            // Show/hide ToTop button
            if (toTop) {
                if (window.scrollY > 300) {
                    toTop.style.opacity = '1';
                    toTop.style.visibility = 'visible';
                } else {
                    toTop.style.opacity = '0';
                    toTop.style.visibility = 'hidden';
                }
            }
        });

        // ToTop button functionality
        document.getElementById('toTop').addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Social media icon hover effect
        document.querySelectorAll('footer a').forEach(link => {
            link.addEventListener('mouseenter', function() {
                this.style.background = 'linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%)';
                this.style.borderColor = '#c084fc';
                this.style.color = 'white';
                this.style.transform = 'translateY(-3px)';
            });
            link.addEventListener('mouseleave', function() {
                this.style.background = 'rgba(139, 92, 246, 0.2)';
                this.style.borderColor = 'rgba(139, 92, 246, 0.3)';
                this.style.color = '#c084fc';
                this.style.transform = 'translateY(0)';
            });
        });
    </script>
</body>

</html>
