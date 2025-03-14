<?php
session_start();
include "../config/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_id = $_POST["event_id"];
    $title = trim($_POST["title"]);
    $description = trim($_POST["description"]);
    $date = $_POST["date"];
    $location = trim($_POST["location"]);
    $organizer_id = $_SESSION["user_id"];

    $sql = "UPDATE events SET title = ?, description = ?, date = ?, location = ? WHERE id = ? AND organizer_id = ?";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$title, $description, $date, $location, $event_id, $organizer_id])) {
        header("Location: ../pages/organizer_dashboard.php?updated=1");
        exit();
    } else {
        echo "Erro ao atualizar evento.";
    }
}
?>
