<?php
include 'signup.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="card-container">
        <div class="main-card">
            <div class="language-selector">
                <div class="language-select-wrapper">
                    <img src="img/world.png" alt="World" class="world-icon">
                    <select id="languageSelect" class="form-select form-select-sm">
                        <option value="en">English</option>
                        <option value="es">Español</option>
                    </select>
                </div>
            </div>
            <div class="row g-0 h-100">
                <div class="col-md-6 left-panel">
                    <div class="left-content">
                        <h1 data-translate="welcome">Welcome<br>to Our<br>Platform!</h1>
                        <p class="subtitle" data-translate="join">Join our community<br>and enjoy exclusive features</p>
                        <a href="#" class="cta-button" data-translate="title">Ready to get started? Join now!</a>
                    </div>
                </div>
                <div class="col-md-6 right-panel">
                    <div class="form-container">
                        <h2 class="text-white mb-4" data-translate="title">Get Started</h2>
                        <?php
                        if (!empty($error)) {
                            echo "<div class='alert alert-danger'>$error</div>";
                        }
                        if (!empty($success)) {
                            echo "<div class='alert alert-success'>$success</div>";
                        }
                        ?>
                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="input-icon">
                                <i class="fas fa-user"></i>
                                <input type="text" name="username" class="form-control" placeholder="Username" data-translate="username" value="<?php echo htmlspecialchars($username ?? ''); ?>">
                            </div>
                            <div class="input-icon">
                                <i class="fas fa-envelope"></i>
                                <input type="email" name="email" class="form-control" placeholder="Email" data-translate="email" value="<?php echo htmlspecialchars($email ?? ''); ?>">
                            </div>
                            <div class="input-icon">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" data-translate="password">
                                <i class="fas fa-eye password-toggle" data-target="password"></i>
                            </div>
                            <div class="input-icon">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm password" data-translate="confirmPassword">
                                <i class="fas fa-eye password-toggle" data-target="confirm_password"></i>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="terms" name="terms">
                                <label class="form-check-label" for="terms" data-translate="terms">
                                    I have read and agree to the Terms and Conditions.
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-signup" data-translate="signUp">Sign up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>