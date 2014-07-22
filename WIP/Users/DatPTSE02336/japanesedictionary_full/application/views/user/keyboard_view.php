<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet" type="text/css" />
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
							<div><h2 style="color:blue;">Hướng dẫn cài đặt font chữ</h2></div>
					Các máy tính chưa có Font Tiếng Nhật sẽ hiển thị các ô vuông, các bạn  Download Font tiếng Nhật <a href="http://www.mediafire.com/download/iw5b5rshwbcswda/Font+tieng+nhat.rar"><span style="color:blue;font-weight:bold">tại đây</span></a>, giải nén và chép vào thư mục Fonts trong Windows.
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