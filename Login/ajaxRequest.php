<?php  
include_once "loginClass.php";
$Login = new Login();

if($_POST['getfunctionName'] == 'logIn')
{
	$Username = $_POST['Username'];
	$Password = $_POST['Password'];

	if($Login->triggerLogin($Username,$Password))
	{
		echo "success";
	}else{
		echo "error";
	}
}

    else if($_POST['getfunctionName'] == "changePassword"){

        $username = $_POST["username"];
        $oldpass = $_POST["oldpass"]; 
        $newpass = $_POST["newpass"]; 
        if($Login->checkPassword($username, $oldpass)){
            if($Login->changePassword($username, $newpass)){
                echo "success";
            }else{
                echo "error";
            }
        }
        else{
            echo "error";
        }
    }

?>