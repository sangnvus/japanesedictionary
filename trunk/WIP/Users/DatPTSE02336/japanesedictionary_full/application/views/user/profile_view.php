<!--<?php
    //--- Giu gia tri cua form

    $username = array(
                        'name'        => 'username',
                        'id'          => 'username',
                        'size'        => '32',
                        'value'       => $info["u_username"],
                        'readonly'    => 'readonly'
                    );

    $fullname = array(
                        "name"  => "fullname",
                        "id"    => "fullname",
                        'size'  => '32',                        
                        "value" => $info["u_fullname"],
                        'readonly'    => 'readonly'
                    );
    $email = array(
                        'name'        => 'email',
                        'id'          => 'email',                        
                        'size'        => '32',
                        'value'       => $info["u_email"],
                        'readonly'    => 'readonly'
                    );
?>-->

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
							<div style="margin-left:30px;">
							<h1 align="left" style="color:blue">Trang cá nhân</h1>
							<table border="0" align="left" cellpadding="8">
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



