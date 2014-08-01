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
                			<a href=""><span style="color:blue;font-weight:bold; font-size:18px;">Back</span></a></div>	
						<?php foreach ($listMinna as $row) {?>						
						<div><h1><?php echo $row['reading_title']; ?></h1></div>
						<table class="table" width="96%;">
                    		<tbody><tr>
		                        <td style="background:#366CAA;color:#FFFFFF;font-size:18px"><center><b>Chữ Hán</b></center></td>
		                        <td style="background:#366CAA;color:#FFFFFF;font-size:18px"><center><b>Âm Hán</b></center></td>
		                        <td style="background:#366CAA;color:#FFFFFF;font-size:18px"><center><b>Onyomi</b></center></td>
		                        <td style="background:#366CAA;color:#FFFFFF;font-size:18px"><center><b>Kunyomi</b></center></td>
		                        <td style="background:#366CAA;color:#FFFFFF;font-size:18px"><center><b>Meaning</b></center></td>
		                    </tr>
						<?php if ($detailKanji!==null) {
							foreach ($detailKanji as $row) {?>
							 	<tr style="font-size:15px">
							  	<td><?php echo $row['k_kanji']; ?></td>
							  	<td><?php echo $row['k_hanviet']; ?></td>
							  	<td><?php echo $row['k_onyomi']; ?></td>
							  	<td><?php echo $row['k_kunyomi']; ?></td>
							  	<td><?php echo $row['k_meaning']; ?></td>
							  </tr>           	       		                	
						<?php }}?>
							</tbody></table>
						<?php } ?>
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