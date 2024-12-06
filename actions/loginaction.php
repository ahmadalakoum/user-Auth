<?php

// require the db connection
require "../connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];

    if(empty(trim($username)) || empty(trim($password))){
            die("please enter all required fields");

    }
    try{
    $sql= "SELECT * FROM userauth WHERE username =:username";
    $stmt= $pdo->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user){
        if(password_verify($password,$user["password"]))
        {
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            header("location: ../Success.php");
        }
        else{
            die("Invalid username or password");
        }
    }
    else{
        die("User not found");
    }
}
    catch(PDOException $e){
        die($e->getMessage());
    }


}