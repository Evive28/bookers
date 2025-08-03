<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Pasaol Beach Resort</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
     body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      background: url('image3.jpg') no-repeat center center fixed;
      background-size: cover;
      color: #fefefe;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1.5rem 2rem;
      background-color: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(5px);
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    header h1 {
      color: #2563eb;
      font-size: 1.75rem;
      margin: 0;
    }

    nav {
      display: flex;
      align-items: center;
      gap: 1.5rem;
    }

    nav a {
      color: #1e3a8a;
      text-decoration: none;
      font-weight: 600;
    }

    nav a:hover {
      text-decoration: underline;
    }

    /* Style for nav buttons */
    .nav-btn {
      background-color: #2563eb;
      color: white;
      border: none;
      border-radius: 0.5rem;
      padding: 0.4rem 1rem;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      transition: background-color 0.3s ease;
    }

    .nav-btn i {
      font-size: 1.1rem;
    }

    .nav-btn:hover {
      background-color: #1e40af;
    }

    .hero {
      text-align: center;
      padding: 4rem 2rem;
      background-color: rgba(0, 0, 0, 0.5);
      color: #ffffff;
    }

    .hero h2 {
      font-size: 2.5rem;
      margin-bottom: 1rem;
    }

    .hero p {
      margin-bottom: 2rem;
      font-weight: 300;
    }

    .rooms,
    .facilities,
    .booking-form {
      padding: 4rem 2rem;
      background-color: rgba(255, 255, 255, 0.85);
      color: #111827;
    }

    .rooms h3,
    .facilities h3,
    .booking-form h3 {
      text-align: center;
      font-size: 2rem;
      color: #1d4ed8;
      margin-bottom: 2rem;
    }

    .room-grid,
    .facility-grid {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 2rem;
    }

    .room-card,
    .facility-card {
      background-color: #fff;
      border-radius: 1rem;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
      overflow: hidden;
      transition: transform 0.3s ease;
      width: 300px;
      text-align: center;
      cursor: pointer;
    }

    .room-card:hover,
    .facility-card:hover {
      transform: scale(1.03);
    }

    .room-card img,
    .facility-card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      pointer-events: none;
      user-select: none;
    }

    .room-content,
    .facility-card {
      padding: 1rem;
    }

    .room-content h4,
    .facility-card h4 {
      margin-bottom: 0.5rem;
      font-size: 1.25rem;
      color: #111827;
    }

    .room-content p,
    .facility-card p {
      color: #4b5563;
    }

    .booking-form form {
      max-width: 600px;
      margin: auto;
      display: flex;
      flex-direction: column;
      gap: 1rem;
      padding: 2rem;
      background-color: #f9fafb;
      border-radius: 1rem;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .booking-form input,
    .booking-form select,
    .booking-form textarea {
      padding: 0.75rem;
      border-radius: 0.5rem;
      border: 1px solid #d1d5db;
      font-size: 1rem;
      font-family: 'Poppins', sans-serif;
    }

    .booking-form textarea {
      resize: vertical;
      min-height: 80px;
    }

    .booking-form button {
      padding: 0.75rem;
      background-color: #2563eb;
      color: white;
      border: none;
      border-radius: 0.5rem;
      cursor: pointer;
      font-weight: bold;
      font-size: 1.1rem;
      transition: background-color 0.3s ease;
    }

    .booking-form button:hover {
      background-color: #1e40af;
    }

    /* Modal */
    .modal {
      display: none;
      position: fixed;
      z-index: 2000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0,0,0,0.7);
    }

    .modal-content {
      margin: 5% auto;
      background: white;
      padding: 2rem;
      border-radius: 1rem;
      width: 90%;
      max-width: 600px;
      text-align: center;
      position: relative;
    }

    .modal-content img {
      width: 100%;
      height: auto;
      border-radius: 0.5rem;
      margin-bottom: 1rem;
      user-select: none;
      pointer-events: none;
    }

    .close, .close-guest {
      position: absolute;
      top: 10px;
      right: 15px;
      font-size: 1.5rem;
      cursor: pointer;
      color: #555;
      user-select: none;
    }

    .close:hover, .close-guest:hover {
      color: #000;
    }

    /* Guest name modal input and button */
    #guestNameInput {
      padding: 0.5rem;
      width: 80%;
      font-size: 1rem;
      border-radius: 0.5rem;
      border: 1px solid #ccc;
      margin-top: 0.5rem;
    }

    #guestNameSubmit {
      margin-top: 1rem;
      padding: 0.5rem 1.2rem;
      font-size: 1rem;
      cursor: pointer;
      background: #2563eb;
      color: white;
      border: none;
      border-radius: 0.5rem;
      transition: background-color 0.3s ease;
    }

    #guestNameSubmit:hover {
      background: #1e40af;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .room-grid, .facility-grid {
        flex-direction: column;
        align-items: center;
      }

      header {
        flex-direction: column;
        gap: 1rem;
      }

      nav {
        flex-wrap: wrap;
        justify-content: center;
      }
    }
  </style>
</head>
<body>

<header>
  <h1>Pasaol Beach Resort</h1>
  <nav>
    <a href="#home">Home</a>
    <a href="#facilities">Facilities</a>
    <a href="#rooms">Rooms</a>
    <a href="#booking">Book Now</a>

    <button class="nav-btn" onclick="location.href='admin_login.php'" title="Admin">
      <i class="fas fa-user-shield"></i> Admin
    </button>

    <!-- Guest button removed -->
  </nav>
</header>

<section class="hero" id="home">
  <h2>Book Your Stay</h2>
  <p>Experience luxury, comfort, and tranquility.</p>
</section>

<section class="rooms" id="rooms">
  <h3>Our Best Rooms</h3>
  <div class="room-grid">
    <div class="room-card" tabindex="0" aria-label="Ocean View Suite. Enjoy a breathtaking view of the ocean with luxury amenities.">
      <img class="clickable-image" src="image3.jpg" alt="Ocean View Suite" data-title="Ocean View Suite" data-description="Enjoy a breathtaking view of the ocean with luxury amenities." />
      <div class="room-content">
        <h4>Ocean View Suite</h4>
        <p>Enjoy a breathtaking view of the ocean with luxury amenities.</p>
        <p><strong>Price: $250 per night</strong></p>
      </div>
    </div>
    <div class="room-card" tabindex="0" aria-label="Mountain Cabin. Cozy and quiet, perfect for a nature retreat.">
      <img class="clickable-image" src="image4.jpg" alt="Mountain Cabin" data-title="Mountain Cabin" data-description="Cozy and quiet, perfect for a nature retreat." />
      <div class="room-content">
        <h4>Mountain Cabin</h4>
        <p>Cozy and quiet, perfect for a nature retreat.</p>
        <p><strong>Price: $180 per night</strong></p>
      </div>
    </div>
    <div class="room-card" tabindex="0" aria-label="Presidential Villa. Top-tier accommodation with private pool and butler service.">
      <img class="clickable-image" src="images5.jpg" alt="Presidential Villa" data-title="Presidential Villa" data-description="Top-tier accommodation with private pool and butler service." />
      <div class="room-content">
        <h4>Presidential Villa</h4>
        <p>Top-tier accommodation with private pool and butler service.</p>
        <p><strong>Price: $450 per night</strong></p>
      </div>
    </div>
  </div>
</section>

<section class="facilities" id="facilities">
  <h3>Resort Facilities</h3>
  <div class="facility-grid">
    <div class="facility-card" tabindex="0" aria-label="Infinity Pool. Swim and relax with a view of the horizon.">
      <img class="clickable-image" src="images1.jpg" alt="Infinity Pool" data-title="Infinity Pool" data-description="Swim and relax with a view of the horizon." />
      <h4>Infinity Pool</h4>
      <p>Swim and relax with a view of the horizon.</p>
    </div>
    <div class="facility-card" tabindex="0" aria-label="Spa & Wellness. Unwind with professional spa treatments.">
      <img class="clickable-image" src="images2.jpg" alt="Spa & Wellness" data-title="Spa & Wellness" data-description="Unwind with professional spa treatments." />
      <h4>Spa & Wellness</h4>
      <p>Unwind with professional spa treatments.</p>
    </div>
    <div class="facility-card" tabindex="0" aria-label="Fine Dining. Enjoy world-class cuisine in a tropical setting.">
      <img class="clickable-image" src="images/restaurant-icon.png" alt="Fine Dining" data-title="Fine Dining" data-description="Enjoy world-class cuisine in a tropical setting." />
      <h4>Fine Dining</h4>
      <p>Enjoy world-class cuisine in a tropical setting.</p>
    </div>
    <div class="facility-card" tabindex="0" aria-label="Fitness Center. Stay fit with modern equipment and sea views.">
      <img class="clickable-image" src="images/gym-icon.png" alt="Fitness Center" data-title="Fitness Center" data-description="Stay fit with modern equipment and sea views." />
      <h4>Fitness Center</h4>
      <p>Stay fit with modern equipment and sea views.</p>
    </div>
  </div>
</section>

<section class="booking-form" id="booking">
  <h3>Book Your Stay Now</h3>
  <form action="submit_booking.php" method="POST" >
    <input type="text" name="name" placeholder="Full Name" required />
    <input type="email" name="email" placeholder="Email Address" required />
    <input type="text" name="phone" placeholder="Phone Number" required />
    <input type="date" name="checkin" required />
    <input type="date" name="checkout" required />
    <select name="room_type" required>
      <option value="">-- Select Room --</option>
      <option value="Ocean View Suite">Ocean View Suite</option>
      <option value="Mountain Cabin">Mountain Cabin</option>
      <option value="Presidential Villa">Presidential Villa</option>
    </select>
    <textarea name="message" placeholder="Additional Message"></textarea>
    <button type="submit">Reserve</button>
  </form>
</section>

<!-- Room/Facility Modal -->
<div id="popupModal" class="modal" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="modalTitle" aria-describedby="modalDescription">
  <div class="modal-content">
    <button class="close" aria-label="Close modal">&times;</button>
    <img id="modalImage" src="" alt="" />
    <h4 id="modalTitle"></h4>
    <p id="modalDescription"></p>
  </div>
</div>

<!-- Guest Name Modal removed -->

<script>
  // Room/Facility modal logic
  const modal = document.getElementById('popupModal');
  const modalImg = document.getElementById('modalImage');
  const modalTitle = document.getElementById('modalTitle');
  const modalDesc = document.getElementById('modalDescription');
  const modalCloseBtn = modal.querySelector('.close');

  document.querySelectorAll('.clickable-image').forEach(img => {
    img.addEventListener('click', () => {
      modal.style.display = 'block';
      modal.setAttribute('aria-hidden', 'false');
      modalImg.src = img.src;
      modalImg.alt = img.alt;
      modalTitle.textContent = img.getAttribute('data-title');
      modalDesc.textContent = img.getAttribute('data-description');
      modalCloseBtn.focus();
    });
  });

  modalCloseBtn.addEventListener('click', () => {
    modal.style.display = 'none';
    modal.setAttribute('aria-hidden', 'true');
  });

  window.addEventListener('click', (event) => {
    if (event.target === modal) {
      modal.style.display = 'none';
      modal.setAttribute('aria-hidden', 'true');
    }
  });

  // Guest modal logic removed
</script>

</body>
</html>
