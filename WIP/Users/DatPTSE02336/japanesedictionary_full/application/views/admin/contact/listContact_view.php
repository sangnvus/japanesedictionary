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
		<div id="main-content-vocab">
			<div id="box-search">
			<div id="boxsearch">
				<form action="<?php echo site_url('/admin/contact/getContactByContactType') ?>" method="GET">
				Type: <input name="txtType" value="<?php if(isset($txtType)){ echo $txtType;} ?>">
				<input type="submit" name="search" value="Search"> 
				</form>
			</div>
			</div>
			<div id="table-user">
			<center><h2>List Contact</h2></center>
				<div id="paging" class="pagination">
	                  <?php
	                    if($num_rows>0){
	                        echo $links;
	                        echo " | Tổng số record : ".$num_rows;
	                    }
	                  ?>
	            </div>
	        <?php if ($contact !== null) {?>
			<table border="1">
				<tbody><tr>
				<th>contact_id</th>
				<th>contact_email</th>
				<th>contact_content</th>
				<th>contact_type</th>
				<th>contact_status</th>
				<th>Reply/Delete</th>
				</tr>
				<?php if($num_rows > 0){ ?>	
				<?php foreach ($contact as $contact) { ?>
				<tr>
				<td><?php echo $contact['contact_id']; ?></td>
				<td><?php echo $contact['contact_email']; ?></td>
				<td><?php echo $contact['contact_content']; ?></td>
				<td><?php echo $contact['contact_type']; ?></td>
				<td><?php echo $contact['contact_status']; ?></td>					
				<td><?php echo '<a href="'.base_url().'index.php/admin/contact/replyContact/'.$contact['contact_id'].'" >Reply</a>'; ?> | 
				<?php echo '<a href="'.base_url().'index.php/admin/contact/deleteContact/'.$contact['contact_id'].'" >Delete</a>'; ?></td>
				</tr>
				<?php 
				}
				} ?>				
			</tbody></table>
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