<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APEX Games - Bug Hunter</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        /* Basic Reset & Body Styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif; /* Fallback font */
            font-family: 'Orbitron', sans-serif; /* Futuristic font */
            color: #fff;
            background-color: #0a0a1a; /* Dark blue/purple background */
            position: relative;
            overflow-x: hidden; /* Prevent horizontal scroll */
        }

        /* Background Image and Overlay */
        .background-image {
            position: fixed; /* Or absolute if preferred */
            top: 0;
            left: 0;
            width: 100%;
            height: 50vh; /* Adjust height as needed */
            /* IMPORTANT: Replace 'placeholder-background.jpg' with your actual image file */
            background: url('placeholder-background.jpg') no-repeat center center/cover;
            z-index: -2;
            opacity: 0.6; /* Adjust opacity */
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(10, 10, 26, 0.5), rgba(10, 10, 26, 1) 60%); /* Gradient overlay */
            z-index: -1;
        }


        /* Header Styling */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 5%;
            position: relative;
            z-index: 10;
        }

        .logo {
            font-size: 1.8em;
            font-weight: bold;
            color: #e0e0ff; /* Light purple/white */
            text-shadow: 0 0 5px #cc00ff, 0 0 10px #cc00ff; /* Neon glow */
        }

        nav ul {
            list-style: none;
            display: flex;
        }

        nav ul li {
            margin-left: 30px;
        }

        nav ul li a {
            text-decoration: none;
            color: #b0b0ff; /* Lighter text color */
            padding: 5px 10px;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s, text-shadow 0.3s;
        }

        nav ul li a.active,
        nav ul li a:hover {
            color: #fff;
            background-color: rgba(204, 0, 255, 0.3); /* Semi-transparent neon purple */
            text-shadow: 0 0 8px #fff;
        }

        /* Style for the link wrapping the button - Removed as button now triggers JS */
        /* header a.button-link {
             text-decoration: none;
        } */

        .sign-in-btn {
            padding: 10px 25px;
            background-color: #8A2BE2; /* BlueViolet */
            border: 1px solid #cc00ff;
            color: #fff;
            font-family: 'Orbitron', sans-serif;
            font-size: 1em;
            cursor: pointer;
            border-radius: 20px; /* Rounded corners */
            transition: background-color 0.3s, box-shadow 0.3s;
            box-shadow: 0 0 5px #cc00ff, inset 0 0 5px rgba(255, 255, 255, 0.3);
            /* display: inline-block; */ /* No longer needed if not inside <a> */
        }

        .sign-in-btn:hover {
            background-color: #9932CC; /* Darker Orchid */
            box-shadow: 0 0 15px #cc00ff, inset 0 0 8px rgba(255, 255, 255, 0.5);
        }

        /* Main Content Styling */
        main {
            padding: 0 5%;
            position: relative;
            z-index: 5;
        }

        .hero {
            display: flex;
            justify-content: space-between;
            align-items: center;
            min-height: 50vh; /* Adjust as needed */
            margin-top: 20px;
        }

        .hero-text {
            flex-basis: 50%;
            max-width: 500px;
        }

        .title-box {
            background-color: rgba(30, 30, 50, 0.7); /* Semi-transparent dark background */
            border: 1px solid #8A2BE2; /* Neon border */
            padding: 15px 30px;
            margin-bottom: 15px;
            display: inline-block; /* Make boxes wrap content */
            width: 70%; /* Adjust width */
            font-size: 3.5em; /* Large font size */
            font-weight: bold;
            color: #f0f0ff;
            text-shadow: 0 0 8px #cc00ff;
            clip-path: polygon(0 0, 100% 0, 95% 100%, 0% 100%); /* Angled edge */
        }

        .hero-text p {
            margin-top: 20px;
            margin-bottom: 30px;
            line-height: 1.6;
            color: #c0c0f0; /* Lighter text color */
            max-width: 450px; /* Limit width */
        }

        .play-now-btn {
            padding: 15px 35px;
            background-color: #cc00ff; /* Bright Neon Purple */
            border: 1px solid #e0e0ff;
            color: #fff;
            font-family: 'Orbitron', sans-serif;
            font-size: 1.2em;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px; /* Slightly rounded corners */
            transition: background-color 0.3s, box-shadow 0.3s;
            box-shadow: 0 0 10px #cc00ff, inset 0 0 8px rgba(255, 255, 255, 0.4);
            clip-path: polygon(5% 0, 100% 0, 95% 100%, 0% 100%); /* Angled edges */
        }

        .play-now-btn:hover {
            background-color: #e600ff; /* Brighter purple */
            box-shadow: 0 0 20px #e600ff, inset 0 0 10px rgba(255, 255, 255, 0.6);
        }


        .hero-image {
            flex-basis: 45%;
            text-align: center; /* Center the image if needed */
        }

        .hero-image img {
            max-width: 80%; /* Adjust size as needed */
            height: auto;
            opacity: 0.9; /* Slight transparency */
             /* Add filter for effects if desired: filter: brightness(0.9) contrast(1.1); */
        }

        /* Card Section Styling */
        .card-section {
            display: flex;
            justify-content: space-around; /* Or space-between */
            margin-top: 50px;
            padding-bottom: 50px;
            gap: 20px; /* Space between cards */
        }

        .card {
            background-color: rgba(40, 40, 60, 0.6); /* Semi-transparent card background */
            border: 1px solid #8A2BE2; /* Neon border */
            border-radius: 8px;
            overflow: hidden; /* Ensure image stays within borders */
            flex-basis: 30%; /* Adjust based on number of cards */
            max-width: 200px; /* Max width for cards */
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card img {
            display: block;
            width: 100%;
            height: auto;
            opacity: 0.8;
        }

        .card:hover {
            transform: translateY(-5px); /* Slight lift on hover */
            box-shadow: 0 0 15px #cc00ff;
        }

        /* --- Start of Modal CSS --- */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 10, 0.8); /* Darker semi-transparent overlay */
            display: none; /* Initially hidden */
            justify-content: center;
            align-items: center;
            z-index: 1000;
            backdrop-filter: blur(5px); /* Optional: blur background */
        }

        .modal-content {
            background: #101025; /* Dark background matching theme */
            /* background: linear-gradient(to bottom right, #1a1a3a, #0a0a1a); */
            padding: 30px 40px;
            border-radius: 15px;
            position: relative;
            width: 90%;
            max-width: 420px; /* Adjust width */
            box-shadow: 0 0 25px rgba(138, 43, 226, 0.6); /* Neon glow */
            border: 1px solid rgba(138, 43, 226, 0.4);
            color: #e0e0ff;
        }

        .close-modal {
            position: absolute;
            top: 10px;
            right: 15px;
            background: none;
            border: none;
            font-size: 2.2em;
            color: #a0a0c0;
            cursor: pointer;
            line-height: 1;
            padding: 0;
        }
        .close-modal:hover {
            color: #fff;
        }

        /* Modal Tabs */
        .modal-tabs {
            display: flex;
            margin-bottom: 25px;
            border-bottom: 1px solid rgba(138, 43, 226, 0.3);
        }

        .tab-btn {
            flex-grow: 1;
            padding: 10px 15px;
            background: none;
            border: none;
            color: #a0a0c0;
            font-family: 'Orbitron', sans-serif;
            font-size: 1.1em;
            cursor: pointer;
            border-bottom: 3px solid transparent;
            transition: color 0.3s, border-color 0.3s;
        }

        .tab-btn:hover {
            color: #fff;
        }

        .tab-btn.active-tab {
            color: #fff;
            border-bottom-color: #cc00ff; /* Highlight color */
        }

        /* Modal Forms General */
        .modal-form {
            display: flex;
            flex-direction: column;
            gap: 18px; /* Spacing between form elements */
        }
        .modal-form h2 {
            text-align: center;
            color: #fff;
            font-size: 1.8em;
            margin-bottom: 5px;
            text-shadow: 0 0 8px #cc00ff;
        }
        .modal-form .subheading {
            text-align: center;
            color: #b0b0ff;
            margin-bottom: 15px;
            font-size: 0.95em;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper i { /* Icon styling */
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #8A2BE2; /* Icon color */
            font-size: 1.1em;
        }

        .input-wrapper input[type="text"],
        .input-wrapper input[type="email"],
        .input-wrapper input[type="password"] {
            width: 100%;
            padding: 14px 15px 14px 50px; /* Padding: top/bottom right left icon-space */
            background-color: rgba(10, 10, 20, 0.7); /* Dark input background */
            border: 1px solid #8A2BE2; /* Neon border */
            border-radius: 30px; /* Fully rounded */
            color: #fff;
            font-family: 'Orbitron', sans-serif;
            font-size: 1em;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .input-wrapper input[type="text"]:focus,
        .input-wrapper input[type="email"]:focus,
        .input-wrapper input[type="password"]:focus {
            outline: none;
            border-color: #cc00ff;
            box-shadow: 0 0 10px rgba(204, 0, 255, 0.5);
        }

        .toggle-password { /* Eye icon for password toggle */
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #8A2BE2;
            cursor: pointer;
        }
        .toggle-password:hover {
            color: #cc00ff;
        }

        .form-options { /* Container for forgot password link */
            text-align: right;
            margin-top: -10px; /* Adjust spacing */
            margin-bottom: 10px;
        }

        .forgot-password {
            color: #b0b0ff;
            font-size: 0.9em;
            text-decoration: none;
        }
        .forgot-password:hover {
            color: #fff;
            text-decoration: underline;
        }

        .form-buttons { /* Container for primary/secondary buttons */
            display: flex;
            gap: 15px;
            margin-top: 10px;
        }

        .form-buttons .primary-btn,
        .form-buttons .secondary-btn {
            flex-grow: 1;
            padding: 12px 20px;
            border: none;
            border-radius: 30px; /* Fully rounded */
            font-family: 'Orbitron', sans-serif;
            font-size: 1.1em;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s, box-shadow 0.3s;
        }

        .form-buttons .primary-btn { /* e.g., Sign Up button */
            background-color: #fff; /* White background for primary */
            color: #1a1a3a; /* Dark text */
            border: 1px solid #fff;
        }
        .form-buttons .primary-btn:hover {
            background-color: #cc00ff;
            color: #fff;
            border-color: #cc00ff;
            box-shadow: 0 0 10px #cc00ff;
        }

        .form-buttons .secondary-btn { /* e.g., Login switch button */
            background-color: transparent; /* Transparent background */
            color: #fff; /* White text */
            border: 1px solid #8A2BE2; /* Neon border */
        }
        .form-buttons .secondary-btn:hover {
            background-color: rgba(138, 43, 226, 0.2); /* Slight neon bg on hover */
            border-color: #cc00ff;
            color: #fff;
        }

        /* Utility class to hide forms */
        .hidden-form {
            display: none;
        }
        /* --- End of Modal CSS --- */


        /* --- Responsive Adjustments --- */
        @media (max-width: 768px) {
            header {
                flex-direction: column;
            }
            nav ul {
                margin-top: 15px;
                justify-content: center;
            }
            nav ul li {
                margin: 0 15px;
            }
            /* Ensure sign-in button is centered too */
            header .sign-in-btn { /* Target button directly */
                 margin-top: 10px;
            }
            .hero {
                flex-direction: column;
                text-align: center;
            }
            .hero-text {
                max-width: 100%;
                margin-bottom: 30px;
            }
             .title-box {
                width: 90%; /* Adjust for smaller screens */
                font-size: 2.5em;
            }
            .hero-image {
                margin-top: 30px;
            }
            .card-section {
                flex-direction: column;
                align-items: center;
            }
            .card {
                margin-bottom: 20px;
            }

            /* Modal adjustments */
            .modal-content {
                padding: 25px 20px;
                max-width: 90%;
            }
            .modal-form h2 {
                font-size: 1.6em;
            }
            .tab-btn {
                 font-size: 1em;
            }
             .form-buttons {
                 flex-direction: column; /* Stack buttons */
             }
        }
         /* --- End of Responsive Adjustments --- */

    </style>
</head>
<body>
    <div class="background-image"></div>
    <div class="overlay"></div>

    <header>
        <div class="logo">APEX Games</div>
        <nav>
            <ul>
                <li><a href="#" class="active">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="contact.html">Contact Us</a></li>
            </ul>
        </nav>
        <button id="signInBtn" class="sign-in-btn">Sign In</button>
    </header>

    <main>
        <section class="hero">
            <div class="hero-text">
                <div class="title-box">BUG</div>
                <div class="title-box">HUNTER</div>
                <p>Bug Hunter: Code against the clock! Find and fix critical errors before the system--and you--crash. Every bug fixed buys you time, but one missed error could be fatal. Are you fast enough to survive?</p>
                <button class="play-now-btn">PLAY NOW!</button>
            </div>
            <div class="hero-image">
                 <img src="BugXHunters.png" alt="Character">
            </div>
        </section>

        <section class="card-section">
            <div class="card">
                 <img src="placeholder-card1.png" alt="Card 1">
                 </div>
            <div class="card">
                 <img src="placeholder-card2.png" alt="Card 2">
                 </div>
            <div class="card">
                 <img src="placeholder-card3.png" alt="Card 3">
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
                    <input type="text" placeholder="Username" required>
                </div>
                <div class="input-wrapper">
                    <i class="fas fa-envelope"></i>
                    <input type="email" placeholder="Email" required>
                </div>
                <div class="input-wrapper">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" required>
                    <span class="toggle-password"><i class="fas fa-eye"></i></span>
                </div>
                <div class="input-wrapper">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Repeat Password" required>
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
                    <i class="fas fa-user"></i> <input type="text" placeholder="Username or Email" required>
                </div>
                <div class="input-wrapper">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" required>
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

    <script>
        // Get elements
        const signInModal = document.getElementById('signInModal');
        const signInBtn = document.getElementById('signInBtn'); // *** Ensure id="signInBtn" is on your Sign In button ***
        const closeModalBtn = signInModal.querySelector('.close-modal');
        const loginTab = document.getElementById('loginTab');
        const signupTab = document.getElementById('signupTab');
        const loginForm = document.getElementById('loginForm');
        const signupForm = document.getElementById('signupForm');
        const loginSwitchBtns = document.querySelectorAll('.login-switch-btn');
        const signupSwitchBtns = document.querySelectorAll('.signup-switch-btn');
        const passwordToggles = document.querySelectorAll('.toggle-password');

        // Function to open modal
        function openModal() {
            if (signInModal) {
                signInModal.style.display = 'flex';
                 // Default to sign-up tab or check some state
                switchToSignupTab(); // Or check which tab was last active etc.
            }
        }

        // Function to close modal
        function closeModal() {
             if (signInModal) {
                signInModal.style.display = 'none';
            }
        }

        // Function to switch tabs and forms
        function switchToLoginTab() {
            loginTab.classList.add('active-tab');
            signupTab.classList.remove('active-tab');
            loginForm.classList.remove('hidden-form');
            signupForm.classList.add('hidden-form');
        }

        function switchToSignupTab() {
            signupTab.classList.add('active-tab');
            loginTab.classList.remove('active-tab');
            signupForm.classList.remove('hidden-form');
            loginForm.classList.add('hidden-form');
        }

        // Event Listeners
        if (signInBtn) {
            signInBtn.addEventListener('click', (event) => {
                 // event.preventDefault(); // Only needed if it was a link
                 openModal();
            });
        }

        if (closeModalBtn) {
            closeModalBtn.addEventListener('click', closeModal);
        }

        // Close modal if clicking on the overlay itself
        if (signInModal) {
            signInModal.addEventListener('click', (event) => {
                if (event.target === signInModal) {
                    closeModal();
                }
            });
        }

        // Tab switching
        if (loginTab) {
            loginTab.addEventListener('click', switchToLoginTab);
        }
        if (signupTab) {
            signupTab.addEventListener('click', switchToSignupTab);
        }

         // Buttons within forms to switch tabs
        loginSwitchBtns.forEach(btn => btn.addEventListener('click', switchToLoginTab));
        signupSwitchBtns.forEach(btn => btn.addEventListener('click', switchToSignupTab));

        // Password visibility toggle
         passwordToggles.forEach(toggle => {
            toggle.addEventListener('click', () => {
                // Assumes input is the direct previous sibling element
                const passwordInput = toggle.previousElementSibling;
                const icon = toggle.querySelector('i');
                if (passwordInput && passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else if (passwordInput) {
                    passwordInput.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
        });

        // Optional: Close modal on Escape key press
        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && signInModal && signInModal.style.display === 'flex') {
                closeModal();
            }
        });

    </script>

</body>
</html>