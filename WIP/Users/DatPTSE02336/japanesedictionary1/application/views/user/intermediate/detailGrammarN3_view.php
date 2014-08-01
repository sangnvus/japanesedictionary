<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet" type="text/css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/javascript.js"></script>
	<script type="text/javascript">
		function showdetail(id) {
		$('.test-' + id).slideToggle();
		}
	</script>
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
						<div id="left-subtitle"><h2>日本語総まとめN3_文法 (Giáo trình ôn thi N3_Ngữ Pháp)</h2></div>	
						<?php 
							if ($detailGrammarN3 != null) {
								foreach ($detailGrammarN3 as $row) {?>			
						<a href="javascript:void(0)" class="an_hien" onclick="showdetail('<?php echo $row['g_id']; ?>')"><h3 align="left" style="color:red; margin-left:30px;"><?php echo $row['g_hiragana']; ?>: <?php echo $row['g_meaning']; ?></h3></a>
						<div class="test-<?php echo $row['g_id']; ?>" align="left" style="margin-left: 20px; display: none;">
		                <p align="left" style="font-size:14px;margin-left:20px;">
		                + Cách dùng<br><?php echo $row['g_use']; ?>
		                </p>
		               </div>
		               <?php }} ?>
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