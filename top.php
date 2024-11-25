<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RiffIndex</title>
    <link rel="icon" href="images/electrics.png" type="image/png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="styles.css">
    <style>
        .header-right button {
            background-color: #444;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
        }

        .header-right button:hover {
            background-color: #555;
        }
    </style>
</head>

<body>
    <div class="header">
        <span class="open-sidenav" onclick="openNav()">&#9776;</span>

        <div class="logo-container">
            <a href="index.php" class="logo">RiffIndex</a>
        </div>

        <div class="header-right">
            <a href="about.php" class="about-link">About</a>
            <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                <button class="user-button" data-username="<?php echo htmlspecialchars($_SESSION['user_name']); ?>">
                    <?php echo htmlspecialchars($_SESSION['user_name']); ?>
                </button>
            <?php else: ?>
                <a href="login.php">Login</a>
                <a href="signup.php">Sign Up</a>
            <?php endif; ?>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $(".user-button").hover(
                function() {
                    const username = $(this).data("username");
                    $(this).text("Logout").data("username", username);
                },
                function() {
                    const username = $(this).data("username");
                    $(this).text(username);
                }
            );

            $(".user-button").click(function() {
                if ($(this).text() === "Logout") {
                    window.location.href = "logout.php";
                }
            });
        });
    </script>
</body>

</html>