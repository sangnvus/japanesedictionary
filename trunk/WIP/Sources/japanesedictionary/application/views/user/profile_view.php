<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />  
        <link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/   css" media="all" />  
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>  
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>  
	<title>Xem thông tin cá nhân</title>
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
							<div style="margin-left:30px;">
							<h1 align="left" style="color:blue">Trang cá nhân</h1>
							<table border="0" align="left" style="font-size:14px;"cellpadding="8">
 								<tr>
								<td><b>Họ và tên :</td>
								<td><b><?php echo $info["u_fullname"];?></td>
								</tr>
								<tr>
								<td><b>Tên đăng nhập :</td>
								<td><b><?php echo $info["u_username"];?></td>
								</tr>
								<tr>
								<td><b>Email :</td>
								<td><b><?php echo $info["u_email"];?></td>
								</tr>
								<tr>
								<td>
								<?php echo '<a href="'.base_url().'index.php/Home/user/editUser/'.$this->my_auth->u_id.'" ><input id="btnSearch" type="submit" value="Thay đổi thông tin"></a>'; ?>
								</td>
								</tr>
							</table>
							</div>
							<div style="clear:both"></div>	
							<div style="margin-left:30px; margin-right:10px">
								<h1 align="left" style="color:blue">Quá trình kiểm tra</h1>
								<table id="trackingmark" style="font-size:14px;"cellpadding="8">									
									<tr>
										<th>Bài Kiểm Tra</th>
										<th>Điểm</th>
										<th>Ngày Kiểm Tra</th>
									</tr>
									<?php 
									if ($tracking != null) {																		
										foreach ($tracking as $tracking) {																					
									 ?>
									<tr>
										<td><?php echo $tracking->test_id; ?></td>
										<td><?php echo $tracking->tm_mark; ?>/5</td>
										<td><?php echo $tracking->tm_date; ?></td>
									</tr>
									<?php } }else {?>
									<tr>Bạn chưa làm bài kiểm tra nào.</tr>
									<?php } ?>
								</table>
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



