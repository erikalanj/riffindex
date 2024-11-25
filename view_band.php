<?php include('top.php'); ?>
<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $band_id = $_GET['id'];

    // Fetch the band details
    $sql = "SELECT * FROM bands WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $band_id, PDO::PARAM_INT);
    $stmt->execute();
    $band = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$band) {
        echo "Band not found.";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Band</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="band_styles.css">
</head>

<body>

    <div class="band-container about-page">
        <h1 class="about-title"><?php echo htmlspecialchars($band['name']); ?></h1>
        <p class="about-subtitle">Genre: <?php echo htmlspecialchars($band['genre']); ?></p>
        <div class="about-content">
            <div class="about-section">
                <h3>Date Created</h3>
                <p><?php echo htmlspecialchars($band['date_created']); ?></p>
            </div>
            <div class="about-section">
                <h3>Members</h3>
                <p><?php echo htmlspecialchars($band['members']); ?></p>
            </div>
            <div class="about-section">
                <h3>Activity Status</h3>
                <p><?php echo htmlspecialchars($band['activity_status']); ?></p>
            </div>
            <div class="about-section">
                <h3>Description</h3>
                <p><?php echo htmlspecialchars($band['description']); ?></p>
            </div>
        </div>
        <div class="about-cta">
            <a href="edit_band.php?id=<?php echo $band['id']; ?>" class="cta-button">Edit Band</a>
            <a href="band_database.php" class="cta-button">Back to Database</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>