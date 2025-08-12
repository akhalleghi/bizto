<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>بیزتو - راهکارهای هوشمند کسب و کار</title>

    <!-- Bootstrap 5 RTL CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Google Fonts - Iranian Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        /* Custom Styles for Bizto */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Vazirmatn', sans-serif;
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Header Styles */
        .navbar-brand {
            font-size: 1.8rem !important;
        }

        .btn-outline-light:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.5);
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="rgba(255,255,255,0.1)"><polygon points="1000,100 1000,0 0,100"/></svg>');
            background-size: cover;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .floating-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 3rem;
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        /* Service Cards */
        .service-card {
            background: white;
            padding: 2.5rem 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
            position: relative;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .service-card.featured {
            border: 2px solid #ffc107;
            position: relative;
        }

        .featured-badge {
            position: absolute;
            top: -10px;
            right: 20px;
            background: #ffc107;
            color: #000;
            padding: 5px 15px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: bold;
        }

        .service-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            font-size: 2rem;
            color: white;
        }

        /* Instagram Features */
        .feature-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 2rem;
            padding: 1rem;
            border-radius: 10px;
            transition: background-color 0.3s ease;
        }

        .feature-item:hover {
            background-color: rgba(102, 126, 234, 0.05);
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 1.5rem;
            flex-shrink: 0;
            color: white;
            font-size: 1.5rem;
        }

        /* Phone Mockup */
        .phone-mockup {
            background: #000;
            border-radius: 25px;
            padding: 20px;
            width: 300px;
            height: 600px;
            margin: 0 auto;
            position: relative;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .phone-content {
            background: #fff;
            border-radius: 15px;
            height: 100%;
            padding: 1rem;
            overflow: hidden;
        }

        .post-header {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .profile-pic {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            margin-left: 10px;
        }

        .username {
            font-weight: bold;
            font-size: 0.9rem;
        }

        .location {
            font-size: 0.8rem;
            color: #666;
        }

        .post-image {
            width: 100%;
            height: 250px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            border-radius: 10px;
            margin-bottom: 1rem;
            position: relative;
        }

        .post-actions {
            display: flex;
            gap: 15px;
            margin-bottom: 1rem;
            font-size: 1.2rem;
        }

        .post-actions i {
            color: #333;
            cursor: pointer;
        }

        .post-caption {
            font-size: 0.9rem;
            color: #333;
            line-height: 1.4;
        }

        /* Feature Cards */
        .feature-card {
            background: white;
            padding: 2rem 1.5rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-icon-small {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            color: white;
            font-size: 1.5rem;
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="rgba(255,255,255,0.1)"><polygon points="0,0 1000,100 0,100"/></svg>');
            background-size: cover;
        }

        .cta-section .container {
            position: relative;
            z-index: 2;
        }

        /* Footer */
        footer {
            background: #1a1a1a !important;
        }

        footer a:hover {
            color: #ffc107 !important;
            transition: color 0.3s ease;
        }

        .social-links a {
            font-size: 1.5rem;
            transition: transform 0.3s ease;
        }

        .social-links a:hover {
            transform: translateY(-3px);
        }

        /* Modal Styles */
        .modal-content {
            border-radius: 15px;
            border: none;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            border-radius: 10px;
            border: 1px solid #ddd;
            padding: 12px 15px;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .service-card,
        .feature-card {
            animation: fadeInUp 0.6s ease-out;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-section {
                text-align: center;
            }

            .phone-mockup {
                width: 250px;
                height: 500px;
            }

            .post-image {
                height: 200px;
            }

            .feature-item {
                text-align: center;
                flex-direction: column;
            }

            .feature-icon {
                margin: 0 auto 1rem auto;
            }

            .service-card {
                margin-bottom: 2rem;
            }
        }

        /* RTL Specific Styles */
        [dir="rtl"] .feature-icon {
            margin-right: 1.5rem;
            margin-left: 0;
        }

        [dir="rtl"] .profile-pic {
            margin-right: 10px;
            margin-left: 0;
        }

        [dir="rtl"] .post-actions {
            direction: ltr;
        }

        /* Improved Link Visibility */
        footer a.text-light-emphasis {
            color: #e9ecef !important;
        }

        footer a.text-light-emphasis:hover {
            color: #ffc107 !important;
        }

        /* Button Enhancements */
        .btn {
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-warning {
            background: linear-gradient(135deg, #ffc107, #ff8c00);
            border: none;
            color: #000 !important;
        }

        .btn-warning:hover {
            background: linear-gradient(135deg, #ff8c00, #ffc107);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 193, 7, 0.4);
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #764ba2, #667eea);
            transform: translateY(-2px);
        }

        /* Loading Animation for Buttons */
        .btn:active {
            transform: translateY(0);
        }
    </style>
</head>
<body>
<!-- Header -->
<header class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3" href="{{ url('/') }}">
                <i class="fas fa-rocket text-warning me-2"></i>
                بیزتو
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#services">خدمات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">ویژگی‌ها</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">تماس</a>
                    </li>
                </ul>

                <div class="d-flex gap-2">
                    <button class="btn btn-outline-light btn-sm" data-bs-toggle="modal" data-bs-target="#loginModal">
                        <i class="fas fa-sign-in-alt me-1"></i>
                        ورود به پنل
                    </button>
                    <button class="btn btn-warning btn-sm text-dark fw-bold" data-bs-toggle="modal" data-bs-target="#registerModal">
                        <i class="fas fa-user-plus me-1"></i>
                        ثبت نام
                    </button>
                </div>
            </div>
        </div>
    </nav>
</header>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center min-vh-100 py-5">
            <div class="col-lg-6">
                <div class="hero-content">
                    <h1 class="display-4 fw-bold text-white mb-4">
                        کسب و کارتان را با
                        <span class="text-warning">هوش مصنوعی</span>
                        به آینده ببرید
                    </h1>
                    <p class="lead text-light mb-4">
                        بیزتو با استفاده از آخرین تکنولوژی‌های هوش مصنوعی، به شما کمک می‌کند تا تبلیغات هوشمندتری داشته باشید و مشتریان بیشتری جذب کنید.
                    </p>
                    <div class="d-flex gap-3 flex-wrap">
                        <button class="btn btn-warning btn-lg text-dark fw-bold px-4" data-bs-toggle="modal" data-bs-target="#registerModal">
                            <i class="fas fa-rocket me-2"></i>
                            شروع رایگان
                        </button>
                        <button class="btn btn-outline-light btn-lg px-4">
                            <i class="fas fa-play me-2"></i>
                            مشاهده دمو
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-image text-center">
                    <div class="floating-card">
                        <i class="fas fa-robot display-1 text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3">خدمات ما</h2>
            <p class="lead text-muted">راهکارهای هوشمند برای رشد کسب و کار شما</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="service-card h-100">
                    <div class="service-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h4 class="fw-bold mb-3">باشگاه مشتریان هوشمند</h4>
                    <p class="text-muted mb-4">
                        ثبت اطلاعات مشتریان شامل شماره تماس، تاریخ تولد و سایر جزئیات مهم برای ایجاد ارتباط بهتر و ارسال پیام‌های تبریک و تخفیفات ویژه
                    </p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>ثبت خودکار اطلاعات مشتری</li>
                        <li><i class="fas fa-check text-success me-2"></i>یادآوری تاریخ تولد</li>
                        <li><i class="fas fa-check text-success me-2"></i>دسته‌بندی مشتریان</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="service-card h-100">
                    <div class="service-icon">
                        <i class="fas fa-sms"></i>
                    </div>
                    <h4 class="fw-bold mb-3">دستیار تبلیغات پیامکی</h4>
                    <p class="text-muted mb-4">
                        ارسال پیام‌های تبلیغاتی هوشمند و شخصی‌سازی شده بر اساس علایق و رفتار مشتریان با استفاده از الگوریتم‌های پیشرفته هوش مصنوعی
                    </p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>پیام‌های شخصی‌سازی شده</li>
                        <li><i class="fas fa-check text-success me-2"></i>زمان‌بندی هوشمند ارسال</li>
                        <li><i class="fas fa-check text-success me-2"></i>تحلیل نتایج کمپین</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="service-card h-100 featured">
                    <div class="service-icon">
                        <i class="fab fa-instagram"></i>
                    </div>
                    <h4 class="fw-bold mb-3">دستیار اینستاگرام هوشمند</h4>
                    <p class="text-muted mb-4">
                        تولید محتوای خلاقانه و جذاب برای اینستاگرام بر اساس نوع کسب و کار شما. از ایجاد پست‌های خودکار تا تحلیل بهترین زمان انتشار
                    </p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>تولید پست خودکار</li>
                        <li><i class="fas fa-check text-success me-2"></i>طراحی گرافیک هوشمند</li>
                        <li><i class="fas fa-check text-success me-2"></i>برنامه‌ریزی انتشار</li>
                        <li><i class="fas fa-check text-success me-2"></i>تحلیل عملکرد</li>
                    </ul>
                    <div class="featured-badge">
                        <span>محبوب</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Instagram Assistant Details -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="instagram-features">
                    <h3 class="display-6 fw-bold text-primary mb-4">
                        <i class="fab fa-instagram text-danger me-3"></i>
                        دستیار اینستاگرام هوشمند
                    </h3>
                    <p class="lead mb-4">
                        با قدرت هوش مصنوعی، محتوای اینستاگرام شما را به‌طور خودکار و بر اساس نوع کسب‌وکارتان تولید می‌کنیم.
                    </p>

                    <div class="feature-list">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-magic"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold">تولید پست خودکار</h5>
                                <p class="text-muted">بر اساس نوع کسب‌وکار شما، محتوای جذاب و متنوع تولید می‌کنیم</p>
                            </div>
                        </div>

                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-palette"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold">طراحی گرافیک هوشمند</h5>
                                <p class="text-muted">تصاویر و گرافیک‌های حرفه‌ای متناسب با برند شما</p>
                            </div>
                        </div>

                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold">زمان‌بندی بهینه</h5>
                                <p class="text-muted">انتشار محتوا در بهترین زمان برای دیده شدن بیشتر</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="instagram-mockup">
                    <div class="phone-mockup">
                        <div class="phone-content">
                            <div class="post-header">
                                <div class="profile-pic"></div>
                                <div class="profile-info">
                                    <div class="username">your_business</div>
                                    <div class="location">تهران، ایران</div>
                                </div>
                            </div>
                            <div class="post-image"></div>
                            <div class="post-actions">
                                <i class="far fa-heart"></i>
                                <i class="far fa-comment"></i>
                                <i class="far fa-paper-plane"></i>
                            </div>
                            <div class="post-caption">
                                محتوای تولید شده توسط هوش مصنوعی بیزتو...
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3">چرا بیزتو؟</h2>
            <p class="lead text-muted">مزایای استفاده از راهکارهای هوشمند ما</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="feature-card text-center">
                    <div class="feature-icon-small">
                        <i class="fas fa-brain"></i>
                    </div>
                    <h5 class="fw-bold">هوش مصنوعی پیشرفته</h5>
                    <p class="text-muted">استفاده از آخرین تکنولوژی‌های AI</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="feature-card text-center">
                    <div class="feature-icon-small">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h5 class="fw-bold">افزایش فروش</h5>
                    <p class="text-muted">تا ۳۰۰٪ افزایش در جذب مشتری</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="feature-card text-center">
                    <div class="feature-icon-small">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h5 class="fw-bold">صرفه‌جویی در زمان</h5>
                    <p class="text-muted">خودکارسازی فرآیندهای تبلیغاتی</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="feature-card text-center">
                    <div class="feature-icon-small">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h5 class="fw-bold">امنیت بالا</h5>
                    <p class="text-muted">حفاظت کامل از اطلاعات شما</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section py-5">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h2 class="display-5 fw-bold text-white mb-4">
                    آماده برای شروع هستید؟
                </h2>
                <p class="lead text-light mb-4">
                    همین حالا ثبت نام کنید و از ۳۰ روز استفاده رایگان بهره‌مند شوید
                </p>
                <button class="btn btn-warning btn-lg text-dark fw-bold px-5 py-3" data-bs-toggle="modal" data-bs-target="#registerModal">
                    <i class="fas fa-rocket me-2"></i>
                    شروع رایگان
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer id="contact" class="bg-dark text-light py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <h5 class="fw-bold text-warning mb-3">
                    <i class="fas fa-rocket me-2"></i>
                    بیزتو
                </h5>
                <p class="text-light-emphasis">
                    راهکارهای هوشمند برای رشد کسب و کار شما با استفاده از آخرین تکنولوژی‌های هوش مصنوعی
                </p>
                <div class="social-links">
                    <a href="#" class="text-warning me-3"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-warning me-3"><i class="fab fa-telegram"></i></a>
                    <a href="#" class="text-warning me-3"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>

            <div class="col-lg-2">
                <h6 class="fw-bold text-warning mb-3">خدمات</h6>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-light-emphasis text-decoration-none">باشگاه مشتریان</a></li>
                    <li><a href="#" class="text-light-emphasis text-decoration-none">تبلیغات پیامکی</a></li>
                    <li><a href="#" class="text-light-emphasis text-decoration-none">دستیار اینستاگرام</a></li>
                </ul>
            </div>

            <div class="col-lg-3">
                <h6 class="fw-bold text-warning mb-3">تماس با ما</h6>
                <ul class="list-unstyled">
                    <li class="text-light-emphasis"><i class="fas fa-phone me-2 text-warning"></i>۰۲۱-۸۸۰۰۱۲۳۴</li>
                    <li class="text-light-emphasis"><i class="fas fa-envelope me-2 text-warning"></i>info@bizto.ir</li>
                    <li class="text-light-emphasis"><i class="fas fa-map-marker-alt me-2 text-warning"></i>تهران، ایران</li>
                </ul>
            </div>

            <div class="col-lg-3">
                <h6 class="fw-bold text-warning mb-3">خبرنامه</h6>
                <p class="text-light-emphasis">از آخرین اخبار و به‌روزرسانی‌ها با خبر شوید</p>
                <div class="input-group">
                    <input type="email" class="form-control" placeholder="ایمیل شما">
                    <button class="btn btn-warning" type="button">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </div>
        </div>

        <hr class="my-4">

        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="mb-0 text-light-emphasis">&copy; ۱۴۰۴ بیزتو. تمامی حقوق محفوظ است.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="#" class="text-light-emphasis text-decoration-none me-3">حریم خصوصی</a>
                <a href="#" class="text-light-emphasis text-decoration-none me-3">قوانین و مقررات</a>
                <a href="#" class="text-light-emphasis text-decoration-none">پشتیبانی</a>
            </div>
        </div>
    </div>
</footer>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">ورود به حساب کاربری</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="loginForm">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">شماره موبایل</label>
                        <input type="tel" name="phone" class="form-control" placeholder="۰۹۱۲۳۴۵۶۷۸۹" required>
                        <div class="invalid-feedback" data-for="phone"></div>
                    </div>

                    <div id="loginVerificationSection" style="display: none;">
                        <div class="mb-3">
                            <label class="form-label">کد تایید</label>
                            <input type="text" name="code" class="form-control" placeholder="کد ۵ رقمی ارسال شده" required maxlength="5">
                            <div class="invalid-feedback" data-for="code"></div>
                        </div>
                        <button type="button" id="loginVerifyBtn" class="btn btn-primary w-100">تایید و ورود</button>
                    </div>

                    <button type="button" id="loginSendCodeBtn" class="btn btn-primary w-100">دریافت کد تایید</button>
                </form>
            </div>
            <div class="modal-footer justify-content-center">
                <p>حساب کاربری ندارید؟ <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal" data-bs-dismiss="modal">ثبت نام کنید</a></p>
            </div>
        </div>
    </div>
</div>

<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">ثبت نام در bizto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="registerForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">نام</label>
                            <input type="text" name="first_name" class="form-control" placeholder="نام خود را وارد کنید" required>
                            <div class="invalid-feedback" data-for="first_name"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">نام خانوادگی</label>
                            <input type="text" name="last_name" class="form-control" placeholder="نام خانوادگی را وارد کنید" required>
                            <div class="invalid-feedback" data-for="last_name"></div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">نام کسب و کار</label>
                        <input type="text" name="business_name" class="form-control" placeholder="نام کسب و کار خود را وارد کنید" required>
                        <div class="invalid-feedback" data-for="business_name"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">نوع کسب و کار</label>
                        <select name="business_type" class="form-control" required>
                            <option value="">انتخاب کنید</option>
                            <option value="restaurant">رستوران</option>
                            <option value="shop">فروشگاه</option>
                            <option value="service">خدمات</option>
                            <option value="other">سایر</option>
                        </select>
                        <div class="invalid-feedback" data-for="business_type"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">شماره موبایل</label>
                        <input type="tel" name="phone" class="form-control" placeholder="۰۹۱۲۳۴۵۶۷۸۹" required>
                        <div class="invalid-feedback" data-for="phone"></div>
                    </div>

                    <div id="registerVerificationSection" style="display: none;">
                        <div class="mb-3">
                            <label class="form-label">کد تایید</label>
                            <input type="text" name="code" class="form-control" placeholder="کد ۵ رقمی ارسال شده" required maxlength="5">
                            <div class="invalid-feedback" data-for="code"></div>
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="terms" id="terms" required>
                            <label class="form-check-label" for="terms">
                                قوانین و مقررات را می‌پذیرم
                            </label>
                            <div class="invalid-feedback" data-for="terms"></div>
                        </div>

                        <button type="button" id="registerVerifyBtn" class="btn btn-warning w-100 text-dark fw-bold">
                            تایید و ثبت نام
                        </button>
                    </div>

                    <button type="button" id="registerSendCodeBtn" class="btn btn-warning w-100 text-dark fw-bold">
                        دریافت کد تایید
                    </button>
                </form>
            </div>
            <div class="modal-footer justify-content-center">
                <p>قبلاً ثبت نام کرده‌اید؟ <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">ورود به حساب</a></p>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- ابتدا jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- سپس Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM loaded - Register script running');

        const registerBtn = document.getElementById('registerSendCodeBtn');
        if (!registerBtn) {
            console.error('Could not find register button!');
            return;
        }

        registerBtn.addEventListener('click', async function(e) {
            e.preventDefault();
            console.log('Register button clicked');

            // اعتبارسنجی فیلدها
            const form = document.getElementById('registerForm');
            const formData = {
                phone: form.querySelector('[name="phone"]').value,
                first_name: form.querySelector('[name="first_name"]').value,
                last_name: form.querySelector('[name="last_name"]').value,
                business_name: form.querySelector('[name="business_name"]').value,
                business_type: form.querySelector('[name="business_type"]').value,
                action: 'register',
                _token: form.querySelector('[name="_token"]').value
            };

            console.log('Form data:', formData);

            try {
                const response = await fetch('/send-verification-code', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': formData._token
                    },
                    body: JSON.stringify(formData)
                });

                const data = await response.json();
                console.log('Server response:', data);

                if (!response.ok) throw data;

                // نمایش بخش کد تایید
                document.getElementById('registerVerificationSection').style.display = 'block';
                registerBtn.style.display = 'none';

            } catch (error) {
                console.error('Error:', error);
                alert(error.error || 'خطایی رخ داده است');
            }
        });
    });





    document.addEventListener('DOMContentLoaded', function() {
        // ----------------------------
        // توابع عمومی و ابزارها
        // ----------------------------

        // اعتبارسنجی شماره موبایل ایرانی
        function isValidIranianPhoneNumber(phone) {
            return /^09[0-9]{9}$/.test(phone);
        }

        // فرمت‌دهی شماره موبایل
        function formatPhoneNumber(input) {
            let value = input.value.replace(/\D/g, '');
            if (value.startsWith('98')) {
                value = value.substring(2);
            }
            if (value.startsWith('0')) {
                value = value.substring(1);
            }
            if (value.length > 0) {
                value = '0' + value;
            }
            input.value = value;
        }

        // نمایش خطا در فیلد
        function showError(input, message) {
            const feedback = document.querySelector(`.invalid-feedback[data-for="${input.name}"]`);
            input.classList.add('is-invalid');
            if (feedback) feedback.textContent = message;
        }

        // حذف خطا از فیلد
        function clearError(input) {
            const feedback = document.querySelector(`.invalid-feedback[data-for="${input.name}"]`);
            input.classList.remove('is-invalid');
            if (feedback) feedback.textContent = '';
        }

        // مدیریت وضعیت دکمه (لودینگ)
        function setButtonLoading(button, isLoading) {
            if (isLoading) {
                button.disabled = true;
                button.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> در حال پردازش...';
            } else {
                button.disabled = false;
                if (button.id === 'loginSendCodeBtn') {
                    button.textContent = 'دریافت کد تایید';
                } else if (button.id === 'loginVerifyBtn') {
                    button.textContent = 'تایید و ورود';
                } else if (button.id === 'registerSendCodeBtn') {
                    button.textContent = 'دریافت کد تایید';
                } else if (button.id === 'registerVerifyBtn') {
                    button.textContent = 'تایید و ثبت نام';
                }
            }
        }

        // ----------------------------
        // مدیریت مدال‌ها
        // ----------------------------

        const loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
        const registerModal = new bootstrap.Modal(document.getElementById('registerModal'));

        // رویدادهای مدال لاگین
        document.getElementById('loginModal').addEventListener('hidden.bs.modal', function() {
            document.getElementById('loginForm').reset();
            document.getElementById('loginVerificationSection').style.display = 'none';
            document.getElementById('loginSendCodeBtn').style.display = 'block';
            document.querySelectorAll('#loginForm input').forEach(input => clearError(input));
        });

        // رویدادهای مدال ثبت نام
        document.getElementById('registerModal').addEventListener('hidden.bs.modal', function() {
            document.getElementById('registerForm').reset();
            document.getElementById('registerVerificationSection').style.display = 'none';
            document.getElementById('registerSendCodeBtn').style.display = 'block';
            document.querySelectorAll('#registerForm input').forEach(input => clearError(input));
        });

        // ----------------------------
        // لاگین
        // ----------------------------

        // اعتبارسنجی بلادرنگ فیلدهای لاگین
        document.querySelectorAll('#loginForm input').forEach(input => {
            input.addEventListener('blur', function() {
                if (this.name === 'phone' && this.value && !isValidIranianPhoneNumber(this.value)) {
                    showError(this, 'شماره موبایل معتبر نیست');
                } else {
                    clearError(this);
                }
            });
        });

        // ارسال کد تایید برای لاگین
        document.getElementById('loginSendCodeBtn').addEventListener('click', async function() {
            const phoneInput = document.querySelector('#loginForm input[name="phone"]');
            const phone = phoneInput.value.trim();

            // اعتبارسنجی
            if (!phone) {
                showError(phoneInput, 'شماره موبایل الزامی است');
                return;
            }

            if (!isValidIranianPhoneNumber(phone)) {
                showError(phoneInput, 'شماره موبایل معتبر نیست');
                return;
            }

            const btn = this;
            setButtonLoading(btn, true);

            try {
                const response = await fetch('/send-verification-code', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('#loginForm input[name="_token"]').value
                    },
                    body: JSON.stringify({ phone, action: 'login' })
                });

                const data = await response.json();

                if (!response.ok) throw data;

                // نمایش بخش کد تایید
                document.getElementById('loginVerificationSection').style.display = 'block';
                btn.style.display = 'none';

                // فوکوس روی فیلد کد تایید
                document.querySelector('#loginForm input[name="code"]').focus();

                alert(`کد تایید به شماره ${phone} ارسال شد.`);
            } catch (error) {
                const errorMsg = error.error || 'خطایی در ارسال کد تایید رخ داده است';
                if (error.retry_after) {
                    const minutes = Math.floor(error.retry_after / 60);
                    const seconds = error.retry_after % 60;
                    alert(`${errorMsg}\nلطفاً ${minutes} دقیقه و ${seconds} ثانیه دیگر تلاش کنید.`);
                } else {
                    alert(errorMsg);
                }
            } finally {
                setButtonLoading(btn, false);
            }
        });

        // تایید کد و ورود
        document.getElementById('loginVerifyBtn').addEventListener('click', async function() {
            const phone = document.querySelector('#loginForm input[name="phone"]').value.trim();
            const code = document.querySelector('#loginForm input[name="code"]').value.trim();

            // اعتبارسنجی
            if (!code || code.length !== 5) {
                showError(document.querySelector('#loginForm input[name="code"]'), 'کد تایید باید ۵ رقمی باشد');
                return;
            }

            const btn = this;
            setButtonLoading(btn, true);

            try {
                const response = await fetch('/verify-code', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('#loginForm input[name="_token"]').value
                    },
                    body: JSON.stringify({ phone, code, action: 'login' })
                });

                const data = await response.json();

                if (!response.ok) throw data;

                // در صورت موفقیت
                if (data.redirect) {
                    window.location.href = data.redirect;
                } else {
                    window.location.reload();
                }
            } catch (error) {
                const errorMsg = error.error || 'خطایی در ورود رخ داده است';
                alert(errorMsg);
                document.querySelector('#loginForm input[name="code"]').value = '';
                document.querySelector('#loginForm input[name="code"]').focus();
            } finally {
                setButtonLoading(btn, false);
            }
        });

        // ----------------------------
        // ثبت نام
        // ----------------------------

        // اعتبارسنجی بلادرنگ فیلدهای ثبت نام
        document.querySelectorAll('#registerForm input, #registerForm select').forEach(input => {
            input.addEventListener('blur', function() {
                if (this.name === 'phone' && this.value && !isValidIranianPhoneNumber(this.value)) {
                    showError(this, 'شماره موبایل معتبر نیست');
                } else if (this.required && !this.value) {
                    showError(this, 'این فیلد الزامی است');
                } else {
                    clearError(this);
                }
            });
        });

        // فرمت‌دهی شماره موبایل در ثبت نام
        document.querySelector('#registerForm input[name="phone"]').addEventListener('input', function() {
            formatPhoneNumber(this);
        });

        // ارسال کد تایید برای ثبت نام
        document.getElementById('registerSendCodeBtn').addEventListener('click', async function() {

            const form = document.getElementById('registerForm');
            const phoneInput = form.querySelector('input[name="phone"]');
            const phone = phoneInput.value.trim();

            // اعتبارسنجی کلیه فیلدها
            let isValid = true;
            form.querySelectorAll('input[required], select[required]').forEach(input => {
                if (!input.value) {
                    showError(input, 'این فیلد الزامی است');
                    isValid = false;
                }
            });

            if (!isValid) return;

            if (!isValidIranianPhoneNumber(phone)) {
                showError(phoneInput, 'شماره موبایل معتبر نیست');
                return;
            }

            const btn = this;
            setButtonLoading(btn, true);

            try {
                const formData = {
                    phone,
                    first_name: form.querySelector('input[name="first_name"]').value.trim(),
                    last_name: form.querySelector('input[name="last_name"]').value.trim(),
                    business_name: form.querySelector('input[name="business_name"]').value.trim(),
                    business_type: form.querySelector('select[name="business_type"]').value,
                    action: 'register'
                };

                const response = await fetch('/send-verification-code', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value
                    },
                    body: JSON.stringify(formData)
                });

                const data = await response.json();

                if (!response.ok) throw data;

                // نمایش بخش کد تایید
                document.getElementById('registerVerificationSection').style.display = 'block';
                btn.style.display = 'none';

                // فوکوس روی فیلد کد تایید
                document.querySelector('#registerForm input[name="code"]').focus();

                alert(`کد تایید به شماره ${phone} ارسال شد.`);
            } catch (error) {
                const errorMsg = error.error || 'خطایی در ارسال کد تایید رخ داده است';
                if (error.retry_after) {
                    const minutes = Math.floor(error.retry_after / 60);
                    const seconds = error.retry_after % 60;
                    alert(`${errorMsg}\nلطفاً ${minutes} دقیقه و ${seconds} ثانیه دیگر تلاش کنید.`);
                } else {
                    alert(errorMsg);
                }
            } finally {
                setButtonLoading(btn, false);
            }
        });

        // تایید کد و ثبت نام نهایی
        document.getElementById('registerVerifyBtn').addEventListener('click', async function() {
            const form = document.getElementById('registerForm');
            const codeInput = form.querySelector('input[name="code"]');
            const termsInput = form.querySelector('input[name="terms"]');
            const code = codeInput.value.trim();

            // اعتبارسنجی
            if (!code || code.length !== 5) {
                showError(codeInput, 'کد تایید باید ۵ رقمی باشد');
                return;
            }

            if (!termsInput.checked) {
                showError(termsInput, 'لطفاً قوانین و مقررات را بپذیرید');
                return;
            }

            const btn = this;
            setButtonLoading(btn, true);

            try {
                const formData = {
                    phone: form.querySelector('input[name="phone"]').value.trim(),
                    code,
                    first_name: form.querySelector('input[name="first_name"]').value.trim(),
                    last_name: form.querySelector('input[name="last_name"]').value.trim(),
                    business_name: form.querySelector('input[name="business_name"]').value.trim(),
                    business_type: form.querySelector('select[name="business_type"]').value,
                    action: 'register'
                };

                const response = await fetch('/verify-code', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value
                    },
                    body: JSON.stringify(formData)
                });

                const data = await response.json();

                if (!response.ok) throw data;

                // در صورت موفقیت
                if (data.redirect) {
                    window.location.href = data.redirect;
                } else {
                    window.location.reload();
                }
            } catch (error) {
                const errorMsg = error.error || 'خطایی در ثبت نام رخ داده است';
                alert(errorMsg);
                codeInput.value = '';
                codeInput.focus();
            } finally {
                setButtonLoading(btn, false);
            }
        });
    });
</script>


<script>
    // Custom JavaScript for Bizto Laravel Blade

    document.addEventListener('DOMContentLoaded', function() {
        // Smooth scrolling for anchor links
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

        // Add animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate__animated', 'animate__fadeInUp');
                }
            });
        }, observerOptions);

        // Observe service cards and feature cards
        document.querySelectorAll('.service-card, .feature-card').forEach(card => {
            observer.observe(card);
        });

        // Newsletter subscription
        const newsletterForm = document.querySelector('.input-group');

        if (newsletterForm) {
            const newsletterBtn = newsletterForm.querySelector('button');
            const newsletterInput = newsletterForm.querySelector('input');

            newsletterBtn.addEventListener('click', function () {
                const email = newsletterInput.value.trim();

                if (email && isValidEmail(email)) {
                    const originalHTML = this.innerHTML;
                    this.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
                    this.disabled = true;

                    // ✅ ارسال درخواست AJAX به Laravel
                    fetch('/newsletter/subscribe', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ email: email })
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                showToast(data.message);
                                newsletterInput.value = '';
                            } else {
                                showToast(data.message || 'خطایی رخ داده است', 'error');
                            }
                            this.innerHTML = originalHTML;
                            this.disabled = false;
                        })
                        .catch(error => {
                            console.error(error);
                            showToast('خطا در ارسال اطلاعات. لطفاً دوباره تلاش کنید.', 'error');
                            this.innerHTML = originalHTML;
                            this.disabled = false;
                        });

                } else {
                    newsletterInput.classList.add('is-invalid');
                    showToast('لطفا ایمیل معتبری وارد کنید!', 'error');
                }
            });

            newsletterInput.addEventListener('keypress', function (e) {
                if (e.key === 'Enter') {
                    newsletterBtn.click();
                }
            });
        }


        // Add parallax effect to hero section
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const rate = scrolled * -0.5;

            const heroSection = document.querySelector('.hero-section');
            if (heroSection) {
                heroSection.style.transform = `translateY(${rate}px)`;
            }
        });

        // Show toast notification
        function showToast(message, type = 'success') {
            // Remove existing toasts
            const existingToasts = document.querySelectorAll('.custom-toast');
            existingToasts.forEach(toast => toast.remove());

            const toast = document.createElement('div');
            toast.className = `custom-toast position-fixed top-0 end-0 m-3 p-3 rounded-3 text-white ${type === 'success' ? 'bg-success' : 'bg-danger'}`;
            toast.style.zIndex = '9999';
            toast.innerHTML = `
                    <div class="d-flex align-items-center">
                        <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'} me-2"></i>
                        ${message}
                    </div>
                `;

            document.body.appendChild(toast);

            // Fade in
            setTimeout(() => {
                toast.style.opacity = '1';
                toast.style.transform = 'translateX(0)';
            }, 100);

            // Remove after 3 seconds
            setTimeout(() => {
                toast.style.opacity = '0';
                toast.style.transform = 'translateX(100%)';
                setTimeout(() => {
                    if (toast.parentNode) {
                        toast.parentNode.removeChild(toast);
                    }
                }, 300);
            }, 3000);
        }

        // Email validation
        function isValidEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        // Phone number validation for Iranian numbers
        function isValidPhoneNumber(phone) {
            const re = /^(\+98|0)?9\d{9}$/;
            return re.test(phone.replace(/\s/g, ''));
        }

        // Add phone number formatting
        document.querySelectorAll('input[type="tel"]').forEach(input => {
            input.addEventListener('input', function() {
                let value = this.value.replace(/\D/g, '');
                if (value.startsWith('98')) {
                    value = value.substring(2);
                }
                if (value.startsWith('0')) {
                    value = value.substring(1);
                }
                if (value.length > 0) {
                    value = '0' + value;
                }
                this.value = value;
            });
        });

        // Add loading animation to page
        window.addEventListener('load', function() {
            document.body.classList.add('loaded');
        });
    });
</script>


</body>
</html>
