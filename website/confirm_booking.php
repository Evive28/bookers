<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    $stmt = $conn->prepare("SELECT * FROM bookings WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $booking = $result->fetch_assoc();

        // Send Email
        $to = $booking['email'];
        $subject = "Booking Confirmation - Pasaol Beach Resort";
        $message = "Hi {$booking['name']},\n\nYour booking from {$booking['checkin']} to {$booking['checkout']} is confirmed.\nRoom Type: {$booking['room']}\n\nThank you for choosing Pasaol Beach Resort!";
        $headers = "From: eugeneurot19@gmail.com";

        mail($to, $subject, $message, $headers);

        // Update confirmation status
        $update = $conn->prepare("UPDATE bookings SET confirmed = 1 WHERE id = ?");
        $update->bind_param("i", $id);
        $update->execute();

        header("Location: admin_dashboard.php?message=Booking confirmed successfully.");
        exit;
    } else {
        die("Booking not found.");
    }
} else {
    die("Invalid request.");
}
?>
