<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if(isset($_GET['del']))
{
	$ob=intval($_GET['del']);
	$adn="delete from cases where ob=?";
		$stmt= $mysqli->prepare($adn);
		$stmt->bind_param('i',$ob);
        $stmt->execute();
        $stmt->close();	   
        echo "<script>alert('Case Deleted');</script>" ;
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
	<title>View statements</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">


	<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+510+',height='+430+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>


</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
			<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title" style="margin-top: 4%">Manage Active Cases</h2>
						<div class="panel panel-default">
							<div class="panel-heading">All statements </div>
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>Sno.</th>
											<th>OB Number</th>
											<th>Complainant</th>
											<th>Complainant's ID Number</th>
											<th>Investigating officer </th>
											<th>STATEMENT</th>
											<th>Date reported </th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Sno.</th>
											<th>OB Number</th>
											<th>Complainant</th>
											<th>Complainant's ID Number</th>
											<th>Investigating officer </th>
											<th>STATEMENT</th>
											<th>Date reported </th>
											<th>Action</th>
										</tr>
									</tfoot>
									<tbody>
<?php	
$aid=$_SESSION['id'];
$ret="select * from statements";
$stmt= $mysqli->prepare($ret) ;
//$stmt->bind_param('i',$aid);
$stmt->execute() ;//ok
$res=$stmt->get_result();
$cnt=1;
while($row=$res->fetch_object())
	  {
	  	?>
<tr><td><?php echo $cnt;;?></td>
<td><?php echo $row->ob;?></td>
<td><?php echo $row->complainant;?></td>
<td><?php echo $row->complainant_id;?></td>
<td><?php echo $row->investigating_officer;?></td>
<td><?php echo $row->statement;?></td>
<td><?php echo $row->report_date;?></td>

										</tr>
									<?php
$cnt=$cnt+1;
									 } ?>
											
										
									</tbody>
								</table>

								
							</div>
						</div>

					
					</div>
				</div>

			

			</div>
		</div>
	</div>

	
	<div class="panel panel-default">
											
									<div class="ts-main-content">
			<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title" style="margin-top: 4%">LATEST CASE UPDATES</h2>
						<div class="panel panel-default">
							<div class="panel-heading">All updates on existing cases </div>
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Sno.</th>
											<th>OB Number</th>
											<th>UPDATE</th>
											<th>Updating officer</th>
											
											<th>Update date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
										<th>Sno.</th>
											<th>OB Number</th>
											<th>UPDATE</th>
											<th>Updating officer</th>
											
											<th>Update date</th>
											<th>Action</th>
										</tr>
									</tfoot>
									<tbody>
<?php	
$aid=$_SESSION['id'];
$ret="select * from followup";
$stmt= $mysqli->prepare($ret) ;
//$stmt->bind_param('i',$aid);
$stmt->execute() ;//ok
$res=$stmt->get_result();
$cnt=1;
while($row=$res->fetch_object())
	  {
	  	?>
<tr><td><?php echo $cnt;;?></td>
<td><?php echo $row->ob;?></td>
<td><?php echo $row->update;?></td>
<td><?php echo $row->updating_officer;?></td>
<td><?php echo $row->update_date;?></td>
<td><a href="update.php?id=<?php echo $row->ob;?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
<a href="javascript:void(0);"  onClick="popUpWindow('http://localhost/ob/admin/fullcase.php?id=<?php echo $row->ob;?>');" title="View case statement and updates"><i class="fa fa-desktop"></i></a>&nbsp;&nbsp;
										</tr>
									<?php
$cnt=$cnt+1;
									 } ?>
											
										
									</tbody>
								</table>

								
							</div>
						</div>

					
					</div>
				</div>

			

			</div>
		</div>
	</div>



</body>

</html>
