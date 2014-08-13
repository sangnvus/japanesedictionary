<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Conversation List</title>
	<link href="<?php echo base_url();?>public/css/admin/style_homepage.css" rel="stylesheet" type="text/css" />	 
	<link href="<?php echo base_url();?>public/css/admin/paging.css" rel="stylesheet" type="text/css" />	 
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
				<form action="<?php echo site_url('/admin/conversation/getConversationByLevel') ?>" method="GET">
				Level: 
				<select name="txtLevel">
					<option value="Giao tiếp">Giao tiếp</option>
					<option value="Sơ cấp">Sơ cấp</option>
					<option value="Trung cấp 1">Trung cấp 1</option>
					<option value="Trung cấp 2">Trung cấp 2</option>
				</select>
				<input type="submit" name="search" value="Search"> 
				</form>
			</div>
			<div id="add">
				<form action="<?php echo site_url('/admin/conversation/addConversation') ?>" method="POST">
					<input type="submit" name="addnew" value="Add Conversation">					
				</form>
			</div>
			</div>
			<div id="table-user">
			<center><h2>Conversation List</h2></center>
				<div id="paging" class="pagination">
	                  <?php
	                    if(isset($num_rows) && $num_rows>0){
	                        echo $links;
	                        echo " | Total record : ".$num_rows;
	                    }
	                  ?>
	            </div>
	        <?php if ($conversation !== null) {?>
			<table border="1" width="100%" id="table-substring">
				<tbody><tr>
				<th>No.</th>
				<th style="width:50%">Title</th>
				<th style="width:15%">Level</th>
				<th>Image</th>				
				<th style="width:16%">Action</th>
				</tr>
				<?php if($num_rows > 0){ ?>	
				<?php $stt = 1;
				foreach ($conversation as $conversation) { ?>
				<tr>
				<td><?php echo $stt++; ?></td>
				<td style="text-align:left;"><?php echo $conversation['c_title']; ?></td>
				<?php if($conversation['c_level'] == 'Sơ cấp') { ?> 
				<td>Sơ cấp</td>
				<?php } else {?>
				<?php if($conversation['c_level'] == 'Trung cấp 1') { ?> 
				<td>Trung cấp 1</td>
				<?php } else {?>
				<?php if($conversation['c_level'] == 'Trung cấp 2') { ?> 
				<td>Trung cấp 2</td>
				<?php } else {?>
				<?php if($conversation['c_level'] == 'Giao tiếp') { ?> 
				<td>Giao tiếp</td>
				<?php } } } } ?>
				<?php if(isset($conversation['c_image']) && $conversation['c_image'] !=="") { ?>
				<td><img src="<?php echo base_url();?>public/image/<?php echo $conversation['c_image'];?>" width="150" height="100"></td>
				<?php }else{ ?>
				<td>No image</td>
				<?php } ?>
				<td><?php echo '<a href="'.base_url().'index.php/admin/conversation/viewDetailConversation/'.$conversation['c_id'].'" >View</a>'; ?>|
				<?php echo '<a href="'.base_url().'index.php/admin/conversation/editConversation/'.$conversation['c_id'].'" >Edit</a>'; ?> | 
				<?php echo '<a href="'.base_url().'index.php/admin/conversation/deleteConversation/'.$conversation['c_id'].'" >Delete</a>'; ?></td>
				</tr>
				<?php 
				}
				} ?>				
			</tbody></table>
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