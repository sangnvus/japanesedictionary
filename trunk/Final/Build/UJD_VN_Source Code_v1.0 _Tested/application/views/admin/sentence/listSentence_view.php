<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Sentence List</title>
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
				<form action="<?php echo site_url('/admin/sentence/getByRomaji') ?>" method="GET">
				Romaji: <input name="txtRomaji" maxlength="1000" value="<?php if(isset($txtRomaji)){ echo $txtRomaji;} ?>">
				<input type="submit" name="search" value="Search"> 
				</form>
			</div>
			<div id="add">
				<form action="<?php echo site_url('/admin/sentence/addSentence') ?>" method="POST">
					<input type="submit" name="addnew" value="Add Sentence">					
				</form>
			</div>
			</div>
			<div id="table-user">
			<center><h2>Sentence List</h2></center>
				<div id="paging" class="pagination">
	                  <?php
	                    if(isset($num_rows) && $num_rows>0){
	                        echo $links;
	                        echo " | Total record : ".$num_rows;
	                    }
	                  ?>
	            </div>
	        <?php if ($sentence !== null) {?>
			<table border="1" id="table-substring">
				<tbody><tr>
				<th>No.</th>
				<th>Hiragana</th>
				<th>Romaji</th>
				<th>Meaning</th>
				<th>Kanji</th>
				<th>Action</th>
				</tr>
				<?php if($num_rows > 0){ ?>	
				<?php $stt = 1;
				foreach ($sentence as $sentence) { ?>
				<tr>
				<td style="text-align:center"><?php echo $stt++; ?></td>
				<td style="text-align:left"><?php echo $sentence['s_hiragana']; ?></td>
				<td style="text-align:left"><?php echo $sentence['s_romaji']; ?></td>
				<td style="text-align:left"><?php echo $sentence['s_meaning']; ?></td>
				<td style="text-align:left"><?php echo $sentence['s_kanji']; ?></td>					
				<td><?php echo '<a href="'.base_url().'index.php/admin/sentence/editSentence/'.$sentence['s_id'].'" >Edit</a>'; ?> | 
				<?php echo '<a href="'.base_url().'index.php/admin/sentence/deleteSentence/'.$sentence['s_id'].'" >Delete</a>'; ?></td>
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