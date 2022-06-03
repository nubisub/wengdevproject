<?php
    session_start();
    require 'connect.php';
    isset($_POST['username']) ? $username = $_POST['username'] : $username = '';
    isset($_POST['password']) ? $password = $_POST['password'] : $password = '';

        $sql = "SELECT * FROM login WHERE username = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $username);
        $password = md5($password);

        $stmt->bindParam(2, $password);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $count = $stmt->rowCount();
        if ($count > 0) {
            
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['alert'] = "loginsuccess";
            $_SESSION['logintime'] = time();
            $_COOKIE['username'] = $username;
            $_COOKIE['password'] = md5($password);
            $conn = null;
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            $_SESSION['usernametemplogin'] = $username;
            $_SESSION['passwordtemplogin'] = $password;
            $_SESSION['timeregisterlogin'] = time();
            $_SESSION['loginunsuccess'] = true;
            $conn = null;
            header("Location: ../signin");
        }
        
?>