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
				<form action="<?php echo site_url('/admin/video/getByTitle') ?>" method="GET">
				Title: <input name="txtTitle" value="<?php if(isset($txtTitle)){ echo $txtTitle;} ?>">
				<input type="submit" name="search" value="Search"> 
				</form>
			</div>
			<div id="add">
				<form action="<?php echo site_url('/admin/video/addVideo') ?>" method="POST">
					<input type="submit" name="addnew" value="Add Video">					
				</form>
			</div>
			</div>
			<div id="table-user">
			<center><h2>List Video</h2></center>
				<div id="paging" class="pagination">
	                  <?php
	                    if($num_rows>0){
	                        echo $links;
	                        echo " | Tổng số record : ".$num_rows;
	                    }
	                  ?>
	            </div>
	        <?php if ($video !== null) {?>
			<table border="1">
				<tbody><tr>
				<th>vi_id</th>
				<th>vi_title</th>
				<th>vi_link</th>
				<th>Edit/Delete</th>
				</tr>
				<?php if($num_rows > 0){ ?>	
				<?php foreach ($video as $video) { ?>
				<tr>
				<td><?php echo $video['vi_id']; ?></td>
				<td><?php echo $video['vi_title']; ?></td>
				<td><?php echo $video['vi_link']; ?></td>					
				<td><?php echo '<a href="'.base_url().'index.php/admin/video/editVideo/'.$video['vi_id'].'" >Edit</a>'; ?> | 
				<?php echo '<a href="'.base_url().'index.php/admin/video/deleteVideo/'.$video['vi_id'].'" >Delete</a>'; ?></td>
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