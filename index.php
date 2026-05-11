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

<!-- EPIC 1: HEADER -->
<header id="header">
    <div class="container nav-container">
        <div class="logo">&#9889; QuickPOS</div>
        <nav>
            <a href="#features">Features</a>
            <a href="#pricing">Pricing</a>
            <a href="#contact">Contact</a>
            <a href="#" class="btn-signup">Sign Up Free</a>
        </nav>
    </div>
</header>

<!-- EPIC 2: HERO SECTION -->
<section id="hero">
    <div class="container hero-content">
        <div class="hero-badge">&#9889; Next-Gen Point of Sale</div>
        <h1>The Fastest POS System for <span>Modern Businesses</span></h1>
        <p>Accept payments, manage inventory, and grow your business all in one place. Built for speed, security, and scale.</p>
        <div class="hero-buttons">
            <a href="#contact" class="btn-primary">Get Started Today</a>
            <a href="#features" class="btn-outline-hero">See Features</a>
        </div>
        <div class="hero-stats">
            <div class="hero-stat">
                <h3>10K+</h3>
                <p>Active Businesses</p>
            </div>
            <div class="hero-stat">
                <h3>99.9%</h3>
                <p>Uptime Guarantee</p>
            </div>
            <div class="hero-stat">
                <h3>2sec</h3>
                <p>Transaction Speed</p>
            </div>
        </div>
    </div>
</section>

<!-- EPIC 3: FEATURES SECTION -->
<section id="features">
    <div class="container">
        <div class="section-header">
            <div class="section-tag">Features</div>
            <h2>Why Choose QuickPOS?</h2>
            <p class="subtitle">Everything you need to run your business smarter and faster.</p>
        </div>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-bolt"></i></div>
                <h3>Lightning Fast</h3>
                <p>Process transactions in under 2 seconds with our optimized engine.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-shield-alt"></i></div>
                <h3>Bank-Level Security</h3>
                <p>All data encrypted with 256-bit SSL. PCI-DSS compliant.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-chart-line"></i></div>
                <h3>Real-Time Analytics</h3>
                <p>Live sales dashboards and detailed reports at your fingertips.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-mobile-alt"></i></div>
                <h3>Works Everywhere</h3>
                <p>Desktop, tablet, or mobile. QuickPOS adapts to your setup.</p>
            </div>
        </div>
    </div>
</section>

<!-- EPIC 4: PRICING SECTION -->
<section id="pricing">
    <div class="container">
        <div class="section-header">
            <div class="section-tag">Pricing</div>
            <h2>Simple, Transparent Pricing</h2>
            <p class="subtitle">No hidden fees. Cancel anytime.</p>
        </div>
        <div class="pricing-grid">
            <div class="pricing-card">
                <h3>Basic</h3>
                <div class="price">$9<span>/mo</span></div>
                <p class="pricing-desc">Perfect for small businesses just getting started.</p>
                <ul>
                    <li>1 Terminal</li>
                    <li>Basic Reports</li>
                    <li>Email Support</li>
                    <li>Up to 100 transactions/day</li>
                </ul>
                <a href="#" class="btn-outline">Get Basic</a>
            </div>
            <div class="pricing-card featured">
                <div class="badge">Most Popular</div>
                <h3>Pro</h3>
                <div class="price">$29<span>/mo</span></div>
                <p class="pricing-desc">For growing businesses that need more power.</p>
                <ul>
                    <li>5 Terminals</li>
                    <li>Advanced Analytics</li>
                    <li>Priority Support</li>
                    <li>Unlimited transactions</li>
                </ul>
                <a href="#" class="btn-primary">Get Pro</a>
            </div>
            <div class="pricing-card">
                <h3>Enterprise</h3>
                <div class="price">$99<span>/mo</span></div>
                <p class="pricing-desc">For large businesses with custom needs.</p>
                <ul>
                    <li>Unlimited Terminals</li>
                    <li>Custom Integrations</li>
                    <li>Dedicated Manager</li>
                    <li>SLA Guarantee</li>
                </ul>
                <a href="#" class="btn-outline">Contact Us</a>
            </div>
        </div>
    </div>
</section>

<!-- EPIC 5: CONTACT FORM -->
<section id="contact">
    <div class="container">
        <div class="section-header">
            <div class="section-tag">Contact</div>
            <h2>Get In Touch</h2>
            <p class="subtitle">We would love to hear from you. Send us a message.</p>
        </div>
        <div class="contact-wrapper">
            <?php if (!empty($errors)): ?>
                <div class="error-box">
                    <?php foreach ($errors as $e): ?>
                        <p><?php echo htmlspecialchars($e); ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <form method="POST" action="#contact" class="contact-form">
                <div class="form-group">
                    <label>Your Name</label>
                    <input type="text" name="name" placeholder="John Doe"
                        value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>">
                </div>
                <div class="form-group">
                    <label>Your Email</label>
                    <input type="email" name="email" placeholder="john@example.com"
                        value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
                </div>
                <div class="form-group">
                    <label>Your Message</label>
                    <textarea name="message" placeholder="How can we help you?"
                        rows="5"><?php echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea>
                </div>
                <button type="submit" class="btn-primary">Send Message</button>
            </form>
        </div>
    </div>
</section>

<!-- EPIC 6: FOOTER -->
<footer id="footer">
    <div class="container">
        <div class="footer-top">
            <div class="footer-logo">&#9889; QuickPOS</div>
            <div class="footer-links">
                <a href="#features">Features</a>
                <a href="#pricing">Pricing</a>
                <a href="#contact">Contact</a>
            </div>
            <div class="social-links">
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
                <a href="#"><i class="fab fa-github"></i></a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> QuickPOS. All rights reserved.</p>
            <p>Built with PHP and GitHub Actions</p>
        </div>
    </div>
</footer>

<script src="js/main.js"></script>
</body>
</html>
