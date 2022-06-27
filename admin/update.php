<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
if($_POST['submit'])
{

	$ob=$_POST['ob'];
	$update=$_POST['update'];
	$updating_officer=$_POST['updating_officer'];
	$update_date=$_POST['update_date'];
	
	$query="insert into followup (ob,`update`,updating_officer,update_date) values(?,?,?,?)";
	$stmt = $mysqli->prepare($query);
	$rc=$stmt->bind_param('isss',$ob,$update,$updating_officer,$update_date);
	$stmt->execute();
	echo"<script>alert('Update recorded successfully;</script>";	
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
	<title>Case update</title>
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
					
						<h2 class="page-title">Update case </h2>
	
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Fill all the fields</div>
									<div class="panel-body">
										<form method="post" class="form-horizontal">
											
											<div class="hr-dashed"></div>
											<div class="form-group">
												<label class="col-sm-2 control-label">OB Number: </label>
												<div class="col-sm-8">

												<?php	
$id=$_GET['id'];
$ob=$id
	  	?>

												
												<input type="text" value="<?php echo $ob;?>" readonly class="form-control" id="ob" name="ob"><span class="help-block m-b-none">
											</div>
</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Case update:</label>
												<div class="col-sm-8">
	<textarea rows="5" class="form-control" name="update" id="update" value="" required="required"></textarea>
						 
												</div>
											</div>

											
<div class="form-group">
									<label class="col-sm-2 control-label">Updating offficer:</label>
									<div class="col-sm-8">
									<input type="text" class="form-control" name="updating_officer" value="" >
												</div>
											</div>
											</div>
<div class="form-group">
									<label class="col-sm-2 control-label">Updating date:</label>
									<div class="col-sm-8">
									<input type="date" class="form-control" name="update_date" value="" >
												</div>
											</div>


												<div class="col-sm-8 col-sm-offset-2">
													
													<input class="btn btn-primary" type="submit" name="submit" value="Update case">
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