<?php 

session_start();
require('functions.php');

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
    <title>Marflo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="engine0/style.css" />
    <script type="text/javascript" src="slider.js"></script> 
    <script type="text/javascript" src="engine1/jquery.js"></script>
   
    
    
    
</head>
<body>
    
        <div class="dropdown">
            <button onclick="myFunction()" class="dropbtn">Contul meu</button>
            <div id="myDropdown" class="dropdown-content">
                <a href="profil.php">Profile</a>
                <a href="update.php">Update Profile</a>
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


    <div class="myDiv">
        <h2>Despre noi</h2>
        <p>Bun venit! 
        Marflo este o clinica medicala ce are la baza urmatoarele categorii: medicina de familie, ecografie, stomatologie. <br> <br>

        Medicina de familie este specialitatea medicala care asigura asistenta medicala primara si continua contribuind, prin actiuni preventive, educationale, terapeutice si de recuperare, la promovarea starii de sanatate a individului, a familiei si a colectivitatii, fara a se limita la un anumit tip de boli.

        Medicul de familie este prima persoana la care trebuie sa ajungeti pentru a beneficia de asistenta medicala.
        In functie de situatie, medicul de familie poate recomanda efectuarea unor investigatii paraclinice (analize de laborator, imagistica medicala), poate acorda o trimitere catre un medic specialist pentru investigatii sau, direct, pentru internarea in spital. <br> <br>

        Ecografia este metoda prin care se pot vizualiza diferite structuri anatomice cu ajutorul ultrasunetelor. Principiul ecografiei este asemanator celui sonar si consta in emiterea de ultrasunete de catre o sonda speciala. Aceste ultrasunete sunt reflectate de structurile anatomice intalnite si apoi receptionate si transformate intr-o scara de tonuri alb-negru pe monitor. 
         Ultrasunetele sunt vibratii mecanice cu frecvente de peste 20.000 Hz, imperceptibile auzului uman, care sunt inofensive pentru structurile anatomice pe care le intalnesc. <br> <br>

        Stomatologia este o ramura a medicinei care se ocupa cu studiul formatiunilor anatomice si cu tratarea bolilor care apar la nivelul cavitatii orale. Formatiunile anatomice care fac obiectul stomatologiei sunt grupate sub numele de aparat dento-maxilar.
    </p>
    </div>
    
    <div id="wowslider-container0">
	<div class="ws_images"><ul>
		<li><img src="data0/images/cabinet.jpg" alt="cabinet" title="cabinet" id="wows0_0"/></li>
		<li><img src="data0/images/consultatie.jpg" alt="consultatie" title="consultatie" id="wows0_1"/></li>
		<li><a href="http://wowslider.net"><img src="data0/images/ecografie.jpg" alt="css image gallery" title="ecografie" id="wows0_2"/></a></li>
		<li><img src="data0/images/medicfamilie.jpg" alt="medic-familie" title="medic-familie" id="wows0_3"/></li>
	</ul></div>
	<div class="ws_bullets"><div>
		<a href="#" title="cabinet"><span><img src="data0/tooltips/cabinet.jpg" alt="cabinet"/>1</span></a>
		<a href="#" title="consultatie"><span><img src="data0/tooltips/consultatie.jpg" alt="consultatie"/>2</span></a>
		<a href="#" title="ecografie"><span><img src="data0/tooltips/ecografie.jpg" alt="ecografie"/>3</span></a>
		<a href="#" title="medic-familie"><span><img src="data0/tooltips/medicfamilie.jpg" alt="medic-familie"/>4</span></a>
	</div></div><div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.net">carousel jquery</a> by WOWSlider.com v9.0</div>
	<div class="ws_shadow"></div>
	</div>	
	<script type="text/javascript" src="engine0/wowslider.js"></script>
	<script type="text/javascript" src="engine0/script.js"></script>
    
   

    

    <div class="row">
        <div class="column" style="background-color:#aaa;">
            <h2> Orar Clinică<br></h2>
            <p>Luni - Vineri <br>
                8:00 - 19:00 <br> <br>
                Sâmbătă <br>
                9:00 - 15:00    <br> <br>
                Duminică și zilele de sărbători <br>
                Nu este deschis</p>
        </div>
        <div class="column" style="background-color:#bbb;">
            <h2>Orar Medic de serviciu<br></h2>
            <p>Luni - Vineri<br>
                19:00 - 08:00 <br><br>
                Sâmbătă <br>
                15:00 - 00:00 <br><br>
                Duminică și zilele de sărbători<br>
                Fără întrerupere</p>
        </div>
    </div>
    

         

        

   
   




</body>
</html>