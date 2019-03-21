<?php

	require '../Database/database2.php';

   	include_once "../General/header.php";

   	include_once "../General/topBar.php";

   	include_once "../General/leftSideBar.php";



	if(isset($_GET["id"])) {

		$id = $_GET["id"];

		$query = "SELECT * FROM tbl_applicant WHERE fld_studentNo = '$id'";

		$res = mysqli_query($conn, $query);

		$user = mysqli_fetch_assoc($res);

	}

  $query = "SELECT * FROM tbl_users WHERE staffId = '$id'";

  $resUser = mysqli_query($conn, $query);

  $userStmt = mysqli_fetch_assoc($resUser);


  $queryStudent = "SELECT * FROM tbl_student WHERE fld_studentNo = '$id'";

  $resStudent = mysqli_query($conn, $queryStudent);

  $userStudent = mysqli_fetch_assoc($resStudent);


  $querySem = "SELECT * FROM tbl_enrolledsubjects WHERE fld_studentNo = '$id'";
  
  $resQuery = mysqli_query($conn, $querySem);

  $userSem = mysqli_fetch_assoc($resQuery);


  $queryYear = "SELECT * FROM tbl_activatorsy WHERE fld_status = 'ACTIVATED'";

  $resYear = mysqli_query($conn, $queryYear);
  
  $userYear = mysqli_fetch_assoc($resYear);

  mysqli_close($conn);
?>



<div class="page animsition">

    <div class="page-header">

        <h1 class="page-title">Applicant Profile</h1>

	        <ol class="breadcrumb">

	            <li><a href="../General/dashboard.php">Home</a></li>

	        	<li class="active">Applicant Profile</li>

	        </ol>

	    </div>
<div class="card-body">

    <?php if (isset($_SESSION['msgExist'])): ?>

        <div class="notif">

          <div class="alert alert-danger alert-dismissable show">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

              <?php 

                echo $_SESSION['msgExist'];

                unset($_SESSION['msgExist']);

              ?>

          </div>

        </div>

    <?php endif ?>

</div>
<div class="modal fade" id="modal-danger" tabindex="-1" role="dialog" aria-labelledby="deleteUserModal" aria-hidden="true"></div>
   <div class="page-content">

	    <div class="panel">

	        <div class="panel-body container-fluid">

	            <div class="row row-lg">

	                <div class="col-sm-12">

	                	<div class="col-sm-12">

<style type="text/css">

	.input-group{

		display: bold;

	}

</style>

		<button class="btn btn-info" onclick="hideTableInfo()">Information</button> 
		<button class="btn btn-primary" onclick="hideTableSubject()">View subject</button>

<table class="table table-striped" id="infoApplicant">

	<tbody>

		<tr>

			<td colspan="1">

				<?php if($id != $user['fld_studentNo']){ ?>

				<form class="well form-horizontal" id="personalInfo">

					<h2>Student not found</h2><br>

				</form>

				<?php } else { ?>

				<form class="well form-horizontal" id="personalInfo" action="../api/enrollNow.php">

					<h2>Personal Information</h2><br>

					<fieldset>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Full Name</b></label></h6>

							<div class="col-md-3 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_firstName']; ?>" type="text" disabled></div>

							</div>

							<div class="col-md-3 inputGroupContainer">

								<div class="input-group"><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_middleName']; ?>" type="text" disabled></div>

							</div>

							<div class="col-md-3 inputGroupContainer">

								<div class="input-group"><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_lastName']; ?>" type="text" disabled></div>

							</div>

						</div>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Home Address</b></label></h6>

							<div class="col-md-9 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_homeAddress']; ?>" type="text" disabled></div>

							</div>

						</div>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Email Address</b></label></h6>

							<div class="col-md-9 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_emailAddress']; ?>" type="text" disabled></div>

							</div>

						</div>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Birth Place</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_birthPlace']; ?>" type="text" disabled></div>

							</div>

							<h6><label class="col-md-1 control-label"><b>Birthdate</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_birthDate']; ?>" type="text" disabled></div>

							</div>

						</div>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Mobile Number</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_mobilePhoneNo']; ?>" type="text" disabled></div>

							</div>

							<h6><label class="col-md-1 control-label"><b>Telephone Number</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_telNo']; ?>" type="text" disabled></div>

							</div>

						</div>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Sex</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_sex']; ?>" type="text" disabled></div>

							</div>

							<h6><label class="col-md-1 control-label"><b>Gender</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-heart-empty"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_gender']; ?>" type="text" disabled></div>

							</div>

						</div>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Civil Status</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_civilStatus']; ?>" type="text" disabled></div>

							</div>

							<h6><label class="col-md-1 control-label"><b>Age</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_ageApplicant']; ?>" type="text" disabled></div>

							</div>

						</div>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Region</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_regionApplicant']; ?>" type="text" disabled></div>

							</div>

							<h6><label class="col-md-1 control-label"><b>Religion</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<?php

									if ($user['fld_religion'] == 'Other') { ?>

										<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span><input id="fullName" name="fullName" placeholder="Full Name" class="form-control" required="true" value="<?php echo $user['fld_otherReligion']; ?>" type="text" disabled></div>

								<?php	} else { ?>

										<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span><input id="fullName" name="fullName" placeholder="Full Name" class="form-control" required="true" value="<?php echo $user['fld_religion']; ?>" type="text" disabled></div>

								<?php 	}	?>

								

							</div>

						</div>

					</fieldset>

				</form>

				<form class="well form-horizontal" id="familyBackground">

					<h2>Family Background</h2><br>

					<fieldset>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Father's Name</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_fatherName']; ?>" type="text" disabled></div>

							</div>

							<h6><label class="col-md-1 control-label"><b>Mother's Name</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_motherName']; ?>" type="text" disabled></div>

							</div>

						</div>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Address</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_fatherAddress']; ?>" type="text" disabled></div>

							</div>

							<h6><label class="col-md-1 control-label"><b>Address</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_motherAddress']; ?>" type="text" disabled></div>

							</div>

						</div>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Occupation</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_fatherOccupation']; ?>" type="text" disabled></div>

							</div>

							<h6><label class="col-md-1 control-label"><b>Occupation</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_motherOccupation']; ?>" type="text" disabled></div>

							</div>

						</div>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Contact Numebr</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_fatherContactNumber']; ?>" type="text" disabled></div>

							</div>

							<h6><label class="col-md-1 control-label"><b>Contact Number</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_motherContactNumber']; ?>" type="text" disabled></div>

							</div>

						</div>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Educational Attainment</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_fatherEducationalAttainment']; ?>" type="text" disabled></div>

							</div>

							<h6><label class="col-md-1 control-label"><b>Educational Attainment</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_motherEducationalAttainment']; ?>" type="text" disabled></div>

							</div>

						</div>

					</fieldset>

				</form>

				<form class="well form-horizontal" id="familyBackground">

					<h2>Additional Questions</h2><br>

					<?php if ($user['fld_civilStatus'] == 'Married') { ?>

					<h2>FOR MARRIED: Information about spouse</h2><br>

					<fieldset>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Spouse Name</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_spouseName']; ?>" type="text" disabled></div>

							</div>

							<h6><label class="col-md-1 control-label"><b>Spouse Status</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_spouseStatus']; ?>" type="text" disabled></div>

							</div>

						</div>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Address</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_spouseAddress']; ?>" type="text" disabled></div>

							</div>

							<h6><label class="col-md-1 control-label"><b>Contact Number</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_spouseContactNo']; ?>" type="text" disabled></div>

							</div>

						</div>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Occupation</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_spouseOccupation']; ?>" type="text" disabled></div>

							</div>

							<h6><label class="col-md-1 control-label"><b>Employer</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_spouseEmployer']; ?>" type="text" disabled></div>

							</div>

						</div>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Employer's Address</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_spouseEmployerAddress']; ?>" type="text" disabled></div>

							</div>

							<h6><label class="col-md-1 control-label"><b>Location</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_spouseOccupationLocation']; ?>" type="text" disabled></div>

							</div>

						</div>

					</fieldset>

					<h2>Name of Children</h2><br>

					<fieldset>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Children's Name</b></label>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_childrenName']; ?>" type="text" disabled></div>

							</div>

							<h6><label class="col-md-1 control-label"><b>Sex</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_childrenSex']; ?>" type="text" disabled></div>

							</div>

						</div>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Age</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_childrenAge']; ?>" type="text" disabled></div>

							</div>

							<h6><label class="col-md-1 control-label"><b>Birth Date</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_childrenBirthDate']; ?>" type="text" disabled></div>

							</div>

						</div>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Birth Place</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_childrenBirthPlace']; ?>" type="text" disabled></div>

							</div>

							<h6><label class="col-md-1 control-label"><b>Educational Attainment</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_childrenEducationalAttainment']; ?>" type="text" disabled></div>

							</div>

						</div>

					</fieldset>

					<?php 	}	?>

					<h2>IF EMPLOYED</h2><br>

					<fieldset>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Occupation</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_studentOccupation']; ?>" type="text" disabled></div>

							</div>

							<h6><label class="col-md-1 control-label"><b>Employer</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_studentEmployer']; ?>" type="text" disabled></div>

							</div>

						</div>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Address</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_studentEmployerAddress']; ?>" type="text" disabled></div>

							</div>

							<h6><label class="col-md-1 control-label"><b>Location</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_studentOccupationLocation']; ?>" type="text" disabled></div>

							</div>

						</div>

					</fieldset>

					<h2>PRIMARY GUARDIAN'S INFORMATION</h2><br>

					<fieldset>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Guardian's Name</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_guardianName']; ?>" type="text" disabled></div>

							</div>

							<h6><label class="col-md-1 control-label"><b>Relation</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_guardianRelation']; ?>" type="text" disabled></div>

							</div>

						</div>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Address</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_guardianAddress']; ?>" type="text" disabled></div>

							</div>

							<h6><label class="col-md-1 control-label"><b>Email Address</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_guardianEmailAddress']; ?>" type="text" disabled></div>

							</div>

						</div>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Mobile Number</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_guardianMobileNo']; ?>" type="text" disabled></div>

							</div>

							<h6><label class="col-md-1 control-label"><b>Telephone Number</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_guardianTelNo']; ?>" type="text" disabled></div>

							</div>

						</div>

					</fieldset>

					<h2>PRIMARY GUARDIAN'S INFORMATION</h2><br>

					<fieldset>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Guardian's Name</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_guardianName2']; ?>" type="text" disabled></div>

							</div>

							<h6><label class="col-md-1 control-label"><b>Relation</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_guardianRelation2']; ?>" type="text" disabled></div>

							</div>

						</div>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Address</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_guardianAddress2']; ?>" type="text" disabled></div>

							</div>

							<h6><label class="col-md-1 control-label"><b>Email Address</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_guardianEmailaddress2']; ?>" type="text" disabled></div>

							</div>

						</div>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Mobile Number</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_guardianMobileNo2']; ?>" type="text" disabled></div>

							</div>

							<h6><label class="col-md-1 control-label"><b>Telephone Number</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_guardianTelNo2']; ?>" type="text" disabled></div>

							</div>

						</div>

					</fieldset>

				</form>

				<form class="well form-horizontal" id="familyBackground">

					<h2>Academic Information</h2><br>

					<h2>Elementary</h2><br>

					<fieldset>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Name</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_elementaryName']; ?>" type="text" disabled></div>

							</div>

							<h6><label class="col-md-1 control-label"><b>Type</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_elementaryType']; ?>" type="text" disabled></div>

							</div>

						</div>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Address</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_elementaryAddress']; ?>" type="text" disabled></div>

							</div>

							<h6><label class="col-md-1 control-label"><b>Award</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_elementaryAddress']; ?>" type="text" disabled></div>

							</div>

						</div>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Region</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_elementaryRegion']; ?>" type="text" disabled></div>

							</div>

							<h6><label class="col-md-1 control-label"><b>Year Graduated</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_elementaryGraduated']; ?>" type="text" disabled></div>

							</div>

						</div>



						<h2>Secondary</h2><br>

					<fieldset>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Name</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_secondaryName']; ?>" type="text" disabled></div>

							</div>

							<h6><label class="col-md-1 control-label"><b>Type</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_secondaryType']; ?>" type="text" disabled></div>

							</div>

						</div>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Address</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_secondaryAddress']; ?>" type="text" disabled></div>

							</div>

							<h6><label class="col-md-1 control-label"><b>Award</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_secondaryAward']; ?>" type="text" disabled></div>

							</div>

						</div>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Region</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_secondaryRegion']; ?>" type="text" disabled></div>

							</div>

							<h6><label class="col-md-1 control-label"><b>Year Graduated</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_secondaryGraduated']; ?>" type="text" disabled></div>

							</div>

						</div>



						<h2>College</h2><br>

					<fieldset>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Name</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_collegeName']; ?>" type="text" disabled></div>

							</div>

							<h6><label class="col-md-1 control-label"><b>Type</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_collegeType']; ?>" type="text" disabled></div>

							</div>

						</div>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Address</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_collegeAddress']; ?>" type="text" disabled></div>

							</div>

							<h6><label class="col-md-1 control-label"><b>Award</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_collegeAward']; ?>" type="text" disabled></div>

							</div>

						</div>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Region</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_collegeRegion']; ?>" type="text" disabled></div>

							</div>

							<h6><label class="col-md-1 control-label"><b>Year Graduated</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_collegeGraduated']; ?>" type="text" disabled></div>

							</div>

						</div>



						<h2>Vocational</h2><br>

					<fieldset>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Name</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_vocationalName']; ?>" type="text" disabled></div>

							</div>

							<h6><label class="col-md-1 control-label"><b>Type</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_vocationalType']; ?>" type="text" disabled></div>

							</div>

						</div>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Address</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_vocationalAddress']; ?>" type="text" disabled></div>

							</div>

							<h6><label class="col-md-1 control-label"><b>Award</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_vocationalAward']; ?>" type="text" disabled></div>

							</div>

						</div>

						<div class="form-group">

							<h6><label class="col-md-2 control-label"><b>Region</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_vocationalRegion']; ?>" type="text" disabled></div>

							</div>

							<h6><label class="col-md-1 control-label"><b>Year Graduated</b></label></h6>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_vocationalGraduated']; ?>" type="text" disabled></div>

							</div>

						</div>

					</fieldset>

					<h3>SENIOR HIGHSCHOOL DATA</h3>

					<fieldset>

						<div class="form-group">

							<label class="col-md-3 control-label"><b>SENIOR HIGHSCHOOL DATA</b></label>

							<div class="col-md-3 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_learnersData']; ?>" type="text" disabled></div>

							</div>

						</div>

					</fieldset>

					<h3>SENIOR HIGHSCHOOL</h3>

					<fieldset>

						<div class="form-group">

							<label class="col-md-2 control-label"><b>SENIOR HIGHSCHOOL TRACK</b></label>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_shsTrack']; ?>" type="text" disabled></div>

							</div>

							<label class="col-md-2 control-label"><b>SENIOR HIGHSCHOOL STRAND</b></label>

							<div class="col-md-4 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_shsTrackStrand']; ?>" type="text" disabled></div>

							</div>

						</div>

						

					</fieldset>

					<h3>REASONS FOR APPLYING AT TANAUAN CITY COLLEGE</h3>

					<fieldset>

						<div class="form-group">

							<label class="col-md-3 control-label"><b>REASON</b></label>

							<?php if ($user['fld_reasonEntryTCC'] == 'Others') { ?>

								<div class="col-md-6 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_reasonEntryTCCOther']; ?>" type="text" disabled></div>

							</div>

							<?php } else { ?>

							<div class="col-md-6 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_reasonEntryTCC']; ?>" type="text" disabled></div>

							</div>

							<?php } ?>

						</div>

					</fieldset>

					<h3>GENERAL WEIGHTED AVERAGE</h3>

					<fieldset>

						<div class="form-group">

							<label class="col-md-3 control-label"><b>Grade</b></label>

							<div class="col-md-3 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_gwAverage']; ?>" type="text" disabled></div>

							</div>

						</div>

					</fieldset>

					<h3>HOW DID YOU GET TO KNOW ABOUT TANAUAN CITY COLLEGE?</h3>

					<fieldset>

						<div class="form-group">

							<div class="form-group">

							<label class="col-md-3 control-label"><b>How did you get to know Tanauan City College</b></label>

							<?php if ($user['fld_knowAboutCollege'] == 'Others') { ?>

								<div class="col-md-6 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_knowAboutCollegeOther']; ?>" type="text" disabled></div>

							</div>

							<?php } else { ?>

							<div class="col-md-6 inputGroupContainer">

								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_knowAboutCollege']; ?>" type="text" disabled></div>

							</div>

							<?php } ?>

						</div>

						</div>

					</fieldset>

				</form>

				<?php } ?>

			</td>

		</tr>

	</tbody>

</table>

<table class="table table-striped" id="gradeApplicant" style="display: none">

	<tbody>

		<tr>

			<td colspan="1">

  <div class="page-content">
    <div class="panel">
      <div class="panel-body container-fluid">
        <div class="row row-lg">
          <div class="col-sm-12">
            <div class="col-sm-12">
              <div class="example-wrap">
              <h1><?php echo $user['fld_lastName'] ?>, <?php echo $user['fld_firstName'] ?> <?php echo $user['fld_middleName'] ?></h1>
                <div class="example">
<input type="hidden" name="studentNo" id="studentNo" value="<?php echo $id ?>">
                  <div class="form-group" id="refreshCourse">
               <table class="tableAvailableCourses table table-striped width-full" id="tablePreEnrollmentForm">
                  <thead>
                     <tr>
                        <th>Subject&nbsp;Code</th>
                        <th>Description</th>
                        <th>Units</th>
                        <th>Day</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Section</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>

                  </tbody>
                  <tfoot>
                     <tr>
                        <th>Subject&nbsp;Code</th>
                        <th>Description</th>
                        <th>Units</th>
                        <th>Day</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Section</th>
                        <th>Action</th>
                     </tr>
                  </tfoot>
               </table>
            </div>
                  </div>
<a href="#" id="btnPrintPEF"><button class="btn btn-primary">Print PEF</button></a>
<button type="button" class="btn btn-info pull-right" onclick="enrollSubject('<?php echo $id; ?>')">Add Subject</button></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

			</td>

		</tr>

	</tbody>

</table>
<a href="editStudent.php?id=<?php echo $id; ?>"><button class="btn btn-primary pull-right" id="editStudent">Edit</button></a>
<button class="btn btn-danger pull-right" onclick="deleteUser('<?php echo $id; ?>')" id="deleteStudent">Delete</button>
<a href="students.php"><button class="btn btn-info" id="viewMore">View more students</button></a>
	              		</div>

	                </div>

	            </div>
 	
	        </div>

	    </div>

	</div>

</div>


<?php

   include_once "../General/footer.php";

?>

<link rel="stylesheet" type="text/css" href="../assets/js/datatables.min.css"/>
<script type="text/javascript" src="../assets/js/datatables.min.js"></script>
<script src="../assets/plugins/jquery-form/jquery-form.min.js"></script>

<script type="text/javascript">
var pretbl = $("#tablePreEnrollmentForm").DataTable({
    "processing": true,
    "serverSide": false,
    "ajax":{
    "method":"POST",
    "url":"../Student/ajaxRequest.php",
    "dataSrc":"",
    "data":function(d){
      d.getfunctionName = "getsubjects",
      d.studentNumber = "<?php echo $id ?>",
      d.startsy = "<?php echo $userYear['fld_startSY']; ?>",
      d.endsy   = "<?php echo $userYear['fld_endSY']; ?>",
      d.semester = "<?php echo $userYear['fld_semester']; ?>"
    }
  },
  "columns":[
    {"data":"fld_subCode"},
    {"data":"fld_description"},
    {"data":"fld_units"},
    {"data":"fld_day"},
    {"data":"fld_startTime"},
    {"data":"fld_endTime"},
    {"data":"fld_sectionName"},
    {"data":"fld_availableCourseID"}
  ],
  "columnDefs": [
            {
            "render": function (data, type, row) {
              return "<a href='#' onclick='removeSubj("+ data +")'>Remove</a>";
            },
            "targets": 7
        },
  ]
});

  function removeSubj(id)
     {
        var courseID        = id;
        var getfunctionName = 'removesubject';
        var studentNumber   = "<?php echo $id; ?>";
        $.ajax({
              url: "../Student/ajaxRequest.php",
              method: "POST",
              data: {getfunctionName:getfunctionName,courseID:courseID,studentNumber:studentNumber},
              success: function(data) {
                    if(data == 1)
                    {
                      swal({
                           title: "Success",
                           text: "Successfully remove subject",
                           type: "success",
                      });
                      pretbl.ajax.reload();
                    }else{
                      swal({
                           title: "Error!",
                           text: "Please try again!",
                           type: "error",
                      });
                    }
              },
              error : function(XMLHttpRequest, textstatus, error) { 
                    console.log(error);
              } 
           }); 
     }
</script>

<script type="text/javascript">

  $(function(){
    $("#deleteUserModal").DataTable();
  })

  function deleteUser(idx){

    let url = "deleteStudentModal.php";

    $.post(url,{id:idx},function(result){

      $("#modal-danger").html(result);

      $("#modal-danger").modal('show');

    });

  }
</script>

<script type="text/javascript">

  $(function(){

    $("#deleteTable").DataTable();

  })

  function enrollSubject(idx){

    let url = "addSubjectStudent.php";

    $.post(url,{id:idx},function(result){

      $("#modal-danger").html(result);

      $("#modal-danger").modal('show');

    });

  }

</script>

<script type="text/javascript">
	function hideTableInfo() {
	  var x = document.getElementById("infoApplicant");
	  $('#infoApplicant').show();
	  $('#gradeApplicant').hide();
	  $('#viewMore').show();
	  $('#deleteStudent').show();
	  $('#editStudent').show();
	}
	function hideTableSubject() {
	  var x = document.getElementById("gradeApplicant");
	  $('#infoApplicant').hide();
	  $('#gradeApplicant').show();
	  $('#viewMore').hide();
	  $('#deleteStudent').hide();
	  $('#editStudent').hide();
	}

</script>

<script type="text/javascript">
  $(document).ready( function () {
    $('#exampleGrade').DataTable();
} );
</script>

<script type="text/javascript">
  $(document).on('click', '#btnPrintPEF', function(){
    var studentNo = $("#studentNo").val();
    if(studentNo != ""){
     window.location = '../Student/exportpdf.php?studentNo=' + btoa(studentNo);       
    }
  });
</script>