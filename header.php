<?php // File: header.php ?>
<div class="background-image"></div>
<div class="overlay"></div>

<header>
    <div class="logo">APEX Games</div>
    <nav>
        <ul>
            <?php
                // Determine the current page to set the 'active' class
                // This is a simple example; more robust methods exist
                $currentPage = basename($_SERVER['SCRIPT_FILENAME']);
            ?>
            <li><a href="index.php" class="<?php echo ($currentPage == 'index.php') ? 'active' : ''; ?>">Home</a></li>
            <li><a href="about.php" class="<?php echo ($currentPage == 'about.php') ? 'active' : ''; ?>">About Us</a></li>
            <li><a href="contact.php" class="<?php echo ($currentPage == 'contact.php') ? 'active' : ''; ?>">Contact Us</a></li>
        </ul>
    </nav>
    <button id="signInBtn" class="sign-in-btn">Sign In</button>
</header>