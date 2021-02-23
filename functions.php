<?php

function logged_in(){
    return (isset($_SESSION['mail'])) ? true:false;
}

function protect_page(){
    if(logged_in()===false){
        header('Location: protected.php');
        exit();
    }
}

function getUsersData($id){
	$array=array();
    $q = mysql_query("SELECT * FROM 'users' WHERE 'id'= .$id");
    while($r=mysql_fetch_assoc($q))
    {
        $array['id']=$r['id'];
        $array['firstname']=$r['firstname'];
        $array['lastname']=$r['lastname'];
        $array['mail']=$r['mail'];
        $array['phonenumber']=$r['phonenumber'];

    }
    return $array;
}

function getUsersDataByUserId($id)
{
    global $conn;
    $sql = "SELECT * FROM user WHERE id = $id";
    $result = $query->fetch_assoc();
    return $result;

    $conn ->close();
}

function getId($mail)
{
	$q= mysql_query("SELECT 'id' FROM 'users' WHERE 'mail'='".$mail."'");
	while($r=mysql_fetch_assoc($q)){
		return $q['id'];
	}
}
    
function passwordMatch($id, $password){
    global $conn;

    $userdata =   getUsersDataByUserId($id);
    $makePassword = makePassword($password, $userdata['password']);

    if($makePassword == $userdata['password']){
        return true;
    }else{
        return false;
    }

    $conn->close();
}

function changePassword($id, $password){
    global $conn;

    $password = password(32);
    $makePassword = makePassword($password, $password);

    $sql = "UPDATE users SET password = '$makePassword', password = '$password' WHERE id = $id";
    $query = $conn->query($sql);

    if($query === TRUE){
        return true;
    }else {
        return false;
    }
}
 

?>

