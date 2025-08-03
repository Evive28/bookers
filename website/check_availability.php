<?php
$roomType = $_GET['room_type'] ?? '';

$conn = new mysqli("localhost", "root", "", "pasaol_db");
if ($conn->connect_error) die("Connection failed");

$sql = "SELECT total_slots, booked_slots FROM rooms WHERE room_type = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $roomType);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row) {
    $available = $row['total_slots'] - $row['booked_slots'];
    echo json_encode(["available" => $available]);
} else {
    echo json_encode(["available" => 0]);
}

$conn->close();
?>
