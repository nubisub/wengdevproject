<?php
// session
session_start();
if(isset($_POST['username'])){
    header("Location: index.php");
}

    require 'connect.php';
    isset($_POST['username']) ? $username = $_POST['username'] : $username = '';
    isset($_POST['email']) ? $email = $_POST['email'] : $email = '';
    isset($_POST['password']) ? $password = $_POST['password'] : $password = '';

    
    $sql = "SELECT * FROM login WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $username);
    $stmt->execute();
    $result = $stmt->fetchAll();
    
    // if username exist
    if (count($result) > 0) {
        $_SESSION['usernameexist'] = "username exist";
        $_SESSION['usernametemp'] = $username;
        $_SESSION['emailtemp'] = $email;
        $_SESSION['passwordtemp'] = $password;
        $_SESSION['timeregister'] = time();
        
        if (strlen($password) < 8) {
            $_SESSION['passwordkurang'] = "Password harus lebih dari 8 character";
            $_SESSION['timeregister'] = time();
        }
        $conn = null;
        header("Location: ../signup/");
    }else if(strlen($password) < 8){
        $_SESSION['usernametemp'] = $username;
        $_SESSION['emailtemp'] = $email;
        $_SESSION['passwordtemp'] = $password;
        $_SESSION['passwordkurang'] = "Password harus lebih dari 8 character";
        $_SESSION['timeregister'] = time();
        $conn = null;
        header("Location: ../signup/");
    }
    else {

    isset($_POST['username']) ? $username = $_POST['username'] : $username = '';
    isset($_POST['email']) ? $email = $_POST['email'] : $email = '';
    isset($_POST['password']) ? $password = $_POST['password'] : $password = '';
    $sql = "INSERT INTO login (username, email, password) VALUES (?, ?, ?)"; 
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $email);
    $password = md5($password);
    $stmt->bindParam(3, $password);
    $_SESSION['username']=$username;
    $stmt->execute();
    unset($_SESSION['usernameexist']);
    unset($_SESSION['usernametemp']);
    unset($_SESSION['emailtemp']);
    unset($_SESSION['passwordtemp']);
    $_SESSION['alert'] = "loginsuccess";
    $_SESSION['accountcreate'] = TRUE;
    $conn = null;
    header("Location: ../");
    }
    
    
    
?>