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
						<div id="left-subtitle"><h2>日本語総まとめN3_語彙 (Giáo trình ôn thi N3_Bài Đọc)</h2></div>								
						<?php 
						if ($detailArticleN3 != null) {
							foreach ($detailArticleN3 as $row) {					
						 ?>
						 <div style="text-align: left;margin-left:40px;">
						 	<p><?php echo nl2br($row['readingarticle_content']); ?></p>
						 </div>
						 <div align="left" style="margin-left:40px;font-size:18px;">
		                     <p style="color:blue;"><b>Chọn đáp án đúng</b></p>
								<?php echo nl2br($row['readingarticle_question']); ?>	
			                </div>
			              <a href="javascript:void(0)" class="an_hien"><h3 align="left" style="color:gray; margin-left:30px;">+ Xem đáp án</h3></a>
			              <div id="test" align="left" style="margin-left: 20px; display: none;">
			                <p align="left" style="font-size:14px;margin-left:20px;">
			                Đáp án đúng : <?php echo $row['readingarticle_answer']; ?>
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