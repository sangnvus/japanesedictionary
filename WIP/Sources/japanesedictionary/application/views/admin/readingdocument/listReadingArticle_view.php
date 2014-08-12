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
				<form action="<?php echo site_url('/admin/readingdocument/getReadingByLevel/article') ?>" method="GET">
				Level: <input name="txtLevel" value="<?php if(isset($txtLevel)){ echo $txtLevel;} ?>">
				<input type="submit" name="search" value="Search"> 
				</form>
			</div>
			<div id="add">
				<form action="<?php echo site_url('/admin/readingdocument/addReading/article') ?>" method="POST">
					<input type="submit" name="addnew" value="Add Reading">					
				</form>
			</div>
			</div>
			<div id="table-user">
			<center><h2>List Reading Article</h2></center>
				<div id="paging" class="pagination">
	                  <?php
	                    if($num_rows>0){
	                        echo $links;
	                        echo " | Total record : ".$num_rows;
	                    }
	                  ?>
	            </div>
	        <?php if ($readingArticle !== null) {?>
			<table border="1" width="100%" id="table-substring">
				<tbody><tr>
				<th>Reading_Id</th>
				<th>Title</th>
				<th>Level</th>
				<th>Readingarticle_id</th>
				<th>Content</th>
				<th>Question</th>				
				<th>Answer</th>						
				<th>Meaning</th>
				<th>Add Content</th>
				<th>Edit/Delete</th>
				</tr>
				<?php if($num_rows > 0){ ?>	
				<?php foreach ($readingArticle as $readingArticle) { ?>
				<tr>
				<td><?php echo $readingArticle['reading_id']; ?></td>
				<td><?php echo $readingArticle['reading_title']; ?></td>
				<td><?php echo $readingArticle['reading_level']; ?></td>
				<td><?php echo $readingArticle['readingarticle_id']; ?></td>
				<td><p><?php echo $readingArticle['readingarticle_content']; ?></p></td>	
				<td><p><?php echo $readingArticle['readingarticle_question']; ?></p></td>
				<td><p><?php echo $readingArticle['readingarticle_answer']; ?></p></td>	
				<td><p><?php echo $readingArticle['readingarticle_meaning']; ?></p></td>
				<td><?php echo '<a href="'.base_url().'index.php/admin/readingdocument/addContentArticle/'.$readingArticle['reading_id'].'/'.$readingArticle['readingarticle_id'].'" >Add Content</a>'; ?></td>											
				<td><?php echo '<a href="'.base_url().'index.php/admin/readingdocument/editReadingArticle/'.$readingArticle['reading_id'].'/'.$readingArticle['readingarticle_id'].'" >Edit</a>'; ?> | 
				<?php echo '<a href="'.base_url().'index.php/admin/readingdocument/deleteReadingArticle/'.$readingArticle['reading_id'].'/'.$readingArticle['readingarticle_id'].'" >Delete</a>'; ?></td>
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