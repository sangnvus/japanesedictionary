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
							<h2 style="color:blue;"> Học tiếng Nhật trực tuyến</h2><br>
					<div align="left" style="margin-left:40px;">
						<h3><b>Mục đích của Website-Học tiếng Nhật</b></h3>
							+ Dạy Online qua các bài học từ trình độ sơ cấp đến nâng cao.<br>
							+ Hổ trợ các học viên đang học tại các trung tâm Tiếng Nhật, các trường ĐH,..
						<h3><b>Nội Dung Chính-Website học tiếng Nhật</b></h3>
						+ Các bài học Sơ cấp, Trung cấp, Hán tự.<br>
						+ Luyện các kỹ năng: nghe, đọc, hội thoại.<br>
						+ Luyện thi NLTN các cấp độ N1, N2, N3, N4 qua các bài trắc nghiệm, có đáp án và hướng dẫn cụ thể.<br>			
						+ Các công cụ tra cứu trực tuyến: Hán tự, Ngữ pháp, Từ vựng.<br>
					</div>			
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