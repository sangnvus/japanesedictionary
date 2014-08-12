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
	<title></title>
</head>
<body>
<div class="container">
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
							<div class="post hentry">
<h3 style="color:blue;">Tổng hợp đầy đủ giáo trình Minna no nihongo みんなの日本語 - Giáo trình tiếng Nhật cho mọi người</h3>
<div>
<table cellpadding="0" cellspacing="0" style="float: left; margin-right: 1em; text-align: left;"><tbody>
<tr><td style="text-align: center;"><img alt="Tổng hợp đầy đủ giáo trình Minna no nihongo みんなの日本語 - Giáo trình tiếng Nhật cho mọi người" border="0" src="<?php echo base_url();?>public/image/minna1.png" height="200" title="Tổng hợp đầy đủ giáo trình Minna no nihongo みんなの日本語 - Giáo trình tiếng Nhật cho mọi người" width="140"></td></tr>
<tr><td class="tr-caption" style="text-align: center;"><i><span style="font-size: x-small;">日本語能力試験問題集<br>N2聴解<br>スピードマスター</span></i></td></tr>
</tbody></table>
<div style="text-align: left;">
</div>
<div style="text-align: justify; margin-left:40px;">
<div style="text-align: left;">
Giáo trình Minna no Nihongo là bộ sách giáo trình uy tín và 
thông dụng nhất trong các trường dạy tiếng Nhật ở Việt Nam 
cũng như trên thế giới, dưới đây là toàn bộ phần Audio 
(chất lượng gốc) và Textbook (pdf) của 50 bài trong 
Giáo trình Minna I và II của trình độ Sơ cấp, 
ngoài ra còn có phần Mondai, Choukai Tasuku kèm Audio 
và nhiều sách phụ trợ khác đi kèm giáo trình. 
Phần Video Kaiwa hội thoại của 50 bài khóa các bạn xem </div><br>
<div style="text-align: left;">
<div>
1. Minna no Nihongo I - Honsatsu <br>
<br>
2. Minna no Nihongo II - Honsatsu <br>
<br>
3. Minna - Từ mới 50 bài (FPT University)<br>
<br>
4. Minna - Ngữ pháp 50 bài (FPT University)<br>
<br>
5. Minna no Nihongo I - Bản dịch tiếng Việt <br>
<br>
6. Minna no Nihongo II - Bản dịch tiếng Việt <br>
<br>
7. Minna no Nihongo I - Translations &amp; Grammatical Notes <br>
<br>
8. Minna no Nihongo II - Translations &amp; Grammatical Notes <br>
<br>
9. Minna no Nihongo I - Choukai Tasuku <br>
<br>
10. Minna no Nihongo II - Choukai Tasuku <br>
<br>
11. Minna no Nihongo I - Hyoujun Mondaishuu <br>
<br>
12. Minna no Nihongo II - Hyoujun Mondaishuu <br>
<br>
13. Minna no Nihongo I - Bunkei Renshuuchou <br>
<br>
14. Minna no Nihongo II - Bunkei Renshuuchou <br>
<br>
15. Minna no Nihongo I - Shokyuu de Yomeru Topikku 25 <br>
<br>
16. Minna no Nihongo II - Shokyuu de Yomeru Topikku 25 <br>
<br>
17. Minna no Nihongo I - Kanji Eigoban <br>
<br>
18. Minna no Nihongo II - Kanji Eigoban <br>
<br>
19. Minna no Nihongo I - Kanji Renshuuchou <br>
<br>
20. Minna no Nihongo II - Kanji Renshuuchou <br>
<br>
21. Minna no Nihongo I - Kanji Eigoban Sankousetsu (Booklet)&nbsp; <br>
<br>
22. Minna no Nihongo II - Kanji Eigoban Sankousetsu (Booklet)&nbsp; <br>
<br>
23. Minna no Nihongo - Yashashii Sakubun<br>
---------------------------------------------
</div>
<span style="color: #990000;"><u><b>LINK DOWNLOAD </b></u></span><span style="color: #990000;"><u><b>:</b></u></span><br>
<b>1. Mediafire : </b><a href="http://www.mediafire.com/?6x7w2ezy9uaej" target="_blank">Click here</a><br>
<b>2. Fshare : </b><a href="http://www.fshare.vn/folder/P8GB7KUUSP/" target="_blank">Click here</a><br>
<br>
&nbsp;---------------------------------------------<br>
<div style="text-align: left;">
<u>Password unlock file</u> : haybietchiase</div>
<div style="text-align: left;">
<br></div>
</div></div></div></div></div>
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