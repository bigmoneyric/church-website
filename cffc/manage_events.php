<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Events | CFFC Admin</title>
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
        <h1>Manage Events</h1>
        <p>Add, view, or delete church events.</p>
      </div>

      <!-- Add Event Form -->
      <div class="stat-card">
        <h2>Add New Event</h2>
        <form method="POST" action="add_event.php">
          <input type="text" name="title" placeholder="Event Title" required><br><br>
          <textarea name="description" placeholder="Event Description"></textarea><br><br>
          <input type="date" name="event_date" required><br><br>
          <button type="submit" class="btn">Add Event</button>
        </form>
      </div>

      <!-- Event List -->
      <div class="stat-card">
        <h2>Existing Events</h2>
        <?php
        $result = $conn->query("SELECT * FROM events ORDER BY event_date ASC");
        if ($result->num_rows > 0) {
          echo "<table border='1' cellpadding='10' style='width:100%; border-collapse: collapse;'>
                  <tr><th>Title</th><th>Description</th><th>Date</th><th>Action</th></tr>";
          while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['title']}</td>
                    <td>{$row['description']}</td>
                    <td>{$row['event_date']}</td>
                    <td>
                        <a href='edit_event.php?id={$row['id']}'>Edit</a> |
                        <a href='delete_event.php?id={$row['id']}' onclick=\"return confirm('Delete this event?');\">Delete</a>
                    </td>";
          
          }
          echo "</table>";
        } else {
          echo "<p>No events yet.</p>";
        }
        ?>
      </div>
    </main>
  </div>
</body>
</html>
<?php $conn->close(); ?>