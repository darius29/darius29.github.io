<?php
function build_calendar($month, $year) {
    $mysqli = new mysqli('localhost', 'root', '', 'baza2');
    $stmt = $mysqli->prepare("SELECT * FROM booking WHERE MONTH(date) = ? AND YEAR(date) = ?");
    $stmt->bind_param('ss', $month, $year);
    $booking = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $booking[] = $row['date'];
            }
            $stmt->close();
        }
    }
    
    
    
    $daysOfWeek = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');

    $firstDayOfMonth = mktime(0,0,0,$month,1,$year);

    $numberDays = date('t',$firstDayOfMonth);

    $dateComponents = getdate($firstDayOfMonth);

    $monthName = $dateComponents['month'];

    $dayOfWeek = $dateComponents['wday'];

    $datetoday = date('Y-m-d');
    
    $calendar = "<table class='table table-bordered'>";
    $calendar .= "<center><h2>$monthName $year</h2>";
    $calendar.= "<a class='btn btn-xs btn-primary' href='?month=".date('m', mktime(0, 0, 0, $month-1, 1, $year))."&year=".date('Y', 
    mktime(0, 0, 0, $month-1, 1, $year))."'>Previous Month</a> ";
    
    $calendar.= " <a class='btn btn-xs btn-primary' href='?month=".date('m')."&year=".date('Y')."'>Current Month</a> ";
    
    $calendar.= "<a class='btn btn-xs btn-primary' href='?month=".date('m', mktime(0, 0, 0, $month+1, 1, $year))."&year=".date('Y', 
    mktime(0, 0, 0, $month+1, 1, $year))."'>Next Month</a></center><br>";
    
    
        
      $calendar .= "<tr>";

     // Create the calendar headers

     foreach($daysOfWeek as $day) {
          $calendar .= "<th  class='header'>$day</th>";
     } 

     // Create the rest of the calendar

     // Initiate the day counter, starting with the 1st.

     $currentDay = 1;

     $calendar .= "</tr><tr>";

     // The variable $dayOfWeek is used to
     // ensure that the calendar
     // display consists of exactly 7 columns.

     if ($dayOfWeek > 0) { 
         for($k=0;$k<$dayOfWeek;$k++){
                $calendar .= "<td  class='empty'></td>"; 

         }
     }
    
     
     $month = str_pad($month, 2, "0", STR_PAD_LEFT);
  
     while ($currentDay <= $numberDays) {

          if ($dayOfWeek == 7) {

               $dayOfWeek = 0;
               $calendar .= "</tr><tr>";

          }
          
            $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
            $date = "$year-$month-$currentDayRel";
            $dayname = strtolower(date('l', strtotime($date)));
            $eventNum = 0;
            $today = $date==date('Y-m-d')? "today" : "";
            if($dayname == 'sunday'){
                $calendar.="<td class='$today'><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>Close</button>";
            }elseif($date<date('Y-m-d')){
                $calendar.="<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>N/A</button>";
            }else{
            
                $totalbookings = checkSlots($mysqli, $date);
             if($totalbookings==24){
                $calendar.="<td class='$today'><h4>$currentDay</h4> <a href='#' class='btn btn-danger btn-xs'>All Booked</a>";
             }else{
                $calendar.="<td class='$today'><h4>$currentDay</h4> <a href='book.php?date=".$date."' class='btn btn-success btn-xs'>Book</a>";
             }
             
         }
            
            
           
            
          $calendar .="</td>";
          // Increment counters
 
          $currentDay++;
          $dayOfWeek++;

     }
     
     

     // Complete the row of the last week in month, if necessary

     if ($dayOfWeek != 7) { 
     
        $remainingDays = 7 - $dayOfWeek;
          for($l=0;$l<$remainingDays;$l++){
              $calendar .= "<td class='empty'></td>"; 

       }

   }
     
     $calendar .= "</tr>";

     $calendar .= "</table>";

     echo $calendar;

}
 
function checkSlots($mysqli, $date){
    $stmt = $mysqli->prepare("SELECT * FROM booking WHERE  date= ?");
    $stmt->bind_param('s', $date);
    $totalbookings = 0;
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
               $totalbookings++;
            }
            
            $stmt->close();
        }
    } 
    return $totalbookings;
}


?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="book.css">
    
</head>

<body>
        <div class="logo"><a href="#"><img src="logo.bmp"></a>
            <h1> Cabinet medical Marflo <i class="fas fa-calendar-check"></i></h1>
            
            <div class="navbar">
                <a  href="index.php"> Marflo </a>
                <a class='active' href="programari.php"> Programari </a>
                <a href="servici.php"> Servicii</a>
                <a href="tarife.php"> Tarife </a>
                <a href="echipa.php"> Echipa </a>
                <a href="contact.php"> Contact</a>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                        $dateComponents = getdate();
                        if(isset($_GET['month']) && isset($_GET['year'])){
                            $month = $_GET['month']; 			     
                            $year = $_GET['year'];
                        }else{
                            $month = $dateComponents['mon']; 			     
                            $year = $dateComponents['year'];
                        }
                        echo build_calendar($month,$year);
                    ?>
                </div>
            </div>
        </div>

        
</body>

</html>
