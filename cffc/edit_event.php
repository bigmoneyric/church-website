<?php 
include 'db.php';

// Get event details
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = $conn->query("SELECT * FROM events WHERE id = $id");
    if ($result->num_rows == 1) {
        $event = $result->fetch_assoc();
    } else {
        die("Event not found.");
    }
} else {
    die("Invalid request.");
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
    $event_date = $conn->real_escape_string($_POST['event_date']);

    $update = $conn->query("UPDATE events SET title='$title', description='$description', event_date='$event_date' WHERE id=$id");

    if ($update) {
        header("Location: manage_events.php?msg=Event updated successfully");
        exit();
    } else {
        echo "Error updating event: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Event | CFFC Admin</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <!-- Header -->
  <header class="header">
    <div class="header-content">
      <div class="logo">
        <div class="logo-icon">C</div>
        <span>CFFC Admin</span>
      </div>
      <div class="user-info">
        <div class="user-avatar">A</div>
        <a href="logout.php" class="logout-btn">Logout</a>
      </div>
    </div>
  </header>

  <div class="dashboard-container">
    <!-- Sidebar -->
    <aside class="sidebar">
      <a href="admin.php" class="nav-item">🏠 Dashboard</a>
      <a href="manage_events.php" class="nav-item active">📅 Manage Events</a>
      <a href="manage_gallery.php" class="nav-item">🖼️ Manage Gallery</a>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
      <div class="page-header">
        <h1>Edit Event</h1>
        <p>Update details for the selected event.</p>
      </div>

      <div class="stat-card">
        <form method="POST">
          <label>Title:</label><br>
          <input type="text" name="title" value="<?php echo htmlspecialchars($event['title']); ?>" required><br><br>

          <label>Description:</label><br>
          <textarea name="description"><?php echo htmlspecialchars($event['description']); ?></textarea><br><br>

          <label>Date:</label><br>
          <input type="date" name="event_date" value="<?php echo $event['event_date']; ?>" required><br><br>

          <button type="submit" class="btn">Update Event</button>
        </form>
      </div>
    </main>
  </div>

</body>
</html>
<?php $conn->close(); ?>