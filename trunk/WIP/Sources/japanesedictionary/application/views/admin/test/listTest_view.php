<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Test List</title>
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
				<form action="<?php echo site_url('/admin/test/getTestByLevel') ?>" method="GET">
				Level: 
				<select name="txtLevel">
					<option value="N1">N1</option>
					<option value="N2">N2</option>
					<option value="N3">N3</option>
					<option value="N4">N4</option>
					<option value="N5">N5</option>
				</select>
				<input type="submit" name="search" value="Search"> 
				</form>
			</div>
			<div id="add">
				<form action="<?php echo site_url('/admin/test/addTest') ?>" method="POST">
					<input type="submit" name="addnew" value="Add Test">					
				</form>
			</div>
			</div>
			<div id="table-user">
			<center><h2>Test List</h2></center>
				<div id="paging" class="pagination">
	                  <?php
	                    if(isset($num_rows) && $num_rows>0){
	                        echo $links;
	                        echo " | Tổng số record : ".$num_rows;
	                    }
	                  ?>
	            </div>
	        <?php if ($test !== null) {?>
			<table border="1" id="table-substring" width="90%">
				<tbody><tr>
				<th>No.</th>
				<th>Title</th>
				<th>Category</th>
				<th>Level</th>
				<th>Content</th>				
				<th>Action</th>
				</tr>
				<?php if($num_rows > 0){ ?>	
				<?php $stt = 1;
				foreach ($test as $test) { ?>
				<tr>
				<td><?php echo $stt++; ?></td>
				<td><?php echo '<a href="'.base_url().'index.php/admin/test/detailTest/'.$test['test_id'].'" style="text-decoration:none">'.$test['test_title'].'</a>'; ?></td>
				<td><?php echo $test['test_category']; ?></td>
				<td><?php echo $test['test_level']; ?></td>
				<td><p><?php echo $test['test_content']; ?></p></td>																					
				<td><?php echo '<a href="'.base_url().'index.php/admin/test/editTest/'.$test['test_id'].'" style="text-decoration:none">Edit</a>'; ?> | 
				<?php echo '<a href="'.base_url().'index.php/admin/test/deleteTest/'.$test['test_id'].'" style="text-decoration:none">Delete</a>'; ?></td>
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