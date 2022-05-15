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
    // select * where username
    // $sql = "SELECT * FROM login WHERE username = $username";
    // select all from login where usernmae
    $sql = "SELECT * FROM login WHERE username = '$username'";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    
    
    // if username exist
    if (count($result) > 0) {
        // echo "username exist";
        $_SESSION['usernameexist'] = "username exist";
        $_SESSION['usernametemp'] = $username;
        $_SESSION['emailtemp'] = $email;
        $_SESSION['passwordtemp'] = $password;
        // set time
        $_SESSION['timeregister'] = time();
        // redirect to login
        if (strlen($password) < 8) {
        $_SESSION['passwordkurang'] = "Password harus lebih dari 8 character";
        // set time
        $_SESSION['timeregister'] = time();
        // redirect to login
    }
        header("Location: ../signup/");
    }else if(strlen($password) < 8){
        $_SESSION['usernametemp'] = $username;
        $_SESSION['emailtemp'] = $email;
        $_SESSION['passwordtemp'] = $password;
        $_SESSION['passwordkurang'] = "Password harus lebih dari 8 character";
        // set time
        $_SESSION['timeregister'] = time();
        header("Location: ../signup/");
    }
    else {

    isset($_POST['username']) ? $username = $_POST['username'] : $username = '';
    isset($_POST['email']) ? $email = $_POST['email'] : $email = '';
    isset($_POST['password']) ? $password = $_POST['password'] : $password = '';
    // insert into recipe login
    $sql = "INSERT INTO login (username, email, password) VALUES (?, ?, ?)"; 
    $stmt = $conn->prepare($sql);
    // bindparam
    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $email);
    $stmt->bindParam(3, $password);
    $_SESSION['username']=$username;
    $stmt->execute();
    // unset
    unset($_SESSION['usernameexist']);
    unset($_SESSION['usernametemp']);
    unset($_SESSION['emailtemp']);
    unset($_SESSION['passwordtemp']);
    $_SESSION['alert'] = "loginsuccess";
    $_SESSION['accountcreate'] = TRUE;
    
    header("Location: ../");
    }
    
    
    
?>