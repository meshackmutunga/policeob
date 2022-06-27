<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
			
				<li class="ts-label">Main</li>
				<?PHP if(isset($_SESSION['id']))
				{ ?>
					<li><a href="dashboard.php"><i class="fa fa-desktop"></i>Dashboard</a></li>
<li><a href="change-password.php"><i class="fa fa-files-o"></i>Change Password</a></li>
<li><a href="statements.php"><i class="fa fa-file-o"></i>View cases</a></li>

<?php }
 else { ?>
				<li><a href="admin"><i class="fa fa-user"></i> Police Station Login</a></li>
				<li><a href="index.php"><i class="fa fa-users"></i> Civilian Login</a></li>
				<br>Query for a specific case? <br>
				<li><a href="searchob.php"><i class="fa fa-files-o"></i>Search Specific case</a></li>
			
			
				<?php } ?>

			</ul>
		</nav>