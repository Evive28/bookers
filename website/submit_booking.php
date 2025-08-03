<?php
$host = 'localhost';
$dbname = 'pasaol_db';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$success = '';
$error = '';

// Process form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize input
    $checkin = trim($_POST['checkin'] ?? '');
    $checkout = trim($_POST['checkout'] ?? '');
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $room = trim($_POST['room_type'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Basic validation
    if (empty($checkin) || empty($checkout) || empty($name) || empty($email) || empty($room)) {
        $error = "Please fill in all required fields.";
    } else {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO bookings (checkin, checkout, name, email, phone, room, message) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $checkin, $checkout, $name, $email, $phone, $room, $message);

        if ($stmt->execute()) {
            $success = "Booking successfully submitted!";
        } else {
            $error = "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Pasaol Beach Resort Booking</title>
  <style>
    /* Clean, warm hotel booking theme */
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #f7f3e9, #c9d6ca);
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      min-height: 100vh;
      color: #333;
    }

    .container {
      background-color: #fff;
      border-radius: 12px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.15);
      width: 100%;
      max-width: 480px;
      padding: 30px 40px;
      margin: 40px 20px;
    }

    h1 {
      text-align: center;
      color: #287233;
      margin-bottom: 25px;
      font-weight: 700;
      letter-spacing: 1.2px;
    }

    form {
      display: flex;
      flex-direction: column;
    }

    label {
      font-weight: 600;
      margin-top: 15px;
      margin-bottom: 6px;
      color: #4a5a3e;
    }

    input[type="text"],
    input[type="email"],
    input[type="date"],
    select,
    textarea {
      padding: 12px 14px;
      border: 1.8px solid #a9c6a8;
      border-radius: 8px;
      font-size: 1rem;
      font-family: inherit;
      transition: border-color 0.3s ease;
      resize: vertical;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="date"]:focus,
    select:focus,
    textarea:focus {
      border-color: #4a7c35;
      outline: none;
      box-shadow: 0 0 6px #4a7c35aa;
    }

    textarea {
      min-height: 80px;
    }

    button.submit-btn {
      margin-top: 25px;
      background-color: #4a7c35;
      color: white;
      border: none;
      padding: 14px;
      font-size: 1.1rem;
      font-weight: 700;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button.submit-btn:hover {
      background-color: #3a6028;
    }

    .message {
      text-align: center;
      margin-top: 20px;
      font-weight: 600;
      font-size: 1.1rem;
      user-select: none;
    }

    .error {
      color: #cc0000;
    }

    .success {
      color: #287233;
    }

    /* Back button styling */
    .back-button {
      display: inline-block;
      margin: 30px auto 0;
      padding: 12px 26px;
      background-color: #777;
      color: white;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 600;
      font-size: 1rem;
      text-align: center;
      cursor: pointer;
      transition: background-color 0.3s ease;
      user-select: none;
    }
    .back-button:hover {
      background-color: #555;
    }

    @media (max-width: 520px) {
      .container {
        margin: 20px 10px;
        padding: 25px 20px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Pasaol Beach Resort Booking</h1>

    <?php if ($error): ?>
      <p class="message error"><?= htmlspecialchars($error) ?></p>
    <?php elseif ($success): ?>
      <p class="message success"><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>

    <form method="POST" novalidate>
      <label for="checkin">Check-In Date *</label>
      <input type="date" id="checkin" name="checkin" required value="<?= htmlspecialchars($_POST['checkin'] ?? '') ?>">

      <label for="checkout">Check-Out Date *</label>
      <input type="date" id="checkout" name="checkout" required value="<?= htmlspecialchars($_POST['checkout'] ?? '') ?>">

      <label for="name">Full Name *</label>
      <input type="text" id="name" name="name" required placeholder="Your full name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">

      <label for="email">Email Address *</label>
      <input type="email" id="email" name="email" required placeholder="you@example.com" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">

      <label for="phone">Phone Number</label>
      <input type="text" id="phone" name="phone" placeholder="Optional" value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>">

      <label for="room_type">Room Type *</label>
      <select id="room_type" name="room_type" required>
        <option value="" disabled <?= empty($_POST['room_type']) ? 'selected' : '' ?>>Select a room</option>
        <option value="Standard" <?= (($_POST['room_type'] ?? '') === 'Standard') ? 'selected' : '' ?>>Standard</option>
        <option value="Deluxe" <?= (($_POST['room_type'] ?? '') === 'Deluxe') ? 'selected' : '' ?>>Deluxe</option>
        <option value="Suite" <?= (($_POST['room_type'] ?? '') === 'Suite') ? 'selected' : '' ?>>Suite</option>
      </select>

      <label for="message">Additional Message</label>
      <textarea id="message" name="message" placeholder="Any special requests?"><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>

      <button type="submit" class="submit-btn">Submit Booking</button>
    </form>

    <a href="index.php" class="back-button">← Back to Home</a>
  </div>
</body>
</html>
