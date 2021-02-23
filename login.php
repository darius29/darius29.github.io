<?php 
session_start();
require_once('connection.php');
require('functions.php');
?>



<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   
    <link rel="stylesheet" href="index.css"> 
    <link rel="stylesheet" href="login.css"> 
    
</head>
<body>


    
    <div class="logo"><a href="#"><img src="logo.bmp"></a>
        <h1> Cabinet medical Marflo
        </h1>
        <div class="navbar">
            <a href="index.php"> Marflo </a>
            <a href="programari.php"> Programari </a>
            <a href="servici.php"> Servicii</a>
            <a href="tarife.php"> Tarife </a>
            <a href="echipa.php"> Echipa </a>
            <a href="contact.php"> Contact</a>
        </div>
    </div>

    <div>
    
        <form class="box"  method="post">
            
            <h1>Autentificare</h1>

    
            <div>
                <label for="email"><b>Email:  </b></label>
                <input type="email" name="user" >
            </div>
    
            <div>
                <label for="password"><b>Parola: </b></label>
                <input type="password" name="pass" >
            </div>
    
           
    
            <input type="submit" name="login" value="Login">
            
            <h2>Nu ai cont? <a href="register.php"><b> Inregistrare</b> </a></h2>
    
        </form>

    </div>


    <?php


    if(isset($_POST['login'])){
        $user    = $_POST['user'];
        $pass  = ($_POST['pass']);
        
        $data_user = mysqli_query($conn, "SELECT * FROM users WHERE mail='$user' AND password='$pass' ");
        $r = mysqli_fetch_array($data_user);
        $mail = $r['mail'];
        $password = sha1($r['password']);
        $level = $r['level'];
       

        if($user == $mail && $pass = sha1($password) && $level  == 'user'){
            $_SESSION['level'] = $level;
            header('location: index1.php');
        }
        if($user == $mail && $pass = sha1($password) && $level  == 'admin'){
                $_SESSION['level'] = $level;
                header('location: admin.php');
            }
        
        if($user == $mail && $pass = sha1($password) && $level   == 'medic'){
            $_SESSION['level'] = $level;
            header('location: index2.php');
        }
    }
    ?>
    
   


    


    


</body>
</html>


