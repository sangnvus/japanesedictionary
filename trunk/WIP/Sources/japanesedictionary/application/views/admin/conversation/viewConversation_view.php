<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>View Detail Conversation</title>
	<link href="<?php echo base_url();?>public/css/admin/style_homepage.css" rel="stylesheet" type="text/css" />	 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />  
        <link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/   css" media="all" />  
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>  
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>  
<script type="text/javascript"> 
function showdetail(id) {
		$('.test-' + id).slideToggle();
	} 
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
			<div id="box-search">
				<h2 align="center">View Detail Conversation</h2>
			</div>
			<div id="table-user">
			<?php foreach ($conver as $conver) {?>
						<div><h3><?php echo $conver['c_title']; ?></h3></div>
						<?php 
							if ($detailConver !==null) {
								foreach ($detailConver as $row) {					
						 ?>
							<div align="left" style="color:red; margin-left:10px;font-size:16px;"><i><h4 style="font-weight: normal;">Tình huống :
							<?php echo $row->con_title;?>&nbsp&nbsp
							<?php echo '<a href="'.base_url().'index.php/admin/conversation/editContent/'.$row->con_id.'/'.$conver['c_id'].'" ><input type="submit" name="Edit" value="Edit"></a>'; ?>
							&nbsp<?php echo '<a href="'.base_url().'index.php/admin/conversation/deleteContent/'.$row->con_id.'/'.$row->c_id.'" ><input type="submit" name="Edit" value="Delete"></a>'; ?></h4></i><br>
							<audio controls><source src="<?php echo base_url();?>public/audio/<?php echo $row->con_file;?>" type="audio/mpeg"></audio>
							</div>
							<div align="left"><h4 style="margin-left:80px;"><?php echo nl2br($row->con_hiragana);?></h4></div>
							<a href="javascript:void(0)" class="an_hien" onclick="showdetail('<?php echo $row->con_id; ?>')"><i><p align="left" style="color:blue; margin-left:40px;font-size:14px;">Dịch</p></i></a>
							<div class="test-<?php echo $row->con_id; ?>" align="left" style="display: none;margin-left:40px;" >
							<h4 style="margin-left:80px;"><?php echo nl2br($row->con_meaning);?></h4>
							</div>
							~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
						<?php }?>
						<?php } else { ?>
								No file in database!
						<?php } ?>
						<?php }?>
						<br>
						<?php echo '<a href="'.base_url().'index.php/admin/conversation/addContent/'.$conver['c_id'].'" ><input type="submit" name="Add" value="Add New Content"></a>'; ?>
			</div>
		</div>
	</div>
	<div style="clear:both"></div>
	</div>
	<div style="clear:both"></div>
	<div id="footer">Copyright © FPT University</div>
</body>
</html>