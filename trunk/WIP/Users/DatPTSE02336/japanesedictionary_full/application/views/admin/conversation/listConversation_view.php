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
				<form action="<?php echo site_url('/admin/conversation/getConversationByLevel') ?>" method="GET">
				Level: <input name="txtLevel" value="<?php if(isset($txtLevel)){ echo $txtLevel;} ?>">
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
			<center><h2>List Conversation</h2></center>
				<div id="paging" class="pagination">
	                  <?php
	                    if($num_rows>0){
	                        echo $links;
	                        echo " | Tổng số record : ".$num_rows;
	                    }
	                  ?>
	            </div>
	        <?php if ($conversation !== null) {?>
			<table border="1">
				<tbody><tr>
				<th>c_id</th>
				<th>c_level</th>
				<th>c_title</th>
				<th>con_id</th>
				<th>con_title</th>
				<th>con_hiragana</th>				
				<th>con_romaji</th>
				<th>con_meaning</th>				
				<th>Add Content</th>
				<th>Edit/Delete</th>
				</tr>
				<?php if($num_rows > 0){ ?>	
				<?php foreach ($conversation as $conversation) { ?>
				<tr>
				<td><?php echo $conversation['c_id']; ?></td>
				<td><?php echo $conversation['c_level']; ?></td>
				<td><?php echo $conversation['c_title']; ?></td>
				<td><?php echo $conversation['con_id']; ?></td>
				<td><?php echo $conversation['con_title']; ?></td>				
				<td><?php echo $conversation['con_hiragana']; ?></td>
				<td><?php echo $conversation['con_romaji']; ?></td>
				<td><?php echo $conversation['con_meaning']; ?></td>
				<td><?php echo '<a href="'.base_url().'index.php/admin/conversation/addContent/'.$conversation['c_id'].'/'.$conversation['con_id'].'" >Add Content</a>'; ?></td>											
				<td><?php echo '<a href="'.base_url().'index.php/admin/conversation/editConversation/'.$conversation['c_id'].'/'.$conversation['con_id'].'" >Edit</a>'; ?> | 
				<?php echo '<a href="'.base_url().'index.php/admin/conversation/deleteConversation/'.$conversation['c_id'].'/'.$conversation['con_id'].'" >Delete</a>'; ?></td>
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