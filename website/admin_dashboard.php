<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit;
}

require 'db.php';

// Handle name filter
$nameFilter = isset($_GET['name']) ? trim($_GET['name']) : '';

// Pagination setup
$limit = 10;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Build query condition
$whereClause = '';
$params = [];
$types = '';

if (!empty($nameFilter)) {
    $whereClause = "WHERE name LIKE ?";
    $params[] = "%" . $nameFilter . "%";
    $types .= 's';
}

// Count total records
$countSQL = "SELECT COUNT(*) AS total FROM bookings $whereClause";
$countStmt = $conn->prepare($countSQL);
if ($types) $countStmt->bind_param($types, ...$params);
$countStmt->execute();
$total_bookings = $countStmt->get_result()->fetch_assoc()['total'];
$total_pages = ceil($total_bookings / $limit);

// Fetch filtered bookings
$sql = "SELECT * FROM bookings $whereClause ORDER BY booking_date DESC LIMIT ?, ?";
$stmt = $conn->prepare($sql);
if ($types) {
    $types .= 'ii';
    $params[] = $offset;
    $params[] = $limit;
    $stmt->bind_param($types, ...$params);
} else {
    $stmt->bind_param("ii", $offset, $limit);
}
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #1e1e2f;
      color: #e0e0e0;
      padding: 20px 30px;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .logout {
      align-self: flex-end;
      background-color: #ff5c5c;
      color: #fff;
      padding: 8px 18px;
      border-radius: 6px;
      text-decoration: none;
      font-weight: 600;
      margin-bottom: 20px;
    }

    h2 {
      color: #a0d468;
    }

    .filter-form {
      margin: 15px 0;
    }

    .filter-form input[type="text"] {
      padding: 6px 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
      font-size: 14px;
    }

    .filter-form button {
      background-color: #5a8dee;
      color: #fff;
      border: none;
      padding: 7px 14px;
      border-radius: 5px;
      cursor: pointer;
    }

    table {
      width: 100%;
      max-width: 1200px;
      border-collapse: separate;
      border-spacing: 0 10px;
      background-color: #2a2a3d;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 8px 20px rgba(0,0,0,0.3);
    }

    th, td {
      padding: 14px 18px;
      text-align: center;
    }

    th {
      background-color: #3e3e5e;
      color: #b4d455;
    }

    tr {
      background-color: #35354c;
    }

    tr:hover {
      background-color: #46557e;
    }

    .pagination {
      margin-top: 25px;
      text-align: center;
    }

    .pagination a {
      color: #fff;
      background-color: #3e3e5e;
      padding: 8px 14px;
      margin: 0 3px;
      border-radius: 5px;
      text-decoration: none;
      font-weight: bold;
    }

    .pagination .current {
      background-color: #a0d468;
      color: #1e1e2f;
    }

    a {
      color: #7ec699;
      text-decoration: none;
    }

    a:hover {
      color: #a0d468;
    }

    .message {
      color: #a0d468;
      font-weight: 700;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

<a href="logout.php" class="logout">Logout</a>
<h2>Admin Dashboard</h2>

<?php if (isset($_GET['message'])): ?>
  <p class="message"><?= htmlspecialchars($_GET['message']) ?></p>
<?php endif; ?>

<!-- Name Search Form -->
<form class="filter-form" method="GET" action="">
  <input type="text" name="name" placeholder="Search by name" value="<?= htmlspecialchars($nameFilter) ?>">
  <button type="submit">Search</button>
</form>

<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Check-In</th>
      <th>Check-Out</th>
      <th>Room Type</th>
      <th>Message</th>
      <th>Booked On</th>
      <th>Confirmed</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?= htmlspecialchars($row['name']) ?></td>
      <td><?= htmlspecialchars($row['email']) ?></td>
      <td><?= $row['checkin'] ?></td>
      <td><?= $row['checkout'] ?></td>
      <td><?= htmlspecialchars($row['room']) ?></td>
      <td><?= htmlspecialchars($row['message']) ?></td>
      <td><?= $row['booking_date'] ?></td>
      <td><?= $row['confirmed'] ? 'Yes' : 'No' ?></td>
      <td>
        <a href="edit_booking.php?id=<?= $row['id'] ?>">Edit</a> |
        <a href="delete_booking.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?');">Delete</a><br>
        <?php if (!$row['confirmed']): ?>
        <form action="confirm_booking.php" method="POST" onsubmit="return confirm('Send confirmation email?');">
          <input type="hidden" name="id" value="<?= $row['id'] ?>">
          <button type="submit">Confirm</button>
        </form>
        <?php else: ?>
        <em style="color:#7ec699;">Already confirmed</em>
        <?php endif; ?>
      </td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>

<!-- Pagination -->
<div class="pagination">
  <?php if ($page > 1): ?>
    <a href="?<?= http_build_query(array_merge($_GET, ['page' => $page - 1])) ?>">&laquo; Previous</a>
  <?php endif; ?>

  <?php for ($i = 1; $i <= $total_pages; $i++): ?>
    <a href="?<?= http_build_query(array_merge($_GET, ['page' => $i])) ?>" class="<?= $i === $page ? 'current' : '' ?>"><?= $i ?></a>
  <?php endfor; ?>

  <?php if ($page < $total_pages): ?>
    <a href="?<?= http_build_query(array_merge($_GET, ['page' => $page + 1])) ?>">Next &raquo;</a>
  <?php endif; ?>
</div>

</body>
</html>
