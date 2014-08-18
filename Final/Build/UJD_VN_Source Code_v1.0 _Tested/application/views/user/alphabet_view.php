<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet" type="text/css" />
	<title>Bảng chữ cái</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />  
        <link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/   css" media="all" />  
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>  
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>  
<script type="text/javascript"> 
	$(document).ready(function(){ 
	  $("a.an_hien").click(function(){ 
	    $("div#test").slideToggle(); 
	  }); 
	}); 
	$(document).ready(function(){ 
	  $("a.hien_an").click(function(){ 
	    $("div#test1").slideToggle(); 
	  }); 
	}); 
	$(document).ready(function(){ 
	  $("a.hien_an1").click(function(){ 
	    $("div#test2").slideToggle(); 
	  }); 
	});
</script> 
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
							<div><h2 style="color:blue;">Bảng chữ cái Hiragana & Katakana</h2></div>
							<a href="javascript:void(0)" class="an_hien"><h3 align="left" style="color:blue; margin-left:10px;">Bảng chữ cái Hiragana</h3></a>
							<div id="test">
							<img src="<?php echo base_url();?>public/image/hiraganachart.png">
							</div>
							<a href="javascript:void(0)" class="hien_an"><h3 align="left" style="color:blue; margin-left:10px;">Bảng chữ cái Katakana</h3></a>
							<div id="test1">
							<img src="<?php echo base_url();?>public/image/katakanachart.png">
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