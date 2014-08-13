<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Vocabulary List</title>
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
				<form action="<?php echo site_url('/admin/vocabulary/getVocabularyByRomaji') ?>" method="GET">
				Romaji: <input name="txtRomaji">
				<input type="submit" name="search" value="Search"> 
				</form>
			</div>
			<div id="add">
				<form action="<?php echo site_url('/admin/vocabulary/addVocabulary') ?>" method="POST">
					<input type="submit" name="addnew" value="Add Vocabulary">					
				</form>				
			</div>
			<div id="add"><?php echo '<a href="'.base_url().'index.php/admin/vocabulary/listContributedVocab"><input name="listvocab" type="submit" value="List Contributed Vocabulary"></a>'; ?></div>
			</div>
			<div id="table-user">
			<center><h2>Vocabulary List</h2></center>
				<div id="paging" class="pagination">
	                  <?php
	                    if(isset($num_rows) && $num_rows>0){
	                        echo $links;
	                        echo " | Total record : ".$num_rows;
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
				<th>Meaning Vietnamese</th>
				<th>Category</th>
				<th>Kanji</th>
				<th>Specialized</th>				
				<th>Add Meaning</th>
				<th>Action</th>
				<th>Reference</th>
				</tr>
				<?php if($num_rows > 0){ ?>	
				<?php $stt = 1;
				foreach ($vocabulary as $vocab) { ?>
				<tr>			
				<td><?php echo $stt++; ?></td>	
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
				<td><?php echo '<a href="'.base_url().'index.php/admin/vocabulary/addMeaning/'.$vocab['v_id'].'/'.$vocab['m_id'].'" >Add Meaning</a>'; ?></td>											
				<td><?php echo '<a href="'.base_url().'index.php/admin/vocabulary/editVocab/'.$vocab['v_id'].'/'.$vocab['m_id'].'" >Edit</a>'; ?> | 
				<?php echo '<a href="'.base_url().'index.php/admin/vocabulary/deleteVocabulary/'.$vocab['v_id'].'/'.$vocab['m_id'].'" >Delete</a>'; ?></td>
				<td><?php echo '<a href="'.base_url().'index.php/admin/vocabulary/addRefer/'.$vocab['v_id'].'/'.$vocab['m_id'].'" >Add Reference</a>'; ?></td>
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