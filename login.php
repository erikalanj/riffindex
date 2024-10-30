<?php
require "top.php"; 
require "nav.php"; 


require "db_connect.php"; 


$error = ""; //initialize error message


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    //clean up email and password
    $email = htmlspecialchars(trim($_POST['email']));
    $password = trim($_POST['password']);

    //check if email exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    //check if username and password match
    if ($user && password_verify($password, $user['password'])) {

        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_role'] = $user['role'];
        
        header("Location: index.php"); //redirect to index after successful log in
        exit();
    } else {
        $error = "Invalid email or password."; // error check
    }
}
?>

<div class="container">
    <div class="login-box">
        <div class="login-header">
            <header>Login</header>
        </div>

        
        <?php if (!empty($error)): ?> <!--display error-->
            <div class="error-message" style="color: red;">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <!-- login form with names matching the POST variables in php above -->
        <form method="POST" action="">
            <div class="input-box">
                <input type="text" name="email" class="input-field" placeholder="Email" autocomplete="off" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" class="input-field" placeholder="Password" autocomplete="off" required>
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
                <button type="submit" class="submit-btn">Sign In</button>
            </div>
        </form>

        <div class="sign-up-link">
            <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        </div>
    </div>
</div>

<?php
require "foot.php"; 
?>
