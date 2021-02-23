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
    
    </div>     

        






</body>
</html>