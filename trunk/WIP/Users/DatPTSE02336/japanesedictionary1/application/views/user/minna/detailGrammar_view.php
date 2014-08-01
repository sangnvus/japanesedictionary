<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet" type="text/css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/javascript.js"></script>
	<script type="text/javascript"> 
	// 	$(document).ready(function(){ 
	// 	  $("a.an_hien").click(function(){ 
	// 	    $("div#test").slideToggle(); 
	// 	  }); 
	// }); 
	function showdetail(id) {
		$('.test-' + id).slideToggle();
	} 
	</script>
	<title>Detail Grammar</title>
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
						<div id="detailGrammar">
						<?php foreach ($listMinna as $row) {?>
						<div><h1><?php echo $row['reading_title']; ?></h1></div>
						<?php 
							if ($detailGrammar !==null) {
								foreach ($detailGrammar as $row) {					
						 ?>
						<a href="javascript:void(0)" class="an_hien" onclick="showdetail('<?php echo $row->g_id; ?>')"><h3 align="left" style="color:gray;"><?php echo $row->g_hiragana; ?> - <?php echo $row->g_meaning; ?></h3></a>
						<div class="test-<?php echo $row->g_id; ?>" style="display: none;"> 
                		<h4 align="left" style="color:blue;margin-left:40px;">+ 管理 (Giải thích)</h4>
                		<span style="margin-left:40px;"><?php echo $row->g_use; ?></span>
                		<h4 align="left" style="color:blue;margin-left:40px;">+ 管理 (Ví dụ)</h4>
                		<div style="margin-left:40px;">
                		<ol>
                		<?php 
                		if ($row->detailSentence !==null) {
                			foreach ($row->detailSentence as $detailSentence) { ?>
                			<li><?php echo $detailSentence->s_hiragana; ?><br>
                			<?php echo $detailSentence->s_meaning; ?>
                			</li>
                			<?php }} ?>
                		</ol>
                		</div>
	                    </div>
								<?php }}} ?>
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