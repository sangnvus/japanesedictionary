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
							<center><h2 style="color:blue;">DANH SÁCH BÀI HỘI THOẠI TRUNG CẤP 2</h2></center>
	        <?php if ($conversation !== null) {?>
			<table id="table1" width="90%" cellpadding="10" style="margin-left:5%;margin-right:5%;">
				<tbody>
				<?php if($num_rows_conversationTC2 > 0){ ?>	
				<?php foreach ($conversation as $conversation) { ?>
				<tr>
				<td><?php echo '<a href="'.base_url().'index.php/Home/home/viewDetailConversation/'.$conversation['c_id'].'">'.$conversation['c_title'].'</a>';?></td>			
				</tr>
				<?php 
				}
				} ?>				
			</tbody></table>
			<div align="right" id="paging" class="pagination" style="margin-right:5%">
	                  <?php
	                    if($num_rows_conversationTC2>0){
	                        echo $links;
	                        echo " | Số bài : ".$num_rows_conversationTC2;
	                    }
	                  ?>
	            </div>
			<?php }else
				echo "Không có dữ liệu !";
			 ?>
						
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