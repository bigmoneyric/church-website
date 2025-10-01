<?php
include 'db.php'; // include your database connection

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // sanitize input

    // Get the image path before deleting
    $sql = "SELECT image_path FROM gallery WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $imagePath = $row['image_path'];

        // Delete from DB
        $deleteSql = "DELETE FROM gallery WHERE id = $id";
        if ($conn->query($deleteSql) === TRUE) {
            // Delete the file from uploads folder
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            echo "<p style='color:green;'>✅ Photo deleted successfully!</p>";
        } else {
            echo "<p style='color:red;'>❌ Error deleting record: " . $conn->error . "</p>";
        }
    } else {
        echo "<p style='color:red;'>❌ Photo not found in database.</p>";
    }
} else {
    echo "<p style='color:red;'>❌ No photo ID provided.</p>";
}

$conn->close();
?>
