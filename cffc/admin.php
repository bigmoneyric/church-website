<?php include 'db.php'; 
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard | CFFC</title>
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
      <a href="admin.php" class="nav-item active">
        <span class="nav-icon">🏠</span> Dashboard
      </a>
      <a href="manage_events.php" class="nav-item">
        <span class="nav-icon">📅</span> Manage Events
      </a>
      <a href="manage_gallery.php" class="nav-item">
        <span class="nav-icon">🖼️</span> Manage Gallery
      </a>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
      <div class="page-header">
        <h1>Welcome, Admin</h1>
        <p>Manage events and gallery content for your church website.</p>
      </div>

      <!-- Stats Example -->
      <div class="stats-grid">
        <div class="stat-card">
          <div class="stat-header">
            <span class="stat-title">Total Events</span>
            <div class="stat-icon events">📅</div>
          </div>
          <?php
          $res = $conn->query("SELECT COUNT(*) AS total FROM events");
          $row = $res->fetch_assoc();
          ?>
          <div class="stat-value"><?php echo $row['total']; ?></div>
        </div>

        <div class="stat-card">
          <div class="stat-header">
            <span class="stat-title">Total Photos</span>
            <div class="stat-icon members">🖼️</div>
          </div>
          <?php
          $res = $conn->query("SELECT COUNT(*) AS total FROM gallery");
          $row = $res->fetch_assoc();
          ?>
          <div class="stat-value"><?php echo $row['total']; ?></div>
        </div>
      </div>

      <!-- Quick Actions -->
      <div class="quick-actions">
        <h2 class="section-title">Quick Actions</h2>
        <div class="action-grid">
          <a href="manage_events.php" class="action-btn">
            <div class="action-icon">➕</div>
            <span>Add New Event</span>
          </a>
          <a href="manage_gallery.php" class="action-btn">
            <div class="action-icon">🖼️</div>
            <span>Upload Photo</span>
          </a>
        </div>
      </div>
    </main>
  </div>

</body>
</html>