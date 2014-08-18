<?php
    //--- Giu gia tri cua form
    $k_kanji = array(
                        'name'        => 'k_kanji',
                        'id'          => 'k_kanji',
                        'size'        => '45',
                        'value'       => set_value('k_kanji'),
                    );
    $k_hanviet = array(
                        'name'        => 'k_hanviet',
                        'id'          => 'k_hanviet',
                        'size'        => '45',
                        'value'       => set_value('k_hanviet'),
                    );   
    $k_onyomi = array(
                        'name'        => 'k_onyomi',
                        'id'          => 'k_onyomi',
                        'size'        => '45',
                        'value'       => set_value('k_onyomi'),
                    );   
    $k_kunyomi = array(
                        'name'        => 'k_kunyomi',
                        'id'          => 'k_kunyomi',
                        'size'        => '45',
                        'value'       => set_value('k_kunyomi'),
                    );
    $k_meaning = array(
                        'name'        => 'k_meaning',
                        'id'          => 'k_meaning',
                        'size'        => '45',
                        'value'       => set_value('k_meaning'),
                    );          
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
	<link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php echo base_url();?>public/js/javascript.js"></script>
  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />  
        <link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/   css" media="all" />  
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>  
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>  
	<title>Đóng góp chữ Hán</title>
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
						<h1 style="color:blue; font-size:25px;">Đóng góp chữ Hán</h1>			
<?php echo form_open("Home/user/contributedKanji"); ?>
 <table align="left" style="margin-left:20px;font-size:14px;" cellpadding="15">
  <tr>
  <td width="20%"><label for="k_kanji" style="font-size:14px;"><b>Chữ Hán:</b></label></td>
  <td width="40%"><?php echo form_input($k_kanji);?></td>
  <td width="1%" style="color:red;">(*)</td>
  <td width="30%"><?php echo form_error('k_kanji', '<font color="blue">', '</font>'); ?></td>
  </tr>
  <tr>
  <td><label for="k_hanviet" style="font-size:14px;"><b>Âm Hán:</b></label></td>
  <td><?php echo form_input($k_hanviet);?></td>
  <td width="1%" style="color:red;">(*)</td>
  <td><?php echo form_error('k_hanviet', '<font color="blue">', '</font>'); ?></td>
  </tr>
  <tr>
  <td><label for="k_onyomi" style="font-size:14px;"><b>Âm ÔN:</b></label></td>
  <td><?php echo form_input($k_onyomi);?></td>
  <td></td>
  <td><?php echo form_error('k_onyomi', '<font color="blue">', '</font>'); ?></td>
  </tr>
  <tr>
  <td><label for="k_kunyomi" style="font-size:14px;"><b>Âm KUN:</b></label></td>
  <td><?php echo form_input($k_kunyomi);?></td>
  <td></td>
  <td><?php echo form_error('k_kunyomi', '<font color="blue">', '</font>'); ?></td>
  </tr>
  <tr>
  <td><label for="k_meaning" style="font-size:14px;"><b>Nhập nghĩa:</b></label></td>
  <td><?php echo form_input($k_meaning);?></td>
  <td width="1%" style="color:red;">(*)</td>
  <td><?php echo form_error('k_meaning', '<font color="blue">', '</font>'); ?></td>
  </tr>
  <tr>
    <td><label for="captcha" style="font-size:14px;"><b>Mã xác nhận:</b></label></td>
    <td><?php echo $this->recaptcha->getHtml(); ?></td>
    <td width="1%" style="color:red;">(*)</td>
    <td><?php echo form_error('recaptcha_response_field', '<font color="blue">', '</font>'); ?></td>
  </tr>
  <tr>
  <td></td>
  <td><input id="btnSearch" type="submit" value="Đóng góp" /></td>
  </tr>
  </table>
<?php echo form_close(); ?>
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