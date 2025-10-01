<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crowned Faith Chapel Intl</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />

    
    <script src="script.js" defer></script>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="header-top">
            <div class="container">
                <div class="header-info">
                    <span>📞 (555) 123-4567</span>
                    <span>📍 123 Faith Street, Your City</span>
                    <span>✉️ info@crownedfaithchapel.org</span>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="header-main">
                <div class="logo">
                    <div class="logo-icon">✝</div>
                    <div class="logo-text">
                        <h1>Crowned Faith Chapel Intl</h1>
                        <p>Growing in Faith, Serving in Love</p>
                    </div>
                </div>
                <nav>
                    <ul>
                        <li><a href="#home">Home </a></li>
                        <li><a href="#about">Who we are </a><i class="fas fa-chevron-down"></i></li>
                        <li><a href="#events">Events</a></li>
                        <li><a href="#contact">Our Contact </a></li>

                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
    <div class="slideshow-container">
        <div class="slide">
            <img src="assets/img/worshipimage3.jpeg" alt="Church Worship">
            <div class="overlay"></div>
        </div>
        
        <div class="slide">
            <img src="assets/img/worshipimage7.jpg" alt="Church Family">
            <div class="overlay"></div>
        </div>
        <div class="slide">
            <img src="assets/img/worshipimage8.jpg" alt="Prayer Time">
            <div class="overlay"></div>
        </div>
         <div class="slide">
            <img src="assets/img/worshipimage9.jpg" alt="Prayer ">
            <div class="overlay"></div>
        </div>
        <div class="hero-content">
            <h2 id="hero-heading">Welcome to Our Church Family</h2>
            <p id="hero-message">Join us in worship, fellowship, and service to our community</p>
            <div class="cta-buttons">
                <a href="#services" class="btn btn-hero">Join Us This Sunday</a>
                <a href="#about" class="btn btn-hero-secondary">Learn More</a>
            </div>
        </div>
    </div>
</section>

    <!-- About Section -->
    <section class="about" id="about">
        <div class="container">
            <div class="about-content">
                <div class="about-text">
                    <h2>Welcome to Crowned Faith Chapel Intl</h2>
                    <p>For over 50 years, Crowned Faith Chapel has been a beacon of hope and faith in our community. We are a family of believers committed to growing in our relationship with Jesus Christ and serving others with love and compassion.</p>
                    <p>Our mission is to create a welcoming environment where people can encounter God's grace, build meaningful relationships, and discover their purpose in serving others.</p>
                    <a href="#contact" class="btn btn-primary">Visit Us</a>
                </div>
                <div class="pastor-info">
                    <div class="pastor-photo">👨‍💼</div>
                    <h3>Pastor John Smith</h3>
                    <p>Lead Pastor</p>
                    <p>"Come as you are, leave transformed by God's love and grace. We can't wait to meet you!"</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Times -->
    <section class="service-times" id="services" data-aos="fade-up">
        <div class="container">
            <h2 class="section-title">Service Times</h2>
            <div class="services-grid">
                <div class="service-card">
                    <h3>Sunday Morning Worship</h3>
                    <div class="time">9:00 AM</div>
                    <p>Traditional service with hymns and choir</p>
                </div>
                <div class="service-card">
                    <h3>Contemporary Service</h3>
                    <div class="time">11:00 AM</div>
                    <p>Modern worship with praise band</p>
                </div>
                <div class="service-card">
                    <h3>Evening Prayer</h3>
                    <div class="time">6:00 PM</div>
                    <p>Intimate gathering for prayer and reflection</p>
                </div>
                <div class="service-card">
                    <h3>Wednesday Bible Study</h3>
                    <div class="time">7:00 PM</div>
                    <p>Deep dive into God's word together</p>
                </div>
            </div>
        </div>
    </section>





    <!-- Events Section -->
    <section class="events">
        <!--<div class="container"> -->
            <h2 class="section-title">Upcoming Event</h2>
            
            
           





<?php
//Show Information
ini_set('display_errors',1);
error_reporting(E_ALL);

$conn = ($GLOBALS["___mysqli_ston"] = mysqli_connect("localhost", "root","recmaster"));
if(!$conn)
{
echo ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false));
}
$db = ((bool)mysqli_query($conn, "USE " . "cffc"));
if(!$db)
{
echo mysqli_query($conn, "USE " . "cffc");
}


$q = "SELECT * FROM events ";
$r = mysqli_query($conn, "$q");
if($r)
{
while($row=mysqli_fetch_array($r))
{

echo"<section class='events'>";
echo "<div class='container'>";
echo "<div class='event-card' data-aos='fade-up'>";
echo "<div class='event-grid'>";
echo '<h1 class="event-date"<td>'.$row['event_date'].'</td></h1>';
echo '<h3 class="events-title>"<td>'.$row['title'].'</td></h3>';
echo '<td>'.$row['description'].'</td>';
echo "</div>";
echo "</div>";
echo "</div>";
echo "</section>";


}
}
else
{
echo ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false));
}

?>	
</div>		






 <div class="events-grid" id="events-container">
            </div>
        </div>
    </section>

































    <section class ="gallery" id="photo-gallery">
        <div class="container">
            <h2 class="section-title">Photo Gallery</h2>
            <div class="gallery-track">
                <div class="gallery-item">
                    <img src="assets/img/gallery1.jpg" alt="Community Service" class="lightbox">
                </div>
                <div class="gallery-item">
                    <img src="assets/img/gallery2.jpg" alt="Worship Service" class="lightbox">
                </div>
                  <div class="gallery-item">
                    <img src="assets/img/gallery3.jpg" alt="Worship Service" class="lightbox">
                </div>
                  <div class="gallery-item">
                    <img src="assets/img/gallery4.jpg" alt="Worship Service" class="lightbox">
                </div>
                  <div class="gallery-item">
                    <img src="assets/img/gallery5.jpg" alt="Worship Service" class="lightbox">
                </div>

                <!-- Duplicate for seamless loop -->
                  <div class="gallery-item">
                    <img src="assets/img/worshipimage5 (1).jpg" alt="Community Service" class="lightbox">
                </div>
                <div class="gallery-item">
                    <img src="assets/img/worshipimage6.jpg" alt="Worship Service" class="lightbox">
                </div>
                  <div class="gallery-item">
                    <img src="assets/img/worshipimage7.jpg" alt="Worship Service" class="lightbox">
                </div>
                  <div class="gallery-item">
                    <img src="assets/img/worshipimage8.jpg" alt="Worship Service" class="lightbox">
                </div>
                  <div class="gallery-item">
                    <img src="assets/img/worshipimage9.jpg" alt="Worship Service" class="lightbox">
                </div>

            </div>
        </div>
    </section>

    

    <!-- Footer -->
    <footer id="contact">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Contact Information</h3>
                    <p>📍 123 Faith Street<br>Your City, ST 12345</p>
                    <p>📞 (555) 123-4567</p>
                    <p>✉️ info@crownedfaithchapel.org</p>
                </div>
                <div class="footer-section">
                    <h3>Service Times</h3>
                    <p>Sunday Morning: 9:00 AM</p>
                    <p>Contemporary: 11:00 AM</p>
                    <p>Evening Prayer: 6:00 PM</p>
                    <p>Wednesday Study: 7:00 PM</p>
                </div>
                <div class="footer-section">
                    <h3>Connect With Us</h3>
                    <p><a href="#">Facebook</a></p>
                    <p><a href="#">Instagram</a></p>
                    <p><a href="#">YouTube</a></p>
                    <p><a href="#">Newsletter Signup</a></p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Crowned Faith Chaple Intl. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Admin Button -->
    <button onclick="openLoginModal()" class="admin-btn">Manage Events</button>

        <!-- Admin Login Modal -->
<div id="loginModal" class="modal">
  <div class="modal-content">
    <div class="modal-header">
      <h2>Admin Login</h2>
      <button class="close-btn" onclick="closeLoginModal()">&times;</button>
    </div>
    <form method="POST" action="login.php">
      <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" required>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" required>
      </div>
      <div class="form-buttons">
        <button type="submit" class="btn btn-primary">Login</button>
        <button type="button" class="btn btn-secondary" onclick="closeLoginModal()">Cancel</button>
      </div>
    </form>
  </div>
</div>

    <!-- Event Form Modal -->
    <div class="modal" id="eventFormModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="formTitle">Add New Event</h2>
                <button class="close-btn" onclick="closeEventForm()">&times;</button>
            </div>
            
            <form id="eventForm">
                <div class="form-group">
                    <label for="eventDate">Event Date:</label>
                    <input type="date" id="eventDate" required>
                </div>
                
                <div class="form-group">
                    <label for="eventTitle">Event Title:</label>
                    <input type="text" id="eventTitle" required>
                </div>
                
                <div class="form-group">
                    <label for="eventDescription">Event Description:</label>
                    <textarea id="eventDescription" required></textarea>
                </div>
                
                <div class="form-buttons">
                    <button type="button" class="btn btn-secondary" onclick="closeEventForm()">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Event</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
  AOS.init();
</script>

</body>
</html>