<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php echo base_url();?>public/js/javascript.js"></script>
	<title></title>
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
							<div id="left-subtitle"><h2>ÔN TẬP</h2></div>
		     <table width="90%" border="1" cellpadding="10" cellspacing="0" class="table2" style="margin-left:5%;margin-right:5%;">
		     <tbody>
		     <tr style="font-weight:bold; background:#80B2D9">
		     <td>Tên tài liệu</td>
		     </tr>
                <tr><td><a href="<?php echo base_url();?>index.php/Home/home/numberic">Số đếm cơ bản</a></td></tr>
                <tr><td><a href="<?php echo base_url();?>index.php/Home/home/time">Thời gian : giờ, phút, thứ</a></td></tr>
                <tr><td><a href="<?php echo base_url();?>index.php/Home/home/time1">Thời gian : ngày, tháng</a></td></tr>
                <tr><td><a href="<?php echo base_url();?>index.php/Home/home/list50">Từ Vựng 50 Bài Minnnano Nihongo</a></td></tr>
                <tr><td><a href="<?php echo base_url();?>index.php/Home/home/listGrammarN1">Danh sách Ngữ pháp cấp độ N1</a></td></tr>
                <tr><td><a href="<?php echo base_url();?>index.php/Home/home/listGrammarN2">Danh sách Ngữ pháp cấp độ N2</a></td></tr>
                <tr><td><a href="<?php echo base_url();?>index.php/Home/home/listGrammarN3">Danh sách Ngữ pháp cấp độ N3</a></td></tr>
                <tr><td><a href="<?php echo base_url();?>index.php/Home/home/listGrammarN4">Danh sách Ngữ pháp cấp độ N4</a></td></tr>
                <tr><td><a href="<?php echo base_url();?>index.php/Home/home/listGrammarN5">Danh sách Ngữ pháp cấp độ N5</a></td></tr>
		     </tbody>	
		     </table>		
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