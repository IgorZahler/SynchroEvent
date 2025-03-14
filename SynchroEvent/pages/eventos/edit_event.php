<?php
session_start();
if (!isset($_SESSION["user_id"]) || $_SESSION["user_type"] !== "organizer") {
    header("Location: ../login.php");
    exit();
}

include "../config/db.php";

if (!isset($_GET["id"])) {
    header("Location: organizer_dashboard.php");
    exit();
}

$event_id = $_GET["id"];
$stmt = $pdo->prepare("SELECT * FROM events WHERE id = ? AND organizer_id = ?");
$stmt->execute([$event_id, $_SESSION["user_id"]]);
$event = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$event) {
    header("Location: organizer_dashboard.php");
    exit();
}

include "../includes/header.php";
?>
<div class="container">
    <h2 class="mt-4">Editar Evento</h2>
    <form action="../actions/update_event.php" method="POST">
        <input type="hidden" name="event_id" value="<?= $event['id'] ?>">
        <div class="form-group">
            <label>Título do Evento</label>
            <input type="text" name="title" class="form-control" value="<?
