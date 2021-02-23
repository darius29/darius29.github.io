<?php 
session_start();
require_once('connection.php');
require('functions.php');

logged_in();
/*
$mail= $_SESSION['mail'];
if($_SESSION['mail'])
    echo "Welcome, ".$_SESSION['mail']."";
    else
    die("You must be logged in!");
*/
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script type="text/javascript" src="slider.js"></script>
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="search.css">
 
</head>
<body>
    
        <div class="dropdown">
            <button onclick="myFunction()" class="dropbtn">Contul meu</button>
            <div id="myDropdown" class="dropdown-content">
                <a href="profil.php">Profile</a>
                <a href="update1.php">Update Profile</a>
                <a href="programari1.php">Programari</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    
        <div class="logo"><a href="#"><img src="logo.bmp"></a>
        <h1> Cabinet medical Marflo
            <td class="text-rcenter"><span class="flag-icon flag-icon-ro"></span></td>
            <td class="text-center"><span class="flag-icon flag-icon-us"></span></td>
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
    <br><br>
    <center>
    <div class="container">
        <form action="" method="POST">
            <input type="text" class="btn" name="date" placeholder="Data">
            <input type="submit" class="search" name="search" value="Search">
        </form> 
        <table>
        <tr>
            <th> Nume </th> 
            <th> Email  </th> 
            <th> Data </th> 
            <th> Ora </th> 
        </tr> <br>
        <?php 
        $conn = mysqli_connect("localhost", "root", "");
        $db=mysqli_select_db($conn, "baza2");

        if(isset($_POST['search'])){
            $date = $_POST['date'];
            $query = "SELECT * FROM booking where date='$date'";
            $result = mysqli_query($conn, $query);
            
            while($row = mysqli_fetch_array( $result)){
                ?>
                <tr> 
                    <td>  <?php echo $row['name']; ?> </td>
                    <td>  <?php echo $row['email']; ?> </td>
                    <td>  <?php echo $row['date']; ?> </td>
                    <td> <?php echo $row['timeslot']; ?> </td>
                </tr>
                <?php 
            }
        }
        ?>
        </table>
    </div>

    </center>







   
       

</body>
</html>