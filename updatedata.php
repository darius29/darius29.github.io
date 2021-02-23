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
    <title>Admin page</title>
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
    <form class="box"  method = "POST">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h1>Update of data</h1> <br>
                    <label for="email">Email</label>
                    <input type="text" name="mail" ><br/>
                    <label for="nume">Nume</label>
                    <input type="text" name="firstname" /><br/>
                    <label for="prenume">Prenume</label>
                    <input type="text" name="lastname" /><br/>
                    <label for="nr">Nr Telefon</label>
                    <input type="text" name="phonenumber" /><br/>
                    <label for="level">Tipul utilizatorului</label>
                    <input type="text" name="level" /><br/>
                </div>
            </div>
        </div>
        
        <input type="submit" name="update" value="Salveaza profil"/>

    </form>
    </div>
<?php
    $conn =   mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($conn, "marflo");

    if(isset($_POST['update'])){
        $mail = $_POST['mail'];

        $query="UPDATE users SET firstname='$_POST[firstname]', lastname='$_POST[lastname]', mail='$_POST[mail]', phonenumber='$_POST[phonenumber]', level='$_POST[level]' where mail='$_POST[mail]'";
        $query_run = mysqli_query($conn, $query);

        if($query_run){
            echo '<script type="text/javascript"> alert("Data Update")</script>';
        }else{
            echo '<script type="text/javascript"> alert("Data Not Update")</script>';
        }

        }
 
 ?>
    </div>


</body>
</html>