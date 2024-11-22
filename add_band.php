<?php include('top.php'); ?>
<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $genre = $_POST['genre'];
    $activity_status = $_POST['activity_status'];
    $description = $_POST['description'];

    $sql = "INSERT INTO bands (name, genre, activity_status, description) VALUES (:name, :genre, :activity_status, :description)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':genre', $genre);
    $stmt->bindParam(':activity_status', $activity_status);
    $stmt->bindParam(':description', $description);

    if ($stmt->execute()) {
        echo "Band added successfully!";
    } else {
        echo "Error adding band.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Band</title>
    <link rel="stylesheet" href="band_styles.css">
</head>

<body>

    <div class="band-container">
        <h1>Add Band</h1>
        <form action="add_band.php" method="POST" class="band-form">
            <input type="text" name="name" placeholder="Band Name" required>
            <input type="text" name="genre" placeholder="Genre" required>
            <select name="activity_status" required>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
            <textarea name="description" placeholder="Band Description" rows="5" required></textarea>
            <button type="submit">Add Band</button>
        </form>
    </div>

</body>

</html>