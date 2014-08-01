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
							<meta charset="utf-8">
				            <div align="center">
				            <div align="left" style="margin-top:30px;"><font size="5" color="blue">Đăng ký thành công vui lòng đăng nhập để sử dụng chức năng khác!</font></div>
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