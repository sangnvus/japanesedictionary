<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<base href="<?php echo base_url();?>" />
	<link href="public/css/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="public/js/javascript.js"></script>
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
						<div><h1><?php echo $test_category; ?></h1></div>
						<div style="font-size:20px;margin-left:40px">
			                Bạn đã hoàn thành bài thi. Số điểm của bạn là <h2 style="color:blue"><?php echo $totalCorrect; ?>/5</h2>
			                <?php 
			                	if ($totalCorrect==0) {
			                		echo "<font color='red'><i>Bạn cần cố gắng luyện tập thêm :)</i></font><br><br>";
			                	}
			                 ?>
			                Kết quả đã được lưu vào trang cá nhân. Click vào <?php echo '<a href="'.base_url().'index.php/Home/test/reviewResult/'.$test_id.'/'.$test_level.'">'.'<b>đây</b>'.'</a>';?> để xem đáp án.     
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