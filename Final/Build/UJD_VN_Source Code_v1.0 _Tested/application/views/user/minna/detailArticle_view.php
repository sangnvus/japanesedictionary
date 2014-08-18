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
	</script>
	<title>Chi tiết bài đọc</title>
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
						<div id="left">	
						<?php foreach ($listMinna as $row) {?>
						<a style="font-size:20px;" id="btnSearch" href="<?php echo base_url();?>index.php/Home/home/detailMinna/<?php echo $row['reading_id']; ?>">Quay lại &nbsp</a></div>						
						<div><h1><?php echo $row['reading_title']; ?></h1></div>
						<?php if ($detailArticle!==null) {
							foreach ($detailArticle as $row) {?>
						<div style="text-align: left;margin-left:40px;">
						 	<p><?php echo nl2br($row['readingarticle_content']); ?></p>
						 </div>
						 <div align="left" style="margin-left:30px;font-size:16px;">
		                     <p style="color:blue;"><b>Câu hỏi liên quan</b></p>
								<?php echo nl2br($row['readingarticle_question']); ?>	
			                </div>
			              <a href="javascript:void(0)" class="an_hien"><h3 align="left" style="color:blue; margin-left:30px;">Dịch & Đáp án</h3></a>
			              <div id="test" align="left" style="margin-left: 20px; display: none;">
			                <p align="left" style="font-size:14px;margin-left:20px;">
			                <font style="font-size:14px;color:red;margin-left:20px;">Dịch :</font><br><br>
			                						<?php echo $row['readingarticle_meaning']; ?><br><br>
			                <font style="font-size:14px;color:red;margin-left:20px;">Đáp án trả lời :</font><br><br>
			                						<?php echo nl2br($row['readingarticle_answer']);?>
			                </p>
			               </div>
						<?php }}} ?>
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