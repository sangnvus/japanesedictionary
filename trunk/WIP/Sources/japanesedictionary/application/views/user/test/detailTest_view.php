<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<base href="<?php echo base_url();?>" />
	<link href="public/css/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="public/js/javascript.js"></script>
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
						<form action="<?php echo site_url('/Home/test/result') ?>" method="POST" id="testForm" name="testForm">
						<?php if($detailTest !==null){ 
							foreach ($detailTest as $row) {					
							?>						
	                	<div><h1><?php echo $row->test_category; ?></h1></div>
		                <table border="1">
		                    <tbody><tr>
		                        <td width="100">Cấp độ</td>
		                        <td width="100"><?php echo $row->test_level; ?></td>
		                    </tr>
		                    <tr>
		                        <td>Thời gian</td>
		                        <td>10 phút</td>
		                    </tr>
		                    <tr>
		                        <td>Số câu</td>
		                        <td>5</td>
		                    </tr>
		                </tbody></table><br>
		                <?php 
		                	if ($row->test_category == "Listening") {?>
		                		<audio controls><source src="<?php echo base_url();?>public/audio/<?php echo $row->test_content;?>" type="audio/mpeg"></audio>
		                	<?php } else {?>
		                		<div style="font-size:20px;margin-left:40px">
			                <?php echo $row->test_content; ?>
			                </div>
		                	<?php }
		                 	?>
		                
		                <?php 
		                	if ($detailQuestion!=null) {
		                		foreach ($detailQuestion as $row1) {	
		                	                						
		                 ?>
		                <p align="left" style="margin-left:50px;">
		                <?php echo $row1->question_content; ?>
		               <br>
		               <?php 
		               		foreach ($row1->detailAnswer as $detailAnswer) {
		                ?>
		                <input type="radio" name="answer[<?php echo $row1->question_id; ?>]" id="<?php echo $detailAnswer->answer_id; ?>" value="<?php echo $detailAnswer->answer_id; ?>" />
                        <label for="<?php echo $detailAnswer->answer_id; ?>"><?php echo $detailAnswer->answer_content; ?></label><br>		
		               	<?php  } } }?>
		               	</p>
		                <div align="center">
		                	<input type="hidden" name="hidden-id" value="<?php echo $row->test_id; ?>">
		                	<input type="hidden" name="hidden-level" value="<?php echo $row->test_level; ?>">
		                	<input type="hidden" name="hidden-category" value="<?php echo $row->test_category; ?>">
		                    <input id="btnSearch" type="submit" value="Hoàn thành">
		                </div>
		                <?php }} ?>
		                </form>		
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