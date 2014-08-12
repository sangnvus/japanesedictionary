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
						<div id="left">
						<?php foreach ($listMinna as $row) {?>
						<a style="font-size:20px;" id="btnSearch" href="<?php echo base_url();?>index.php/Home/home/detailMinna/<?php echo $row['reading_id']; ?>">Quay lại &nbsp</a></div>	
						<div><h1><?php echo $row['reading_title']; ?></h1></div>
						<table class="table" width="80%;" cellpadding="10">
                    	<tbody>
                    	<tr>
                        <td style="background:#366CAA;color:#FFFFFF;font-size:16px" width="25%"><center><b>Từ</b></center></td>
                        <td style="background:#366CAA;color:#FFFFFF;font-size:16px"><center><b>Nghĩa</b></center></td>
                        <td style="background:#366CAA;color:#FFFFFF;font-size:16px"><center><b>Chữ Hán</b></center></td>
                    	</tr>
						<?php if ($detailVocab!==null) {
							foreach ($detailVocab as $row) {?>	                  	
                    	<tr>
                        <td style="font-size:14px"><?php echo $row['readingvocabulary_hiragana']; ?></td>
                        <td style="font-size:14px"><?php echo $row['readingvocabulary_meaning']; ?></td>
                        <td style="font-size:14px"><?php echo $row['readingvocabulary_kanji']; ?></td>
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