<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

if ($_SESSION["user_type"] == "organizer") {
    header("Location: pages/organizer_dashboard.php");
} else {
    header("Location: pages/participant_dashboard.php");
}
exit();
?>
