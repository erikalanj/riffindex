<?php
session_start();
if ($_SESSION['role'] !== 'admin') {
    header("Location: band_database.php");
    exit();
}
include('top.php');
include('auth_check.php');
include 'db_connect.php';

// Pagination logic
$items_per_page = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $items_per_page;

// Fetch total number of users for pagination
$total_users_sql = "SELECT COUNT(*) FROM users";
$total_users = $conn->query($total_users_sql)->fetchColumn();
$total_pages = ceil($total_users / $items_per_page);

// Fetch users for the current page
$sql = "SELECT * FROM users LIMIT :offset, :items_per_page";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->bindParam(':items_per_page', $items_per_page, PDO::PARAM_INT);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

$user_role = $_SESSION['role'] ?? 'member'; // Default to 'member' if not set
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Database</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="band_styles.css">
</head>

<body>
    <div class="body-content">
        <div class="band-container">
            <h1 class="text-center mb-4">User Database</h1>

            <!-- Navigation Buttons -->
            <div class="text-center mb-4">
                <a href="band_database.php" class="btn btn-secondary btn-lg">Band Database</a>
                <a href="user_database.php" class="btn btn-primary btn-lg">User Database</a>
            </div>

            <!-- User Table -->
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
                            <td>
                                <img src="<?php echo htmlspecialchars($user['image'] ?: 'default.jpg'); ?>" alt="User Image"
                                    style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                            </td>
                            <td><?php echo htmlspecialchars($user['name'] ?: 'N/A'); ?></td>
                            <td><?php echo htmlspecialchars($user['email'] ?: 'N/A'); ?></td>
                            <td><?php echo htmlspecialchars($user['role'] ?: 'N/A'); ?></td>
                            <td><?php echo htmlspecialchars($user['phone'] ?: 'N/A'); ?></td>
                            <td>
                                <a href="view_user.php?id=<?php echo $user['id']; ?>" class="btn btn-info btn-sm">View</a>
                                <?php if ($user_role === 'admin'): ?>
                                    <br>
                                    <br>
                                    <a href="edit_user.php?id=<?php echo $user['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <br>
                                    <br>
                                    <a href="delete_user.php?id=<?php echo $user['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- Pagination -->
            <nav>
                <ul class="pagination justify-content-center">
                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?php if ($i === $page) echo 'active'; ?>">
                            <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </nav>
        </div>
    </div>

    <style>
        .band-container {
            max-width: 900px;
            margin: 0 auto;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
require "foot.php";
?>