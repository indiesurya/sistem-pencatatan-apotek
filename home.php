<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}
$data = $_SESSION["user"];
?>

<div class="halaman">
    <h1>Selamat Datang, <?php echo $data["username"]; ?>!!</h1>
</div>