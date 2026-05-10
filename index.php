<?php
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['name'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (empty($name))    $errors[] = "Name is required.";
    if (empty($email))   $errors[] = "Email is required.";
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email format.";
    if (empty($message)) $errors[] = "Message is required.";

    if (empty($errors)) {
        header("Location: thankyou.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickPOS - Modern Point of Sale</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<!-- HEADER -->
<header id="header">
    <div class="container nav-container">
        <div class="logo">⚡ QuickPOS</div>
        <nav>
            <a href="#features">Features</a>
            <a href="#pricing">Pricing</a>
            <a href="#contact">Contact</a>
            <a href="#" class="btn-signup">Sign Up Free</a>
        </nav>
    </div>
</header>

<!-- HERO -->
<section id="hero">
    <div class="container hero-content">
        <h1>The Fastest POS System for Modern Businesses</h1>
        <p>Accept payments, manage inventory, and grow your business all in one place.</p>
        <a href="#contact" class="btn-primary">Get Started Today</a>
    </div>
</section>

<!-- FEATURES -->
<section id="features">
    <div class="container">
        <h2>Why Choose QuickPOS?</h2>
        <div class="features-grid">
            <div class="feature-card">
                <i class="fas fa-bolt"></i>
                <h3>Lightning Fast</h3>
                <p>Process transactions in under 2 seconds with our optimized engine.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-shield-alt"></i>
                <h3>Bank-Level Security</h3>
                <p>All data encrypted with 256-bit SSL. PCI-DSS compliant.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-chart-line"></i>
                <h3>Real-Time Analytics</h3>
                <p>Live sales dashboards and detailed reports at your fingertips.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-mobile-alt"></i>
                <h3>Works Everywhere</h3>
                <p>Desktop, tablet, or mobile. QuickPOS adapts to your setup.</p>
            </div>
        </div>
    </div>
</section>

<!-- PRICING -->
<section id="pricing">
    <div class="container">
        <h2>Simple, Transparent Pricing</h2>
        <div class="pricing-grid">
            <div class="pricing-card">
                <h3>Basic</h3>
                <div class="price">$9<span>/mo</span></div>
                <ul>
                    <li>1 Terminal</li>
                    <li>Basic Reports</li>
                    <li>Email Support</li>
                </ul>
                <a href="#" class="btn-outline">Get Basic</a>
            </div>
            <div class="pricing-card featured">
                <div class="badge">Most Popular</div>
                <h3>Pro</h3>
                <div class="price">$29<span>/mo</span></div>
                <ul>
                    <li>5 Terminals</li>
                    <li>Advanced Analytics</li>
                    <li>Priority Support</li>
                </ul>
                <a href="#" class="btn-primary">Get Pro</a>
            </div>
            <div class="pricing-card">
                <h3>Enterprise</h3>
                <div class="price">$99<span>/mo</span></div>
                <ul>
                    <li>Unlimited Terminals</li>
                    <li>Custom Integrations</li>
                    <li>Dedicated Manager</li>
                </ul>
                <a href="#" class="btn-outline">Contact Us</a>
            </div>
        </div>
    </div>
</section>

<!-- CONTACT -->
<section id="contact">
    <div class="container">
        <h2>Get In Touch</h2>
        <?php if (!empty($errors)): ?>
            <div class="error-box">
                <?php foreach ($errors as $e): ?>
                    <p>❌ <?= htmlspecialchars($e) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <form method="POST" action="#contact" class="contact-form">
            <input type="text" name="name" placeholder="Your Name"
                value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
            <input type="email" name="email" placeholder="Your Email"
                value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
            <textarea name="message" placeholder="Your Message"
                rows="5"><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
            <button type="submit" class="btn-primary">Send Message</button>
        </form>
    </div>
</section>

<!-- FOOTER -->
<footer id="footer">
    <div class="container footer-content">
        <div class="logo">⚡ QuickPOS</div>
        <div class="social-links">
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
            <a href="#"><i class="fab fa-github"></i></a>
        </div>
        <p>&copy; <?= date('Y') ?> QuickPOS. All rights reserved.</p>
    </div>
</footer>

<script src="js/main.js"></script>
</body>
</html>