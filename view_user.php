<?php
session_start();
include('top.php');
include 'db_connect.php';
include('auth_check.php');

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Fetch the user details
    $sql = "SELECT * FROM users WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo "User not found.";
        exit;
    }
}
$user_role = $_SESSION['role'] ?? 'member'; // Default to 'member' if not set

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="band_styles.css">
</head>

<body>

    <div class="band-container about-page">
        <h1 class="about-title"><?php echo htmlspecialchars($user['name']); ?></h1>
        <p class="about-subtitle">Role: <?php echo htmlspecialchars($user['role']); ?></p>
        <div class="about-content">
            <div class="about-section">
                <h3>Email</h3>
                <p><?php echo htmlspecialchars($user['email']); ?></p>
            </div>
            <div class="about-section">
                <h3>Phone</h3>
                <p><?php echo htmlspecialchars($user['phone']); ?></p>
            </div>
            <div class="about-section">
                <h3>Profile Image</h3>
                <img src="<?php echo htmlspecialchars($user['image'] ?: 'default.jpg'); ?>" alt="User Image" style="width:150px; border-radius:50%;">
            </div>
        </div>
        <div class="about-cta">
            <?php if ($user_role === 'admin'): ?>
                <a href="edit_user.php?id=<?php echo $user['id']; ?>" class="cta-button">Edit User</a>
            <?php endif; ?>

            <a href="user_database.php" class="cta-button">Back to Database</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>