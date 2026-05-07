<?php
session_start();

$products = [
    'Leather Handbag' => [
        'price' => '120',
        'img'   => 'images/product1.jpg',
        'desc'  => 'Genuine Italian leather handbag with polished gold-tone hardware'
    ],
    'Gold Chain Necklace' => [
        'price' => '85',
        'img'   => 'images/product2.jpg',
        'desc'  => '18K gold-plated chain necklace, perfect for layering any outfit'
    ],
    'Classic Watch' => [
        'price' => '199',
        'img'   => 'images/product3.jpg',
        'desc'  => 'Sleek minimalist analog watch with a genuine leather strap'
    ],
    'Silk Scarf' => [
        'price' => '45',
        'img'   => 'images/product4.jpg',
        'desc'  => '100% pure silk scarf featuring an elegant hand-drawn floral print'
    ],
    'Pearl Earrings' => [
        'price' => '65',
        'img'   => 'images/product5.jpg',
        'desc'  => 'Freshwater pearl drop earrings set in sterling silver'
    ],
    'Woven Belt' => [
        'price' => '35',
        'img'   => 'images/product6.jpg',
        'desc'  => 'Hand-woven rattan belt finished with a genuine leather buckle'
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Luxe - All Products</title>
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
                        <a class="nav-link" href="index.php"><i class="fas fa-home me-1"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="all_products.php"><i class="fas fa-ring me-1"></i> All Products</a>
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

    <!-- Page Header -->
    <section class="page-header">
        <div class="container text-center">
            <span class="page-tag">Our Collection</span>
            <h1><i class="fas fa-ring me-2"></i>All Products</h1>
            <p>Handcrafted accessories for the modern you</p>
        </div>
    </section>

    <!-- Products Section -->
    <section class="products-section">
        <div class="container">
            <div class="row g-4">
                <?php foreach ($products as $product => $values): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="product-card">
                        <div class="product-badge">New</div>
                        <div class="product-img-wrapper">
                            <img src="<?php echo $values['img']; ?>" alt="<?php echo $product; ?>">
                            <div class="product-overlay">
                                <a href="#" class="btn btn-buy">
                                    <i class="fas fa-shopping-bag me-2"></i> Add to Bag
                                </a>
                            </div>
                        </div>
                        <div class="product-info">
                            <h5 class="product-title"><?php echo $product; ?></h5>
                            <p class="product-desc"><?php echo $values['desc']; ?></p>
                            <div class="product-footer">
                                <span class="product-price">$<?php echo number_format($values['price']); ?></span>
                                <div class="product-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
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