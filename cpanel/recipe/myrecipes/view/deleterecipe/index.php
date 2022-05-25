<?php
session_start();
require("../../../../php/connect.php");
$sql = "DELETE FROM recipe WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $_SESSION['id_delete']);

$stmt->execute();
unset($_SESSION['id_delete']);
$conn = null;
header("Location: ../../");
?>