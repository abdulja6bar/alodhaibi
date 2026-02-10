<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>نظام العضيبي - @yield('title')</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
        <style>
        :root {
            --primary-color: #8A2BE2;
            --secondary-color: #00CED1;
            --light-purple: #E6E6FA;
            --light-cyan: #E0FFFF;
            --dark-color: #333;
            --light-color: #f9f9f9;
            --gray-color: #f5f5f5;
            --border-radius: 10px;
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Cairo', sans-serif;
        }

        body {
            background-color: var(--light-color);
            color: var(--dark-color);
            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Header Styles */
        header {
            background-color: white;
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .top-header {
            background-color: var(--primary-color);
            color: white;
            padding: 8px 0;
            font-size: 0.9rem;
        }

        .top-header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-contact span {
            margin-left: 20px;
        }

        .header-contact i {
            margin-left: 5px;
            color: var(--secondary-color);
        }

        .main-header {
            padding: 15px 0;
        }

        .main-header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo h1 {
            font-size: 1.8rem;
            color: var(--primary-color);
            margin-right: 10px;
        }

        .logo span {
            color: var(--secondary-color);
        }

        .logo-icon {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 10px;
            font-size: 1.2rem;
        }

        .search-bar {
            flex: 1;
            max-width: 500px;
            margin: 0 20px;
        }

        .search-bar form {
            display: flex;
            border: 2px solid var(--light-purple);
            border-radius: 30px;
            overflow: hidden;
        }

        .search-bar input {
            flex: 1;
            padding: 12px 20px;
            border: none;
            outline: none;
            font-size: 1rem;
        }

        .search-bar button {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 0 25px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .search-bar button:hover {
            background-color: #7a1fd1;
        }

        .header-actions {
            display: flex;
            align-items: center;
        }

        .header-action-item {
            margin-right: 20px;
            position: relative;
            cursor: pointer;
        }

        .header-action-item i {
            font-size: 1.4rem;
            color: var(--primary-color);
        }

        .cart-count {
            position: absolute;
            top: -8px;
            left: -5px;
            background-color: var(--secondary-color);
            color: white;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            font-weight: bold;
        }

        nav {
            background-color: var(--gray-color);
            border-top: 1px solid #eee;
        }

        .nav-links {
            display: flex;
            list-style: none;
        }

        .nav-links li {
            padding: 15px 20px;
        }

        .nav-links a {
            color: var(--dark-color);
            font-weight: 600;
            transition: color 0.3s;
            position: relative;
        }

        .nav-links a:hover {
            color: var(--primary-color);
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            right: 0;
            width: 0;
            height: 2px;
            background-color: var(--primary-color);
            transition: width 0.3s;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .dropdown {
            position: relative;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            background-color: white;
            min-width: 200px;
            box-shadow: var(--shadow);
            border-radius: var(--border-radius);
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            display: block;
            padding: 12px 20px;
            border-bottom: 1px solid #eee;
        }

        .dropdown-content a:last-child {
            border-bottom: none;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(138, 43, 226, 0.85), rgba(0, 206, 209, 0.8)), url('https://images.unsplash.com/photo-1596462502278-27bfdc403348?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 80px 0;
            text-align: center;
            border-radius: 0 0 var(--border-radius) var(--border-radius);
            margin-bottom: 40px;
        }

        .hero h2 {
            font-size: 2.8rem;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 30px;
            opacity: 0.9;
        }

        .hero-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .btn {
            padding: 12px 30px;
            border-radius: 30px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
            font-size: 1rem;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: #7a1fd1;
            transform: translateY(-3px);
        }

        .btn-secondary {
            background-color: var(--secondary-color);
            color: white;
        }

        .btn-secondary:hover {
            background-color: #00b7bd;
            transform: translateY(-3px);
        }

        /* Categories Section */
        .section-title {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
        }

        .section-title h2 {
            font-size: 2rem;
            color: var(--primary-color);
            display: inline-block;
            padding-bottom: 10px;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            right: 50%;
            transform: translateX(50%);
            width: 80px;
            height: 3px;
            background-color: var(--secondary-color);
        }

        .categories {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 60px;
        }

        .category-card {
            background-color: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: transform 0.3s;
        }

        .category-card:hover {
            transform: translateY(-10px);
        }

        .category-img {
            height: 180px;
            overflow: hidden;
        }

        .category-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .category-card:hover .category-img img {
            transform: scale(1.05);
        }

        .category-info {
            padding: 20px;
            text-align: center;
        }

        .category-info h3 {
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        /* Products Section */
        .products {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
            margin-bottom: 60px;
        }

        .product-card {
            background-color: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: transform 0.3s;
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: var(--secondary-color);
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: bold;
            z-index: 2;
        }

        .product-img {
            height: 220px;
            overflow: hidden;
        }

        .product-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .product-card:hover .product-img img {
            transform: scale(1.05);
        }

        .product-info {
            padding: 20px;
        }

        .product-title {
            font-size: 1.1rem;
            margin-bottom: 10px;
            color: var(--dark-color);
        }

        .product-price {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .current-price {
            color: var(--primary-color);
            font-size: 1.3rem;
            font-weight: 700;
            margin-left: 10px;
        }

        .old-price {
            color: #999;
            text-decoration: line-through;
            font-size: 1rem;
        }

        .product-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .add-to-cart {
            background-color: var(--light-purple);
            color: var(--primary-color);
            border: none;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .add-to-cart:hover {
            background-color: var(--primary-color);
            color: white;
        }

        .favorite-btn {
            background: none;
            border: none;
            color: #ddd;
            font-size: 1.2rem;
            cursor: pointer;
            transition: color 0.3s;
        }

        .favorite-btn:hover {
            color: #ff4757;
        }

        /* Banner Section */
        .banner {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 50px;
            border-radius: var(--border-radius);
            margin-bottom: 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .banner-content h3 {
            font-size: 2rem;
            margin-bottom: 15px;
        }

        /* Footer */
        footer {
            background-color: #222;
            color: #ddd;
            padding: 60px 0 20px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-logo h2 {
            color: white;
            font-size: 1.8rem;
            margin-bottom: 15px;
        }

        .footer-logo span {
            color: var(--secondary-color);
        }

        .footer-logo p {
            margin-bottom: 20px;
            opacity: 0.8;
        }

        .social-icons {
            display: flex;
            gap: 15px;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: background-color 0.3s;
        }

        .social-icon:hover {
            background-color: var(--primary-color);
        }

        .footer-links h3 {
            color: white;
            margin-bottom: 20px;
            font-size: 1.3rem;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-links h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            width: 40px;
            height: 2px;
            background-color: var(--secondary-color);
        }

        .footer-links ul {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: #aaa;
            transition: color 0.3s;
        }

        .footer-links a:hover {
            color: var(--secondary-color);
        }

        .footer-contact i {
            color: var(--secondary-color);
            margin-left: 10px;
        }

        .newsletter h3 {
            color: white;
            margin-bottom: 20px;
            font-size: 1.3rem;
            position: relative;
            padding-bottom: 10px;
        }

        .newsletter h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            width: 40px;
            height: 2px;
            background-color: var(--secondary-color);
        }

        .newsletter p {
            margin-bottom: 20px;
            opacity: 0.8;
        }

        .newsletter-form {
            display: flex;
            border-radius: 30px;
            overflow: hidden;
        }

        .newsletter-form input {
            flex: 1;
            padding: 12px 20px;
            border: none;
            outline: none;
            font-size: 1rem;
        }

        .newsletter-form button {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 0 25px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .newsletter-form button:hover {
            background-color: #7a1fd1;
        }

        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #444;
            color: #aaa;
            font-size: 0.9rem;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .hero h2 {
                font-size: 2.2rem;
            }
            
            .search-bar {
                max-width: 400px;
            }
        }

        @media (max-width: 768px) {
            .main-header .container {
                flex-wrap: wrap;
            }
            
            .search-bar {
                order: 3;
                max-width: 100%;
                margin: 15px 0 0;
            }
            
            .hero h2 {
                font-size: 1.8rem;
            }
            
            .hero p {
                font-size: 1rem;
            }
            
            .banner {
                flex-direction: column;
                text-align: center;
            }
            
            .banner-content {
                margin-bottom: 20px;
            }
        }

        @media (max-width: 576px) {
            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .nav-links li {
                padding: 10px 15px;
            }
            
            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .btn {
                width: 100%;
                max-width: 250px;
                margin-bottom: 10px;
            }
        }
    </style>
    {{-- <style>
        :root {
            --primary-purple: #8A2BE2;
            --primary-cyan: #00CED1;
            --light-purple: #E6E6FA;
            --light-cyan: #E0FFFF;
            --dark-purple: #4B0082;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }
        
        .navbar-brand {
            color: var(--primary-purple) !important;
            font-weight: bold;
            font-size: 1.5rem;
        }
        
        .btn-primary {
            background: linear-gradient(45deg, var(--primary-purple), var(--primary-cyan));
            border: none;
        }
        
        .btn-primary:hover {
            background: linear-gradient(45deg, var(--dark-purple), #00b3b6);
        }
        
        .hero-section {
            background: linear-gradient(135deg, var(--light-purple), var(--light-cyan));
            padding: 80px 0;
            margin-bottom: 40px;
        }
        
        .rating-stars {
            color: #FFD700;
        }
        
        .footer {
            background: linear-gradient(135deg, var(--dark-purple), #006769);
            color: white;
            padding: 40px 0;
            margin-top: 60px;
        }
        
        .card {
            border-radius: 15px;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        
        .card:hover {
            transform: translateY(-5px);
        }
        
        .stat-card {
            background: linear-gradient(45deg, var(--primary-purple), var(--primary-cyan));
            color: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .gradient-text {
            background: linear-gradient(45deg, var(--primary-purple), var(--primary-cyan));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .status-badge {
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
        }
        
        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .status-in-progress {
            background-color: #cce5ff;
            color: #004085;
        }
        
        .status-resolved {
            background-color: #d4edda;
            color: #155724;
        }
    </style> --}}
</head>
<body>


 
    <!-- شريط التنقل -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                  <div class="logo">
                    <!-- <div class="logo-icon"> -->
                        <img src="https://res.cloudinary.com/dr7xwcpo7/image/upload/v1769682604/favicon_2_xsbp88.png" width="40 " height="50"  />
                        <!-- <i class="fas fa-crown"></i> -->
                    <!-- </div> -->
                    <h1>العضـ<span>ـيبي</span></h1>
                </div>
                
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">عن الشركة</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ratings.index') }}">التقييمات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ratings.create') }}">إضافة تقييم</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('complaints.create') }}">تقديم شكوى</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i> لوحة التحكم
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
@yield("breadcrumb")
      
    <!-- المحتوى الرئيسي -->
    <main>
        @yield('content')
    </main>

    <!-- الفوتر -->
   <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">
                    <h2>العضيـ<span>ـبي</span></h2>
                    <p>متجر الكماليات ومستحضرات التجميل الأول في المنطقة. نقدم لكم أجود المنتجات العالمية بأسعار تنافسية وخدمة عملاء متميزة.</p>
                    <div class="social-icons">
                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-snapchat"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>
                
                <div class="footer-links">
                    <h3>روابط سريعة</h3>
                    <ul>
                        <li><a href="{{ route('home') }}">الرئيسية</a></li>
                        <li><a href="{{ route('about') }}"> عن الشركة</a></li>
                        <li><a href="{{ route('ratings.index') }}">التقييمات </a></li>
                        <li><a href="{{ route('complaints.create') }}"> تقديم شكوى</a></li>
                    </ul>
                </div>
                
                {{-- <div class="footer-links">
                    <h3>معلومات</h3>
                    <ul>
                        <li><a href="#">عن المتجر</a></li>
                        <li><a href="#">الشروط والأحكام</a></li>
                        <li><a href="#">سياسة الخصوصية</a></li>
                        <li><a href="#">سياسة الإرجاع</a></li>
                        <li><a href="#">الأسئلة الشائعة</a></li>
                    </ul>
                </div> --}}
                
                <div class="footer-links">
                    <h3>اتصل بنا</h3>
                    <div class="footer-contact">
                        <p><i class="fas fa-map-marker-alt"></i> حائل المملكة العربية السعودية</p>
                        <p><i class="fas fa-phone"></i> 0559616449</p>
                        <p><i class="fas fa-envelope"></i> info@alodhaibi.sa</p>
                        <p><i class="fas fa-clock"></i> السبت - الخميس: 8 صباحاً - 11:30 مساءً</p>
                    </div>
                </div>
            </div>
            
           
            
            <div class="copyright">
                <p>جميع الحقوق محفوظة &copy;  2026 العضيبي</p>
            </div>
        </div>
    </footer>




    {{-- <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h4>شركة العضيبي</h4>
                    <p>مؤسسة رائدة في مجال الكماليات، نقدم أفضل المنتجات بأعلى جودة وأنسب الأسعار.</p>
                </div>
                <div class="col-md-4">
                    <h4>روابط سريعة</h4>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('ratings.create') }}" class="text-white">إضافة تقييم</a></li>
                        <li><a href="{{ route('complaints.create') }}" class="text-white">تقديم شكوى</a></li>
                        <li><a href="{{ route('ratings.index') }}" class="text-white">عرض التقييمات</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h4>اتصل بنا</h4>
                    <p><i class="fas fa-phone me-2"></i> 0112345678</p>
                    <p><i class="fas fa-envelope me-2"></i> info@aladhibi.com</p>
                </div>
            </div>
            <hr class="bg-white">
            <p class="text-center mb-0">© 2026  العضيبي. جميع الحقوق محفوظة.</p>
        </div>
    </footer> --}}

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    @yield('scripts')
</body>
</html>