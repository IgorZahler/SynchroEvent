<?php
session_start();
if (!isset($_SESSION["user_id"]) || $_SESSION["user_type"] !== "participant") {
    header("Location: ../login.php");
    exit();
}
include "../includes/header.php";
?>
<div class="container">
    <h2 class="mt-4">Painel do Participante</h2>
    <h4>Eventos Disponíveis</h4>
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
            $stmt = $pdo->query("SELECT * FROM events");
            while ($event = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                        <td>{$event['title']}</td>
                        <td>{$event['date']}</td>
                        <td>{$event['location']}</td>
                        <td>
                            <a href='../actions/join_event.php?id={$event['id']}' class='btn btn-success btn-sm'>Inscrever-se</a>
                        </td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>

    <h4 class="mt-4">Seus Eventos Inscritos</h4>
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
            $stmt = $pdo->prepare("SELECT e.* FROM events e 
                                   JOIN inscriptions i ON e.id = i.event_id 
                                   WHERE i.participant_id = ?");
            $stmt->execute([$_SESSION["user_id"]]);
            while ($event = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                        <td>{$event['title']}</td>
                        <td>{$event['date']}</td>
                        <td>{$event['location']}</td>
                        <td>
                            <a href='../actions/cancel_registration.php?id={$event['id']}' class='btn btn-danger btn-sm'>Cancelar Inscrição</a>
                        </td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<?php include "../includes/footer.php"; ?>
