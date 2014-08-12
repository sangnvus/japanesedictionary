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
				<form action="<?php echo site_url('/admin/kanji/getByHanViet') ?>" method="GET">
				HanViet: <input name="txtHanViet" value="<?php if(isset($txtHanViet)){ echo $txtHanViet;} ?>">
				<input type="submit" name="search" value="Search"> 
				</form>
				</div>
				<div id="add">
				<form action="<?php echo site_url('/admin/kanji/addKanji') ?>" method="POST">
					<input type="submit" name="addnew" value="Add Kanji">					
				</form>
				</div>
			</div>
			<div id="table-user">
			<center><h2>List Kanji</h2></center>
				<div id="paging" class="pagination">
	                  <?php
	                    if($num_rows>0){
	                        echo $links;
	                        echo " | Total record : ".$num_rows;
	                    }
	                  ?>
	            </div>
	        <?php if ($kanji !== null) {?>
			<table border="1">
				<tbody><tr>
				<th>K_id</th>
				<th>Kanji</th>
				<th>Hanviet</th>
				<th>Onyomi</th>
				<th>Kunyomi</th>
				<th>Meaning</th>
				<th>Level</th>				
				<th>Status</th>
				<th>Reading_id</th>				
				<th>Edit/Delete</th>
				</tr>
				<?php if($num_rows > 0){ ?>	
				<?php foreach ($kanji as $kanji) { ?>
				<tr>
				<td><?php echo $kanji['k_id']; ?></td>
				<td><?php echo $kanji['k_kanji']; ?></td>
				<td><?php echo $kanji['k_hanviet']; ?></td>
				<td><?php echo $kanji['k_onyomi']; ?></td>
				<td><?php echo $kanji['k_kunyomi']; ?></td>
				<td><?php echo $kanji['k_meaning']; ?></td>		
				<td><?php echo $kanji['k_level']; ?></td>
				<td><?php echo $kanji['k_status']; ?></td>
				<td><?php echo $kanji['reading_id']; ?></td>											
				<td><?php echo '<a href="'.base_url().'index.php/admin/kanji/editKanji/'.$kanji['k_id'].'" >Edit</a>'; ?> | 
				<?php echo '<a href="'.base_url().'index.php/admin/kanji/deleteKanji/'.$kanji['k_id'].'" >Delete</a>'; ?></td>
				</tr>
				<?php 
				}
				} ?>				
			</tbody></table>
			<?php }else
				echo "No record !";
			 ?>
			</div>
			<?php echo '<a href="'.base_url().'index.php/admin/kanji/listContributedKanji"><input name="listcontributedkanji" type="submit" value="List Contributed Kanji"></a>'; ?>
		</div>
	</div>
	<div style="clear:both"></div>
	</div>
	<div style="clear:both"></div>
	<div id="footer">Copyright © FPT University</div>
</body>
</html>