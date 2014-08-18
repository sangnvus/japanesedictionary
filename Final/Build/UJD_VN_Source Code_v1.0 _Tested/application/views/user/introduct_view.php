<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />  
        <link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/   css" media="all" />  
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>  
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>  
	<title>Giới thiệu</title>
</head>
<body>
<div class="container">
		<?php 
			if ($this->my_auth->is_User()) {
				$this->load->view("user/top_login_view");
			} else {
				$user = $this->facebook->getUser();    
		        if ($user) {
		            $data['logout_url'] = site_url('Home/verify/fblogout'); // Logs off application
		            $data['user_profile'] = $this->facebook->api('/me');
		            // OR 
		            // Logs off FB!
		            // $data['logout_url'] = $this->facebook->getLogoutUrl();
		            $this->load->view("user/top_view",$data); 
		        } else {
		            $data['login_url'] = $this->facebook->getLoginUrl(array(
		                'redirect_uri' => site_url('Home/verify/fblogin'), 
		                'scope' => array("email") // permissions here
		            ));
		            $this->load->view("user/top_view",$data); 
		        } 								
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