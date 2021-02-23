<?php
require_once('config.php');
$mysqli = new mysqli('localhost', 'root', '', 'baza2');
if(isset($_GET['date'])){
    $date = $_GET['date'];
    $stmt = $mysqli->prepare("SELECT * FROM booking WHERE date = ?");
    $stmt->bind_param('s', $date);
    $booking = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $booking[] = $row['timeslot'];
            }
            
            $stmt->close();
        }
}
}

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $timeslot =$_POST['timeslot'];

    $stmt = $mysqli->prepare("SELECT * FROM booking WHERE date = ? AND timeslot= ?");
    $stmt->bind_param('ss', $date, $timeslot);
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            $msg = "<div class='alert alert-danger'>Already Booked</div>";
           
        }else{
            $sql="INSERT INTO booking(name, email, date, timeslot) VALUES (?,?,?,?)";
            $stmtinsert = $db->prepare($sql);
            $result = $stmtinsert->execute([$name, $email, $date, $timeslot]);
            $msg = "<div class='alert alert-success'>Booking Successfull</div>";
            $booking[] = $timeslot;
            $stmt->close();
            $mysqli->close();
        }
    }
}
    
    $duration = 30;
    $cleanup = 0;
    $start = "08:00";
    $end = "20:00";
function timeslots($duration, $cleanup, $start, $end){
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval("PT".$duration."M");
    $cleanupInterval = new DateInterval("PT".$cleanup."M");
    $slots=array();

    for($intStart = $start; $intStart<$end; $intStart->add($interval)->add($cleanupInterval)){
        $endPeriod = clone $intStart;
        $endPeriod->add($interval);
        if($endPeriod>$end){
        break;
        }
        $slots[] = $intStart->format("H:iA")." - ".$endPeriod->format("H:iA");
    }

    return $slots;
    }

?>


<!doctype html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    
    <link rel="stylesheet" type="text/css" href="book.css">
    
    
    
    
  </head>

  <body>

  <div class="logo"><a href="#"><img src="logo.bmp"></a>
        <h1> Cabinet medical Marflo
        <i class="fas fa-calendar-check"></i>
        </h1>
        
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
        <h2 class="text-center">Book for Date: <?php echo date('m/d/Y', strtotime($date)); ?></h2><hr>
        <div class="row">
            <div class="col-md-12">
                <?php echo isset($msg)?$msg:""; ?>
            </div>
            <?php 
            $timeslots = timeslots($duration, $cleanup, $start, $end);
            foreach($timeslots as $ts){
            ?>
            <div class="col-md-2">
                <div class="form-group">
                    <?php if(in_array($ts, $booking)){ ?>
                        <button class="btn btn-danger"> <?php echo $ts; ?> </button>
                    <?php }else{ ?>
                        <button class="btn btn-success book" data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?> </button>
                    <?php } ?>
                    
                </div>
            </div>
            <?php } ?>
            
        </div>
    </div>

    <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Booking: <span id="slot"></span></h4>
            </div>
            <div class="modal-body">
               <div class="row">
               <div class="col-md-12">
               <form action="" method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="">Timeslot</label>
                        <input required type="text" readonly name="timeslot" id= "timeslot" class="form-control" >    
                    </div>
                    <div class="form-group">
                    <label for="">Name</label>
                        <input required type="text"  name="name" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="">Email</label>
                        <input required type="email"  name="email" class="form-control">
                    </div>
                    <div class="form-group pull-right">
                    <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                    </div>
                </form>
                </div>
               </div>
            </div>
           
        </div>

    </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
        $(".book").click(function(){
            var timeslot=$(this).attr('data-timeslot');
            $("#slot").html(timeslot);
            $("#timeslot").val(timeslot);
            $("#myModal").modal("show");

        })
    </script>

  </body>

</html>
