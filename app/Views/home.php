<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="description" content="Kimono - Photography Agency">
    <meta name="author" content="">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">

    <!-- Favicon and touch Icons -->
    <link href="../assets/img/favicon.png" rel="shortcut icon" type="image/png">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="../assets/img/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
    <link href="../assets/img/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
    <link href="../assets/img/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">

    <!-- Page Title -->
    <title>Portal SIPASTI</title>

    <!-- Styles Include -->
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/home-new.css">

</head>


<body class="theme-style--light">

    <!-- Preloader -->
    <div id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <img src="../assets/img/logo.png" alt="img">
            </div>
            <h2 class="preloader-text">Portal SIPASTI</h2>
        </div>
    </div>

    <!-- pointer start -->
    <div class="pointer bnz-pointer" id="bnz-pointer"></div>



    <!-- Main Header -->
    <!-- End Main Header -->

    <!-- Mobile Responsive Menu -->
    <div class="aside_info_wrapper" data-lenis-prevent>
        <div class="aside_logo logo">
            <a href="index.html" class="light_logo"><img src="../assets/img/logo.png" alt="logo"></a>
            <a href="index.html" class="dark_logo"><img src="../assets/img/logo.png" alt="logo"></a>
        </div>

        <div class="aside_info_inner">

            <h6>MENU</h6>
            <div class="insta-logo">
                <i class="bi bi-instagram"></i> PORTAL SIPASTI
            </div>
            <div class="wptb-instagram--gallery">
                <div class="wptb-item--inner d-flex align-items-center justify-content-center flex-wrap">
                    <div class="wptb-item">
                        <a href="/index.php/admin/menu" class="btn btn-admin-custom">
                            ADMIN
                        </a>
                    </div>
                </div>
            </div>


            <div class="wptb-icon-box1 style2">
                <div class="wptb-item--inner flex-start">
                    <div class="wptb-item--icon"><i class="bi bi-envelope"></i></div>
                    <div class="wptb-item--holder">
                        <p class="wptb-item--description"><a href="mailto:sipasti@gmail.com">sipasti@gmail.com</a></p>
                    </div>
                </div>
            </div>

            <div class="wptb-icon-box1 style2">
                <div class="wptb-item--inner flex-start">
                    <div class="wptb-item--icon"><i class="bi bi-geo-alt"></i></div>
                    <div class="wptb-item--holder">
                        <p class="wptb-item--description"><a href="contact-1.html">Jl. Tjilik Riwut KM. 1 No. 5</a></p>
                    </div>
                </div>
            </div>

            <div class="wptb-icon-box1 style2">
                <div class="wptb-item--inner flex-start">
                    <div class="wptb-item--icon"><i class="bi bi-envelope"></i></div>
                    <div class="wptb-item--holder">
                        <p class="wptb-item--description"><a href="tel:+98765432122811">(+987) 654 321 228 11</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Wrapper-->
    <main class="wrapper">
        <!-- Portal SIPASTI Main Section -->
        <section class="portal-main-container page-wrapper">
            <div class="pattern-layer"></div>
            <!-- Burger Menu Button -->
            <div class="portal-burger-menu">
                <div class="aside_open">
                    <div class="burger-icon">
                        <div class="burger-lines">
                            <div class="burger-line"></div>
                            <div class="burger-line"></div>
                            <div class="burger-line"></div>
                        </div>
                    </div>
                </div>
            </div>
                        
            <!-- Main Content -->
            <div class="portal-content-wrapper">
                <div class="portal-inner-container">
                    <!-- Portal Header Title (Desktop) - Tambahkan ini -->
                    <div class="portal-header-title d-none d-lg-block">
                        <h1>Portal SIPASTI</h1>
                    </div>
                    <!-- Mobile Title -->
                    <div class="portal-mobile-title d-block d-lg-none">
                        <h1>Portal SIPASTI</h1>
                    </div>
                    
                    <!-- Menu Grid -->
                    <div class="portal-menu-grid">
                        <?php if (isset($menus) && !empty($menus)): ?>
                            <?php foreach ($menus as $menu): ?>
                                <a href="<?= $menu['link'] ?>" class="portal-menu-item">
                                    <div class="portal-menu-icon">
                                        <img src="<?= $menu['icon'] ?>?v=<?= $cache_buster ?>" 
                                             alt="<?= $menu['name'] ?>">
                                    </div>
                                    <div class="portal-menu-text"><?= $menu['name'] ?></div>
                                </a>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <!-- Fallback jika tidak ada menu -->
                            <a href="#" class="portal-menu-item">
                                <div class="portal-menu-icon">
                                    <img src="../assets/img/icons/default.svg" alt="Default Icon">
                                </div>
                                <div class="portal-menu-text">Menu Tidak Tersedia</div>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        <section id="about-sipasti" class="container">
            <div class="container">
                <div class="wptb-heading">
                    <div class="wptb-item--inner text-center">
                        <h6 class="wptb-item--subtitle"><span>//</span> Tentang SiPasti</h6>
                        <h1 class="wptb-item--title">Sistem Informasi<span> </br> Pengawasan dan Tindak Lanjut</span>
                        </h1>
                        <p class="wptb-about--text-one mb-4 w-100 w-lg-75 mx-auto fs-20">Merupakan Sistem Informasi yang menunjang kinerja
                            pengawasan yang dilakukan oleh Para Auditor Inspektorat, serta merupakan sebuah sistem
                            tindak lanjut bagi OPD yang menjadi sasaran pengawasan/pemeriksaan.</p>
                    </div>
                </div>
            </div>
        </section>


    </main>

    <footer class="footer style1" style="background-color: #212121;">
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-inner"
                    style="display: flex; justify-content: space-between; align-items: center; width: 100%;">

                    <div class="copyright">
                        <p style="margin: 0;"><a href="https://themeforest.net/user/wpthemebooster">SIPASTI</a>
                            Sistem Informasi Pengawasan dan Tindak Lanjut</p>
                    </div>

                    <div class="social-box style-oval">
                        <ul>
                            <li><a href="https://www.facebook.com/" class="bi bi-facebook"></a></li>
                            <li><a href="https://www.instagram.com/" class="bi bi-instagram"></a></li>
                            <li><a href="https://www.linkedin.com/" class="bi bi-linkedin"></a></li>
                            <li><a href="https://www.behance.com/" class="bi bi-behance"></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </footer>

    <div class="totop">
        <a href="#"><i class="bi bi-chevron-up"></i></a>
    </div>


    <script>
        // Portal SIPASTI - Fixed Aside Menu Toggle
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM Loaded - Initializing menu...');
            
            // Get elements
            const burgerMenu = document.querySelector('.portal-burger-menu');
            const asideMenu = document.querySelector('.aside_info_wrapper');
            const closeBtn = document.querySelector('.aside_close');
            
            // Create overlay if it doesn't exist
            let overlay = document.querySelector('.aside-overlay');
            if (!overlay) {
                overlay = document.createElement('div');
                overlay.className = 'aside-overlay';
                document.body.appendChild(overlay);
            }
            
            // Debug: Check if elements exist
            console.log('Burger Menu:', burgerMenu);
            console.log('Aside Menu:', asideMenu);
            console.log('Close Button:', closeBtn);
            console.log('Overlay:', overlay);
            
            // Toggle menu function
            function toggleMenu() {
                console.log('Toggle menu clicked');
                
                if (asideMenu && overlay && burgerMenu) {
                    const isOpen = asideMenu.classList.contains('aside_info_open');
                    
                    if (isOpen) {
                        // Close menu
                        asideMenu.classList.remove('aside_info_open');
                        overlay.classList.remove('active');
                        burgerMenu.classList.remove('active');
                        document.body.classList.remove('menu-open');
                        console.log('Menu closed');
                    } else {
                        // Open menu
                        asideMenu.classList.add('aside_info_open');
                        overlay.classList.add('active');
                        burgerMenu.classList.add('active');
                        document.body.classList.add('menu-open');
                        console.log('Menu opened');
                        
                        // Debug: Log classes and styles
                        setTimeout(() => {
                            console.log('Aside classes:', asideMenu.className);
                            console.log('Aside right position:', window.getComputedStyle(asideMenu).right);
                            console.log('Aside z-index:', window.getComputedStyle(asideMenu).zIndex);
                            console.log('Aside display:', window.getComputedStyle(asideMenu).display);
                        }, 100);
                    }
                } else {
                    console.error('Missing elements:', {
                        asideMenu: !!asideMenu,
                        overlay: !!overlay,
                        burgerMenu: !!burgerMenu
                    });
                }
            }
            
            // Close menu function
            function closeMenu() {
                console.log('Close menu');
                if (asideMenu && overlay && burgerMenu) {
                    asideMenu.classList.remove('aside_info_open');
                    overlay.classList.remove('active');
                    burgerMenu.classList.remove('active');
                    document.body.classList.remove('menu-open');
                }
            }
            
            // Event Listeners
            if (burgerMenu) {
                burgerMenu.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    toggleMenu();
                });
            }
            
            if (closeBtn) {
                closeBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    closeMenu();
                });
            }
            
            if (overlay) {
                overlay.addEventListener('click', function() {
                    closeMenu();
                });
            }
            
            // Close on Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeMenu();
                }
            });
            
            // Prevent clicks inside aside from closing it
            if (asideMenu) {
                asideMenu.addEventListener('click', function(e) {
                    e.stopPropagation();
                });
            }
            
            console.log('Menu initialization complete');
        });
    </script>

    <script>
        document.addEventListener("mousemove", function(e) {
            const pattern = document.querySelector(".pattern-layer");
            const x = (e.clientX / window.innerWidth) * 30;
            const y = (e.clientY / window.innerHeight) * 30;
            pattern.style.backgroundPosition = `${x}px ${y}px`;
        });
    </script>


    <!-- Core JS -->
    <script src="../assets/js/jquery-3.6.0.min.js"></script>

    <!-- Framework -->
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- WOW Scroll Effect -->
    <script src="../plugins/wow/wow.min.js"></script>

    <!-- Swiper Slider -->
    <script src="../plugins/swiper/swiper-bundle.min.js"></script>
    <script src="../plugins/swiper/swiper-gl.min.js"></script>

    <!-- Odometer Counter -->
    <script src="../plugins/odometer/appear.js"></script>
    <script src="../plugins/odometer/odometer.js"></script>

    <!-- Projects -->
    <script src="../plugins/isotope/isotope.pkgd.min.js"></script>
    <script src="../plugins/isotope/imagesloaded.pkgd.min.js"></script>

    <script src="../plugins/isotope/tilt.jquery.js"></script>
    <script src="../plugins/isotope/isotope-init.js"></script>

    <!-- Fancybox -->
    <script src="../plugins/fancybox/jquery.fancybox.min.js"></script>

    <!-- Flatpickr -->
    <script src="../plugins/flatpickr/flatpickr.min.js"></script>

    <!-- Nice Select -->
    <script src="../plugins/nice-select/jquery.nice-select.min.js"></script>



    <!-- Cursor Effect -->
    <script src="../plugins/cursor-effect/cursor-effect.js"></script>

    <!-- Theme Custom JS -->
    <script src="../assets/js/theme.js"></script>

</body>

</html>