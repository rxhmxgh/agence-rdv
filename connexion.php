<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Connexion - Agence RDV</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
  background: linear-gradient(to right, #007BFF, #00B4DB);
  font-family: 'Poppins', sans-serif;
}
.card {
  background: white;
  border-radius: 15px;
}
a {
  color: #007BFF;
  text-decoration: none;
}
a:hover {
  text-decoration: underline;
}

  </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center min-vh-100">
  <div class="card p-4 shadow-lg" style="width: 400px;">
    <h3 class="text-center mb-3">Connexion</h3>
    <form action="login.php" method="POST">
      <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Mot de passe</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Se connecter</button>
    </form>

    <p class="text-center mt-3">
      Pas encore de compte ?
      <a href="#" id="showRegister">S’inscrire</a>
    </p>
  </div>

  <!-- Formulaire d'inscription caché -->
  <div class="card p-4 shadow-lg d-none" id="registerCard" style="width: 400px;">
    <h3 class="text-center mb-3">Inscription</h3>
    <form action="register.php" method="POST">
      <div class="mb-2"><input type="text" name="nom" class="form-control" placeholder="Nom" required></div>
      <div class="mb-2"><input type="text" name="prenom" class="form-control" placeholder="Prénom" required></div>
      <div class="mb-2"><input type="email" name="email" class="form-control" placeholder="Email" required></div>
      <div class="mb-3"><input type="password" name="password" class="form-control" placeholder="Mot de passe" required></div>
      <button type="submit" class="btn btn-success w-100">Créer un compte</button>
    </form>

    <p class="text-center mt-3">
      Déjà un compte ?
      <a href="#" id="showLogin">Se connecter</a>
    </p>
  </div>
</div>

<script>
document.getElementById('showRegister').addEventListener('click', () => {
  document.querySelector('.card').classList.add('d-none');
  document.getElementById('registerCard').classList.remove('d-none');
});
document.getElementById('showLogin').addEventListener('click', () => {
  document.querySelector('.card').classList.remove('d-none');
  document.getElementById('registerCard').classList.add('d-none');
});
</script>

</body>
</html>
