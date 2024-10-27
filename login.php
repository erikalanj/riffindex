<?php
require "top.php"; // Includes the top section (head, opening body tag)
require "nav.php"; // Includes the navigation bar
?>

<div class="container">
    <div class="login-box">
        <div class="login-header">
            <header>Login</header>
        </div>
        <div class="input-box">
            <input type="text" class="input-field" placeholder="Email" autocomplete="off" required>
        </div>
        <div class="input-box">
            <input type="password" class="input-field" placeholder="Password" autocomplete="off" required>
        </div>
        <div class="forgot">
            <section>
                <input type="checkbox" id="check">
                <label for="check">Remember me</label>
            </section>
            <section>
                <a href="#">Forgot password</a>
            </section>
        </div>
        <div class="input-submit">
            <button class="submit-btn" id="submit"></button>
            <label for="submit">Sign In</label>
        </div>
        <div class="sign-up-link">
            <p>Don't have account? <a href="signup.php">Sign Up</a></p>
        </div>
    </div>
</div>

<?php
require "foot.php"; // Includes the footer and closing body/html tags
?>