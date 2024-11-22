<?php include('top.php'); ?>
<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $band_id = $_GET['id'];

    // Fetch the band info for editing
    $sql = "SELECT * FROM bands WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $band_id, PDO::PARAM_INT);
    $stmt->execute();
    $band = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$band) {
        echo "Band not found.";
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Update band information
        $name = $_POST['name'];
        $genre = $_POST['genre'];
        $activity_status = $_POST['activity_status'];
        $description = $_POST['description'];

        $sql = "UPDATE bands SET name = :name, genre = :genre, activity_status = :activity_status, description = :description WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':genre', $genre, PDO::PARAM_STR);
        $stmt->bindParam(':activity_status', $activity_status, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':id', $band_id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            // Band updated successfully, show success modal
            $update_status = 'success';
        } else {
            // Error updating band, show error modal
            $update_status = 'error';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Band</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="band_styles.css">
</head>

<body>

    <div class="band-container">
        <h1>Edit Band</h1>

        <!-- Band Edit Form -->
        <form action="edit_band.php?id=<?php echo $band['id']; ?>" method="POST">
            <label for="name">Band Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($band['name']); ?>" required>

            <label for="genre">Genre:</label>
            <input type="text" id="genre" name="genre" value="<?php echo htmlspecialchars($band['genre']); ?>" required>

            <label for="activity_status">Activity Status:</label>
            <select id="activity_status" name="activity_status" required>
                <option value="active" <?php echo ($band['activity_status'] == 'active') ? 'selected' : ''; ?>>Active</option>
                <option value="inactive" <?php echo ($band['activity_status'] == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
            </select>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required><?php echo htmlspecialchars($band['description']); ?></textarea>

            <button type="submit">Update Band</button>
        </form>
    </div>

    <!-- Success Modal -->
    <?php if (isset($update_status) && $update_status == 'success'): ?>
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title" id="successModalLabel">Band Updated Successfully</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        The band has been updated successfully.
                    </div>
                    <div class="modal-footer">
                        <a href="band_database.php"><button type="button" class="btn btn-success">Return to Database</button></a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Error Modal -->
    <?php if (isset($update_status) && $update_status == 'error'): ?>
        <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="errorModalLabel">Error Updating Band</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        There was an error updating the band. Please try again later.
                    </div>
                    <div class="modal-footer">
                        <a href="band_database.php"><button type="button" class="btn btn-danger">Return to Database</button></a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Bootstrap JS (Optional if you want interactive components like modals) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Automatically show the modal on page load if there's a success/error -->
    <script>
        <?php if (isset($update_status)): ?>
            var modalId = '<?php echo ($update_status == 'success') ? 'successModal' : 'errorModal'; ?>';
            var myModal = new bootstrap.Modal(document.getElementById(modalId));
            myModal.show();
        <?php endif; ?>
    </script>

</body>

</html>