<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet" type="text/css" />
	<title>Chi tiết Ngữ pháp</title>
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
<div id="container">
		<?php 
			if ($this->my_auth->is_User()) {
				$this->load->view("user/top_login_view");
			} else {
				$this->load->view("user/top_view");
			}
			
		 ?>	
	<div id="content">
		<?php $this->load->view("user/mainmenu_view");?>
		<div id="noidung">
			<center>
				<?php $this->load->view("user/search_view");?>
				<div id="main-content">
					<div id="left-content">
						<div id="intro-content">
						<?php foreach ($Communication as $row) {?>
						<div align="left"><a style="font-size:20px;" id="btnSearch" href="<?php echo base_url();?>index.php/Home/home/communicatedNihon">Quay lại&nbsp</a></div>
						<div><h2 style="color:blue;font-size:22px;"><?php echo $row['c_title']; ?></h2></div>
						<?php if($row['c_image']!=="") { ?>
						<p align="left" style="font-size:16px;margin-left:30px;color:red;">Ở bài học này chúng ta chú ý đến ngữ pháp sau :</p>
						<img src="<?php echo base_url();?>public/image/<?php echo $row['c_image'];?>" width="500" height="300">
						<?php } else {?>
						<?php } ?>
						<p align="left" style="font-size:16px;margin-left:30px;color:red">Các bài giao tiếp cơ bản :</p>
						<?php 
							if ($detailCommunication !==null) {
								foreach ($detailCommunication as $row) {					
						 ?>
							
							<p align="left" style="margin-left:16px;font-size:18px;color:blue;"><i><?php echo $row->con_title; ?></i></p>
							<audio controls><source src="<?php echo base_url();?>public/audio/<?php echo $row->con_file;?>.mp3" type="audio/mpeg"></audio>
							<div align="left"><p style="margin-left:80px;font-size:16px;"><?php echo nl2br($row->con_hiragana);?></p></div>
							<a href="javascript:void(0)" class="an_hien" onclick="showdetail('<?php echo $row->con_id; ?>')"><i><p align="left" style="color:gray; margin-left:40px;font-size:16px;">Dịch</p></i></a>
							<div class="test-<?php echo $row->con_id; ?>" align="left" style="display: none;margin-left:40px;" >
							<h4 style="margin-left:80px;"><?php echo nl2br($row->con_meaning);?></h4>
							</div>
						<?php }?>
						<?php }?>
						<?php }?>
						</div>
					</div>
					<?php $this->load->view("user/popup_view");?>			
				</div>
			<div style="clear:both"></div>
			</center>
		</div>
	</div>
		<?php $this->load->view("user/footer_view");?>
</div>
</body>
</html>