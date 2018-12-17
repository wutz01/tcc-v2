<?php
include_once "loginClass.php";
$Login = new Login();

if($_POST['getfunctionName'] == 'logIn')
{
	$Username = $_POST['username'];
	$Password = $_POST['password'];
	try {
		if($Login->triggerLogin($Username,$Password))
		{
			$json['message'] = "Success";
			$json['is_successful'] = true;
		}else{
			$json['message'] = "Error";
			$json['is_successful'] = false;
		}
	} catch (\Exception $e) {
		$json['message'] = $e;
		$json['is_successful'] = false;
	}
}

else if($_POST['getfunctionName'] == "changePassword"){

    $username = $_POST["username"];
    $oldpass = $_POST["oldpass"];
    $newpass = $_POST["newpass"];
    if($Login->checkPassword($username, $oldpass)){
        if($Login->changePassword($username, $newpass)){
					$json['message'] = "Success";
					$json['is_successful'] = true;
        }else{
					$json['message'] = "Error";
					$json['is_successful'] = false;
        }
    }
    else{
        echo "error";
    }
}

echo json_encode($json, 200);
?>
