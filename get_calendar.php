<?php
include 'database.php';

$result = $conn->query("SELECT nom, date FROM clients ORDER BY date ASC");
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = [
        "client" => $row['nom'],
        "date" => $row['date']
    ];
}
echo json_encode($data);
