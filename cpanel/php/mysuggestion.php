<?php
    session_start();
    require('../php/connect.php');
    try {
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 
    } catch (\Throwable $th) {
        //throw $th;
    }
    $input = $_GET['name'];
    // $input = 2;
    $nama = $_SESSION['username'];
    // echo $nama;
    $sql = "SELECT * FROM recipe WHERE ((username = $nama) AND (nama LIKE '%$input%' OR deskripsi LIKE '%$input%' OR asal LIKE '%$input%'))";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    echo json_encode($result);
    $conn = null;
?>