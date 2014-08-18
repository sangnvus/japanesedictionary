<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet" type="text/css" />
	<title>Chi tiết Hội thoại</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />  
        <link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/   css" media="all" />  
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>  
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>  
<script type="text/javascript"> 
function showdetail(id) {
		$('.test-' + id).slideToggle();
	} 
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
						<?php foreach ($conver as $row) {?>
						<div align="left"><a style="font-size:20px;" id="btnSearch" href="<?php echo base_url();?>index.php/Home/home/conversation<?php echo $row['c_level']; ?>">Quay lại&nbsp</a></div>
						<div><h1><?php echo $row['c_title']; ?></h1></div>
						<?php 
							if ($detailConver !==null) {
								foreach ($detailConver as $row) {					
						 ?>
							<div align="left" style="color:red; margin-left:10px;font-size:16px;"><i><h4 style="font-weight: normal;">Tình huống :
							<?php echo $row->con_title;?></h4></i><br>
							<audio controls><source src="<?php echo base_url();?>public/audio/<?php echo $row->con_file;?>" type="audio/mpeg"></audio>
							</div>
							<div align="left"><h3 style="margin-left:80px;"><?php echo nl2br($row->con_hiragana);?></h3></div>
							<a href="javascript:void(0)" class="an_hien" onclick="showdetail('<?php echo $row->con_id; ?>')"><i><p align="left" style="color:blue; margin-left:40px;font-size:14px;">Dịch</p></i></a>
							<div class="test-<?php echo $row->con_id; ?>" align="left" style="display: none;margin-left:40px;" >
							<h4 style="margin-left:80px;"><?php echo nl2br($row->con_meaning);?></h4>
							</div>
							~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
						<?php }?>
						<?php }?>
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