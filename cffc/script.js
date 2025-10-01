

        // Format date for display
        function formatDate(dateString) {
            const date = new Date(dateString);
            return date.toLocaleDateString('en-US', { 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric' 
            });
        }

        // Modal functions
        function openAdminModal() {
            // Password protection
            const adminPassword = "ChurchAdmin2024"; // Change this to your desired password
            const enteredPassword = prompt("Enter admin password to manage events:");
            
            if (enteredPassword !== adminPassword) {
                if (enteredPassword !== null) { // User didn't cancel
                    alert("Incorrect password. Access denied.");
                }
                return;
            }
            
            document.getElementById('adminModal').classList.add('show');
            displayAdminEvents();
        }

        function closeAdminModal() {
            document.getElementById('adminModal').classList.remove('show');
        }

        function showEventForm(eventId = null) {
            currentEditingId = eventId;
            const modal = document.getElementById('eventFormModal');
            const title = document.getElementById('formTitle');
            const form = document.getElementById('eventForm');
            
            if (eventId) {
                const event = events.find(e => e.id === eventId);
                title.textContent = 'Edit Event';
                document.getElementById('eventDate').value = event.date;
                document.getElementById('eventTitle').value = event.title;
                document.getElementById('eventDescription').value = event.description;
            } else {
                title.textContent = 'Add New Event';
                form.reset();
            }
            
            modal.classList.add('show');
        }

        function closeEventForm() {
            document.getElementById('eventFormModal').classList.remove('show');
            currentEditingId = null;
        }

        function editEvent(id) {
            showEventForm(id);
        }

        function deleteEvent(id) {
            if (confirm('Are you sure you want to delete this event?')) {
                events = events.filter(e => e.id !== id);
                displayEvents();
                displayAdminEvents();
            }
        }

        // Form submission
        document.getElementById('eventForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const date = document.getElementById('eventDate').value;
            const title = document.getElementById('eventTitle').value;
            const description = document.getElementById('eventDescription').value;
            
            if (currentEditingId) {
                // Update existing event
                const eventIndex = events.findIndex(e => e.id === currentEditingId);
                events[eventIndex] = {
                    ...events[eventIndex],
                    date,
                    title,
                    description
                };
            } else {
                // Add new event
                const newEvent = {
                    id: Math.max(...events.map(e => e.id), 0) + 1,
                    date,
                    title,
                    description
                };
                events.push(newEvent);
            }
            
            displayEvents();
            displayAdminEvents();
            closeEventForm();
        });

        // Close modals when clicking outside
        window.addEventListener('click', function(e) {
            const adminModal = document.getElementById('adminModal');
            const eventModal = document.getElementById('eventFormModal');
            
            if (e.target === adminModal) {
                closeAdminModal();
            }
            if (e.target === eventModal) {
                closeEventForm();
            }
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        

        // Add fade-in animation for about section
        const aboutObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, {
            threshold: 0.2,
            rootMargin: '0px'
        });

        // Observe about section elements
        document.querySelector('.about-content').classList.add('fade-in');
        document.querySelector('.about-text').classList.add('fade-in');
        document.querySelector('.pastor-info').classList.add('fade-in');

        aboutObserver.observe(document.querySelector('.about-content'));
        aboutObserver.observe(document.querySelector('.about-text'));
        aboutObserver.observe(document.querySelector('.pastor-info'));

        // Fade in animations for service times and events sections
        const sectionObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    
                    // Animate children with delay
                    if (entry.target.classList.contains('service-times') || entry.target.classList.contains('events')) {
                        const cards = entry.target.querySelectorAll('.service-card, .event-card');
                        cards.forEach((card, index) => {
                            setTimeout(() => {
                                card.classList.add('visible');
                            }, index * 200);
                        });
                    }
                }
            });
        }, {
            threshold: 0.2,
        });

        document.querySelectorAll('.service-times, .events').forEach(section => {
            section.classList.add('fade-in');
            sectionObserver.observe(section);
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Initialize existing observers
            displayEvents();
            
            // Add fade-in classes to cards
            document.querySelectorAll('.service-card, .event-card').forEach(card => {
                card.classList.add('fade-in');
            });
            
            // Initialize observers for all sections
            const sections = document.querySelectorAll('.service-times, .events');
            sections.forEach(section => {
                sectionObserver.observe(section);
            });
        });

        // Slideshow script (images only)
        let slideIndex = 0;
        const slides = document.getElementsByClassName("slide");

        function showSlides() {
            for (let i = 0; i < slides.length; i++) {
                slides[i].style.opacity = "0";
            }
            slideIndex++;
            if (slideIndex > slides.length) { slideIndex = 1; }
            slides[slideIndex - 1].style.opacity = "1";
            setTimeout(showSlides, 5000); // Change image every 5 seconds
        }

        document.addEventListener('DOMContentLoaded', showSlides);

        // Hero text rotation (independent from slideshow)
        document.addEventListener('DOMContentLoaded', function() {
            const headings = [
                "Welcome to Crowned Faith Chapel Intl",
                "Experience Worship, Fellowship & Growth",
                "A Place to Belong, Believe, Become",
                "Join Us for Inspiring Services Every Sunday"
            ];
            const messages = [
                "Growing in Faith, Serving in Love",
                "Connect. Serve. Celebrate.",
                "Discover Your Purpose in Christ",
                "Building Strong Families & Community"
            ];

            const headingEl = document.getElementById('hero-heading');
            const messageEl = document.getElementById('hero-message');
            let idx = 0;

            function fadeTextOut() {
                headingEl.classList.remove('fade-in');
                messageEl.classList.remove('fade-in');
                headingEl.classList.add('fade-out');
                messageEl.classList.add('fade-out');
            }

            function fadeTextIn() {
                headingEl.classList.remove('fade-out');
                messageEl.classList.remove('fade-out');
                headingEl.classList.add('fade-in');
                messageEl.classList.add('fade-in');
            }

            function rotateHeroText() {
                fadeTextOut();
                setTimeout(() => {
                    idx = (idx + 1) % headings.length;
                    headingEl.textContent = headings[idx];
                    messageEl.textContent = messages[idx];
                    fadeTextIn();
                }, 1000); // Match transition duration
            }

            // Initial display
            headingEl.textContent = headings[0];
            messageEl.textContent = messages[0];
            fadeTextIn();

            setInterval(rotateHeroText, 5000);
        });

        // Lightbox functionality
        document.addEventListener('DOMContentLoaded', function() {
            const lightboxImages = document.querySelectorAll('.lightbox');
            const lightboxOverlay = document.getElementById('lightboxOverlay');
            const lightboxImage = document.getElementById('lightboxImage');

            lightboxImages.forEach(img => {
                img.addEventListener('click', function() {
                    lightboxImage.src = this.src;
                    lightboxOverlay.style.display = 'flex';
                });
            });

            lightboxOverlay.addEventListener('click', function() {
                lightboxOverlay.style.display = 'none';
                lightboxImage.src = '';
            });
        });


        // open login modal functions
        function openLoginModal() {
    document.getElementById("loginModal").classList.add("show");
}
function closeLoginModal() {
    document.getElementById("loginModal").classList.remove("show");
}