<?php
require "top.php";
require "nav.php";
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
    <div class="container mt-5">
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

        <
            <?php
            if (isset($_GET['query'])) {

                $searchQuery = $_GET['query'];

                //tokenize query so it will be understandable in the url
                $formattedQuery = urlencode($searchQuery);

                //concatenate the url with the query
                $url = "https://www.ultimate-guitar.com/search.php?search_type=title&value=" . $formattedQuery;

                //go to url!!!!
                header("Location: " . $url);
                exit();
            }
            ?>
            </div>

            <style>
                body {
                    padding-top: 60px;
                }

                .table-container {
                    margin-top: 60px;
                }
            </style>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
require "foot.php";
?>