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
							<div align="left"><a style="font-size:20px;" id="btnSearch" href="<?php echo base_url();?>index.php/Home/home/review">Quay lại</a></div>
							<div><h2 style="color:blue;margin-top:20px;">Khoảng thời gian - 時間</h2></div>
		     				<a href="javascript:void(0)" class="an_hien"><h3 align="left" style="color:blue; margin-left:10px;">NGÀY - 日</h3></a>
							<div id="test">
							<table align="left" id="table1" cellpadding="10" style="margin-left:5%;margin-right:5%;" width="90%">
		     				<th style="background-color:#E8E8E8;" width="45%">Ngày</th>
		     				<th style="background-color:#E8E8E8;" width="45%">Hiragana</th>
		     				<tr>
		     				<td>Ngày 1</td>
		     				<td>ついたち</td>
		     				</tr>
		     				<tr>
		     				<td>Ngày 2</td>
		     				<td>ふつか</td>
		     				</tr>
		     				<tr>
		     				<td>Ngày 3</td>
		     				<td>みっか</td>
		     				</tr>
		     				<tr>
		     				<td>Ngày 4</td>
		     				<td>よっか</td>
		     				</tr>
		     				<tr>
		     				<td>Ngày 5</td>
		     				<td>いつか</td>
		     				</tr>
		     				<tr>
		     				<td>Ngày 6</td>
		     				<td>むいか</td>
		     				</tr>
		     				<tr>
		     				<td>Ngày 7</td>
		     				<td>なのか</td>
		     				</tr>
		     				<tr>
		     				<td>Ngày 8</td>
		     				<td>ようか</td>
		     				</tr>
		     				<tr>
		     				<td>Ngày 9</td>
		     				<td>ここのか</td>
		     				</tr>
		     				<tr>
		     				<td>Ngày 10</td>
		     				<td>とおか</td>
		     				</tr>
		     				<tr>
		     				<td>Ngày 11</td>
		     				<td>じゅういちにち</td>
		     				</tr>
		     				<tr>
		     				<td>Ngày 12</td>
		     				<td>じゅうににち</td>
		     				</tr>
		     				<tr>
		     				<td>Ngày 13</td>
		     				<td>じゅうさんにち</td>
		     				</tr>
		     				<tr>
		     				<td>Ngày 14</td>
		     				<td>じゅうよっか</td>
		     				</tr>
		     				<tr>
		     				<td>Ngày 15</td>
		     				<td>じゅうごにち</td>
		     				</tr>
		     				<tr>
		     				<td>Ngày 16</td>
		     				<td>じゅうろくにち</td>
		     				</tr>
		     				<tr>
		     				<td>Ngày 17</td>
		     				<td>じゅうしちにち</td>
		     				</tr>
		     				<tr>
		     				<td>Ngày 18</td>
		     				<td>じゅうはちにち</td>
		     				</tr>
		     				<tr>
		     				<td>Ngày 19</td>
		     				<td>じゅうくにち</td>
		     				</tr>
		     				<tr>
		     				<td>Ngày 20</td>
		     				<td>はつか</td>
		     				</tr>
		     				<tr>
		     				<td>Ngày 21</td>
		     				<td>にじゅういちにち</td>
		     				</tr>
		     				<tr>
		     				<td>Ngày 22</td>
		     				<td>にじゅうににち</td>
		     				</tr>
		     				<tr>
		     				<td>Ngày 23</td>
		     				<td>にじゅうさんにち</td>
		     				</tr>
		     				<tr>
		     				<td>Ngày 24</td>
		     				<td>にじゅうよっか</td>
		     				</tr>
		     				<tr>
		     				<td>Ngày 25</td>
		     				<td>にじゅうごにち</td>
		     				</tr>
		     				<tr>
		     				<td>Ngày 26</td>
		     				<td>にじゅうろくにち</td>
		     				</tr>
		     				<tr>
		     				<td>Ngày 27</td>
		     				<td>にじゅうしちにち</td>
		     				</tr>
		     				<tr>
		     				<td>Ngày 28</td>
		     				<td>にじゅうはちにち</td>
		     				</tr>
		     				<tr>
		     				<td>Ngày 29</td>
		     				<td>にじゅうくにち</td>
		     				</tr>
		     				<tr>
		     				<td>Ngày 30</td>
		     				<td>さんじゅうにち</td>
		     				</tr>
		     				<tr>
		     				<td>Ngày 31</td>
		     				<td>さんじゅういちにち</td>
		     				</tr>
		     				<tr>
		     				<td style="color:blue;">Ngày mấy</td>
		     				<td style="color:blue;">なんにち</td>
		     				</tr>
		     				</table>
							</div>
							<!--Tháng-->
							<a href="javascript:void(0)" class="hien_an"><h3 align="left" style="color:blue; margin-left:10px;">THÁNG - 月</h3></a>
							<div id="test1">
							<table align="right" id="table1" cellpadding="10" style="margin-left:5%;margin-right:5%;" width="90%">
		     				<th style="background-color:#E8E8E8;" width="45%">Tháng</th>
		     				<th style="background-color:#E8E8E8;" width="45%">Hiragana</th>
		     				<tr>
		     				<td>Tháng 1</td>
		     				<td>いちがつ</td>
		     				</tr>
		     				<tr>
		     				<td>Tháng 2</td>
		     				<td>にがつ</td>
		     				</tr>
		     				<tr>
		     				<td>Tháng 3</td>
		     				<td>さんがつ</td>
		     				</tr>
		     				<tr>
		     				<td>Tháng 4</td>
		     				<td>しがつ</td>
		     				</tr>
		     				<tr>
		     				<td>Tháng 5</td>
		     				<td>ごがつ</td>
		     				</tr>
		     				<tr>
		     				<td>Tháng 6</td>
		     				<td>ろくがつ</td>
		     				</tr>
		     				<tr>
		     				<td>Tháng 7</td>
		     				<td>しちがつ</td>
		     				</tr>
		     				<tr>
		     				<td>Tháng 8</td>
		     				<td>はちがつ</td>
		     				</tr>
		     				<tr>
		     				<td>Tháng 9</td>
		     				<td>くがつ</td>
		     				</tr>
		     				<tr>
		     				<td>Tháng 10</td>
		     				<td>じゅうがつ</td>
		     				</tr>
		     				<tr>
		     				<td>Tháng 11</td>
		     				<td>じゅういちがつ</td>
		     				</tr>
		     				<tr>
		     				<td>Tháng 12</td>
		     				<td>じゅうにがつ</td>
		     				</tr>
		     				<tr>
		     				<td style="color:blue;">Tháng mấy</td>
		     				<td style="color:blue;">なんがつ</td>
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