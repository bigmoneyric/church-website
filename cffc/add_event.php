<?php
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $event_date = $_POST['event_date'];

    // Prevent SQL injection
    $title = $conn->real_escape_string($title);
    $description = $conn->real_escape_string($description);
    $event_date = $conn->real_escape_string($event_date);

    $sql = "INSERT INTO events (title, description, event_date) 
            VALUES ('$title', '$description', '$event_date')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:green;'>✅ Event added successfully!</p>";
    } else {
        echo "<p style='color:red;'>❌ Error: " . $conn->error . "</p>";
    }
}

$conn->close();
?>
