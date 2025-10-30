<?php
include 'database.php';
$data = json_decode(file_get_contents("php://input"), true);

$nom = $data['nom'];
$email = $data['email'];
$telephone = $data['telephone'];
$centre = $data['centre'];
$pays = $data['pays'];

// Générer une date aléatoire parmi les 60 prochains jours
$reservedDates = [];
$result = $conn->query("SELECT date FROM clients");
while ($row = $result->fetch_assoc()) {
    $reservedDates[] = $row['date'];
}

$foundDate = null;
for ($i = 0; $i < 60; $i++) {
    $date = date('Y-m-d', strtotime("+$i days"));
    if (!in_array($date, $reservedDates)) {
        $foundDate = $date;
        break;
    }
}

if (!$foundDate) {
    echo "❌ Aucune date disponible !";
    exit;
}

$stmt = $conn->prepare("INSERT INTO clients (nom, email, telephone, centre, pays, date) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $nom, $email, $telephone, $centre, $pays, $foundDate);

if ($stmt->execute()) {
    echo "✅ Client ajouté avec la date automatique : $foundDate";
} else {
    echo "❌ Erreur lors de l’ajout du client.";
}
