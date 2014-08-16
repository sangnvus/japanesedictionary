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
	<title>Danh sách chữ Hán N3</title>
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
							<center><h2 style="color:blue;">DANH SÁCH CHỮ HÁN N3</h2></center>
	        <?php if ($kanji !== null) {?>
			<table id="table1" width="90%" cellpadding="10" style="margin-left:5%;margin-right:5%;">
				<tbody><tr>
				<th style="font-weight:bold; background:#80B2D9">CHỮ HÁN</th>
				<th style="font-weight:bold; background:#80B2D9">ÂM HÁN</th>
				<th style="font-weight:bold; background:#80B2D9">ÂM ÔN</th>
				<th style="font-weight:bold; background:#80B2D9">ÂM KUN</th>
				<th style="font-weight:bold; background:#80B2D9">NGHĨA</th>

			

				</tr>
				<?php if($num_rows_kanjiN3 > 0){ ?>	
				<?php foreach ($kanji as $kanji) { ?>
				<tr>
				<td><?php echo $kanji['k_kanji']; ?></td>
				<td><?php echo $kanji['k_hanviet']; ?></td>
				<td><?php echo $kanji['k_onyomi']; ?></td>
				<td><?php echo $kanji['k_kunyomi']; ?></td>
				<td><?php echo $kanji['k_meaning']; ?></td>												
				</tr>
				<?php 
				}
				} ?>				
			</tbody></table>
			<div align="right" id="paging" class="pagination" style="margin-right:5%">
	                  <?php
	                    if($num_rows_kanjiN3>0){
	                        echo $links;
	                        echo " | Số từ : ".$num_rows_kanjiN3;
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