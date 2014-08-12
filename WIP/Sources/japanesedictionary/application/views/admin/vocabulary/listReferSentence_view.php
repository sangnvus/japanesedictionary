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
				<form action="<?php echo site_url('/admin/vocabulary/getReferByMid') ?>" method="GET">
				M_id: <input name="txtMid">
				<input type="submit" name="search" value="Search"> 
				</form>
			</div>
			<div id="add">
				<form id="addNewAdmin" action="<?php echo site_url('/admin/vocabulary/addRefer') ?>" method="POST">
					<input type="submit" name="addnew" value="Add Reference">					
				</form>
			</div>
			</div>
			<div id="table-user">
			<center><h2>List Reference Sentence</h2></center>
				<div id="paging" class="pagination">
	                  <?php
	                    if($num_rows>0){
	                        echo $links;
	                        echo " | Total record : ".$num_rows;
	                    }
	                  ?>
	            </div>
	        <?php if ($referSentence !== null) {?>
			<table border="1">
				<tbody><tr>
				<th>M_id</th>
				<th>S_id</th>											
				<th>Edit/Delete</th>
				</tr>
				<?php if($num_rows > 0){ ?>	
				<?php foreach ($referSentence as $refer) { ?>
				<tr>
				<td><?php echo $refer['m_id']; ?></td>
				<td><?php echo $refer['s_id']; ?></td>
				<td><?php echo '<a href="'.base_url().'index.php/admin/vocabulary/editRefer/'.$refer['m_id'].'/'.$refer['s_id'].'" >Edit</a>'; ?> | 
				<?php echo '<a href="'.base_url().'index.php/admin/vocabulary/deleteRefer/'.$refer['m_id'].'/'.$refer['s_id'].'" >Delete</a>'; ?></td>
				</tr>
				<?php 
				}
				} ?>				
			</tbody></table>
			<?php }else
				echo "No record !";
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