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
				<form action="<?php echo site_url('/admin/test/getTestByLevel') ?>" method="GET">
				Level: <input name="txtLevel" value="">
				<input type="submit" name="search" value="Search"> 
				</form>
			</div>
			<div id="add">
				<form action="<?php echo site_url('/admin/test/addTest') ?>" method="POST">
					<input type="submit" name="addnew" value="Add Test">					
				</form>
			</div>
			</div>
			<div id="table-user">
			<center><h2>List Test</h2></center>
				<div id="paging" class="pagination">
	                  <?php
	                    if($num_rows>0){
	                        echo $links;
	                        echo " | Tổng số record : ".$num_rows;
	                    }
	                  ?>
	            </div>
	        <?php if ($test !== null) {?>
			<table border="1" id="table-substring" width="90%">
				<tbody><tr>
				<th>Test_id</th>
				<th>Category</th>
				<th>Level</th>
				<th>Content</th>
				<th>Question_id</th>
				<th>Q_content</th>
				<th>Add Question</th>								
				<th>Answer_id</th>
				<th>A_content</th>
				<th>Correct</th>				
				<th>Add Answer</th>
				<th>Edit/Delete</th>
				</tr>
				<?php if($num_rows > 0){ ?>	
				<?php foreach ($test as $test) { ?>
				<tr>
				<td><?php echo $test['test_id']; ?></td>
				<td><?php echo $test['test_category']; ?></td>
				<td><?php echo $test['test_level']; ?></td>
				<td><p><?php echo $test['test_content']; ?></p></td>				
				<td><?php echo $test['question_id']; ?></td>				
				<td><?php echo $test['question_content']; ?></td>
				<td><?php echo '<a href="'.base_url().'index.php/admin/test/addQuestion/'.$test['test_id'].'/'.$test['question_id'].'" >Add</a>'; ?></td>
				<td><?php echo $test['answer_id']; ?></td>
				<td><?php echo $test['answer_content']; ?></td>
				<td><?php echo $test['answer_correct']; ?></td>
				<td><?php echo '<a href="'.base_url().'index.php/admin/test/addAnswer/'.$test['test_id'].'/'.$test['question_id'].'/'.$test['answer_id'].'" >Add</a>'; ?></td>											
				<td><?php echo '<a href="'.base_url().'index.php/admin/test/editTest/'.$test['test_id'].'/'.$test['question_id'].'/'.$test['answer_id'].'" >Edit</a>'; ?> | 
				<?php echo '<a href="'.base_url().'index.php/admin/test/deleteTest/'.$test['test_id'].'/'.$test['question_id'].'/'.$test['answer_id'].'" >Delete</a>'; ?></td>
				</tr>
				<?php 
				}
				} ?>				
			</tbody></table>
			<?php }else
				echo "Không có dữ liệu !";
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