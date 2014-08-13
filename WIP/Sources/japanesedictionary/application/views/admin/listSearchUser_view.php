<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>User List</title>
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
		<center><h2>User List</h2></center>			
			<?php if ($users !== null) {?>
			<table border="1" width="100%" id="table-substring">
				<tr>
				<th>No.</th>
				<th>UserName</th>
				<th>Email</th>				
				<th>Role</th>
				<th>Ban/Unban</th>
				<th>Status</th>
				<th>Action</th>				
				</tr>			
				<?php $stt = 1;
				foreach ($users as $user) { ?>								
				<tr>
					<td><?php echo $stt++; ?></td>
					<td><?php echo $user->u_username; ?></td>
					<td><?php echo $user->u_email; ?></td>
					<?php 
						if ($user->u_role == 1) {
							echo "<td>Admin</td>";
						} else {
							echo "<td>Member</td>";
						}						
					 ?>
					<?php if ($user->u_status==1) {?>
					<td><?php echo '<a href="'.base_url().'index.php/admin/home/banUser/'.$user->u_id.'" >Ban</a>'; ?></td>
					<?php }else if ($user->u_status==0) {?>
					<td><?php echo '<a href="'.base_url().'index.php/admin/home/unbanUser/'.$user->u_id.'" >UnBan</a>'; ?></td>
					<?php } ?>
					<?php 
					 	if ($user->u_status == 1) {
							echo "<td>Active</td>";
						} else {
							echo "<td>Un-active</td>";
						}
					  ?>
					<td><?php echo '<a href="'.base_url().'index.php/admin/home/deleteUser/'.$user->u_id.'" >Delete</a>'; ?></td>					
				</tr>	
				<?php } ?>
			</table><br>
			<?php }else
				echo "<div style="."float:left;width:70%".">No record !</div>";
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