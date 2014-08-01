<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php echo base_url();?>public/js/javascript.js"></script>
	<title>Số đếm</title>
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
							<div id="left-subtitle"><h2 style="color:blue;margin-top:20px;">SỐ ĐẾM - 数</h2></div>
		     				<h3 align="left" style="color:blue;margin-left:20px;margin-top:20px;">Danh sách số đếm cơ bản</h3>
		     				<table id="table" cellpadding="10" style="margin-left:5%;margin-right:5%;" width="90%">
		     				<th style="background-color:#E8E8E8;" width="30%">Số</th>
		     				<th style="background-color:#E8E8E8;" width="30%">Hiragana</th>
		     				<th style="background-color:#E8E8E8;" width="30%">Chữ Hán</th>
		     				<tr>
		     				<td>0</td>
		     				<td>ゼロ、れい</td>
		     				<td></td>
		     				</tr>
		     				<tr>
		     				<td>1</td>
		     				<td>いち</td>
		     				<td>一</td>
		     				</tr>
		     				<tr>
		     				<td>2</td>
		     				<td>に</td>
		     				<td>二</td>
		     				</tr>
		     				<tr>
		     				<td>3</td>
		     				<td>さん</td>
		     				<td>三</td>
		     				</tr>
		     				<tr>
		     				<td>4</td>
		     				<td>よん、し</td>
		     				<td>四</td>
		     				</tr>
		     				<tr>
		     				<td>5</td>
		     				<td>ご</td>
		     				<td>五</td>
		     				</tr>
		     				<tr>
		     				<td>6</td>
		     				<td>ろく</td>
		     				<td>六</td>
		     				</tr>
		     				<tr>
		     				<td>7</td>
		     				<td>なな、しち</td>
		     				<td>七</td>
		     				</tr>
		     				<tr>
		     				<td>8</td>
		     				<td>はち</td>
		     				<td>八</td>
		     				</tr>
		     				<tr>
		     				<td>9</td>
		     				<td>きゅう、く</td>
		     				<td>九</td>
		     				</tr>
		     				<tr>
		     				<td>10</td>
		     				<td>じゅう</td>
		     				<td>十</td>
		     				</tr>
		     				<td>11</td>
		     				<td>じゅういち</td>
		     				<td>十一</td>
		     				</tr>
		     				</tr>
		     				<td>...</td>
		     				<td>...</td>
		     				<td>...</td>
		     				</tr>
		     				</tr>
		     				<td>20</td>
		     				<td>にじゅう</td>
		     				<td>二十</td>
		     				</tr>
		     				</tr>
		     				<td>...</td>
		     				<td>...</td>
		     				<td>...</td>
		     				</tr>
		     				<td>100</td>
		     				<td>ひゃく</td>
		     				<td>百</td>
		     				</tr>
		     				</tr>
		     				<td>...</td>
		     				<td>...</td>
		     				<td>...</td>
		     				</tr>
		     				<td>1000</td>
		     				<td>せん</td>
		     				<td>千</td>
		     				</tr>
		     				</tr>
		     				<td>...</td>
		     				<td>...</td>
		     				<td>...</td>
		     				</tr>
		     				<td>10000</td>
		     				<td>いちまん</td>
		     				<td>万</td>
		     				</tr>
		     				<td>...</td>
		     				<td>...</td>
		     				<td>...</td>
		     				</tr>
		     				</tr>
		     				</table>
		     				<h3 align="left" style="color:blue;margin-left:20px;">Một số cách đọc</h3>
		     				<table id="table" cellpadding="10" style="margin-left:5%;margin-right:5%;" width="90%">
		     				<th style="background-color:#E8E8E8;" width="45%">Số</th>
		     				<th style="background-color:#E8E8E8;" width="45%">Hiragana</th>
		     				<tr>
		     				<td><b>2</b>7</td>
		     				<td><b>にじゅう&nbsp;</b>なな</td>
		     				</tr>
		     				<tr>
		     				<td>3/4</td>
		     				<td><b>よん&nbsp;</b>ぶんの&nbsp;<b>さん</b></td>
		     				</tr>
		     				<tr>
		     				<td>0.32</td>
		     				<td><b>れい&nbsp;</b>てん&nbsp;<b>さんに</b></td>
		     				</tr>
		     				<tr>
		     				<td>9.5</td>
		     				<td><b>きゅう&nbsp;</b>てん&nbsp;<b>ご</b></td>
		     				</tr>
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