<?php
    session_start();
    require 'connect.php';
    isset($_POST['username']) ? $username = $_POST['username'] : $username = '';
    isset($_POST['password']) ? $password = $_POST['password'] : $password = '';

    // if username and password
        $sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $count = $stmt->rowCount();
        if ($count > 0) {
            
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['alert'] = "loginsuccess";
            $_SESSION['logintime'] = time();
            $_COOKIE['username'] = $username;
            // make cookie password md5
            $_COOKIE['password'] = md5($password);
            // header("Location: ../");
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            // not in database
            // header("Location: index.php");
            // redirect to index an alert
            $_SESSION['usernametemplogin'] = $username;
            $_SESSION['passwordtemplogin'] = $password;
            $_SESSION['timeregisterlogin'] = time();
            $_SESSION['loginunsuccess'] = true;
            header("Location: ../signin");
        }
        
?>