<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Reading Document Management</title>
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
				<form action="<?php echo site_url('/admin/readingdocument/getReadingByLevel') ?>" method="GET">
				Level: 
				<select name="txtLevel">
					<option value="N1">N1</option>
					<option value="N2">N2</option>
					<option value="N3">N3</option>
					<option value="N4">N4</option>
					<option value="N5">N5</option>
				</select>
				<input type="submit" name="search" value="Search"> 
				</form>
			</div>
			<div id="add">
				<form action="<?php echo site_url('/admin/readingdocument/addReading') ?>" method="POST">
					<input type="submit" name="addnew" value="Add Reading">					
				</form>
			</div>
			</div>
			<div id="table-user">
			<center><h2>Reading Document List</h2></center>
				<div id="paging" class="pagination">
	                  <?php
	                    if(isset($num_rows) && $num_rows>0){
	                        echo $links;
	                        echo " | Total record : ".$num_rows;
	                    }
	                  ?>
	            </div>
	        <?php if ($readingdocument !== null) {?>
			<table border="1" width="100%" id="table-substring">
				<tbody><tr>
				<th>No.</th>
				<th>Title</th>
				<th>Code</th>
				<th>Level</th>
				<th>Vocabulary</th>
				<th>Article</th>
				<th>Action</th>
				</tr>
				<?php if($num_rows > 0){ ?>	
				<?php $stt = 1; 
				foreach ($readingdocument as $readingdocument) { ?>
				<tr>
				<td style="text-align:center"><?php echo $stt++; ?></td>
				<td style="text-align:left;"><?php echo $readingdocument['reading_title']; ?></td>
				<td><?php echo $readingdocument['reading_code']; ?></td>
				<td><?php echo $readingdocument['reading_level']; ?></td>
				<td><?php echo '<a href="'.base_url().'index.php/admin/readingdocument/listReadingVocab/'.$readingdocument['reading_id'].'" >Detail</a>'; ?></td>
				<td><?php echo '<a href="'.base_url().'index.php/admin/readingdocument/viewReadingArticle/'.$readingdocument['reading_id'].'" >Detail</a>'; ?></td>
				<td><?php echo '<a href="'.base_url().'index.php/admin/readingdocument/editReading/'.$readingdocument['reading_id'].'" >Edit</a>'; ?> | 
				<?php echo '<a href="'.base_url().'index.php/admin/readingdocument/deleteReadingDocument/'.$readingdocument['reading_id'].'" >Delete</a>'; ?></td>
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