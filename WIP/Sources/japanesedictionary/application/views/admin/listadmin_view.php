<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Admin List</title>
	<link href="<?php echo base_url();?>public/css/admin/style_homepage.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<!--header-->
	<?php $this->load->view("admin/header_view");?>
	<!-- end-header-->
	<div id="content">
	<!-- top menu-->
	<?php $this->load->view("admin/topmenu_view");?>
	<!--end top-menu-->
	<div id="giua">
		<?php $this->load->view("admin/leftcontent_view");?>
		<div id="main-content">
			<div id="title">
				<h2>Admin List</h2>
			</div>		
		<div id="table-user">
			<form method="POST" action="<?php echo site_url('/admin/home/addNewAdmin') ?>">		
			<?php if ($users !== null) {?>
			<table border="1" width="100%" id="table-substring">
				<tr>
				<th>No.</th>
				<th>UserName</th>
				<th>Email</th>				
				<th>Role</th>				
				<th>Status</th>
				<th>Action</th>				
				</tr>			
				<?php $stt = 1;
				foreach ($users as $user) { ?>								
				<tr>
					<td style="text-align:center"><?php echo $stt++; ?></td>
					<td><?php echo $user->u_username; ?></td>
					<td><?php echo $user->u_email; ?></td>
					<?php 
						if ($user->u_role == 1) {
							echo "<td>Admin</td>";
						} else {
							echo "<td>Member</td>";
						}						
					 ?>
					 <?php 
					 	if ($user->u_status == 1) {
							echo "<td>Active</td>";
						} else {
							echo "<td>Un-active</td>";
						}
					  ?>										
					<td><?php echo '<a href="'.base_url().'index.php/admin/home/deleteUser/'.$user->u_id.'">Delete</a>'; ?></td>
				</tr>	
				<?php } ?>
			</table><br>
			<?php }else
				echo "<div style="."float:left;width:70%".">No record !</div>";
			 ?><br>
			<input type="submit" value="Add New Admin">
			</form>
		</div>
	</div>
	</div>
	<div style="clear:both"></div>
	</div>
	<div style="clear:both"></div>
	<div id="footer">Copyright © FPT University</div>
</body>
</html>