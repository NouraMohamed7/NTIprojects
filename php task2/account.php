<?php
session_start();

// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: account.php');
    exit();
}

$errors  = [];
$success = '';

// ── State 1: Not logged in ──────────────────────────────────────────────────
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
        $email    = trim($_POST['email']    ?? '');
        $password = trim($_POST['password'] ?? '');

        if (empty($email)) {
            $errors[] = 'Email is required';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Please enter a valid email address';
        }

        if (empty($password)) {
            $errors[] = 'Password is required';
        } elseif (strlen($password) < 6) {
            $errors[] = 'Password must be at least 6 characters';
        }

        if (empty($errors)) {
            $_SESSION['logged_in'] = true;
            $_SESSION['email']     = $email;
            header('Location: all_products.php');
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Luxe - Sign In</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="auth-page">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php"><i class="fas fa-gem me-2"></i>Nova Luxe</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-home me-1"></i> Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="all_products.php"><i class="fas fa-ring me-1"></i> All Products</a></li>
                    <li class="nav-item"><a class="nav-link active" href="account.php"><i class="fas fa-user me-1"></i> Account</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Login Form -->
    <section class="auth-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5 col-lg-4">
                    <div class="auth-card">
                        <div class="auth-header">
                            <div class="auth-icon"><i class="fas fa-user-circle"></i></div>
                            <h3>Welcome Back</h3>
                            <p>Sign in to your Nova Luxe account</p>
                        </div>
                        <div class="auth-body">

                            <?php if (!empty($errors)): ?>
                            <div class="alert alert-danger alert-dismissible fade show">
                                <ul class="mb-0">
                                    <?php foreach ($errors as $error): ?>
                                    <li><i class="fas fa-exclamation-circle me-1"></i> <?php echo $error; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                            <?php endif; ?>

                            <form method="POST" action="">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" name="email"
                                           placeholder="name@example.com"
                                           value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
                                    <label for="email"><i class="fas fa-envelope me-1"></i> Email Address</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                    <label for="password"><i class="fas fa-lock me-1"></i> Password</label>
                                </div>
                                <button type="submit" name="login" class="btn btn-auth w-100">
                                    <i class="fas fa-sign-in-alt me-2"></i> Sign In
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
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

<?php
} else {
// ── State 2: Logged in ──────────────────────────────────────────────────────

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_profile'])) {
        $username  = trim($_POST['username']  ?? '');
        $password  = trim($_POST['password']  ?? '');
        $email     = trim($_POST['email']     ?? '');
        $phone     = trim($_POST['phone']     ?? '');
        $facebook  = trim($_POST['facebook']  ?? '');
        $twitter   = trim($_POST['twitter']   ?? '');
        $instagram = trim($_POST['instagram'] ?? '');

        if (empty($username)) {
            $errors[] = 'Username is required';
        } elseif (strlen($username) < 3) {
            $errors[] = 'Username must be at least 3 characters';
        }

        if (empty($password)) {
            $errors[] = 'Password is required';
        } elseif (strlen($password) < 6) {
            $errors[] = 'Password must be at least 6 characters';
        }

        if (empty($email)) {
            $errors[] = 'Email is required';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Please enter a valid email address';
        }

        if (empty($phone)) {
            $errors[] = 'Phone number is required';
        } elseif (!preg_match('/^[0-9]{10,15}$/', $phone)) {
            $errors[] = 'Phone number must be 10–15 digits only';
        }

        if (!empty($facebook) && !filter_var($facebook, FILTER_VALIDATE_URL)) {
            $errors[] = 'Please enter a valid Facebook URL';
        }

        if (!empty($twitter) && !filter_var($twitter, FILTER_VALIDATE_URL)) {
            $errors[] = 'Please enter a valid Twitter URL';
        }

        if (!empty($instagram) && !filter_var($instagram, FILTER_VALIDATE_URL)) {
            $errors[] = 'Please enter a valid Instagram URL';
        }

        if (empty($errors)) {
            $_SESSION['profile'] = compact('username', 'email', 'phone', 'facebook', 'twitter', 'instagram');
            header('Location: index.php');
            exit();
        }
    }

    $profile = $_SESSION['profile'] ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Luxe - My Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="auth-page">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php"><i class="fas fa-gem me-2"></i>Nova Luxe</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-home me-1"></i> Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="all_products.php"><i class="fas fa-ring me-1"></i> All Products</a></li>
                    <li class="nav-item"><a class="nav-link active" href="account.php"><i class="fas fa-user me-1"></i> Account</a></li>
                </ul>
                <ul class="navbar-nav ms-3">
                    <li class="nav-item">
                        <a class="nav-link logout-link" href="account.php?logout=1">
                            <i class="fas fa-sign-out-alt me-1"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Profile Update Form -->
    <section class="auth-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="auth-card profile-card">
                        <div class="auth-header profile-header">
                            <div class="auth-icon profile-icon"><i class="fas fa-user-edit"></i></div>
                            <h3>Update Profile</h3>
                            <p>Keep your information up to date</p>
                        </div>
                        <div class="auth-body">

                            <?php if (!empty($errors)): ?>
                            <div class="alert alert-danger alert-dismissible fade show">
                                <ul class="mb-0">
                                    <?php foreach ($errors as $error): ?>
                                    <li><i class="fas fa-exclamation-circle me-1"></i> <?php echo $error; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                            <?php endif; ?>

                            <?php if (!empty($success)): ?>
                            <div class="alert alert-success alert-dismissible fade show">
                                <i class="fas fa-check-circle me-1"></i> <?php echo $success; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                            <?php endif; ?>

                            <form method="POST" action="">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="username" name="username"
                                                   placeholder="Username"
                                                   value="<?php echo htmlspecialchars($profile['username'] ?? $_POST['username'] ?? ''); ?>">
                                            <label for="username"><i class="fas fa-user me-1"></i> Username *</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-floating">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                            <label for="password"><i class="fas fa-lock me-1"></i> Password *</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" name="email"
                                                   placeholder="Email"
                                                   value="<?php echo htmlspecialchars($profile['email'] ?? $_SESSION['email'] ?? ''); ?>">
                                            <label for="email"><i class="fas fa-envelope me-1"></i> Email *</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="phone" name="phone"
                                                   placeholder="Phone"
                                                   value="<?php echo htmlspecialchars($profile['phone'] ?? $_POST['phone'] ?? ''); ?>">
                                            <label for="phone"><i class="fas fa-phone me-1"></i> Phone *</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <input type="url" class="form-control" id="facebook" name="facebook"
                                               placeholder="https://facebook.com/yourprofile"
                                               value="<?php echo htmlspecialchars($profile['facebook'] ?? $_POST['facebook'] ?? ''); ?>">
                                        <label for="facebook"><i class="fab fa-facebook me-1"></i> Facebook URL</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <input type="url" class="form-control" id="twitter" name="twitter"
                                               placeholder="https://twitter.com/yourhandle"
                                               value="<?php echo htmlspecialchars($profile['twitter'] ?? $_POST['twitter'] ?? ''); ?>">
                                        <label for="twitter"><i class="fab fa-twitter me-1"></i> Twitter URL</label>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="form-floating">
                                        <input type="url" class="form-control" id="instagram" name="instagram"
                                               placeholder="https://instagram.com/yourprofile"
                                               value="<?php echo htmlspecialchars($profile['instagram'] ?? $_POST['instagram'] ?? ''); ?>">
                                        <label for="instagram"><i class="fab fa-instagram me-1"></i> Instagram URL</label>
                                    </div>
                                </div>
                                <button type="submit" name="update_profile" class="btn btn-auth w-100">
                                    <i class="fas fa-save me-2"></i> Save Changes
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
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

<?php } ?>