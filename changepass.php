<?php 
session_start();
require('functions.php');
?>
<html>
<head>
    <title>Change password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script type="text/javascript" src="slider.js"></script>
    <link rel="stylesheet" href="index.css"> 
    <link rel="stylesheet" href="changepass.css"> 
</head>

<body>

    <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn">Contul meu</button>
        <div id="myDropdown" class="dropdown-content">
            <a href="profil.php">Profile</a>
            <a href="update.php">Update Profile</a>
            <a href="changepass.php">Change password</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>

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

    <form class="box"  method = "POST">
        <h1>Schimbare parola</h1> <br>
        
        <label for="email">Email</label>
        <input type="text" name="mail" placeholder="Enter Email "/><br/>

        <label for="password">Parola </label>
        <input type="password" name="currentpassword" placeholder="Parola "/><br/>
        
        <label for="password">Parola noua</label>
        <input type="password" name="password" placeholder="Parola noua"/><br/>

        <label for="passwordconf">Confirmare Parola</label>
        <input type="password" name="confpassword" placeholder="Confirmare parola"/><br/>
        

        

        <input type="submit" name="submit" value="Submit"/>

    </form>



    

    <?php 

    $conn =   mysqli_connect("localhost", "root", "", "baza2");
    

    if($_POST){
        $currentpassword = $_POST['currentpassword'];
        $newpassword = $_POST['password'];
        $confpassword = $_POST['confpassword'];
    
        if($currentpassword == ""){
            echo "Current Password field is required";
        }
        if($newpassword == ""){
            echo " Password field is required";
        }
        if($confpassword == ""){
            echo "Confirm Password field is required";
        }

        if($currentpassword && $newpassword && $confpassword){
            if(passwordMatch($_SESSION['id'], $currentpassword) === TRUE){
                if(changePassword($_SESSION['id'], $newpassword)=== TRUE){
                    echo "Succesfully update";
                }else{
                    echo "Error while updating the information";
                }
            }else{
                echo "Current password is incorect. ";
            }
        }
    
    }




?>
        
    

</body>
</html>
