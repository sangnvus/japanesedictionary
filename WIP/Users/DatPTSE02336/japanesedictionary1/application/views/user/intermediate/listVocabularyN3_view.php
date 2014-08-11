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
						<div id="left-subtitle"><h2>日本語総まとめN3_語彙 (Giáo trình ôn thi N3_Từ vựng)</h2></div>								
						<table width="100%" cellpadding="8">
			             <tbody>
			             <tr style="font-weight:bold; background:#80B2D9">
			             <td>Tên tài liệu</td>
			             </tr>
			             <?php 
			             	foreach ($listVocabN3 as $row) {
			              ?>
			             <tr><td bgcolor="E5EFF8">
			             <?php echo '<a href="'.base_url().'index.php/Home/home/detailVocabN3/'.$row['reading_id'].'">';?>
			             <?php echo $row['reading_title']; ?>_語彙</a></td></tr>
			             <?php } ?>		
			             </tbody>            
            			</table>
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