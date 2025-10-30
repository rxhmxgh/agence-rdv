<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Admin</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="dashboard-container">
        <header>
            <h1>📋 Tableau de bord - Agence Voyage</h1>
            <button class="logout" onclick="window.location.href='logout.php'">Déconnexion</button>
        </header>

        <section class="form-section">
            <h2>Ajouter un client</h2>
            <form id="clientForm">
                <input type="text" id="nom" placeholder="Nom complet" required>
                <input type="email" id="email" placeholder="Email" required>
                <input type="tel" id="telephone" placeholder="Téléphone" required pattern="[0-9]{10}">

                <label for="centre">Centre :</label>
                <select id="centre" required>
                    <option value="">-- Choisir --</option>
                    <option value="TLS">TLS</option>
                    <option value="VFS">VFS</option>
                </select>

                <label for="pays">Pays :</label>
                <select id="pays" required>
                    <option value="">-- Sélectionner le pays --</option>
                    <option value="France">France</option>
                    <option value="Espagne">Espagne</option>
                    <option value="Italie">Italie</option>
                    <option value="Canada">Canada</option>
                    <option value="Turquie">Turquie</option>
                </select>

                <button type="submit">Ajouter le client</button>
            </form>
        </section>

        <section class="calendar-section">
            <h2>📅 Calendrier des rendez-vous</h2>
            <div id="calendar-container"></div>
        </section>
    </div>

    <script src="assets/script.js"></script>
</body>
</html>
