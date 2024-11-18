<?php
require "top.php";
// band_database.php

// include database connection
include 'db_connect.php';

// fetch band data from the database
$sql = "SELECT * FROM bands";

try {
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // fetch all results as an associative array
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!--need to add other style sheet to make database look more seamless-->
    <title>Band Database</title>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Band Database</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Date Created</th>
                    <th>Members</th>
                    <th>Activity Status</th>
                    <th>Genre</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result) { // check if result is not empty
                    if (count($result) > 0) {
                        // output data of each row
                        foreach ($result as $row) {
                            echo "<tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['name']}</td>
                                    <td>{$row['date_created']}</td>
                                    <td>{$row['members']}</td>
                                    <td>{$row['activity_status']}</td>
                                    <td>{$row['genre']}</td>
                                    <td>
                                        <a href='edit_band.php?id={$row['id']}' class='btn btn-warning'>Edit</a>
                                        <a href='delete_band.php?id={$row['id']}' class='btn btn-danger'>Delete</a>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7' class='text-center'>No bands found</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>No results returned</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="add_band.php" class="btn btn-primary">Add New Band</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>