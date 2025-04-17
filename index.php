<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APEX Games - Bug Hunter</title> <?php // Adjust title as needed ?>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="background-image"></div>
    <div class="overlay"></div>
    <div class="horizontal-line"></div>

    <header>
        <div class="logo">APEX Games</div>
        <nav>
            <ul>
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </nav>
        <button id="signInBtn" class="sign-in-btn">Sign In</button>
        
    </header>

    <main>
        <?php // Your main page content (hero section, cards, etc.) goes here ?>
        <section class="hero">
             <div class="hero-text">
                 <div class="title-box">BUG</div>
                 <div class="title-box">HUNTER</div>
                 <p>Bug Hunter: Code against the clock! 
                    Find and fix critical errors before the system--and you--crash. 
                    Every bug fixed buys you time, but one missed error could be fatal. 
                    Are you fast enough to survive?</p>
                 <button class="play-now-btn">PLAY NOW!</button>
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

</body>
</html>
