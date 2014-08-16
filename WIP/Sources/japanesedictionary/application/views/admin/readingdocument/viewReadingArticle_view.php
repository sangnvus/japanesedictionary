<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Reading Article Detail</title>
	<link href="<?php echo base_url();?>public/css/admin/style_homepage.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/   css" media="all" />  
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>  
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>  
	<script type="text/javascript">
		$(document).ready(function(){ 
		  $("a.an_hien").click(function(){ 
		    $("div#test").slideToggle(); 
		  }); 
		});
	</script>	 
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
			<div id="table-user">
			<?php if ($reading !== null) { ?>
			<?php foreach ($reading as $reading) { ?>
			<center><h2><?php echo $reading['reading_title']; ?></h2></center>
			<?php } }?>
			<?php 
				if ($article != null) {
					foreach ($article as $row) { ?>
					 <div style="text-align: left;margin-left:40px;">
					 	<p><?php echo nl2br($row['readingarticle_content']); ?></p>
					 </div>
					 <div align="left" style="margin-left:30px;font-size:16px;">
	                     <p style="color:blue;"><b>Câu hỏi liên quan</b></p>
							<?php echo nl2br($row['readingarticle_question']); ?>	
		                </div>
		              <h3 align="left" style="color:blue; margin-left:30px;">Dịch & Đáp án</h3>
		              <div align="left" style="margin-left: 20px;">
	                	<p align="left" style="font-size:14px;margin-left:20px;">
	                	<font style="font-size:14px;color:red;margin-left:20px;">Dịch :</font><br><br>
	                						<?php echo $row['readingarticle_meaning']; ?><br><br>
	                	<font style="font-size:14px;color:red;margin-left:20px;">Đáp án trả lời :</font><br><br>
	                						<?php echo nl2br($row['readingarticle_answer']);?>
	                </p>
	               </div>
	               <div>
	               		<?php echo '<a href="'.base_url().'index.php/admin/readingdocument/editReadingArticle/'.$reading['reading_id'].'/'.$row['readingarticle_id'].'" ><input type="submit" value="Edit Article"></a>'; ?>
	               		<?php echo '<a href="'.base_url().'index.php/admin/readingdocument/deleteReadingArticle/'.$reading['reading_id'].'/'.$row['readingarticle_id'].'" ><input type="submit" value="Delete Article"></a>'; ?>
	               </div>
				 <?php } ?>
			<?php } else {
				echo "No data in database !<br>";
				echo '<a href="'.base_url().'index.php/admin/readingdocument/addReadingArticle/'.$reading['reading_id'].'" ><input type="submit" value="Add New Article"></a>';
			}
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