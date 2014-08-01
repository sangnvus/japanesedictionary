<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php echo base_url();?>public/js/javascript.js"></script>
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
<h3 style="color:blue;">Tổng hợp tài liệu luyện thi JLPT N4&N5</h3>
<div>
<table cellpadding="0" cellspacing="0" style="float: left; margin-right: 1em; text-align: left;"><tbody>
<tr><td style="text-align: center;"><a href="http://4.bp.blogspot.com/-hoThDGlDiFA/UbmRTDSEbtI/AAAAAAAAB1U/V2hS4PrGISc/s1600/Nihongo-challenge-Bunpou-to-Yomu-N4.jpg" imageanchor="1" style="clear: left; margin-bottom: 1em; margin-left: auto; margin-right: auto;"><img alt="Nihongo Challenge N4 Bunpou to Yomu Renshuu" border="0" src="http://4.bp.blogspot.com/-hoThDGlDiFA/UbmRTDSEbtI/AAAAAAAAB1U/V2hS4PrGISc/s200/Nihongo-challenge-Bunpou-to-Yomu-N4.jpg" height="200" title="Nihongo Challenge N4 Bunpou to Yomu Renshuu" width="156"></a></td></tr>
<tr><td class="tr-caption" style="text-align: center;"><i><span style="font-size: x-small;">日本語能力試験問題集<br>N4&N5聴解<br>スピードマスター</span></i></td></tr>
</tbody></table>
<div style="text-align: left;">
</div>
<div style="text-align: justify; margin-left:40px;">
<div style="text-align: left;">
Dưới đây là tất cả những tài liệu luyện thi năng lực tiếng Nhật cấp độ N4&N5. Gồm có :&nbsp;</div><br>
<div style="text-align: left;">
1. 日本語総まとめN4&N5 文法 - Soumatome N4&N5 Bunpou<br><br>
2. 日本語総まとめ N4&N5 漢字 - Soumatome N4&N5 Kanji<br><br>
3. 日本語総まとめ N4&N5 語彙 - Soumatome N4&N5 Goi<br><br>
4. 日本語総まとめ N4&N5 聴解 - Soumatome N4&N5 Choukai<br><br>
5. 日本語総まとめ N4&N5 読解 - Soumatome N4&N5 Dokkai<br><br>
6. 日本語能力試験N4&N5[読解・言語知識] 対策問題・要点整理<br><br>
7. 日本語能力試験 模試と対策 N4&N5 Textbook+Audio
<p style="margin-left:112px;">8. 耳から覚える日本語能力試験N4&N5語彙 トレーニングTextbook+AudioCD
<p style="margin-left:112px;">9. 耳から覚える日本語能力試験 N4&N5 文法 トレーニングTextbook+AudioCD
<p style="margin-left:112px;">10. 耳から覚える日本語能力試験 N4&N5 聴解 トレーニングTextbook+AudioCD
<p style="margin-left:112px;">11. 日本語能力試験問題集 N4&N5語彙 スピードマスター (TextBook + AudioCD)
<p style="margin-left:112px;">12. N4&N5聴解 スピードマスター (TextBook + 2AudioCDs)
<p style="margin-left:112px;">13. N4&N5文法 スピードマスター TextBook | N4&N5 Speed master Goi, Choukai và Bunpou
<p style="margin-left:112px;">14. 日本語能力試験 N4&N5 予想問題集 - Yosou Mondaishuu N4&N5
<p style="margin-left:112px;">15.&nbsp;パターン徹底ドリル N4&N5 -&nbsp;Pattern-Betsu Tettei Drill N4&N5<br>
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
</div></div></div></div>
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