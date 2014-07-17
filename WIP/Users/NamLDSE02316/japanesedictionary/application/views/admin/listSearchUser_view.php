<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Admin Page</title>
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
			<div id="box-search">
			<div><form action="<?php echo site_url('/admin/home/getUserByUsername') ?>" method="GET">
				Username: <input name="txtUsername" value="<?php if(isset($txtUsername)){ echo $txtUsername;} ?>"> 
				Email: <input name="txtEmail" value="<?php if(isset($txtEmail)){ echo $txtEmail;} ?>">
				<input type="submit" name="submit" value="Search"> 
			</form></div>		
		</div>		
		<div id="table-user">
		<center><h2>List User</h2></center>			
			<?php if ($users !== null) {?>
			<table border="1">
				<tr>
				<th>User ID</th>
				<th>User Name</th>
				<th>Email</th>				
				<th>Role</th>
				<th>Ban/Unban</th>
				<th>Status</th>
				<th>Delete</th>
				<th>Reset Password</th>
				</tr>			
				<?php foreach ($users as $user) { ?>								
				<tr>
					<td><?php echo $user->u_id; ?></td>
					<td><?php echo $user->u_username; ?></td>
					<td><?php echo $user->u_email; ?></td>
					<td><?php echo $user->u_role; ?></td>
					<td><a href="#">Ban/Unban</a></td>
					<td><?php echo $user->u_status; ?></td>
					<td><?php echo '<a href="'.base_url().'index.php/admin/home/deleteUser/'.$user->u_id.'" >Delete</a>'; ?></td>
					<td><a href="#">Reset Password</a></td>
				</tr>	
				<?php } ?>
			</table><br>
			<?php }else
				echo "Không có dữ liệu !";
			 ?>						
		</div>
	</div>
	</div>
	<div style="clear:both"></div>
	</div>
	<div style="clear:both"></div>
	<div id="footer">Copyright © FPT University</div>
</body>
</html>