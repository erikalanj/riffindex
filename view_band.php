<?php include('top.php'); ?>
<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $band_id = $_GET['id'];
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
    <link rel="stylesheet" href="band_styles.css">
</head>

<body>

    <div class="band-container">
        <h1><?php echo htmlspecialchars($band['name']); ?></h1>

        <div class="band-card">
            <h3>Genre: <?php echo htmlspecialchars($band['genre']); ?></h3>
            <p><strong>Activity Status:</strong> <?php echo htmlspecialchars($band['activity_status']); ?></p>
            <p class="band-description"><strong>Description:</strong> <?php echo nl2br(htmlspecialchars($band['description'])); ?></p>
        </div>

        <div class="band-actions">
            <a href="edit_band.php?id=<?php echo $band['id']; ?>"><button>Edit Band</button></a>
            <a href="band_database.php"><button>Back to Database</button></a>
        </div>
    </div>

</body>

</html>