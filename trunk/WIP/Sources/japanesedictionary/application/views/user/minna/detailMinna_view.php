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
	<title>Chi tiết Mina</title>
</head>
<body>
<div id="container">
		<?php 
			if ($this->my_auth->is_User()) {
				$this->load->view("user/top_login_view");
			} else {
				$user = $this->facebook->getUser();    
		        if ($user) {
		            $data['logout_url'] = site_url('Home/verify/fblogout'); // Logs off application
		            $data['user_profile'] = $this->facebook->api('/me');
		            // OR 
		            // Logs off FB!
		            // $data['logout_url'] = $this->facebook->getLogoutUrl();
		            $this->load->view("user/top_view",$data); 
		        } else {
		            $data['login_url'] = $this->facebook->getLoginUrl(array(
		                'redirect_uri' => site_url('Home/verify/fblogin'), 
		                'scope' => array("email") // permissions here
		            ));
		            $this->load->view("user/top_view",$data); 
		        } 								
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