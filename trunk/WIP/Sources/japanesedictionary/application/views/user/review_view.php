<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php echo base_url();?>public/js/javascript.js"></script>
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />  
        <link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/   css" media="all" />  
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>  
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>  
	<title>Ôn tập</title>
</head>
<body>
<div id="container">
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
							<div id="left-subtitle"><h2>ÔN TẬP</h2></div>
		     <table cellpadding="10" cellspacing="0" class="table2-review">
		     <tbody>
		     <tr style="font-weight:bold; background:#80B2D9">
		     <td>Tên tài liệu</td>
		     </tr>
                <tr><td><a href="<?php echo base_url();?>index.php/Home/home/numberic">Số đếm cơ bản</a></td></tr>
                <tr><td><a href="<?php echo base_url();?>index.php/Home/home/time">Thời gian: giờ, phút, thứ</a></td></tr>
                <tr><td><a href="<?php echo base_url();?>index.php/Home/home/time1">Thời gian: ngày, tháng</a></td></tr>
                <tr><td><a href="<?php echo base_url();?>index.php/Home/home/list50">Từ Vựng 50 Bài Minna Nihongo</a></td></tr>
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