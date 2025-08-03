<?php
require 'db.php';

if (!isset($_GET['id'])) {
    header("Location: dashboard.php?message=Invalid+ID");
    exit;
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM bookings WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $room = $_POST['room'];
    $message = $_POST['message'];

    $update = $conn->prepare("UPDATE bookings SET name=?, email=?, checkin=?, checkout=?, room=?, message=? WHERE id=?");
    $update->bind_param("ssssssi", $name, $email, $checkin, $checkout, $room, $message, $id);
    $update->execute();

    header("Location: admin_dashboard.php?message=Booking+updated+successfully");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Booking</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #1e1e2f;
      color: #e0e0e0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .container {
      background-color: #2a2a3d;
      padding: 30px 40px;
      border-radius: 10px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
      width: 100%;
      max-width: 500px;
    }

    h2 {
      text-align: center;
      color: #a0d468;
      margin-bottom: 25px;
    }

    form label {
      display: block;
      margin: 12px 0 6px;
    }

    input[type="text"],
    input[type="email"],
    input[type="date"],
    select,
    textarea {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
      font-size: 14px;
      background-color: #35354c;
      color: #fff;
    }

    textarea {
      height: 100px;
      resize: vertical;
    }

    .btn-group {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
    }

    button {
      padding: 10px 20px;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      flex: 1;
      margin: 0 5px;
    }

    .submit-btn {
      background-color: #5a8dee;
      color: white;
    }

    .submit-btn:hover {
      background-color: #4175d0;
    }

    .back-btn {
      background-color: #7ec699;
      color: #1e1e2f;
    }

    .back-btn:hover {
      background-color: #6bb78d;
    }

    a {
      text-decoration: none;
      flex: 1;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>Edit Booking</h2>
    <form method="POST">
      <label>Name:</label>
      <input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>" required>

      <label>Email:</label>
      <input type="email" name="email" value="<?= htmlspecialchars($row['email']) ?>" required>

      <label>Check-in:</label>
      <input type="date" name="checkin" value="<?= $row['checkin'] ?>" required>

      <label>Check-out:</label>
      <input type="date" name="checkout" value="<?= $row['checkout'] ?>" required>

      <label>Room Type:</label>
      <select name="room" required>
        <option value="Single" <?= $row['room'] === 'Single' ? 'selected' : '' ?>>Standard Room</option>
        <option value="Double" <?= $row['room'] === 'Deluxe' ? 'selected' : '' ?>>Deluxe Room</option>
        <option value="Suite" <?= $row['room'] === 'Suite' ? 'selected' : '' ?>>Suite Room</option>
        <option value="Single Standard" <?= $row['room'] === 'Single Standard ' ? 'selected' : '' ?>>Single Standard Room</option>
        <option value="Single Deluxe" <?= $row['room'] === 'Single Deluxe' ? 'selected' : '' ?>>Single Deluxe Room</option>
        <option value="Single Suite" <?= $row['room'] === 'Single Suite' ? 'selected' : '' ?>>Single Suite Room</option>
      </select>

      <label>Message:</label>
      <textarea name="message"><?= htmlspecialchars($row['message']) ?></textarea>

      <div class="btn-group">
        <button type="submit" class="submit-btn">Update</button>
        <a href="admin_dashboard.php"><button type="button" class="back-btn">Back to Dashboard</button></a>
      </div>
    </form>
  </div>

</body>
</html>
