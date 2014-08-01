<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php echo base_url();?>public/js/javascript.js"></script>
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
						<div id="left"><a href=""><span style="color:blue;font-weight:bold; font-size:18px;">Back</span></a></div><br>
						<div id="left-subtitle"><h2>日本語総まとめN3_ (Giáo trình ôn thi N3_Hán Tự)</h2></div>								
						<table width="100%;" class="table" cellpadding="8">
	                    <tbody><tr>
	                        <td style="background:#366CAA;color:#FFFFFF;font-size:18px"><center><b>Chữ Hán</b></center></td>
	                        <td style="background:#366CAA;color:#FFFFFF;font-size:18px"><center><b>Âm Hán Việt</b></center></td>
	                        <td style="background:#366CAA;color:#FFFFFF;font-size:18px"><center><b>Hiragana</b></center></td>
	                        <td style="background:#366CAA;color:#FFFFFF;font-size:18px"><center><b>Nghĩa</b></center></td>
	                    </tr>
	                    <?php 
	                    if ($detailKanjiN3 != null) {
	                    	foreach ($detailKanjiN3 as $row) {	
	                     ?>
	                    <tr>
	                        <td><?php echo $row['k_kanji']; ?></td>
	                        <td><?php echo $row['k_hanviet']; ?></td>
	                        <td><?php echo $row['k_onyomi']; ?></td>
	                        <td><?php echo $row['k_meaning']; ?></td>
	                    </tr>
	                    <?php }} ?>
                		</tbody></table>
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