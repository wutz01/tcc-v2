<?php  
include_once "homeClass.php";
$home = new Home();

if(isset($_POST['getfunctionName'])){
    
    // read an Applicant Name
    if($_POST['getfunctionName'] == "getAnnouncement"){

        $ID      = $_POST["ID"];    
        $getAnnouncement = $home->getAnnouncement($ID);
      
        echo json_encode($getAnnouncement);
    }
    
    

}
?>

