<?php
session_start();
if (!isset($_SESSION["user_id"]) || $_SESSION["user_type"] !== "organizer") {
    header("Location: ../login.php");
    exit();
}
include "../includes/header.php";
?>
<div class="container">
    <h2 class="mt-4">Criar Novo Evento</h2>
    <form action="../actions/create_event.php" method="POST">
        <div class="form-group">
            <label>Título do Evento</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Descrição</label>
            <textarea name="description" class="form-control" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label>Data e Hora</label>
            <input type="datetime-local" name="date" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Local</label>
            <input type="text" name="location" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Criar Evento</button>
    </form>
</div>
<?php include "../includes/footer.php"; ?>
