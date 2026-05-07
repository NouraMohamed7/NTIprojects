<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Luxe - Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php"><i class="fas fa-gem me-2"></i>Nova Luxe</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php"><i class="fas fa-home me-1"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="all_products.php"><i class="fas fa-ring me-1"></i> All Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="account.php"><i class="fas fa-user me-1"></i> Account</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-3">
                    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                    <li class="nav-item">
                        <a class="nav-link logout-link" href="account.php?logout=1">
                            <i class="fas fa-sign-out-alt me-1"></i> Logout
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero-section">
        <div class="hero-content">
            <div class="container">
                <span class="hero-tag"><i class="fas fa-sparkles me-1"></i> New Collection 2026</span>
                <h1 class="hero-title">Accessories That<br>Define You</h1>
                <p class="hero-subtitle">Curated bags, jewelry, watches & more — crafted for modern elegance</p>
                <a href="all_products.php" class="btn btn-hero btn-lg">
                    <i class="fas fa-shopping-bag me-2"></i> Shop Now
                </a>
            </div>
        </div>
        <div class="hero-image">
            <img src="images/hero.jpg" alt="Accessories Collection">
        </div>
    </header>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-tag">Why Nova Luxe</span>
                <h2 class="section-title">Our Promise to You</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon-wrapper">
                            <i class="fas fa-hand-holding-heart"></i>
                        </div>
                        <h4>Handcrafted</h4>
                        <p>Every piece is carefully made by skilled artisans with passion and precision</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon-wrapper">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <h4>Eco-Friendly</h4>
                        <p>Sustainably sourced materials that are as kind to the planet as they are beautiful</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon-wrapper">
                            <i class="fas fa-award"></i>
                        </div>
                        <h4>Premium Quality</h4>
                        <p>Only the finest materials selected to ensure lasting beauty and durability</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container text-center">
            <h2>Find Your Signature Style</h2>
            <p>Browse our full collection and discover pieces made for you</p>
            <a href="all_products.php" class="btn btn-outline-light btn-lg px-5 mt-3">
                <i class="fas fa-arrow-right me-2"></i> View All Products
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h5><i class="fas fa-gem me-2"></i>Nova Luxe</h5>
                    <p>Handcrafted accessories since 2026.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p>&copy; 2026 Nova Luxe. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>