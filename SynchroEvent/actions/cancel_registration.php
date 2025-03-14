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

    $sql = "DELETE FROM inscriptions WHERE participant_id = ? AND event_id = ?";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$participant_id, $event_id])) {
        header("Location: ../pages/participant_dashboard.php?canceled=1");
        exit();
    } else {
        echo "Erro ao cancelar inscrição.";
    }
}
?>
