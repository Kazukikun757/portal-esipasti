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
        }

        .navbar-brand i {
            font-size: 2rem;
            background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.8);
            font-weight: 500;
            transition: all 0.3s;
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
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(139, 92, 246, 0.4);
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
                radial-gradient(circle at 20% 50%, rgba(139, 92, 236, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(236, 72, 153, 0.3) 0%, transparent 50%);
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
            margin: 0 auto;
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
            background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            font-size: 2.5rem;
            color: white;
        }

        .feature-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .feature-description {
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.6;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .feature-grid {
                grid-template-columns: 1fr;
            }

            .navbar {
                padding: 1rem;
            }

            .hero-section {
                padding: 5rem 1rem 2rem;
            }

            .floating-element {
                display: none;
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
                    SIPASTI
                </a>
                <div class="d-flex align-items-center gap-3">
                    <a href="#" class="nav-link">Home</a>
                    <a href="#features" class="nav-link">Fitur</a>
                    <a href="#about" class="nav-link">Tentang</a>
                    <a href="#faq" class="nav-link">FAQ</a>
                    <?php if (!session()->has('user_id')): ?>
                    <button class="btn btn-login" onclick="window.location.href='/login'">
                        <i class="fas fa-lock"></i> Masuk
                    </button>
                    <?php else: ?>
                    <button class="btn btn-login" onclick="window.location.href='/admin/menu'">
                        <i class="fas fa-user"></i> Dashboard
                    </button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

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
                One-click for <span class="hero-title-highlight">Asset Defense</span>
            </h1>
            <p class="hero-description">
                Dive into the art assets, where innovative blockchain technology meets financial expertise
            </p>
            <div class="hero-buttons">
                <button class="btn btn-primary-glow" onclick="window.location.href='/app'">
                    Buka Aplikasi <i class="fas fa-arrow-right ms-2"></i>
                </button>
                <button class="btn btn-outline-white" onclick="document.getElementById('features').scrollIntoView({behavior: 'smooth'})">
                    Pelajari Lebih Lanjut
                </button>
            </div>
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
                        <div class="feature-card">
                            <div class="feature-icon">
                                <img src="<?= $menu['icon'] ?>" alt="<?= $menu['name'] ?>" style="width: 80px; height: 80px; object-fit: contain;">
                            </div>
                            <h3 class="feature-title"><?= $menu['name'] ?></h3>
                            <p class="feature-description">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore.
                            </p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <!-- Default Features -->
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-file-invoice"></i>
                        </div>
                        <h3 class="feature-title">Temuan & Tindaklanjut</h3>
                        <p class="feature-description">
                            Sistem pencatatan dan pengelolaan temuan audit serta tindak lanjutnya
                        </p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <h3 class="feature-title">e-Pengawasan</h3>
                        <p class="feature-description">
                            Platform pengawasan digital yang terintegrasi dan real-time
                        </p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <h3 class="feature-title">e-Penugasan</h3>
                        <p class="feature-description">
                            Manajemen penugasan dan monitoring pelaksanaan tugas
                        </p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h3 class="feature-title">Jaminan Mutu & Konsultasi</h3>
                        <p class="feature-description">
                            Layanan konsultasi dan jaminan mutu yang profesional
                        </p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="feature-title">Manajemen Tim</h3>
                        <p class="feature-description">
                            Koordinasi dan kolaborasi tim yang efektif
                        </p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <h3 class="feature-title">Perpustakaan Digital</h3>
                        <p class="feature-description">
                            Akses dokumen dan referensi yang komprehensif
                        </p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
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
            if (window.scrollY > 50) {
                navbar.style.background = 'rgba(26, 11, 46, 0.95)';
            } else {
                navbar.style.background = 'rgba(26, 11, 46, 0.8)';
            }
        });
    </script>
</body>

</html>
