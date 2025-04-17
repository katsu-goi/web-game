<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - APEX Games</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <?php
        // You could add specific meta tags for this page using PHP if needed
    ?>
</head>
<body>
    <?php
        // Potential PHP logic to slightly modify background/overlay for this page
        // For simplicity, we rely on CSS overrides or assume the default background
        // A better method might involve adding a class to the body:
        // <body class="page-about">
    ?>
    <div class="background-image"></div> <?php // Uses the background defined in style.css - you might override this with inline style or a body class ?>
    <div class="overlay"></div>

    <header>
        <div class="logo">APEX Games</div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li> <?php // Link to index.php ?>
                <li><a href="about.php" class="active">About Us</a></li> <?php // Active class is on this link ?>
                <li><a href="contact.php">Contact Us</a></li> <?php // Link to contact.php ?>
            </ul>
        </nav>
        <button id="signInBtn" class="sign-in-btn">Sign In</button>
    </header>

    <main>
        <section class="about-content">
            <div class="about-image-container">
                 <img src="logo.jpg" alt="Apex Games Logo">
                 <?php
                    // Example: Dynamic image source
                    // $aboutLogo = 'images/company-logo.png';
                    // echo '<img src="' . htmlspecialchars($aboutLogo) . '" alt="Apex Games Logo">';
                 ?>
            </div>
            <div class="about-text-container">
                <p>
                    <?php
                        // Example: Fetching description from a database or variable
                        $companyDescription = "\"APEXGAMES is a dynamic force in the gaming industry, dedicated to creating simple yet deeply rewarding gaming experiences. We develop accessible games that appeal to players, ensuring that ease of play doesn't compromise the thrill of substantial rewards. Our mission is to bridge the gap between casual gaming and high-stakes excitement, offering engaging gameplay with significant payoffs. We strive to provide a gaming environment where everyone can experience the joy of victory, regardless of their skill level.\"";
                        echo nl2br(htmlspecialchars($companyDescription)); // nl2br might not be needed if text doesn't have newlines
                    ?>
                </p>
            </div>
        </section>
    </main>
    <div id="signInModal" class="modal-overlay">
        <div class="modal-content">
            <button class="close-modal" aria-label="Close modal">&times;</button>
            <div class="modal-tabs">
                <button id="loginTab" class="tab-btn">LOGIN</button>
                <button id="signupTab" class="tab-btn active-tab">SIGN-UP</button>
            </div>

            <form id="signupForm" class="modal-form" action="#" method="post">
                <h2>WELCOME!</h2>
                <p class="subheading">Create your account</p>
                <div class="input-wrapper">
                    <i class="fas fa-user"></i>
                    <input type="text" name="signup_username" placeholder="Username" required>
                </div>
                <div class="input-wrapper">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="signup_email" placeholder="Email" required>
                </div>
                <div class="input-wrapper">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="signup_password" placeholder="Password" required>
                    <span class="toggle-password"><i class="fas fa-eye"></i></span>
                </div>
                <div class="input-wrapper">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="signup_repeat_password" placeholder="Repeat Password" required>
                    <span class="toggle-password"><i class="fas fa-eye"></i></span>
                </div>
                <div class="form-buttons">
                    <button type="button" class="secondary-btn login-switch-btn">Login</button>
                    <button type="submit" class="primary-btn">Sign Up</button>
                </div>
            </form>

            <form id="loginForm" class="modal-form hidden-form" action="#" method="post">
                <h2>WELCOME BACK!</h2>
                <p class="subheading">Sign in to your account</p>
                <div class="input-wrapper">
                    <i class="fas fa-user"></i>
                    <input type="text" name="login_identifier" placeholder="Username or Email" required>
                </div>
                <div class="input-wrapper">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="login_password" placeholder="Password" required>
                    <span class="toggle-password"><i class="fas fa-eye"></i></span>
                </div>
                <div class="form-options">
                    <a href="#" class="forgot-password">Forgot Password?</a>
                </div>
                <div class="form-buttons">
                    <button type="button" class="secondary-btn signup-switch-btn">Sign Up</button>
                    <button type="submit" class="primary-btn">Login</button>
                </div>
            </form>
        </div>
    </div>
    <script src="modal.js"></script>

    <?php
        // You could include a shared footer here
        // include 'footer.php';
    ?>

</body>
</html>