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
						<?php 
								foreach ($grammar as $row) {
									?>
						<div align="left"><a style="font-size:20px;" id="btnSearch" href="<?php echo base_url();?>index.php/Home/home/listGrammar<?php echo $row->g_level; ?>">Quay lại &nbsp</a></div>
						
							<h3 align="left" style="color:blue; margin-left:10px;font-size:24px;"><?php echo $row->g_hiragana;?> : <?php echo $row->g_meaning;?></h3>
							<div align="left" style="margin-left:40px;">
								<label style="font-size:18px; color: red;"><i>Ý nghĩa- 意味 : </i></label><h4 style="margin-lefft:80px;"><?php echo $row->g_meaning;?></h4>
		        				<label style="font-size:18px; color: red;"><i>Cách dùng: </i></label><h4 style="margin-lefft:80px;"><?php echo $row->g_use;?></h4>
		        				<label style="font-size:18px; color: red;"><i>Ví dụ: </i></label>
		        				<?php if ($row->sentences !== null && is_array($row->sentences)) { ?>
												<ol>
													<?php 
													foreach ($row->sentences as $sentence) {																											
													 ?>
													 <li><?php echo $sentence->s_hiragana; ?><br/>
													 	<?php echo $sentence->s_meaning; ?>
													 </li>
													 <?php } ?>
												</ol>
								<?php } ?>
							</div>
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