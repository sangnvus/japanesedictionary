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
				<form action="<?php echo site_url('/admin/readingdocument/getReadingByLevel/vocab') ?>" method="GET">
				Level: <input name="txtLevel" value="<?php if(isset($txtLevel)){ echo $txtLevel;} ?>">
				<input type="submit" name="search" value="Search"> 
				</form>
			</div>
			<div id="add">
				<form action="<?php echo site_url('/admin/readingdocument/addReading/vocab') ?>" method="POST">
					<input type="submit" name="addnew" value="Add Reading">					
				</form>
			</div>
			</div>
			<div id="table-user">
			<center><h2>List Reading Vocabulary</h2></center>
				<div id="paging" class="pagination">
	                  <?php
	                    if($num_rows>0){
	                        echo $links;
	                        echo " | Total record : ".$num_rows;
	                    }
	                  ?>
	            </div>
	        <?php if ($readingVocab !== null) {?>
			<table border="1" width="110%">
				<tbody><tr>
				<th>Reading_Id</th>
				<th>Title</th>
				<th>Level</th>				
				<th>Readingvocab_id</th>
				<th>Hiragana</th>
				<th>Meaning</th>				
				<th>Kanji</th>	
				<th>Type</th>					
				<th>Add Content</th>
				<th>Edit/Delete</th>
				</tr>
				<?php if($num_rows > 0){ ?>	
				<?php foreach ($readingVocab as $readingVocab) { ?>
				<tr>
				<td><?php echo $readingVocab['reading_id']; ?></td>
				<td><?php echo $readingVocab['reading_title']; ?></td>
				<td><?php echo $readingVocab['reading_level']; ?></td>
				<td><?php echo $readingVocab['readingvocabulary_id']; ?></td>
				<td><?php echo $readingVocab['readingvocabulary_hiragana']; ?></td>	
				<td><?php echo $readingVocab['readingvocabulary_meaning']; ?></td>
				<td><?php echo $readingVocab['readingvocabulary_kanji']; ?></td>
				<td><?php echo $readingVocab['reading_type']; ?></td>	
				<td><?php echo '<a href="'.base_url().'index.php/admin/readingdocument/addContent/'.$readingVocab['reading_id'].'/'.$readingVocab['readingvocabulary_id'].'" >Add Content</a>'; ?></td>											
				<td><?php echo '<a href="'.base_url().'index.php/admin/readingdocument/editReading/'.$readingVocab['reading_id'].'/'.$readingVocab['readingvocabulary_id'].'" >Edit</a>'; ?> | 
				<?php echo '<a href="'.base_url().'index.php/admin/readingdocument/deleteReading/'.$readingVocab['reading_id'].'/'.$readingVocab['readingvocabulary_id'].'" >Delete</a>'; ?></td>
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