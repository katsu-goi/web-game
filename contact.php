<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - APEX Games</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        // Optional: Add body class if specific background/overlay needed
        // <body class="page-contact">
    ?>
    <div class="background-image"></div> <?php // Uses background from style.css ?>
    <div class="overlay"></div>

    <header>
        <div class="logo">APEX Games</div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li> <?php // Link to index.php ?>
                <li><a href="about.php">About Us</a></li> <?php // Link to about.php ?>
                <li><a href="contact.php" class="active">Contact Us</a></li> <?php // Active class here ?>
            </ul>
        </nav>
        <button id="signInBtn" class="sign-in-btn">Sign In</button>
    </header>

    <main>
        <h1 class="main-heading">Get in Touch.</h1>

        <section class="contact-content">
            

            <div class="contact-details">
                <h2>Contact Us</h2>
                <p>Whether you have questions about our services, need support, or want to share your feedback, our dedicated team is here to assist you every step of the way.</p>

                <?php
                    // Example: Contact details could come from variables or database
                    $contact_email = "ApexGames@gmail.com";
                    $discord_link = "#"; // Replace with actual Discord invite/server link
                    $discord_tag = "ApexGames#discord";
                    $phone_number = "+123-456-7890";
                    $twitter_link = "https://twitter.com/ApexGamesXcom";
                    $twitter_handle = "https://ApexGamesXcom"; // Or just @ApexGamesXcom
                ?>

                <div class="contact-method">
                    <i class="fas fa-envelope"></i> <div>
                        <span>Email</span>
                        <a href="mailto:<?php echo htmlspecialchars($contact_email); ?>"><?php echo htmlspecialchars($contact_email); ?></a>
                    </div>
                </div>

                 <div class="contact-method">
                     <i class="fab fa-discord"></i> <div>
                         <span>Discord</span>
                         <a href="<?php echo htmlspecialchars($discord_link); ?>" target="_blank"><?php echo htmlspecialchars($discord_tag); ?></a>
                     </div>
                 </div>

                <div class="contact-method">
                    <i class="fas fa-phone"></i> <div>
                        <span>Phone</span>
                        <span class="detail"><?php echo htmlspecialchars($phone_number); ?></span>
                    </div>
                </div>

                <div class="contact-method">
                    <i class="fab fa-twitter"></i> <div>
                        <span>Twitter</span>
                        <a href="<?php echo htmlspecialchars($twitter_link); ?>" target="_blank"><?php echo htmlspecialchars($twitter_handle); ?></a>
                    </div>
                </div>
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
        // include 'footer.php';
    ?>

</body>
</html>