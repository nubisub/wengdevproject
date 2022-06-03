<?php
// start session
session_start();


require("../../../../php/connect.php");
// $id = 315;
$sql = "SELECT * FROM recipe WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $_SESSION['id_delete']);
// get visibility value
$stmt->execute();
$result = $stmt->fetch();
// get visibility value
$visibility = $result['visibility'];
// $visibility = $result['visibility'];

if ($visibility == 0) {
    $sql = "UPDATE recipe SET visibility = 1 WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $_SESSION['id_delete']);
    $stmt->execute();

    $now = 1;
} else {
    $sql = "UPDATE recipe SET visibility = 0 WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $_SESSION['id_delete']);
    $stmt->execute();
    $now = 0;
}
echo $now;

$conn = null;

?>