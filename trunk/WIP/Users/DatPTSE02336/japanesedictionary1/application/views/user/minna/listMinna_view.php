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
						<table width="100%" id="table1" cellspacing="5" cellpadding="8">
						<tbody><tr style="font-weight:bold; background:#80B2D9">
                			<td>Tên tài liệu</td><td>Free</td>
                			</tr>
                			<?php if ($listMinna !==null) {?>
                			<?php foreach ($listMinna as $row) {?>
                			<tr><td><?php echo '<a href="'.base_url().'index.php/Home/home/detailMinna/'.$row['reading_id'].'">'.$row['reading_title'].'</a>';?></td>
                			<td style="color:#900; font-weight:bold">Free</td></tr>
                			<?php }} ?>
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