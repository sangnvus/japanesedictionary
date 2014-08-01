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
			<div id="table-user">
			<center><h2>List Contributed Kanji</h2></center>
				<div id="paging" class="pagination">
	                  <?php
	                    if($num_rows_contributed>0){
	                        echo $links;
	                        echo " | Total record : ".$num_rows_contributed;
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
				<th>Status</th>				
				<th>Approved</th>
				<th>Reject</th>
				</tr>
				<?php if($num_rows_contributed > 0){ ?>	
				<?php foreach ($kanji as $kanji) { ?>
				<tr>
				<td><?php echo $kanji['k_id']; ?></td>
				<td><?php echo $kanji['k_kanji']; ?></td>
				<td><?php echo $kanji['k_hanviet']; ?></td>
				<td><?php echo $kanji['k_onyomi']; ?></td>
				<td><?php echo $kanji['k_kunyomi']; ?></td>
				<td><?php echo $kanji['k_meaning']; ?></td>		
				<td><?php echo $kanji['k_status']; ?></td>											
				<td><?php echo '<a href="'.base_url().'index.php/admin/kanji/approvedKanji/'.$kanji['k_id'].'" >Approved</a>'; ?></td>
				<td><?php echo '<a href="'.base_url().'index.php/admin/kanji/deleteContributedKanji/'.$kanji['k_id'].'" >Reject</a>'; ?></td>
				</tr>
				<?php 
				}
				} ?>				
			</tbody></table>
			<?php }else
				echo "No record !";
			 ?>
			</div>
			<?php echo '<a href="'.base_url().'index.php/admin/kanji"><input name="listkanji" type="submit" value="List Kanji"></a>'; ?>
		</div>
	</div>
	<div style="clear:both"></div>
	</div>
	<div style="clear:both"></div>
	<div id="footer">Copyright © FPT University</div>
</body>
</html>