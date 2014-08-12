<?php
    //--- Giu gia tri cua form

    $v_hiragana = array(
                        'name'        => 'v_hiragana',
                        'id'          => 'v_hiragana',
                        'size'        => '45',
                        'value'       => set_value('v_hiragana'),
                    );
    $m_kanji = array(
                        'name'        => 'm_kanji',
                        'id'          => 'm_kanji',
                        'size'        => '45',
                        'value'       => set_value('m_kanji'),
                    );
    $m_meaning = array(
                        "name"  => "m_meaning",
                        "id"    => "m_meaning",
                        'size'        => '45',                      
                        "value" => set_value('m_meaning'),
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
						<h1 style="color:blue; font-size : 25px;">Đóng góp từ vựng</h1>			
<?php echo form_open("Home/user/contributedVocab"); ?>
 <table align="left" style="margin-left:20px;font-size:14px;" cellpadding="15">
  <tr>
  <td width="25%%"><label for="v_hiragana"><b>Nhập từ:</b></label></td>
  <td width="40%"><?php echo form_input($v_hiragana);?></td>
  <td width="1%" style="color:red;">(*)</td>
  <td width="25%"><?php echo form_error('v_hiragana', '<font color="blue">', '</font>'); ?></td>
  </tr>
  <tr>
          <td width="40%"><b>Loại từ:</b></td>
          <td width="50%"><select name="m_category"> 
                            <option value=""></option>                        
                            <option value="N">Danh từ</option>
                            <option value="V">Động từ</option>
                            <option value="Adj">Tính từ</option>
                            <option value="Adv">Trạng từ</option>
                    </select></td>
          <td width="1%" style="color:red;">(*)</td>
           <td><?php echo form_error('m_category', '<font color="blue">', '</font>'); ?></td>
  </tr>
  <tr>
  <td><label for="m_kanji"><b>Chữ Hán(nếu có):</b></label></td>
  <td><?php echo form_input($m_kanji);?></td>
  <td></td>
  <td><?php echo form_error('m_kanji', '<font color="blue">', '</font>'); ?></td>
  </tr>
  <tr>
  <td><label for="m_meaning"><b>Nhập nghĩa:</b></label></td>
  <td><?php echo form_input($m_meaning);?></td>
  <td width="1%" style="color:red;">(*)</td>
  <td><?php echo form_error('m_meaning', '<font color="blue">', '</font>'); ?></td>
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