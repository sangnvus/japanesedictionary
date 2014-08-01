<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php echo base_url();?>public/js/javascript.js"></script>
	<title>Detail Vocabulary</title>
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
						<div id="left"><a href="socap_1.html"><span style="color:blue;font-weight:bold; font-size:18px;">Back</span></a></div>
						<?php foreach ($listMinna as $row) {?>
						<div><h1><?php echo $row['reading_title']; ?></h1></div>
						<table class="table" width="80%;" cellpadding="8">
                    	<tbody>
                    	<tr>
                        <td style="background:#366CAA;color:#FFFFFF;font-size:18px" width="25%"><center><b>Từ</b></center></td>
                        <td style="background:#366CAA;color:#FFFFFF;font-size:18px"><center><b>Nghĩa</b></center></td>
                        <td style="background:#366CAA;color:#FFFFFF;font-size:18px"><center><b>Chữ Hán</b></center></td>
                    	</tr>
						<?php if ($detailVocab!==null) {
							foreach ($detailVocab as $row) {?>	                  	
                    	<tr>
                        <td><?php echo $row['readingvocabulary_hiragana']; ?></td>
                        <td><?php echo $row['readingvocabulary_meaning']; ?></td>
                        <td><?php echo $row['readingvocabulary_kanji']; ?></td>
                    	</tr>
                    	<?php }} ?>
                		</tbody></table>
						<?php } ?>	
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