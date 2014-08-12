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
				<form action="<?php echo site_url('/admin/vocabulary/getVocabularyByRomaji') ?>" method="GET">
				Romaji: <input name="txtRomaji" value="<?php if(isset($txtRomaji)){ echo $txtRomaji;} ?>">
				<input type="submit" name="search" value="Search"> 
				</form>
			</div>
			<div id="add">
				<form action="" method="POST">
					<input type="submit" name="addnew" value="Add Vocabulary">					
				</form>
			</div>
			</div>
			<div id="table-user">
			<center><h2>List Search Vocabulary</h2></center>
				<div id="paging" class="pagination">
	                  <?php
	                    if(isset($num_rows) && $num_rows>0){
	                        echo $links;
	                        echo " | Total record : ".$num_rows;
	                    }
	                  ?>
	            </div>
	        <?php if ($vocabulary !== null && $vocabulary !== "") {?>
			<table border="1">
				<tbody><tr>
				<th>V_id</th>
				<th>Hiragana</th>
				<th>Romaji</th>
				<th>Status</th>
				<th>M_id</th>				
				<th>Meaningvn</th>
				<th>Category</th>
				<th>Kanji</th>
				<th>Specialized</th>				
				<th>Add Meaning</th>
				<th>Edit/Delete</th>
				</tr>
				<?php if($num_rows > 0){ ?>	
				<?php foreach ($vocabulary as $vocab) { ?>
				<tr>
				<td><?php echo $vocab['v_id']; ?></td>
				<td><?php echo $vocab['v_hiragana']; ?></td>
				<td><?php echo $vocab['v_romaji']; ?></td>
				<td><?php echo $vocab['v_status']; ?></td>				
				<td><?php echo $vocab['m_id']; ?></td>
				<td><?php echo $vocab['m_meaningvn']; ?></td>
				<td><?php echo $vocab['m_category']; ?></td>
				<td><?php echo $vocab['m_kanji']; ?></td>
				<td><?php echo $vocab['m_specialized']; ?></td>
				<td><?php echo '<a href="'.base_url().'index.php/admin/vocabulary/addMeaning/'.$vocab['v_id'].'/'.$vocab['m_id'].'" >Add Meaning</a>'; ?></td>										
				<td><?php echo '<a href="'.base_url().'index.php/admin/vocabulary/editVocab/'.$vocab['v_id'].'/'.$vocab['m_id'].'" >Edit</a>'; ?> | 
				<?php echo '<a href="'.base_url().'index.php/admin/vocabulary/deleteVocabulary/'.$vocab['v_id'].'/'.$vocab['m_id'].'" >Delete</a>'; ?></td>
				</tr>
				<?php 
				}
				} ?>				
			</tbody></table>
			<?php }else
				echo "No record !";
			 ?>
			</div>
			<div id="reference">
				<form action="<?php echo site_url('/admin/vocabulary/referenceSentence') ?>" method="POST">
					<input type="submit" name="reference" value="Reference Sentence">					
				</form>
			</div>
		</div>
	</div>
	<div style="clear:both"></div>
	</div>
	<div style="clear:both"></div>
	<div id="footer">Copyright © FPT University</div>
</body>
</html>