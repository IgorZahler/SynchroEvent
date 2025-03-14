<?php
include "../config/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $type = $_POST["type"];

    $sql = "INSERT INTO users (name, email, password, type) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$name, $email, $password, $type])) {
        header("Location: ../login.php?success=1");
        exit();
    } else {
        echo "Erro ao registrar usuário.";
    }
}
?>
