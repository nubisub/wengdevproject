<?php
session_start();
require("../../../../php/connect.php");
$sql = "DELETE FROM recipe WHERE id = '$_SESSION[id_delete]'";
$stmt = $conn->prepare($sql);
$stmt->execute();
header("Location: ../../");
?>