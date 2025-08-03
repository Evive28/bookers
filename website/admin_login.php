<?php
// Your PHP login logic stays the same
session_start();
require 'db.php';

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $error = "Please fill in all fields.";
    } else {
        $stmt = $conn->prepare("SELECT id, password FROM admin_users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $hashedPassword);
            $stmt->fetch();

            if (password_verify($password, $hashedPassword)) {
                $_SESSION['admin_id'] = $id;
                header("Location: admin_dashboard.php");
                exit;
            } else {
                $error = "Incorrect password.";
            }
        } else {
            $error = "Username not found.";
        }

        $stmt->close();
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Login</title>
  <style>
    /* Security-themed dark mode style */
    :root {
      --bg-color: #121212;
      --container-bg: #1f1f1f;
      --primary-color: #0af;
      --error-color: #ff3860;
      --text-color: #e0e0e0;
      --input-bg: #2c2c2c;
      --input-border: #444;
      --button-bg: #0af;
      --button-hover: #0580d9;
      --font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      --shadow: rgba(0, 0, 0, 0.7);
    }

    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      background-color: var(--bg-color);
      color: var(--text-color);
      font-family: var(--font-family);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      padding: 20px;
    }

    .container {
      background-color: var(--container-bg);
      padding: 40px 30px;
      border-radius: 12px;
      box-shadow: 0 10px 30px var(--shadow);
      width: 100%;
      max-width: 400px;
      text-align: center;
    }

    h2 {
      margin-bottom: 24px;
      font-weight: 700;
      font-size: 2rem;
      color: var(--primary-color);
      letter-spacing: 2px;
      text-transform: uppercase;
    }

    form {
      text-align: left;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: 600;
      letter-spacing: 0.03em;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 12px 15px;
      margin-bottom: 20px;
      border: 1.5px solid var(--input-border);
      border-radius: 6px;
      background-color: var(--input-bg);
      color: var(--text-color);
      font-size: 1rem;
      transition: border-color 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="password"]:focus {
      outline: none;
      border-color: var(--primary-color);
      box-shadow: 0 0 8px var(--primary-color);
      background-color: #222;
    }

    button {
      width: 100%;
      background-color: var(--button-bg);
      color: white;
      border: none;
      padding: 14px 0;
      font-size: 1.1rem;
      font-weight: 700;
      border-radius: 8px;
      cursor: pointer;
      letter-spacing: 0.05em;
      transition: background-color 0.3s ease;
      text-transform: uppercase;
      user-select: none;
    }

    button:hover {
      background-color: var(--button-hover);
    }

    p.error {
      background-color: var(--error-color);
      color: white;
      padding: 12px;
      border-radius: 6px;
      font-weight: 600;
      margin-bottom: 20px;
      user-select: none;
    }

    @media (max-width: 480px) {
      .container {
        padding: 30px 20px;
      }
      h2 {
        font-size: 1.6rem;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Admin Login</h2>
    <?php if ($error): ?>
      <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form method="POST" novalidate>
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required autocomplete="username" autofocus>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required autocomplete="current-password">

      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>
