<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Gallery | CFFC Admin</title>
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
      <a href="manage_events.php" class="nav-item">📅 Manage Events</a>
      <a href="manage_gallery.php" class="nav-item active">🖼️ Manage Gallery</a>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
      <div class="page-header">
        <h1>Manage Gallery</h1>
        <p>Upload and manage photo gallery images.</p>
      </div>

      <!-- Upload Photo Form -->
      <div class="stat-card">
        <h2>Upload New Photo</h2>
        <form method="POST" action="upload_photo.php" enctype="multipart/form-data">
          <input type="file" name="photo" required><br><br>
          <input type="text" name="caption" placeholder="Photo Caption"><br><br>
          <button type="submit" class="btn">Upload Photo</button>
        </form>
      </div>

      <!-- Gallery List -->
      <div class="stat-card">
        <h2>Gallery Images</h2>
        <?php
        $result = $conn->query("SELECT * FROM gallery ORDER BY uploaded_at DESC");
        if ($result->num_rows > 0) {
          echo "<div style='display:flex; flex-wrap:wrap; gap:15px;'>";
          while($row = $result->fetch_assoc()) {
            echo "<div style='text-align:center;'>
                    <img src='{$row['image_path']}' alt='photo' style='width:150px; height:auto;'><br>
                    <p>{$row['caption']}</p>
                    <a href='delete_photos.php?id={$row['id']}' onclick=\"return confirm('Delete this photo?');\">Delete</a>
                  </div>";
          }
          echo "</div>";
        } else {
          echo "<p>No photos yet.</p>";
        }
        ?>
      </div>
    </main>
  </div>
</body>
</html>
<?php $conn->close(); ?>