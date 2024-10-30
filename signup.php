<?php
require "top.php"; // Includes the top section (head, opening body tag)
require "nav.php"; // Includes the navigation bar

// Database connection
require "db_connect.php"; // Adjust to your actual database connection file

// Initialize error message variable
$error = "";

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect input values and sanitize them
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $phone = htmlspecialchars(trim($_POST['phone'])); // New phone number field

    // Check if the passwords match
    if ($password !== $confirm_password) {
        $error = "Passwords do not match."; // Set error message
    } else {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT); // Hash password
        $role = 'casual'; // Default role for new users

        // Check if email already exists
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $existing_user = $stmt->fetch();

        if ($existing_user) {
            $error = "Email is already registered."; // Set error message
        } else {
            // Insert new user into the database
            $stmt = $conn->prepare("INSERT INTO users (name, email, password, role, phone) VALUES (?, ?, ?, ?, ?)"); // Updated SQL query
            if ($stmt->execute([$name, $email, $hashed_password, $role, $phone])) {
                // Redirect to login page after successful signup
                header("Location: login.php");
                exit();
            }
        }
    }
}
?>

<div class="container">
    <div class="login-box">
        <div class="login-header">
            <header>Sign Up</header>
        </div>

        <!-- Display error message if exists -->
        <?php if (!empty($error)): ?>
            <div class="error-message" style="color: red;">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <!-- Signup form with names matching the POST variables in PHP above -->
        <form method="POST" action="">
            <div class="input-box">
                <input type="text" name="name" class="input-field" placeholder="Full Name" autocomplete="off" required>
            </div>
            <div class="input-box">
                <input type="email" name="email" class="input-field" placeholder="Email" autocomplete="off" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" class="input-field" placeholder="Password" autocomplete="off" required>
            </div>
            <div class="input-box">
                <input type="password" name="confirm_password" class="input-field" placeholder="Confirm Password" autocomplete="off" required>
            </div>
            <div class="input-box">
                <input type="text" name="phone" class="input-field" placeholder="Phone Number" autocomplete="off" required> <!-- New phone input -->
            </div>
            <div class="forgot">
                <section>
                    <input type="checkbox" id="check">
                    <label for="check">Remember me</label>
                </section>
            </div>
            <div class="input-submit">
                <button type="submit" class="submit-btn">Sign up</button>
            </div>
        </form>

        <div class="sign-up-link">
            <p>Already have an account? <a href="login.php">Log In</a></p>
        </div>
    </div>
</div>

<?php
require "foot.php"; // Includes the footer and closing body/html tags
?>
