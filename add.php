<?php 
require_once('config.php');
?>
<?php 

session_start();



if(isset($_GET['logout'])){

    session_destroy();
    unset($_SESSION['username']);
    header("location: index.php");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css"> 
    <link rel="stylesheet" type="text/css" href="admin.css">
    
</head>
<body>
    

    <div class="header">
    <center> <img src="admin.png" alt="adminlogo" id="adminLogo"><br>
    <h1>This is Admin Panel!</h1>
    </center>
    
    </div>
    
    <div class="sidebar">
        <ul>
            <a href="add.php"><li> Add Data </li> </a>
            <a href="delete.php"><li> Delete Data</li> </a>
            <a href="updatedata.php"><li> Update Data </li> </a>
            <a href="search.php"><li> Search Data </li> </a>
            <a href="index.php"><li> Logout </li> </a>
            
        </ul>
    </div>

    <div class="data">
    <div>
        <?php
        if(isset($_POST['register_btn'])){
            $firstname   = $_POST['firstname'];
            $lastname    = $_POST['lastname'];
            $mail       = $_POST['email'];
            $phonenumber = $_POST['phonenumber'];
            $password    = sha1($_POST['password']);
            $level =$_POST['level'];
            $errors   = array(); 
        
           $sql="INSERT INTO users(firstname, lastname, mail, phonenumber, password, level) VALUES(?,?,?,?,?,?)";
            $stmtinsert = $db->prepare($sql);
            $result = $stmtinsert->execute([$firstname, $lastname, $mail, $phonenumber, $password, $level]);

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
               
                echo 'Succesful saved';
            }else
            {
                echo 'There where errors while saving data.';
            }
            
        }
 
        ?>
    </div>

        

    <center>
    <div>
        
        <form class="box"  method="post">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <h1>Add Data</h1>
                        
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
                        
                        <label for="level"><b>Tipul utilizatorului: </b></label>
                        <input class="form-control" id="level" type="text" name="level"  requierd="required">

                        <hr class="mb-3">
                        <input class="btn btn-primary" type="submit" id="register" name="register_btn" value="+Add user">
                    </div>
                </div>
            </div>
        </form>
    </center>
    </div>
    </div>     

        

    




</body>
</html>