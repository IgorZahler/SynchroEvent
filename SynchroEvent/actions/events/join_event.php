<?php
session_start();
include "../config/db.php";

if (!isset($_SESSION["user_id"]) || $_SESSION["user_type"] !== "participant") {
    header("Location: ../login.php");
    exit();
}

if (isset($_GET["id"])) {
    $event_id = $_GET["id"];
    $participant_id = $_SESSION["user_id"];

    // Verifica se já está inscrito
    $check = $pdo->prepare("SELECT * FROM inscriptions WHERE participant_id = ? AND event_id = ?");
    $check->execute([$participant_id, $event_id]);

    if ($check->rowCount() == 0) {
        $sql = "INSERT INTO inscriptions (participant_id, event_id) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute([$participant_id, $event_id])) {
            header("Location: ../pages/participant_dashboard.php?success=1");
            exit();
        } else {
            echo "Erro ao inscrever-se no evento.";
        }
    } else {
        echo "Você já está inscrito neste evento.";
    }
}
?>
