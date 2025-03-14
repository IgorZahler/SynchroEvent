<?php
session_start();
if (!isset($_SESSION["user_id"]) || $_SESSION["user_type"] !== "organizer") {
    header("Location: ../login.php");
    exit();
}
include "../includes/header.php";
?>
<div class="container">
    <h2 class="mt-4">Painel do Organizador</h2>
    <a href="create_event.php" class="btn btn-primary mb-3">Criar Novo Evento</a>
    <h4>Seus Eventos</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Título</th>
                <th>Data</th>
                <th>Local</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "../config/db.php";
            $stmt = $pdo->prepare("SELECT * FROM events WHERE organizer_id = ?");
            $stmt->execute([$_SESSION["user_id"]]);
            while ($event = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                        <td>{$event['title']}</td>
                        <td>{$event['date']}</td>
                        <td>{$event['location']}</td>
                        <td>
                            <a href='edit_event.php?id={$event['id']}' class='btn btn-warning btn-sm'>Editar</a>
                            <a href='../actions/delete_event.php?id={$event['id']}' class='btn btn-danger btn-sm'>Excluir</a>
                        </td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<?php include "../includes/footer.php"; ?>
