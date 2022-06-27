<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
?>

<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}
function f3()
{
window.print(); 
}
</script>


<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title>Room Details</title>
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
	
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title" style="margin-top:2%">FULL CASE DETAILS</h2>
						<div class="panel panel-default">
							<div class="panel-heading">Case Details</div>
							<div class="panel-body">
								<table id="zctb" class="table table-bordered " cellspacing="0" width="100%">
									
									
									<tbody>
<?php	
 $ret="SELECT * FROM statements where ob = '".$_GET['id']."'";

 $stmt= $mysqli->prepare($ret) ;
 //$stmt->bind_param('i',$aid);
 $stmt->execute() ;//ok
 $res=$stmt->get_result();

while($row=$res->fetch_object())
	  {
	  	?>

<tr>
<td colspan="4"><h4>Case Related Information</h4></td>

</tr>
<tr>
<td colspan="6"><b>OCCURRENCE BOOK NUMBER    :<?php echo $row->ob;?></b></td>
</tr>



<tr>
<td><b>DATE REPORTED :</b></td>
<td><?php echo $row->report_date;?></td>
<td><b>COMPLAINANT: </b></td>
<td><?php echo $row->complainant;?></td>
<td><b>Complainant ID NUMBER:</b></td>
<td><?php echo $row->complainant_id;?></td>
</tr>

<tr>
<td><b>INVESTIGATING OFFICER:</b></td>
<td>
<?php echo $row->investigating_officer;?></td>
<td><b></b></td>
<td></td>
<td><b></b></td>
<td></td>
</tr>

<tr>
<td colspan="6"><b>STATEMENT :</b> 
<?php echo $row->statement;?></td>
</tr>












<?php
} ?>
</tbody>
</table>

					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading"><b>UPDATES ON THE CASE </b> </div>
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Sno.</th>
											
											<th>UPDATE</th>
											<th>UPDATING OFFICER</th>
											
											<th>DATE OF UPDATE</th>
										
										</tr>
									</thead>
									<tfoot>
										<tr>
										<th>Sno.</th>
										
											<th>UPDATE</th>
											<th>UPDATING OFFICER</th>
											
											<th>DATE OF UPDATE</th>
											
										</tr>
									</tfoot>
									<tbody>
<?php	
$aid=$_SESSION['id'];
$ret="SELECT * FROM followup where ob = '".$_GET['id']."'";
$stmt= $mysqli->prepare($ret) ;
//$stmt->bind_param('i',$aid);
$stmt->execute() ;//ok
$res=$stmt->get_result();
$cnt=1;
while($row=$res->fetch_object())
	  {
	  	?>
<tr><td><?php echo $cnt;;?></td>

<td><?php echo $row->update;?></td>
<td><?php echo $row->updating_officer;?></td>
<td><?php echo $row->update_date;?></td>

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
</div>
</div>

</div>



<tr>
    <td colspan="2" align="right" ><form id="form1" name="form1" method="post" action="">
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="14%">&nbsp;</td>
          <td width="35%" class="comb-value"><label>
            <input name="Submit" type="submit" class="txtbox4" value="Prints this Document " onClick="return f3();" />
          </label></td>
          <td width="3%">&nbsp;</td>
          <td width="26%"><label>
            <input name="Submit2" type="submit" class="txtbox4" value="Close this document " onClick="return f2();"  />
          </label></td>
          <td width="8%">&nbsp;</td>
          <td width="14%">&nbsp;</td>
        </tr>
      </table>
        </form>    </td>
  </tr>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

</body>

</html>
