<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet" type="text/css" />
	<title>Chi tiết Ngữ pháp</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
$(document).ready(function(){ 
  $("a.hien_an1").click(function(){ 
    $("div#test2").slideToggle(); 
  }); 
}); 
</script> 
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
						<?php if ($info !== null) {?>
						<?php 
								foreach ($info as $row) {
									?>
						<div align="left"><a style="font-size:20px;" id="btnSearch" href="<?php echo base_url();?>index.php/Home/home/listGrammar<?php echo $row->g_level; ?>">Back</a></div>
						
							<a href="javascript:void(0)" class="an_hien"><h3 align="left" style="color:blue; margin-left:10px;font-size:24px;"><?php echo $row->g_hiragana;?> : <?php echo $row->g_meaning;?></h3></a>
							<div id="test" align="left" style="margin-left:40px;">
								<label style="font-size:18px; color: red;"><i>Ý nghĩa- 意味 : </i></label><h4 style="margin-lefft:80px;"><?php echo $row->g_meaning;?></h4>
		        				<label style="font-size:18px; color: red;"><i>Cách dùng: </i></label><h4 style="margin-lefft:80px;"><?php echo $row->g_use;?></h4>
		        				<label style="font-size:18px; color: red;"><i>Ví dụ: </i></label><h4 style="margin-lefft:80px;"><?php echo $row->s_hiragana;?> : <?php echo $row->s_meaning;?></h4>
							</div>
						<?php }?>
						<?php }?>
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