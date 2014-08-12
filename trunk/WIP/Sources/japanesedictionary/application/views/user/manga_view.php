<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />  
        <link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/   css" media="all" />  
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>  
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>  
	<title>Kanji de manga</title> 
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
							<p style="color:blue; font-size:20px;">Danh sách Manga và link tải về</p>
							<table cellspacing="30">
								<th><img src="<?php echo base_url();?>public/image/manga1.png" width="163" height="231"></th>
								<th><img src="<?php echo base_url();?>public/image/manga2.png" width="163" height="231"></th>
								<th><img src="<?php echo base_url();?>public/image/manga3.png" width="163" height="231"></th>
							</table>
							Được xuất bản bởi Manga University, Kanji de Manga sử dụng những tác phẩm truyện tranh nguyên gốc để hướng dẫn người đọc nhận diện và tập viết chữ Kanji.
							<p align="left" style="color:red; font-size:18px;margin-left:40px;">Link tải về</p>
							<p align="left" style="color:blue; font-size:16px;margin-left:60px;"><a href="mega.co.nz/#!QYZh0IqQ!5E29QG3NtjRNza1nP9SIMpPbpkzgIkYle20vCS_JTQU">Kanji de Manga 1</a></p>
							<p align="left" style="color:blue; font-size:16px;margin-left:60px;"><a href="mega.co.nz/#!QYZh0IqQ!5E29QG3NtjRNza1nP9SIMpPbpkzgIkYle20vCS_JTQU">Kanji de Manga 2</a></p>
							<p align="left" style="color:blue; font-size:16px;margin-left:60px;"><a href="mega.co.nz/#!QYZh0IqQ!5E29QG3NtjRNza1nP9SIMpPbpkzgIkYle20vCS_JTQU">Kanji de Manga 3</a></p>
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