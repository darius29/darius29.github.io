<?php 
require_once('config.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="register.css"> 
    
    
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

    
   
    <div>
        <?php
        if(isset($_POST['register_btn'])){
            $firstname   = $_POST['firstname'];
            $lastname    = $_POST['lastname'];
            $mail       = $_POST['email'];
            $phonenumber = $_POST['phonenumber'];
            $password    = $_POST['password'];
            $errors   = array(); 
        
            

            $sql="INSERT INTO users(firstname, lastname, mail, phonenumber, password) VALUES(?,?,?,?,?)";
            $stmtinsert = $db->prepare($sql);
            $result = $stmtinsert->execute([$firstname, $lastname, $mail, $phonenumber, $password]);

            if (empty($firstname)) { 
                echo  "Nume is required"; 
            }
            if (empty($lastname)) { 
                array_push($errors, "Prenume is required"); 
            }
            if (empty($email)) { 
                array_push($errors, "Email is required"); 
            }
            if (empty($phonenumber)) { 
                array_push($errors, "Numar de telefon is required"); 
            }
            if (empty($password)) { 
                array_push($errors, "Password is required"); 
            }
            
            if($result)
            {
               
               
                echo '<script type="text/javascript"> alert("Succesful saved")</script>';
            }else
            {
                
                echo '<script type="text/javascript"> alert("There where errors while saving data.")</script>';
            }
            
        }
 
        ?>
    </div>

        


    <div>
        <form class="box"  method="post">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <h1>Inregistrare</h1>
                        
                        <hr class="mb-3">
                        <label for="firstname"><b>Nume: </b></label>
                        <input class="form-control" id="firstname" type="text" name="firstname"  requierd="required">

                        <label for="lastname"><b>Prenume: </b></label>
                        <input class="form-control" id="lastname" type="text" name="lastname"  requierd="required">

                        <label for="email"><b>Adresa de email: </b></label>
                        <input class="form-control" id="email" type="email" name="email"  requierd="required">

                        <label for="phonenumber"><b>Numar de telefon: </b></label>
                        <input class="form-control" id="phonenumber" type="text" name="phonenumber"  requierd="required">

                        <label for="password"><b>Parola: </b></label>
                        <input class="form-control" id="password" type="password" name="password"  requierd="required">

                        <hr class="mb-3">
                        <input class="btn btn-primary" type="submit" id="register" name="register_btn" value="Sign Up">

                        
            
                        <h2>Ai deja un cont? <a href="login.php"><br><b> Login</b> </a></h2>
    
                    </div>
                </div>
            </div>
        </form>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    


</body>
</html>


