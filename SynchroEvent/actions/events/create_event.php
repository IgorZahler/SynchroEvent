<?php
session_start();
include "../config/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST["title"]);
    $description = trim($_POST["description"]);
    $date = $_POST["date"];
    $location = trim($_POST["location"]);
    $organizer_id = $_SESSION["user_id"];

    $sql = "INSERT INTO events (title, description, date, location, organizer_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$title, $description, $date, $location, $organizer_id])) {
        header("Location: ../pages/organizer_dashboard.php?success=1");
        exit();
    } else {
        echo "Erro ao criar evento.";
    }
}
?>
