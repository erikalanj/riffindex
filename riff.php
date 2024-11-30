<?php
session_start();
require "top.php";
require "nav.php";
include('auth_check.php');

// Handle the search query before outputting any HTML
if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];

    // Tokenize query so it will be understandable in the URL
    $formattedQuery = urlencode($searchQuery);

    // Concatenate the URL with the query
    $url = "https://www.ultimate-guitar.com/search.php?search_type=title&value=" . $formattedQuery;

    // Redirect to the URL
    header("Location: " . $url);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Search for Guitar Tutorials</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h2 class="text-center mb-4">Search Guitar Tutorials</h2>

        <!-- Search Form -->
        <form class="mb-3" method="get" action="riff.php">
            <div class="input-group">
                <input type="text" class="form-control" autocomplete="off" placeholder="Enter song/artist name..."
                    id="search_term" name="query" required>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i> Search
                </button>
            </div>
        </form>
    </div>

    <style>
        .table-container {
            margin-top: 60px;
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>