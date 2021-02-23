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
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="stylesheet" type="text/css" href="search.css">
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
            <a href="logout.php"><li> Logout </li> </a>
            
        </ul>
    </div>

    <div class="data">
    <center>
    <div class="container">
        <form action="" method="POST">
            <label><br><b> Search for id: </b> </label>
            <input type="text" class="btn" name="id" placeholder="ID">
            <input type="submit" class="search" name="search" value="Search">
        </form> 
        <table>
        <tr>
            <th> Nume </th> 
            <th> Prenume </th> 
            <th> Email  </th> 
            <th> Nr telefon </th> 
        </tr> <br>
        <?php 
        $conn = mysqli_connect("localhost", "root", "");
        $db=mysqli_select_db($conn, "baza2");

        if(isset($_POST['search'])){
            $name = $_POST['id'];
            $query = "SELECT * FROM users where id='$name'";
            $result = mysqli_query($conn, $query);
            
            while($row = mysqli_fetch_array( $result)){
                ?>
                <tr> 
                    <td>  <?php echo $row['firstname']; ?> </td>
                    <td>  <?php echo $row['lastname']; ?> </td>
                    <td>  <?php echo $row['mail']; ?> </td>
                    <td> <?php echo $row['phonenumber']; ?> </td>
                </tr>
                <?php 
            }
        }
        ?>
        </table>
    </div>

    </center>
    </div>

        

     

        

    




</body>
</html>