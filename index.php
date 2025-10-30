<?php
session_start();
include('database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $query = $conn->prepare("SELECT * FROM admins WHERE email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        if (password_verify($password, $admin['password'])) {
            $_SESSION['admin'] = $admin['email'];
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Mot de passe incorrect.";
        }
    } else {
        $error = "Adresse email non trouvée.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Connexion Admin</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <div class="login-container">
    <h2>Connexion Admin</h2>
    <form method="POST">
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Mot de passe" required>
      <button type="submit">Se connecter</button>
      <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
    </form>
  </div>
</body>
</html>
