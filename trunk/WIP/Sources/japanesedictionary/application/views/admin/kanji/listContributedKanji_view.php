<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Contributed Kanji List</title>
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
			<div><?php echo '<a href="'.base_url().'index.php/admin/kanji"><input name="listkanji" type="submit" value="List Kanji"></a>'; ?></div>
			<div id="table-user">
			<center><h2>Contributed Kanji List</h2></center>
				<div id="paging" class="pagination">
	                  <?php
	                    if(isset($num_rows_contributed) && $num_rows_contributed>0){
	                        echo $links;
	                        echo " | Total record : ".$num_rows_contributed;
	                    }
	                  ?>
	            </div>
	        <?php if ($kanji !== null) {?>
			<table border="1" id="table-substring" width="99%">
				<tbody><tr>
				<th>No.</th>
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
				<?php $stt = 1;
				foreach ($kanji as $kanji) { ?>
				<tr>
				<td><?php echo $stt ++; ?></td>
				<td><?php echo $kanji['k_kanji']; ?></td>
				<td><?php echo $kanji['k_hanviet']; ?></td>
				<td><?php echo $kanji['k_onyomi']; ?></td>
				<td><?php echo $kanji['k_kunyomi']; ?></td>
				<td><?php echo $kanji['k_meaning']; ?></td>		
				<?php 
					if ($kanji['k_status'] == 1) {
						echo "<td>Active</td>";
					} else {
						echo "<td>Deactive</td>";
					}
				 ?>											
				<td><?php echo '<a href="'.base_url().'index.php/admin/kanji/approvedKanji/'.$kanji['k_id'].'" >Approved</a>'; ?></td>
				<td><?php echo '<a href="'.base_url().'index.php/admin/kanji/deleteContributedKanji/'.$kanji['k_id'].'" >Reject</a>'; ?></td>
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