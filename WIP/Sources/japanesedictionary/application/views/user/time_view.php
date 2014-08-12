<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php echo base_url();?>public/js/javascript.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />  
        <link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/   css" media="all" />  
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>  
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>  
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
$(document).ready(function(){ 
  $("a.hien_an1").click(function(){ 
    $("div#test2").slideToggle(); 
  }); 
}); 
</script>
	<title>Thời gian</title>
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
							<div><h2 style="color:blue;margin-top:20px;">Khoảng thời gian-時間</h2></div>
		     				<a href="javascript:void(0)" class="an_hien"><h3 align="left" style="color:blue; margin-left:10px;">GIỜ - 時</h3></a>
							<div id="test">
							<table align="left" id="table" cellpadding="10" style="margin-left:5%;margin-right:5%;" width="90%">
		     				<th style="background-color:#E8E8E8;" width="45%">Số giờ</th>
		     				<th style="background-color:#E8E8E8;" width="45%">Hiragana</th>
		     				<tr>
		     				<td>1 giờ</td>
		     				<td>いちじ</td>
		     				</tr>
		     				<tr>
		     				<td>2 giờ</td>
		     				<td>にじ</td>
		     				</tr>
		     				<tr>
		     				<td>3 giờ</td>
		     				<td>さんじ</td>
		     				</tr>
		     				<tr>
		     				<td>4 giờ</td>
		     				<td>よじ</td>
		     				</tr>
		     				<tr>
		     				<td>5 giờ</td>
		     				<td>ごじ</td>
		     				</tr>
		     				<tr>
		     				<td>6 giờ</td>
		     				<td>ろくじ</td>
		     				</tr>
		     				<tr>
		     				<td>7 giờ</td>
		     				<td>しちじ</td>
		     				</tr>
		     				<tr>
		     				<td>8 giờ</td>
		     				<td>はちじ</td>
		     				</tr>
		     				<tr>
		     				<td>9 giờ</td>
		     				<td>くじ</td>
		     				</tr>
		     				<tr>
		     				<td>10 giờ</td>
		     				<td>じゅうじ</td>
		     				</tr>
		     				<tr>
		     				<td>11 giờ</td>
		     				<td>じゅういちじ</td>
		     				</tr>
		     				<tr>
		     				<td>12 giờ</td>
		     				<td>じゅうにじ</td>
		     				</tr>
		     				<tr>
		     				<td style="color:blue;">Mấy giờ</td>
		     				<td style="color:blue;">なんじ</td>
		     				</tr>
		     				</table>
							</div>
							<!--Phút-->
							<a href="javascript:void(0)" class="hien_an"><h3 align="left" style="color:blue; margin-left:10px;">PHÚT - 分</h3></a>
							<div id="test1">
							<table align="right" id="table" cellpadding="10" style="margin-left:5%;margin-right:5%;" width="90%">
		     				<th style="background-color:#E8E8E8;" width="45%">Số phút</th>
		     				<th style="background-color:#E8E8E8;" width="45%">Hiragana</th>
		     				<tr>
		     				<td>1 phút</td>
		     				<td>いっぷん</td>
		     				</tr>
		     				<tr>
		     				<td>2 phút</td>
		     				<td>にふん</td>
		     				</tr>
		     				<tr>
		     				<td>3 phút</td>
		     				<td>さんぷん</td>
		     				</tr>
		     				<tr>
		     				<td>4 phút</td>
		     				<td>よんぷん</td>
		     				</tr>
		     				<tr>
		     				<td>5 phút</td>
		     				<td>ごふん</td>
		     				</tr>
		     				<tr>
		     				<td>6 phút</td>
		     				<td>ろっぷん</td>
		     				</tr>
		     				<tr>
		     				<td>7 phút</td>
		     				<td>ななふん<br>しちふん</td>
		     				</tr>
		     				<tr>
		     				<td>8 phút</td>
		     				<td>はっぷん</td>
		     				</tr>
		     				<tr>
		     				<td>9 phút</td>
		     				<td>きゅうふん</td>
		     				</tr>
		     				<tr>
		     				<td>10 phút</td>
		     				<td>じゅっぷん<br>じっぷん</td>
		     				</tr>
		     				<tr>
		     				<td>15 phút</td>
		     				<td>じゅうごふん</td>
		     				</tr>
		     				<tr>
		     				<td>30 phút</td>
		     				<td>さんじゅっぷん<br>さんじっぷん<br>はん</td>
		     				</tr>
		     				<tr>
		     				<td style="color:blue;">Mấy phút</td>
		     				<td style="color:blue;">なんぷん</td>
		     				</tr>
		     				</table>
							</div>
							<!--Ngay thang-->
							<a href="javascript:void(0)" class="hien_an1"><h3 align="left" style="color:blue; margin-left:10px;">THỨ TRONG TUẦN - 曜日</h3></a>
							<div id="test2">
							<table align="right" id="table" cellpadding="10" style="margin-left:5%;margin-right:5%;" width="90%">
		     				<th style="background-color:#E8E8E8;" width="45%">Thứ</th>
		     				<th style="background-color:#E8E8E8;" width="45%">Hiragana</th>
		     				<tr>
		     				<td>Thứ 2</td>
		     				<td>げつようび</td>
		     				</tr>
		     				<tr>
		     				<td>Thứ 3</td>
		     				<td>かようび</td>
		     				</tr>
		     				<tr>
		     				<td>Thứ 4</td>
		     				<td>すいようび</td>
		     				</tr>
		     				<tr>
		     				<td>Thứ 5</td>
		     				<td>もくようび</td>
		     				</tr>
		     				<tr>
		     				<td>Thứ 6</td>
		     				<td>きんようび</td>
		     				</tr>
		     				<tr>
		     				<td>Thứ 7</td>
		     				<td>どようび</td>
		     				</tr>
		     				<tr>
		     				<td>Chủ nhật</td>
		     				<td>にちようび</td>
		     				</tr>
		     				<tr>
		     				<td style="color:blue;">Thứ mấy</td>
		     				<td style="color:blue;">なんようび</td>
		     				</tr>
		     				</table>
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