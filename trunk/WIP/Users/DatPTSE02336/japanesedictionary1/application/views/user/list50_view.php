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
							<center><h2>Danh dách từ vựng 50 bài sơ cấp</h2></center>
	        <?php if ($vocabulary !== null) {?>
			<table width="90%" style="margin-left:5%;margin-right-5%;" id="table1" cellpadding="10">
			<tbody>
				<tr>
				<th width="25%">Hiragana</th>				
				<th width="50%">Meaningvn</th>
				<th width="15%">Kanji</th>				
				</tr>
				<?php if($num_rows_list50 > 0){ ?>	
				<?php foreach ($vocabulary as $vocab) { ?>
				<tr>
				<td><?php echo $vocab['readingvocabulary_hiragana']; ?></td>
				<td><?php echo $vocab['readingvocabulary_meaning']; ?></td>
				<td><?php echo $vocab['readingvocabulary_kanji']; ?></td>				
				</tr>
				<?php 
				}
				} ?>				
			</tbody></table>
			<div align="right" id="paging" class="pagination" style="margin-right:5%">
	                  <?php
	                    if($num_rows_list50>0){
	                        echo $links;
	                        echo " | Tổng số từ vựng : ".$num_rows_list50;
	                    }
	                  ?>
	        </div>
			<?php }else
				echo "Không có dữ liệu !";
			 ?>
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