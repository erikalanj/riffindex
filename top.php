<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RiffIndex</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="images/electrics.png" type="image/png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* Minimal styling for demo */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #333;
            color: white;
        }

        .header .logo {
            font-size: 1.5em;
            font-weight: bold;
        }

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

        <!-- Logo -->
        <a href="index.php" class="logo">RiffIndex</a>
        <div class="header-right">
            <a href="about.php">About</a>
        </div>
        <!-- User section -->
        <div class="header-right">
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
                    // On hover: replace username with 'Logout'
                    const username = $(this).data("username");
                    $(this).text("Logout").data("username", username);
                },
                function() {
                    // On hover out: restore username
                    const username = $(this).data("username");
                    $(this).text(username);
                }
            );

            // Optional: Navigate to logout on click
            $(".user-button").click(function() {
                if ($(this).text() === "Logout") {
                    window.location.href = "logout.php";
                }
            });
        });
    </script>
</body>

</html>