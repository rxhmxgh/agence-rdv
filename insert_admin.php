<?php
include('database.php');

$email = "Admin@admin.com";
$password = "Admin123";
$hash = password_hash($password, PASSWORD_BCRYPT);

$sql = "INSERT INTO admins (email, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $hash);
$stmt->execute();

echo "Admin inséré avec succès. Hash : " . $hash;
