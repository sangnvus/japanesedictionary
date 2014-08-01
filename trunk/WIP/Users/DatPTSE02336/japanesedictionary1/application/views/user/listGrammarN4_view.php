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
						<div align="left"><a style="font-size:20px;" id="btnSearch" href="<?php echo base_url();?>index.php/Home/home/review">Back</a></div>
							<center><h2>Danh dách ngữ pháp N4</h2></center>
	        <?php if ($grammar !== null) {?>
			<table width="90%" style="margin-left:5%;margin-right-5%;" class="table2" cellpadding="10">
				<tbody><tr>
				<th width="25%">Cấu trúc</th>				
				<th width="50%">Ý nghĩa</th>
				<th width="15%">Chi tiết</th>				
				</tr>
				<?php if($num_rows_listGrammarN4 > 0){ ?>	
				<?php foreach ($grammar as $grammar) { ?>
				<tr>
				<td><?php echo $grammar['g_hiragana']; ?></td>
				<td><?php echo $grammar['g_meaning']; ?></td>
				<td><?php echo '<a href="'.base_url().'index.php/Home/home/viewDetailGrammar/'.$grammar['g_id'].'" >Chi tiết</a>'; ?></td>				
				</tr>
				<?php 
				}
				} ?>				
			</tbody></table>
			<div align="right" id="paging" class="pagination" style="margin-right:5%" >
	                  <?php
	                    if($num_rows_listGrammarN4>0){
	                        echo $links;
	                        echo " | Tổng số ngữ pháp : ".$num_rows_listGrammarN4;
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