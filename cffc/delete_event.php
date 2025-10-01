<?php
include 'db.php'; 

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // sanitize input

    $sql = "DELETE FROM events WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:green;'>✅ Event deleted successfully!</p>";
    } else {
        echo "<p style='color:red;'>❌ Error: " . $conn->error . "</p>";
    }
} else {
    echo "<p style='color:red;'>❌ No event ID provided.</p>";
}

$conn->close();
?>
