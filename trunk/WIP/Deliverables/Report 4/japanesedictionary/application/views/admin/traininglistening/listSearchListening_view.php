<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Training Listening List</title>
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
				<form action="<?php echo site_url('/admin/traininglistening/getListeningByLevel') ?>" method="GET">
				Level: 
				<select name="txtLevel">
					<option value="N2N3">N2N3</option>
					<option value="N4N5">N4N5</option>
				</select>
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
			<center><h2>Training Listening List</h2></center>
				<div id="paging" class="pagination">
	                  <?php
	                    if(isset($num_rows) && $num_rows>0){
	                        echo $links;
	                        echo " | Total record : ".$num_rows;
	                    }
	                  ?>
	            </div>
	        <?php if ($traininglistening !== null) {?>
			<table border="1" id="table-substring" width="100%">
				<tbody><tr>
				<th>No.</th>
				<th style="width:65%">Title</th>
				<th style="width:13%">Level</th>			
				<th style="width:22%;">Action</th>
				</tr>
				<?php if($num_rows > 0){ ?>	
				<?php $stt = 1;
				foreach ($traininglistening as $traininglistening) { ?>
				<tr>
				<td style="text-align:center"><?php echo $stt++; ?></td>
				<td><?php echo $traininglistening['lis_title']; ?></td>
				<td><?php echo $traininglistening['lis_level']; ?></td>
				<td><?php echo '<a href="'.base_url().'index.php/admin/traininglistening/viewDetailListening/'.$traininglistening['lis_id'].'" >ViewDetail</a>'; ?> | <?php echo '<a href="'.base_url().'index.php/admin/traininglistening/editTraininglistening/'.$traininglistening['lis_id'].'" >Edit</a>'; ?> | 
				<?php echo '<a href="'.base_url().'index.php/admin/traininglistening/deleteListening/'.$traininglistening['lis_id'].'" >Delete</a>'; ?></td>
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