<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Error Approved</title>
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
			<?php echo "Sorry! This vocabulary hasn't meaning...."; ?><br>
			<?php echo '<a href="'.base_url().'index.php/admin/vocabulary/listContributedVocab"><input name="listvocab" type="submit" value="List Contributed Vocabulary"></a>'; ?>
		</div>
	</div>
	<div style="clear:both"></div>
	</div>
	<div style="clear:both"></div>
	<div id="footer">Copyright © FPT University</div>
</body>
</html>