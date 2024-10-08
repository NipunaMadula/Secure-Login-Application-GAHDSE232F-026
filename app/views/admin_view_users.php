<?php
// Start the session
session_start();

// Check if the user is logged in and has admin privileges
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    // Redirect to the correct login page
    header("Location: /Secure-Login-Application-GAHDSE232F-026/app/views/login.php");
    exit;
}

// Include the necessary files and the Admin model
require_once __DIR__ . '/../models/Admin.php'; // Adjusted path for model inclusion

// Fetch all users from the database
$adminModel = new Admin();
$users = $adminModel->getAllUsers(); // This should be a method in Admin.php to fetch all users

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
    <!-- Correct link to the CSS file in the project -->
    <link rel="stylesheet" href="/Secure-Login-Application-GAHDSE232F-026/public/css/admin_view_users.css">
</head>
<body>
    <div class="container">
        <h1>All Registered Users</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['id']); ?></td>
                        <td><?= htmlspecialchars($user['fullname']); ?></td>
                        <td><?= htmlspecialchars($user['username']); ?></td>
                        <td><?= htmlspecialchars($user['email']); ?></td>
                        <td><?= htmlspecialchars($user['role']); ?></td>
                        <td>
                        <a href="/Secure-Login-Application-GAHDSE232F-026/app/views/admin_view_user_details.php?id=<?= $user['id']; ?>" 
                        style="background-color: #1a528d; color: white; padding: 8px 16px; text-decoration: none; border-radius: 5px; display: inline-block;">View Details</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Back to Dashboard Button -->
        <div style="text-align: center; margin-top: 20px;">
        <a href="/Secure-Login-Application-GAHDSE232F-026/app/views/admin_dashboard.php" style="background-color: #1a528d; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Back to Dashboard</a>
        </div>

    </div>
</body>
</html>
