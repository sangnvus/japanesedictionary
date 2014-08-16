<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet" type="text/css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/javascript.js"></script>
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />  
        <link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/   css" media="all" />  
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>  
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>  
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
	<title>Chi tiết ngữ pháp</title>
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
						
						<div id="detailGrammar">
						<div id="left">
						<?php foreach ($listMinna as $row) {?>
						<a style="font-size:20px;" id="btnSearch" href="<?php echo base_url();?>index.php/Home/home/detailMinna/<?php echo $row['reading_id']; ?>">Quay lại &nbsp</a></div>	
						<div><h1 style="font-size:20px"><?php echo $row['reading_title']; ?></h1></div>
						<?php 
							if ($detailGrammar !==null) {
								foreach ($detailGrammar as $row) {					
						 ?>
						<a href="javascript:void(0)" class="an_hien" onclick="showdetail('<?php echo $row->g_id; ?>')"><h3 align="left" style="color:blue;"><?php echo $row->g_hiragana; ?> - <?php echo $row->g_meaning; ?></h3></a><br>
						<div class="test-<?php echo $row->g_id; ?>" style="display: none;"> 
                		<h4 align="left" style="color:red;margin-left:40px;">+ 説明 (Giải thích)</h4>
                		<span style="margin-left:40px;"><?php echo $row->g_use; ?></span>
                		<h4 align="left" style="color:red;margin-left:40px;">+ 例えば (Ví dụ)</h4>
                		<div style="margin-left:40px;" align="left">
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