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
			<div id="title">
			<h2>List Admin</h2>
			</div>		
		<div id="table-user">
			<form method="POST" action="<?php echo site_url('/admin/home/addNewAdmin') ?>">		
			<?php if ($users !== null) {?>
			<table border="1" width="100%">
				<tr>
				<th>User ID</th>
				<th>User Name</th>
				<th>Email</th>				
				<th>Role</th>				
				<th>Status</th>
				<th>Delete</th>				
				</tr>			
				<?php foreach ($users as $user) { ?>								
				<tr>
					<td><?php echo $user->u_id; ?></td>
					<td><?php echo $user->u_username; ?></td>
					<td><?php echo $user->u_email; ?></td>
					<td><?php echo $user->u_role; ?></td>
					<td><?php echo $user->u_status; ?></td>
					<td><?php echo '<a href="'.base_url().'index.php/admin/home/deleteUser/'.$user->u_id.'" >Delete</a>'; ?></td>
				</tr>	
				<?php } ?>
			</table><br>
			<?php }else
				echo "Không có dữ liệu !";
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