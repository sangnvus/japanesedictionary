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
			<center><h2>List Vocabulary</h2></center>
				<div id="paging" class="pagination">
	                  <?php
	                    if($num_rows>0){
	                        echo $links;
	                        echo " | Tổng số record : ".$num_rows;
	                    }
	                  ?>
	            </div>
	        <?php if ($vocabulary !== null && $vocabulary !== "") {?>
			<table border="1">
				<tbody><tr>
				<th>v_id</th>
				<th>v_hiragana</th>
				<th>v_romaji</th>
				<th>v_specialized</th>
				<th>v_status</th>
				<th>m_id</th>				
				<th>m_meaningvn</th>
				<th>m_category</th>
				<th>m_kanji</th>				
				<th>Add Meaning</th>
				<th>Edit/Delete</th>
				</tr>
				<?php if($num_rows > 0){ ?>	
				<?php foreach ($vocabulary as $vocab) { ?>
				<tr>
				<td><?php echo $vocab['v_id']; ?></td>
				<td><?php echo $vocab['v_hiragana']; ?></td>
				<td><?php echo $vocab['v_romaji']; ?></td>
				<td><?php echo $vocab['v_specialized']; ?></td>
				<td><?php echo $vocab['v_status']; ?></td>				
				<td><?php echo $vocab['m_id']; ?></td>
				<td><?php echo $vocab['m_meaningvn']; ?></td>
				<td><?php echo $vocab['m_category']; ?></td>
				<td><?php echo $vocab['m_kanji']; ?></td>
				<td><a href="edit_vocabulary.html">Add Meaning</a></td>										
				<td><a href="edit_vocabulary.html">Edit</a> | <a href="delete_vocabulary.html">Delete</a></td>
				</tr>
				<?php 
				}
				} ?>				
			</tbody></table>
			<?php }else
				echo "Không có dữ liệu !";
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