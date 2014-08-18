<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet" type="text/css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/javascript.js"></script>
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />  
        <link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/   css" media="all" />  
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>  
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>  
	<script type="text/javascript">
		function showdetail(id) {
		$('.test-' + id).slideToggle();
		}
	</script>
	<title>Chi tiết ngữ pháp N2</title>
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
						<div id="left"><a style="font-size:20px;" id="btnSearch" href="<?php echo base_url();?>index.php/Home/home/GrammarN2">Quay lại &nbsp</a></div><br>
						<div id="left-subtitle"><h2>日本語総まとめN2_文法 (Giáo trình ôn thi N2_Ngữ Pháp)</h2></div>	
						<?php 
							if ($detailGrammarN2 != null) {
								foreach ($detailGrammarN2 as $row) {?>			
						<a href="javascript:void(0)" class="an_hien" onclick="showdetail('<?php echo $row['g_id']; ?>')"><h3 align="left" style="color:blue; margin-left:30px;"><?php echo $row['g_hiragana']; ?>: <?php echo $row['g_meaning']; ?></h3></a>
						<div class="test-<?php echo $row['g_id']; ?>" align="left" style="margin-left: 20px; display: none;">
		                <p align="left" style="font-size:14px;margin-left:20px;">
		                <h4 align="left" style="color:red;margin-left:40px;">+ Cách dùng</h4>
		                <span style="margin-left:50px;"><?php echo $row['g_use']; ?></span>
		                </p>
		               </div>
		               <?php }} ?>
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