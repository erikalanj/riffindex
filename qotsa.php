<?php
$title = "Queens of the Stone Age Fan Page";
$bandName = "Queens of the Stone Age";
$description = "Queens of the Stone Age is an American rock band formed in 1996. They are known for their unique sound, blending elements of rock, punk, and heavy metal.";
$socialLinks = [
    "Website" => "https://qotsa.com",
    "Twitter" => "https://twitter.com/qotsa",
    "Instagram" => "https://www.instagram.com/qotsa/",
    "Facebook" => "https://www.facebook.com/qotsa/"
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }
        header {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
        }
        h1 {
            margin: 0;
        }
        .content {
            background: white;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        footer {
            text-align: center;
            margin-top: 20px;
        }
        a {
            color: #333;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .social-links {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1><?php echo $bandName; ?></h1>
    </header>
    <div class="content">
        <h2>About the Band</h2>
        <p><?php echo $description; ?></p>

        <h3>Social Media Links:</h3>
        <div class="social-links">
            <?php foreach ($socialLinks as $platform => $link): ?>
                <p><a href="<?php echo $link; ?>" target="_blank"><?php echo $platform; ?></a></p>
            <?php endforeach; ?>
        </div>
    </div>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> <?php echo $bandName; ?> Fan Page</p>
    </footer>
</body>
</html>
