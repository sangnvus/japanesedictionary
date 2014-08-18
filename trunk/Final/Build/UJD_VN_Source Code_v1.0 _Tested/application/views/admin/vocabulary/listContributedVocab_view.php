<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Contributed Vocabulary List</title>
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
				<?php echo '<a href="'.base_url().'index.php/admin/vocabulary/index"><input name="listvocab" type="submit" value="List Vocabulary"></a>'; ?>
			</div>
			<div id="table-user">
			<center><h2>Contributed Vocabulary List</h2></center>
				<div id="paging" class="pagination">
	                  <?php
	                    if(isset($num_rows_contributed) && $num_rows_contributed>0){
	                        echo $links;
	                        echo " | Total record : ".$num_rows_contributed;
	                    }
	                  ?>
	            </div>
	        <?php if ($vocabulary !== null) {?>
			<table border="1">
				<tbody><tr>
				<th>No.</th>
				<th>Hiragana</th>
				<th>Romaji</th>
				<th>Status</th>								
				<th>Meaningvn</th>
				<th>Category</th>
				<th>Kanji</th>
				<th>Specialized</th>				
				<th>Approved</th>
				<th>Reject</th>
				</tr>
				<?php if($num_rows_contributed > 0){ ?>	
				<?php $stt = 1;
				foreach ($vocabulary as $vocab) { ?>
				<tr>
				<td style="text-align:center"><?php echo $stt++; ?></td>
				<td><?php echo $vocab['v_hiragana']; ?></td>
				<td><?php echo $vocab['v_romaji']; ?></td>				
				<?php 
					if ($vocab['v_status'] == 1) {
						echo "<td>Active</td>";
					} else {
						echo "<td>Deactive</td>";
					}					
				 ?>								
				<td><?php echo $vocab['m_meaningvn']; ?></td>
				<td><?php echo $vocab['m_category']; ?></td>
				<td><?php echo $vocab['m_kanji']; ?></td>
				<td><?php echo $vocab['m_specialized']; ?></td>										
				<td><?php echo '<a href="'.base_url().'index.php/admin/vocabulary/approvedVocab/'.$vocab['v_id'].'/'.$vocab['m_id'].'" >Approved</a>'; ?></td> 
				<td><?php echo '<a href="'.base_url().'index.php/admin/vocabulary/deleteContributedVocabulary/'.$vocab['v_id'].'/'.$vocab['m_id'].'" >Reject</a>'; ?></td>
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