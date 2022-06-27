<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//code for add courses
if($_POST['submit'])
{

$complainant=$_POST['complainant'];
$complainant_id=$_POST['complainant_id'];
$investigating_officer=$_POST['investigating_officer'];
$statement=$_POST['statement'];
$query="insert into  statements (complainant,complainant_id,investigating_officer,statement) values(?,?,?,?)";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('siss',$complainant,$complainant_id,$investigating_officer,$statement);
$stmt->execute();
echo"<script>alert('Statement from $complainant recorded successfully;</script>";

if($stmt){

	$id_no=$_POST['complainant_id'];
	$firstName=$_POST['complainant'];
	
	$query="insert into  userRegistration(id_no,firstName,middleName,lastName,gender,contactNo,email,password) values(?,?,'00000000','00000000','00000000','00000000','00000000','12345678')";
	$stmt = $mysqli->prepare($query);
	$rc=$stmt->bind_param('is',$id_no, $firstName );
	$stmt->execute();
	echo"<script>alert('You have successfully registered to the online case tracking system.');</script>";
}
}
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title>New statement</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="js/validation.min.js"></script>
</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">New statement </h2>
	
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Make new entry</div>
									<div class="panel-body">
									<?php if(isset($_POST['submit']))
{ ?>
<p style="color: red"><?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg']=""); ?></p>
<?php } ?>
										<form method="post" class="form-horizontal">
											
										<div class="form-group">

<div class="col-sm-8">

</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Complainant's name:</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="complainant" id="complainant" value="" required="required">
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Complainant ID Number</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="complainant_id" id="complainant_id" value="" required="required">
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Investigating officer</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="investigating_officer" id="investigating_officer" value="" required="required">
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">STATEMENT: </label>
<div class="col-sm-8">
<textarea  rows="8" name="statement"  id="statement" class="form-control" required="required"></textarea>
</div>
</div>
<div class="form-group">

<div class="col-sm-8">
</div>
</div>


<div class="col-sm-8 col-sm-offset-2">
<input class="btn btn-primary" type="submit" name="submit" value="Submit statement ">
												</div>
											</div>

										</form>

									</div>
								</div>
									
							
							</div>
						
									
							

							</div>
						</div>

					</div>
				</div> 	
				

			</div>
		</div>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</script>
</body>

</html>