<?php

// require the db connection
require "../connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $email= $_POST['email'];
    $password = $_POST["password"];

    if(empty(trim($username)) || empty(trim($email)) || empty(trim($password))){
            die("please enter all required fields");

    }
    try{
        $hashedPassword= password_hash($password,PASSWORD_BCRYPT);
        $sql= "INSERT INTO userauth (username,email,password) VALUES (:username,:email,:password)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username',$username);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':password',$hashedPassword);
        $stmt->execute();
        session_start();
        $_SESSION['username'] = $username;
        header("Location: ../Success.php");
    }
    catch(PDOException $e){
        die("Error: ". $e->getMessage());
    }
}