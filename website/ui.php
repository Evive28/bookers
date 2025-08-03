<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Escape to Paradise | Pasaol Beach Resort</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Open+Sans&display=swap');

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
    body {
      font-family: 'Open Sans', sans-serif;
      background: #f7f3e9;
      color: #2f3e2e;
      line-height: 1.6;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      scroll-behavior: smooth;
    }
    a {
      color: #4a7c35;
      text-decoration: none;
      transition: color 0.3s ease;
    }
    a:hover {
      color: #376127;
      text-decoration: underline;
    }

    .hero {
      position: relative;
      background: url('image12.jpg') no-repeat center/cover;
      height: 90vh;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      color: #fff;
      padding: 0 20px;
    }
    .hero::before {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(42, 60, 32, 0.65);
      z-index: 0;
      border-radius: 0 0 40% 40% / 15%;
    }
    .hero-content {
      position: relative;
      max-width: 900px;
      z-index: 1;
      font-family: 'Montserrat', sans-serif;
    }
    .hero-content h1 {
      font-size: 3.6rem;
      margin-bottom: 0.3rem;
      text-shadow: 0 2px 8px rgba(0,0,0,0.7);
    }
    .hero-content p {
      font-size: 1.4rem;
      margin-bottom: 1.8rem;
      font-weight: 600;
      text-shadow: 0 2px 6px rgba(0,0,0,0.6);
    }
    .btn-primary {
      background-color: #81b29a;
      color: #fff;
      padding: 18px 48px;
      font-size: 1.3rem;
      font-weight: 700;
      border-radius: 50px;
      cursor: pointer;
      border: none;
      box-shadow: 0 6px 20px rgba(129,178,154,0.6);
      transition: all 0.3s ease;
      letter-spacing: 1.05px;
    }
    .btn-primary:hover {
      background-color: #6a967e;
      box-shadow: 0 8px 25px rgba(106,150,126,0.8);
      transform: translateY(-3px);
    }

    .container {
      max-width: 1100px;
      margin: 80px auto 40px;
      padding: 0 20px;
    }

    .why-choose {
      text-align: center;
      margin-bottom: 70px;
    }
    .why-choose h2 {
      font-family: 'Montserrat', sans-serif;
      font-size: 2.8rem;
      margin-bottom: 1rem;
      color: #287233;
      letter-spacing: 1.2px;
    }
    .why-choose p {
      font-size: 1.15rem;
      color: #4a5a3e;
      max-width: 700px;
      margin: 0 auto 40px;
      font-weight: 600;
    }

    .features {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
      gap: 40px;
    }
    .feature {
      background: #e5f0de;
      border-radius: 16px;
      padding: 25px 20px;
      flex: 1 1 280px;
      box-shadow: 0 6px 15px rgba(72, 103, 57, 0.2);
      transition: transform 0.3s ease;
    }
    .feature:hover {
      transform: translateY(-6px);
      box-shadow: 0 10px 25px rgba(72, 103, 57, 0.4);
    }
    .feature h3 {
      color: #376127;
      font-size: 1.5rem;
      margin-bottom: 12px;
    }
    .feature p {
      font-weight: 600;
      color: #3e4d2f;
      font-size: 1rem;
    }

    .rooms {
      margin-top: 40px;
      margin-bottom: 80px;
    }
    .rooms h2 {
      font-family: 'Montserrat', sans-serif;
      font-size: 2.5rem;
      margin-bottom: 30px;
      text-align: center;
      color: #287233;
    }
    .room-list {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 24px;
    }
    .room {
      flex: 1 1 30%;
      background: #fff;
      border-radius: 18px;
      overflow: hidden;
      box-shadow: 0 6px 20px rgba(0,0,0,0.12);
      transition: transform 0.3s ease;
    }
    .room:hover {
      transform: translateY(-10px);
      box-shadow: 0 12px 35px rgba(0,0,0,0.2);
    }
    .room img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }
    .room-content {
      padding: 20px 18px;
    }
    .room-content h3 {
      font-family: 'Montserrat', sans-serif;
      color: #287233;
      margin-bottom: 10px;
      font-size: 1.5rem;
    }
    .room-content p {
      font-size: 1rem;
      font-weight: 600;
      color: #4a5a3e;
      margin-bottom: 15px;
    }
    .room-content span {
      display: inline-block;
      background: #81b29a;
      color: white;
      padding: 6px 14px;
      border-radius: 30px;
      font-size: 0.9rem;
      font-weight: 700;
      letter-spacing: 0.9px;
      user-select: none;
      margin-bottom: 12px;
    }

    .room-content a.btn-primary {
      margin-top: 10px;
      display: inline-block;
      font-size: 1rem;
      padding: 10px 30px;
    }

    .testimonials {
      background: #d9e8c9;
      border-radius: 24px;
      padding: 40px 30px;
      max-width: 900px;
      margin: 0 auto 80px;
      box-shadow: 0 6px 25px rgba(72, 103, 57, 0.25);
    }
    .testimonials h2 {
      font-family: 'Montserrat', sans-serif;
      font-size: 2.3rem;
      color: #287233;
      margin-bottom: 30px;
      text-align: center;
    }
    .testimonial-item {
      font-style: italic;
      font-size: 1.15rem;
      line-height: 1.5;
      color: #3e4d2f;
      max-width: 700px;
      margin: 0 auto 20px;
      position: relative;
      padding-left: 40px;
    }
    .testimonial-item::before {
      content: "“";
      font-family: serif;
      font-size: 3rem;
      color: #6a967e;
      position: absolute;
      left: 0;
      top: -5px;
    }
    .testimonial-author {
      text-align: right;
      margin-top: 8px;
      font-weight: 700;
      color: #287233;
    }

    footer {
      background: #f7f3e9;
      border-top: 2px solid #c9d6ca;
      padding: 25px 20px;
      text-align: center;
      font-size: 0.95rem;
      color: #556b2f;
      margin-top: auto;
    }

    @media (max-width: 960px) {
      .room-list {
        flex-direction: column;
        align-items: center;
      }
      .room {
        max-width: 400px;
        width: 100%;
      }
      .features {
        flex-direction: column;
        gap: 30px;
      }
    }
    @media (max-width: 480px) {
      .hero-content h1 {
        font-size: 2.2rem;
      }
      .hero-content p {
        font-size: 1rem;
      }
      .btn-primary {
        padding: 14px 32px;
        font-size: 1.1rem;
      }
    }
/* Loader Overlay */
#loader-overlay {
  position: fixed;
  inset: 0;
  background: linear-gradient(to bottom, #e0f7ef, #a5d6a7);
  display: none;
  align-items: center;
  justify-content: center;
  z-index: 9999;
}

/* Wave Spinner */
.loader {
  position: relative;
  width: 80px;
  height: 80px;
}

.loader::before,
.loader::after {
  content: '';
  position: absolute;
  border: 8px solid #4caf50;
  opacity: 0.6;
  border-radius: 50%;
  animation: wave 1.4s ease-out infinite;
}

.loader::after {
  animation-delay: 0.7s;
}

@keyframes wave {
  0% {
    transform: scale(0.5);
    opacity: 1;
  }
  100% {
    transform: scale(2.5);
    opacity: 0;
  }
}

  </style>
</head>
<body>

  <section class="hero">
    <div class="hero-content">
      <h1>Escape to Paradise at Pasaol Beach Resort</h1>
      <p>Unwind under swaying palms, soak in breathtaking sunsets, and create memories that last forever.</p>
      <a href="index.php" class="btn-primary explore-btn">Explore</a>
    </div>
  </section>

  <main class="container">
    <section class="why-choose">
      <h2>Why Choose Pasaol Beach Resort?</h2>
      <p>From pristine white sands to cozy luxury rooms, we bring you the ultimate tropical getaway tailored for relaxation, adventure, and comfort.</p>
      <div class="features">
        <div class="feature">
          <h3>Serene Beachfront</h3>
          <p>Step out your door and onto miles of untouched beach—perfect for morning walks and sunset views.</p>
        </div>
        <div class="feature">
          <h3>Comfort & Style</h3>
          <p>Our rooms blend modern comfort with natural charm for a stay that feels like home, only better.</p>
        </div>
        <div class="feature">
          <h3>Warm Hospitality</h3>
          <p>Our team is dedicated to making every moment memorable with personalized service and local insights.</p>
        </div>
      </div>
    </section>

    <section class="rooms">
      <h2>Explore Our Rooms</h2>
      <div class="room-list">
        <div class="room">
          <img src="image.jpg" alt="Standard Room">
          <div class="room-content">
            <h3>Standard Room</h3>
            <p>Cozy comfort for solo travelers or couples, with all the essentials and a view that relaxes.</p>
            <span>From P5500/night</span><br>
            <a href="index.php" class="btn-primary explore-btn">Explore</a>
          </div>
        </div>
        <div class="room">
          <img src="image1.jpg" alt="Deluxe Room">
          <div class="room-content">
            <h3>Deluxe Room</h3>
            <p>Spacious and stylish, featuring upgraded amenities and stunning views to wake up to.</p>
            <span>From P3000/night</span><br>
            <a href="index.php" class="btn-primary explore-btn">Explore</a>
          </div>
        </div>
        <div class="room">
          <img src="image2.jpg" alt="Suite">
          <div class="room-content">
            <h3>Suite</h3>
            <p>Indulge in luxury with private balconies, elegant decor, and personalized service.</p>
            <span>From P4500/night</span><br>
            <a href="index.php" class="btn-primary explore-btn">Explore</a>
          </div>
        </div>
      </div>
    </section>

    <section class="testimonials">
      <h2>What Our Guests Say</h2>
      <blockquote class="testimonial-item">
        “Pasaol Beach Resort was my perfect escape. The sunsets are magical, and the staff truly made me feel at home.”
        <div class="testimonial-author">– Eugene T.</div>
      </blockquote>
      <blockquote class="testimonial-item">
        “The rooms are stunning and the beach so peaceful. I can’t wait to come back next year!”
        <div class="testimonial-author">– Jayme B.</div>
      </blockquote>
      <blockquote class="testimonial-item">
        “Excellent hospitality and beautiful surroundings. I highly recommend Pasaol for anyone wanting a relaxing vacation.”
        <div class="testimonial-author">– Opongside L.</div>
      </blockquote>
    </section>
  </main>

  <footer>
    <p>© 2025 Pasaol Beach Resort &nbsp;|&nbsp; Email: <a href="mailto:info@pasaolresort.com">info@pasaolresort.com</a></p>
  </footer>

<!-- Animated Wave Loader -->
<div id="loader-overlay">
  <div class="loader"></div>
</div>


  <!-- JavaScript for Loader -->
  <script>
    document.querySelectorAll('.explore-btn').forEach(btn => {
      btn.addEventListener('click', function (e) {
        e.preventDefault();
        const url = this.getAttribute('href');
        document.getElementById('loader-overlay').style.display = 'flex';
        setTimeout(() => {
          window.location.href = url;
        }, 1500);
      });
    });
  </script>
</body>
</html>
