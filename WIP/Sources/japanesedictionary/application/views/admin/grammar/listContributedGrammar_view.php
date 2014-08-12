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
			<div id="table-user">
			<center><h2>List Contributed Grammar</h2></center>
				<div id="paging" class="pagination">
	                  <?php
	                    if($num_rows_contributed>0){
	                        echo $links;
	                        echo " | Total record : ".$num_rows_contributed;
	                    }
	                  ?>
	            </div>
	        <?php if ($grammar !== null) {?>
			<table border="1" id="table-substring">
				<tbody><tr>
				<th>G_id</th>
				<th>Hiragana</th>
				<th>Romaji</th>
				<th>Level</th>
				<th>Meaning</th>
				<th>Use</th>
				<th>Status</th>
				<th>Reading_id</th>
				<th>Approved</th>
				<th>Reject</th>
				</tr>
				<?php if($num_rows_contributed > 0){ ?>	
				<?php foreach ($grammar as $grammar) { ?>
				<tr>
				<td><?php echo $grammar['g_id']; ?></td>
				<td><?php echo $grammar['g_hiragana']; ?></td>
				<td><?php echo $grammar['g_romaji']; ?></td>
				<td><?php echo $grammar['g_level']; ?></td>
				<td><?php echo $grammar['g_meaning']; ?></td>
				<td><p><?php echo $grammar['g_use']; ?></p></td>
				<td><?php echo $grammar['g_status']; ?></td>
				<td><?php echo $grammar['reading_id']; ?></td>									
				<td><?php echo '<a href="'.base_url().'index.php/admin/grammar/approvedGrammar/'.$grammar['g_id'].'" >Approved</a>'; ?> </td> 
				<td><?php echo '<a href="'.base_url().'index.php/admin/grammar/deleteContributedGrammar/'.$grammar['g_id'].'" >Reject</a>'; ?></td>
				</tr>
				<?php 
				}
				} ?>				
			</tbody></table>
			<?php }else
				echo "No record !";
			 ?>
			</div>
			<?php echo '<a href="'.base_url().'index.php/admin/grammar"><input name="listgrammar" type="submit" value="List Grammar"></a>'; ?>
		</div>
	</div>
	<div style="clear:both"></div>
	</div>
	<div style="clear:both"></div>
	<div id="footer">Copyright © FPT University</div>
</body>
</html>