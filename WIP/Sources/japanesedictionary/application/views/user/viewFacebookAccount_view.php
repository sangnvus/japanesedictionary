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
                        <h1 style="color:blue">Xem thông tin cá nhân</h1>
                        
                        <div id="table-vocabulary">
                        <center>
                            <form name="editUser" id="editUser" action="" method="post" enctype="multipart-formdata">
                            <table align="left" style="margin-left:20px;font-size:14px;" cellspacing="15" cellpadding="15">
                                <tr>
                                    <td width="35%"><label><b>Họ và tên: </b></label></td>
                                    <td width="40%"><?php echo $info['name'];?></td>
                                    <td width="1%"></td>
                                    <td width="25%"></td>
                                </tr>
                                <tr>
                                    <td><label><b>Email: </label></td>
                                    <td><?php echo $info['email'];?></td>
                                    <td></td>
                                    <td width="25%"></td>
                                </tr>                 
                                <tr>
                                    <td><label><b>Giới tính: </label></td>
                                    <td><?php echo $info['gender'];?></td>
                                    <td></td>
                                    <td width="25%"></td>
                                </tr>                              
                                <tr>
                                    <td><label><b>Địa chỉ facebook:</label></td>
                                    <td><?php echo $info['link'];?></td>
                                    <td width="1%" style="color:red;"></td>
                                    <td width="25%"></td>
                                </tr>                                                   
                            </table>
                            </form>
                            </center>
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