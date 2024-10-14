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
        <form class="form-content" action="signup.php" method="POST">
          <!-- Form Heading -->
          <div class="form-heading">
            <img src="./assets/logo.png" alt="" />
            <h1>Create Account</h1>
            <p>Please fill out all the required fields to create your account!</p>
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
              <input type="email" id="email" name="email" placeholder=" " required />
              <div class="label">
                <label for="email">Email</label>
              </div>
            </div>
            <div class="input">
              <input type="password" id="password" name="password" placeholder=" " required />
              <div class="label">
                <label for="password">Password</label>
              </div>
            </div>
            <div class="input">
              <input type="password" id="confirmPassword" name="confirmPassword" placeholder=" " required />
              <div class="label">
                <label for="confirmPassword">Confirm Password</label>
              </div>
            </div>
            <button type="submit">Create Account</button>
          </div>
        </form>
      </div>
    </div>
</body>

<?php
require "foot.php"; // Includes the footer and closing body/html tags
?>

