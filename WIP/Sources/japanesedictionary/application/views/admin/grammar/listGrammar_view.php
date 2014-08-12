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
				<form action="<?php echo site_url('/admin/grammar/getByRomaji') ?>" method="GET">
				Romaji: <input name="txtRomaji" value="<?php if(isset($txtRomaji)){ echo $txtRomaji;} ?>">
				<input type="submit" name="search" value="Search"> 
				</form>
			</div>
			<div id="add">
				<form action="<?php echo site_url('/admin/grammar/addGrammar') ?>" method="POST">
					<input type="submit" name="addnew" value="Add Grammar">					
				</form>
			</div>
			</div>
			<div id="table-user">
			<center><h2>List Grammar</h2></center>
				<div id="paging" class="pagination">
	                  <?php
	                    if(isset($num_rows) && $num_rows>0){
	                        echo $links;
	                        echo " | Totalrecord : ".$num_rows;
	                    }
	                  ?>
	            </div>
	        <?php if ($grammar !== null) {?>
			<table border="1" id="table-substring" width="100%">
				<tbody><tr>
				<th>G_id</th>
				<th>Hiragana</th>
				<th>Romaji</th>
				<th>Level</th>
				<th>Meaning</th>
				<th>Use</th>
				<th>Status</th>
				<th>Reading_id</th>
				<th>Edit/Delete</th>
				</tr>
				<?php if($num_rows > 0){ ?>	
				<?php foreach ($grammar as $grammar) { ?>
				<tr>
				<td><?php echo $grammar['g_id']; ?></td>
				<td><?php echo $grammar['g_hiragana']; ?></td>
				<td><?php echo $grammar['g_romaji']; ?></td>
				<td><?php echo $grammar['g_level']; ?></td>
				<td><?php echo $grammar['g_meaning']; ?></td>
				<td><p><?php echo $grammar['g_use']; ?></p></td>
				<td><?php echo $grammar['g_status']; ?></td>
				<td><?php echo $grammar['reading_id']; ?></td>									
				<td><?php echo '<a href="'.base_url().'index.php/admin/grammar/editGrammar/'.$grammar['g_id'].'" >Edit</a>'; ?> | 
				<?php echo '<a href="'.base_url().'index.php/admin/grammar/deleteGrammar/'.$grammar['g_id'].'" >Delete</a>'; ?></td>
				</tr>
				<?php 
				}
				} ?>				
			</tbody></table>
			<?php }else
				echo "No record !";
			 ?>
			</div>
			<?php echo '<a href="'.base_url().'index.php/admin/grammar/listContributedGrammar"><input name="listgrammar" type="submit" value="List Contributed Grammar"></a>'; ?>
			<div id="reference">
				<form action="<?php echo site_url('/admin/grammar/referenceSentence') ?>" method="POST">
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