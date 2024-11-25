<?php
session_start();
include('top.php');
include('auth_check.php');
include 'db_connect.php';

// Fetch all bands
$sql = "SELECT * FROM bands";
$stmt = $conn->prepare($sql);
$stmt->execute();
$bands = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Band Database</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="band_styles.css">
</head>

<body>

    <div class="band-container">
        <h1>Band Database/<a href="user_database.php">User Database</a></h1>

        <!-- Table with Bootstrap's .table-striped class for alternating row colors -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Band Name</th>
                    <th>Founded</th>
                    <th>Members</th>
                    <th>Genre</th>
                    <th>Activity Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bands as $band): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($band['name']); ?></td>
                        <td><?php echo htmlspecialchars($band['date_created']); ?></td>
                        <td><?php echo htmlspecialchars($band['members']); ?></td>
                        <td><?php echo htmlspecialchars($band['genre']); ?></td>
                        <td><?php echo htmlspecialchars($band['activity_status']); ?></td>
                        <td class="band-actions">
                            <a href="view_band.php?id=<?php echo $band['id']; ?>" class="btn btn-info btn-sm">View</a>
                            <a href="edit_band.php?id=<?php echo $band['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete_band.php?id=<?php echo $band['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS (Optional if you want interactive components like modals) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>