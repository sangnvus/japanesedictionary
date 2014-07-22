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
				<form action="<?php echo site_url('/admin/traininglistening/getListeningByLevel') ?>" method="GET">
				Level: <input name="txtLevel" value="<?php if(isset($txtLevel)){ echo $txtLevel;} ?>">
				<input type="submit" name="search" value="Search"> 
				</form>
			</div>
			<div id="add">
				<form action="<?php echo site_url('/admin/traininglistening/addTraininglistening') ?>" method="POST">
					<input type="submit" name="addnew" value="Add Listening">					
				</form>
			</div>
			</div>
			<div id="table-user">
			<center><h2>List Training Listening</h2></center>
				<div id="paging" class="pagination">
	                  <?php
	                    if($num_rows>0){
	                        echo $links;
	                        echo " | Tổng số record : ".$num_rows;
	                    }
	                  ?>
	            </div>
	        <?php if ($traininglistening !== null) {?>
			<table border="1">
				<tbody><tr>
				<th>lis_id</th>
				<th>lis_level</th>
				<th>sourcefile_id</th>
				<th>question</th>
				<th>script</th>
				<th>meaning</th>				
				<th>answer</th>				
				<th>Add Sourcefile</th>
				<th>Edit/Delete</th>
				</tr>
				<?php if($num_rows > 0){ ?>	
				<?php foreach ($traininglistening as $traininglistening) { ?>
				<tr>
				<td><?php echo $traininglistening['lis_id']; ?></td>
				<td><?php echo $traininglistening['lis_level']; ?></td>
				<td><?php echo $traininglistening['sourcefile_id']; ?></td>
				<td><?php echo $traininglistening['sourcefile_question']; ?></td>
				<td><?php echo $traininglistening['sourcefile_script']; ?></td>		
				<td><?php echo $traininglistening['sourcefile_meaning']; ?></td>
				<td><?php echo $traininglistening['sourcefile_answer']; ?></td>
				<td><?php echo '<a href="'.base_url().'index.php/admin/traininglistening/addSourcefile/'.$traininglistening['lis_id'].'/'.$traininglistening['sourcefile_id'].'" >Add Sourcefile</a>'; ?></td>											
				<td><?php echo '<a href="'.base_url().'index.php/admin/traininglistening/editTraininglistening/'.$traininglistening['lis_id'].'/'.$traininglistening['sourcefile_id'].'" >Edit</a>'; ?> | 
				<?php echo '<a href="'.base_url().'index.php/admin/traininglistening/deleteSourcefile/'.$traininglistening['lis_id'].'/'.$traininglistening['sourcefile_id'].'" >Delete</a>'; ?></td>
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