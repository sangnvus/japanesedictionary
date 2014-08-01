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
						<?php if ($listMinna !==null) {?>
                			<?php foreach ($listMinna as $row) {?>
						<div><h1><?php echo $row['reading_title'] ?></h1></div>
						<div class="item-wrap">
						<?php echo '<a href="'.base_url().'index.php/Home/home/detailVocab/'.$row['reading_id'].'" class="item" id="tuvung"><span class="label">Từ vựng</span></a>'; ?>	
                    	</div>
                    	<div class="item-wrap">
                    	<?php echo '<a href="'.base_url().'index.php/Home/home/detailGrammar/'.$row['reading_id'].'" class="item" id="nguphap"><span class="label">Ngữ pháp</span></a>'; ?>
                    	</div>		
                    	<div class="item-wrap">
                    	<?php echo '<a href="'.base_url().'index.php/Home/home/detailArticle/'.$row['reading_id'].'" class="item" id="baidoc"><span class="label">Bài đọc</span></a>'; ?>
                    	</div>
                    	<div class="item-wrap">
                    	<?php echo '<a href="'.base_url().'index.php/Home/home/detailKanji/'.$row['reading_id'].'" class="item" id="chuhan"><span class="label">Chữ Hán</span></a>'; ?>
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