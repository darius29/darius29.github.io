<html>
<head>
    <title>Update</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script type="text/javascript" src="slider.js"></script>
    <link rel="stylesheet" href="index.css"> 
    <link rel="stylesheet" href="update.css"> 
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
        <h1>Update of data</h1> <br>
        <label for="email">Email</label>
        <input type="text" name="mail" ><br/>
        <label for="nume">Nume</label>
        <input type="text" name="firstname" /><br/>
        <label for="prenume">Prenume</label>
        <input type="text" name="lastname" /><br/>
        <label for="prenume">Nr Telefon</label>
        <input type="text" name="phonenumber" /><br/>
        

        <input type="submit" name="update" value="Salveaza profil"/>

    </form>

    
 <?php
 $conn =   mysqli_connect("localhost", "root", "");
 $db = mysqli_select_db($conn, "marflo");

 if(isset($_POST['update'])){
    $mail = $_POST['mail'];

    $query="UPDATE users SET firstname='$_POST[firstname]', lastname='$_POST[lastname]', mail='$_POST[mail]', 
            phonenumber='$_POST[phonenumber]' where mail='$_POST[mail]'";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
        echo '<script type="text/javascript"> alert("Data Update")</script>';
    }else{
        echo '<script type="text/javascript"> alert("Data Not Update")</script>';
    }

    }
 
 ?>



    
        
    

</body>
</html>
