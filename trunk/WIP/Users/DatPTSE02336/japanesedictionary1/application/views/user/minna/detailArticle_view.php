<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet" type="text/css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/javascript.js"></script>
	<script type="text/javascript"> 
		$(document).ready(function(){ 
		  $("a.an_hien").click(function(){ 
		    $("div#test").slideToggle(); 
		  }); 
	}); 
		$(document).ready(function(){ 
		  $("a.hien_an").click(function(){ 
		    $("div#test1").slideToggle(); 
		  }); 
	}); 
	</script>
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
                			<a href="socap_1.html"><span style="color:blue;font-weight:bold; font-size:18px;">Back</span></a></div>	
						<?php foreach ($listMinna as $row) {?>						
						<div><h1><?php echo $row['reading_title']; ?></h1></div>
						<?php if ($detailArticle!==null) {
							foreach ($detailArticle as $row) {?>
						<div align="left" style="margin-left:20px;margin-right:15px;margin-top:10px"><?php echo $row['readingarticle_content']; ?></div>
						<a href="javascript:void(0)" class="an_hien"><h3 align="left" style="color:gray;"> 関係問題(Câu hỏi liên quan)</h3></a>
						<div id="test" style="display: none;"> 
		                <h3 align="left" style="color:blue;margin-left:40px;"><?php echo $row['readingarticle_question']; ?></h3>
		                <br>
		                </div>
		                 <a href="javascript:void(0)" class="hien_an"><h3 align="left" style="color:gray;">答 (Đáp án &amp; Dịch)</h3></a>
		                 <div id="test1" style="display: none;">
                            <h3 align="left" style="color:blue;margin-left:40px;">Dịch</h3>
                            <h3 align="left" style="color:gray;margin-left:40px;"><?php echo $row['readingarticle_answer']; ?></h3><br>
                    	</div>
						<?php }}} ?>
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