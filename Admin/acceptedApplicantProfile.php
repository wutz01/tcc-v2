<?php
   include_once "../General/header.php";
   include_once "../General/topBar.php";
   include_once "../General/leftSideBar.php";
?>
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "tanauaud_tcc";

	$conn = new mysqli($servername, $username, $password, $db);
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  die();
	}
if(isset($_GET["id"])) {
	$id = $_GET["id"];
	$query = "SELECT * FROM tbl_applicant WHERE fld_applicantID = '$id'";
	$res = mysqli_query($conn, $query);
	$user = mysqli_fetch_assoc($res);
}
?>

<div class="page animsition">
    <div class="page-header">
        <h1 class="page-title">Applicant Profile</h1>
	        <ol class="breadcrumb">
	            <li><a href="../General/dashboard.php">Home</a></li>
	        	<li class="active">Applicant Profile</li>
	        </ol>
	    </div>
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
<table class="table table-striped">
	<tbody>
		<tr>
			<td colspan="1">
				<?php if($id != $user['fld_applicantID']){ ?>
					<form class="well form-horizontal" id="personalInfo">
					<h2>Applicant not found</h2><br>
				</form>
				<?php } else { ?>
				<form class="well form-horizontal" id="personalInfo">
					<h2>Personal Information</h2><br>
					<fieldset>
						<div class="form-group">
							<label class="col-md-3 control-label"><b>Full Name</b></label>
							<div class="col-md-2 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_firstName']; ?>" type="text" disabled></div>
							</div>
							<div class="col-md-2 inputGroupContainer">
								<div class="input-group"><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_middleName']; ?>" type="text" disabled></div>
							</div>
							<div class="col-md-2 inputGroupContainer">
								<div class="input-group"><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_lastName']; ?>" type="text" disabled></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><b>Home Address</b></label>
							<div class="col-md-6 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_homeAddress']; ?>" type="text" disabled></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><b>Email Address</b></label>
							<div class="col-md-6 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_emailAddress']; ?>" type="text" disabled></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><b>Birth Place</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_birthPlace']; ?>" type="text" disabled></div>
							</div>
							<label class="col-md-1 control-label"><b>Birthdate</b></label>
							<div class="col-md-2 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_birthDate']; ?>" type="text" disabled></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><b>Mobile Number</b></label>
							<div class="col-md-2 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_mobilePhoneNo']; ?>" type="text" disabled></div>
							</div>
							<label class="col-md-2 control-label"><b>Telephone Number</b></label>
							<div class="col-md-2 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_telNo']; ?>" type="text" disabled></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><b>Sex</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_sex']; ?>" type="text" disabled></div>
							</div>
							<label class="col-md-1 control-label"><b>Gender</b></label>
							<div class="col-md-2 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-heart-empty"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_gender']; ?>" type="text" disabled></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><b>Civil Status</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_civilStatus']; ?>" type="text" disabled></div>
							</div>
							<label class="col-md-1 control-label"><b>Age</b></label>
							<div class="col-md-2 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_ageApplicant']; ?>" type="text" disabled></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><b>Region</b></label>
							<div class="col-md-2 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_regionApplicant']; ?>" type="text" disabled></div>
							</div>
							<label class="col-md-1 control-label"><b>Religion</b></label>
							<div class="col-md-3 inputGroupContainer">
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
							<label class="col-md-2 control-label"><b>Father's Name</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_fatherName']; ?>" type="text" disabled></div>
							</div>
							<label class="col-md-2 control-label"><b>Mother's Name</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_motherName']; ?>" type="text" disabled></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label"><b>Address</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_fatherAddress']; ?>" type="text" disabled></div>
							</div>
							<label class="col-md-2 control-label"><b>Address</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_motherAddress']; ?>" type="text" disabled></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label"><b>Occupation</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_fatherOccupation']; ?>" type="text" disabled></div>
							</div>
							<label class="col-md-2 control-label"><b>Occupation</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_motherOccupation']; ?>" type="text" disabled></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label"><b>Contact Numebr</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_fatherContactNumber']; ?>" type="text" disabled></div>
							</div>
							<label class="col-md-2 control-label"><b>Contact Number</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_motherContactNumber']; ?>" type="text" disabled></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label"><b>Educational Attainment</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_fatherEducationalAttainment']; ?>" type="text" disabled></div>
							</div>
							<label class="col-md-2 control-label"><b>Educational Attainment</b></label>
							<div class="col-md-3 inputGroupContainer">
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
							<label class="col-md-3 control-label"><b>Spouse Name</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_spouseName']; ?>" type="text" disabled></div>
							</div>
							<label class="col-md-2 control-label"><b>Spouse Status</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_spouseStatus']; ?>" type="text" disabled></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><b>Address</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_spouseAddress']; ?>" type="text" disabled></div>
							</div>
							<label class="col-md-2 control-label"><b>Contact Number</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_spouseContactNo']; ?>" type="text" disabled></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><b>Occupation</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_spouseOccupation']; ?>" type="text" disabled></div>
							</div>
							<label class="col-md-2 control-label"><b>Employer</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_spouseEmployer']; ?>" type="text" disabled></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><b>Employer's Address</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_spouseEmployerAddress']; ?>" type="text" disabled></div>
							</div>
							<label class="col-md-2 control-label"><b>Location</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_spouseOccupationLocation']; ?>" type="text" disabled></div>
							</div>
						</div>
					</fieldset>
					<h2>Name of Children</h2><br>
					<fieldset>
						<div class="form-group">
							<label class="col-md-3 control-label"><b>Children's Name</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_childrenName']; ?>" type="text" disabled></div>
							</div>
							<label class="col-md-2 control-label"><b>Sex</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_childrenSex']; ?>" type="text" disabled></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><b>Age</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_childrenAge']; ?>" type="text" disabled></div>
							</div>
							<label class="col-md-2 control-label"><b>Birth Date</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_childrenBirthDate']; ?>" type="text" disabled></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><b>Birth Place</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_childrenBirthPlace']; ?>" type="text" disabled></div>
							</div>
							<label class="col-md-2 control-label"><b>Educational Attainment</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_childrenEducationalAttainment']; ?>" type="text" disabled></div>
							</div>
						</div>
					</fieldset>
					<?php 	}	?>
					<h2>IF EMPLOYED</h2><br>
					<fieldset>
						<div class="form-group">
							<label class="col-md-3 control-label"><b>Occupation</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_studentOccupation']; ?>" type="text" disabled></div>
							</div>
							<label class="col-md-2 control-label"><b>Employer</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_studentEmployer']; ?>" type="text" disabled></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><b>Address</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_studentEmployerAddress']; ?>" type="text" disabled></div>
							</div>
							<label class="col-md-2 control-label"><b>Location</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_studentOccupationLocation']; ?>" type="text" disabled></div>
							</div>
						</div>
					</fieldset>
					<h2>PRIMARY GUARDIAN'S INFORMATION</h2><br>
					<fieldset>
						<div class="form-group">
							<label class="col-md-3 control-label"><b>Guardian's Name</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_guardianName']; ?>" type="text" disabled></div>
							</div>
							<label class="col-md-2 control-label"><b>Relation</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_guardianRelation']; ?>" type="text" disabled></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><b>Address</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_guardianAddress']; ?>" type="text" disabled></div>
							</div>
							<label class="col-md-2 control-label"><b>Email Address</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_guardianEmailAddress']; ?>" type="text" disabled></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><b>Mobile Number</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_guardianMobileNo']; ?>" type="text" disabled></div>
							</div>
							<label class="col-md-2 control-label"><b>Telephone Number</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_guardianTelNo']; ?>" type="text" disabled></div>
							</div>
						</div>
					</fieldset>
					<h2>PRIMARY GUARDIAN'S INFORMATION</h2><br>
					<fieldset>
						<div class="form-group">
							<label class="col-md-3 control-label"><b>Guardian's Name</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_guardianName2']; ?>" type="text" disabled></div>
							</div>
							<label class="col-md-2 control-label"><b>Relation</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_guardianRelation2']; ?>" type="text" disabled></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><b>Address</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_guardianAddress2']; ?>" type="text" disabled></div>
							</div>
							<label class="col-md-2 control-label"><b>Email Address</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_guardianEmailaddress2']; ?>" type="text" disabled></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><b>Mobile Number</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_guardianMobileNo2']; ?>" type="text" disabled></div>
							</div>
							<label class="col-md-2 control-label"><b>Telephone Number</b></label>
							<div class="col-md-3 inputGroupContainer">
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
							<label class="col-md-3 control-label"><b>Name</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_elementaryName']; ?>" type="text" disabled></div>
							</div>
							<label class="col-md-1 control-label"><b>Type</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_elementaryType']; ?>" type="text" disabled></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><b>Address</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_elementaryAddress']; ?>" type="text" disabled></div>
							</div>
							<label class="col-md-1 control-label"><b>Award</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_elementaryAddress']; ?>" type="text" disabled></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><b>Region</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_elementaryRegion']; ?>" type="text" disabled></div>
							</div>
							<label class="col-md-1 control-label"><b>Year Graduated</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_elementaryGraduated']; ?>" type="text" disabled></div>
							</div>
						</div>

						<h2>Secondary</h2><br>
					<fieldset>
						<div class="form-group">
							<label class="col-md-3 control-label"><b>Name</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_secondaryName']; ?>" type="text" disabled></div>
							</div>
							<label class="col-md-1 control-label"><b>Type</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_secondaryType']; ?>" type="text" disabled></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><b>Address</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_secondaryAddress']; ?>" type="text" disabled></div>
							</div>
							<label class="col-md-1 control-label"><b>Award</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_secondaryAward']; ?>" type="text" disabled></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><b>Region</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_secondaryRegion']; ?>" type="text" disabled></div>
							</div>
							<label class="col-md-1 control-label"><b>Year Graduated</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_secondaryGraduated']; ?>" type="text" disabled></div>
							</div>
						</div>

						<h2>College</h2><br>
					<fieldset>
						<div class="form-group">
							<label class="col-md-3 control-label"><b>Name</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_collegeName']; ?>" type="text" disabled></div>
							</div>
							<label class="col-md-1 control-label"><b>Type</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_collegeType']; ?>" type="text" disabled></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><b>Address</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_collegeAddress']; ?>" type="text" disabled></div>
							</div>
							<label class="col-md-1 control-label"><b>Award</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_collegeAward']; ?>" type="text" disabled></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><b>Region</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_collegeRegion']; ?>" type="text" disabled></div>
							</div>
							<label class="col-md-1 control-label"><b>Year Graduated</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_collegeGraduated']; ?>" type="text" disabled></div>
							</div>
						</div>

						<h2>Vocational</h2><br>
					<fieldset>
						<div class="form-group">
							<label class="col-md-3 control-label"><b>Name</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_vocationalName']; ?>" type="text" disabled></div>
							</div>
							<label class="col-md-1 control-label"><b>Type</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_vocationalType']; ?>" type="text" disabled></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><b>Address</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_vocationalAddress']; ?>" type="text" disabled></div>
							</div>
							<label class="col-md-1 control-label"><b>Award</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_vocationalAward']; ?>" type="text" disabled></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"><b>Region</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_vocationalRegion']; ?>" type="text" disabled></div>
							</div>
							<label class="col-md-1 control-label"><b>Year Graduated</b></label>
							<div class="col-md-3 inputGroupContainer">
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
							<label class="col-md-3 control-label"><b>SENIOR HIGHSCHOOL TRACK</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_shsTrack']; ?>" type="text" disabled></div>
							</div>
							<label class="col-md-3 control-label"><b>SENIOR HIGHSCHOOL STRAND</b></label>
							<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_shsTrackStrand']; ?>" type="text" disabled></div>
							</div>
						</div>
						
					</fieldset>
					<h3>REASONS FOR APPLYING AT TANAUAN CITY COLLEGE</h3>
					<fieldset>
						<div class="form-group">
							<label class="col-md-3 control-label"><b>REASON</b></label>
							<?php if ($user['fld_reasonEntryTCC'] == 'Others') { ?>
								<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_reasonEntryTCCOther']; ?>" type="text" disabled></div>
							</div>
							<?php } else { ?>
							<div class="col-md-3 inputGroupContainer">
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
								<div class="col-md-3 inputGroupContainer">
								<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span><input id="fullName" name="fullName" placeholder="N/A" class="form-control" required="true" value="<?php echo $user['fld_knowAboutCollegeOther']; ?>" type="text" disabled></div>
							</div>
							<?php } else { ?>
							<div class="col-md-3 inputGroupContainer">
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
	              		</div>
	                </div>
	                <a href="../Admin/acceptedApplicant.php"><button class="btn btn-primary pull-right">View more applicant</button></a>
	            </div>
	        </div>
	    </div>
	</div>
</div>

<?php
   include_once "../General/footer.php";
?>