<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Contributed Grammar List</title>
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
		<div><?php echo '<a href="'.base_url().'index.php/admin/grammar"><input name="listgrammar" type="submit" value="List Grammar"></a>'; ?></div>
			<div id="table-user">
			<center><h2>Contributed Grammar List</h2></center>
				<div id="paging" class="pagination">
	                  <?php
	                    if(isset($num_rows_contributed) && $num_rows_contributed>0){
	                        echo $links;
	                        echo " | Total record : ".$num_rows_contributed;
	                    }
	                  ?>
	            </div>
	        <?php if ($grammar !== null) {?>
			<table border="1" id="table-substring">
				<tbody><tr>
				<th>No.</th>
				<th>Hiragana</th>
				<th>Romaji</th>
				<th>Level</th>
				<th>Meaning</th>
				<th>Use</th>
				<th>Status</th>				
				<th>Approved</th>
				<th>Reject</th>
				</tr>
				<?php if($num_rows_contributed > 0){ ?>	
				<?php $stt = 1;
				foreach ($grammar as $grammar) { ?>
				<tr>
				<td style="text-align:center"><?php echo $stt++; ?></td>
				<td><?php echo $grammar['g_hiragana']; ?></td>
				<td><?php echo $grammar['g_romaji']; ?></td>
				<td><?php echo $grammar['g_level']; ?></td>
				<td><?php echo $grammar['g_meaning']; ?></td>
				<td><p><?php echo $grammar['g_use']; ?></p></td>
				<?php 
					if ($grammar['g_status'] == 1) {
						echo "<td>Active</td>";
					} else {
						echo "<td>Deactive</td>";
					}
				 ?>													
				<td><?php echo '<a href="'.base_url().'index.php/admin/grammar/approvedGrammar/'.$grammar['g_id'].'" >Approved</a>'; ?> </td> 
				<td><?php echo '<a href="'.base_url().'index.php/admin/grammar/deleteContributedGrammar/'.$grammar['g_id'].'" >Reject</a>'; ?></td>
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