<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Reading Vocabulary List</title>
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
				<?php echo '<a href="'.base_url().'index.php/admin/readingdocument/addReadingVocab/'.$reading_id.'" ><input type="submit" value="Add new vocabulary"></a>'; ?>
			</div>
			<div id="table-user">
			<?php if ($reading !== null) { ?>
			<?php foreach ($reading as $reading) { ?>
			<center><h2><?php echo $reading['reading_title']; ?></h2></center>		
				<div id="paging" class="pagination">
	                  <?php
	                    if(isset($num_rows) && $num_rows>0){
	                        echo $links;
	                        echo " | Total record : ".$num_rows;
	                    }
	                  ?>
	                  
	            </div>
	        <?php } }?>
	        <?php if ($readingVocab !== null) {?>
			<table border="1" width="100%">
				<tbody><tr>
				<th>No.</th>
				<th>Hiragana</th>
				<th>Meaning</th>				
				<th>Kanji</th>	
				<th>Type</th>					
				<th>Action</th>
				</tr>
				<?php if($num_rows > 0){ ?>	
				<?php $stt = 1;
				foreach ($readingVocab as $readingVocab) { ?>
				<tr>
				<td style="text-align:center"><?php echo $stt++; ?></td>
				<td><?php echo $readingVocab['readingvocabulary_hiragana']; ?></td>	
				<td><?php echo $readingVocab['readingvocabulary_meaning']; ?></td>
				<td><?php echo $readingVocab['readingvocabulary_kanji']; ?></td>
				<td><?php echo $readingVocab['readingvocabulary_type']; ?></td>											
				<td><?php echo '<a href="'.base_url().'index.php/admin/readingdocument/editReadingVocab/'.$readingVocab['reading_id'].'/'.$readingVocab['readingvocabulary_id'].'" >Edit</a>'; ?> | 
				<?php echo '<a href="'.base_url().'index.php/admin/readingdocument/deleteReadingVocab/'.$readingVocab['reading_id'].'/'.$readingVocab['readingvocabulary_id'].'" >Delete</a>'; ?></td>
				</tr>
				<?php 
				}
				} ?>				
			</tbody></table>
			<?php } else
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