<?php
    //--- Giu gia tri cua form
    $g_hiragana = array(
                        'name'        => 'g_hiragana',
                        'id'          => 'g_hiragana',
                        'cols'        =>'35',
                        'rows'        =>'6',
                        'value'       => set_value('g_hiragana'),
                    );
    $g_use = array(
                        'name'        => 'g_use',
                        'id'          => 'g_use',
                        'cols'        =>'35',
                        'rows'        =>'6',
                        'value'       => set_value('g_use'),
                    );   
    $g_meaning = array(
                        'name'        => 'g_meaning',
                        'id'          => 'g_meaning',
                        'size'        => '45',
                        'value'       => set_value('g_meaning'),
                    );         
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php echo base_url();?>public/js/javascript.js"></script>
  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />  
        <link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/   css" media="all" />  
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>  
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>  
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
						<h1 style="color:blue; font-size : 25px;">Đóng góp ngữ pháp</h1>			
<?php echo form_open("Home/user/contributedGrammar"); ?>
 <table align="left" style="margin-left:20px;font-size:14px;" cellpadding="15">
  <tr>
  <td width="20%"><label for="g_meaning"><b>Tên ngữ pháp:</b></label></td>
  <td width="50%"><?php echo form_input($g_meaning);?></td>
  <td width="1%" style="color:red;">(*)</td>
  <td width="25%"><?php echo form_error('g_meaning', '<font color="blue">', '</font>'); ?></td>
  </tr></td>
  </tr>
  <tr>
  <td><label for="g_hiragana"><b>Cấu trúc:</b></label></td>
  <td><?php echo form_textarea($g_hiragana);?></td>
  <td width="1%" style="color:red;">(*)</td>
  <td><?php echo form_error('g_hiragana', '<font color="blue">', '</font>'); ?></td>
  </tr>
  <tr>
  <td><label for="g_use"><b>Cách dùng:</b></label></td>
  <td><?php echo form_textarea($g_use);?></td>
  <td width="1%" style="color:red;">(*)</td>
  <td><?php echo form_error('g_use', '<font color="blue">', '</font>'); ?></td>
  </tr>
  <tr>
    <td><label for="captcha"><b>Mã xác nhận:</b></label></td>
    <td><?php echo $this->recaptcha->getHtml(); ?></td>
    <td width="1%" style="color:red;">(*)</td>
    <td><?php echo form_error('recaptcha_response_field', '<font color="blue">', '</font>'); ?></td>
    <!--
    <?php echo $Data; ?>-->
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