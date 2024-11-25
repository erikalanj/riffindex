<?php
session_start();
include('top.php');
include 'db_connect.php';
include('auth_check.php');


// Fetch all users
$sql = "SELECT * FROM users";
$stmt = $conn->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Database</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="band_styles.css">
</head>

<body>

    <div class="band-container">
        <h1><a href="band_database.php">Band Database</a>/User Database</h1>

        <!-- Table with consistent styling and functionality -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <!-- User image (with placeholder if missing) -->
                        <td>
                            <img src="<?php echo htmlspecialchars($user['image'] ?: 'default.jpg'); ?>"
                                alt="User Image"
                                style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                        </td>
                        <td><?php echo htmlspecialchars($user['name'] ?: 'N/A'); ?></td>
                        <td><?php echo htmlspecialchars($user['email'] ?: 'N/A'); ?></td>
                        <td><?php echo htmlspecialchars($user['role'] ?: 'N/A'); ?></td>
                        <!-- Null handling for phone field -->
                        <td><?php echo htmlspecialchars($user['phone'] ?: 'N/A'); ?></td>
                        <td class="band-actions">
                            <a href="view_user.php?id=<?php echo $user['id']; ?>" class="btn btn-info btn-sm">View</a>
                            <a href="edit_user.php?id=<?php echo $user['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete_user.php?id=<?php echo $user['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>