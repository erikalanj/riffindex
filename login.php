<?php
require "top.php"; // Includes the top section (head, opening body tag)
require "nav.php"; // Includes the navigation bar
?>

<body>
    <div class="container">
      <div class="sign-up-form">
        <!-- Left (Form Image) -->
        <div class="form-image">
          <img src="./assets/form-bg.png" alt="" />
        </div>
        <!-- Right (Form Content) -->
        <form class="form-content" action="login.php" method="POST">
          <!-- Form Heading -->
          <div class="form-heading">
            <img src="./assets/logo.png" alt="" />
            <h1>Login</h1>
            <p>Please fill out all the required fields to log in!</p>
          </div>
          <!-- Input Wrap -->
          <div class="input-wrap">
            <div class="input">
              <input type="text" id="username" name="username" placeholder=" " required />
              <div class="label">
                <label for="username">Username</label>
              </div>
            </div>
            <div class="input">
              <input type="password" id="password" name="password" placeholder=" " required />
              <div class="label">
                <label for="password">Password</label>
              </div>
            </div>
            </div>
            <br>
            <div class="forgot-password-link">
            <p><a href="forgot-password.php">Forgot your password?</a></p>
            </div>
            <br>
            <button type="submit">Login</button>
            <br>
            <p>Don't have an account? <a href="signup.php">Sign up</a></p></div>
          </div>
        </form>
      </div>
    </div>
</body>

<?php
require "foot.php"; // Includes the footer and closing body/html tags
?>
