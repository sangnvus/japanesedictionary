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
<h3 style="color:blue;">Tổng hợp tài liệu luyện thi JLPT N3</h3>
<div>
<table cellpadding="0" cellspacing="0" style="float: left; margin-right: 1em; text-align: left;"><tbody>
<tr><td style="text-align: center;"><a href="http://4.bp.blogspot.com/-HzTeZPygvKQ/Ua2D9njh8tI/AAAAAAAAB1E/uigx9G0N1jI/s1600/N3.Choukai.Speed.Master.studyjapanese.net.jpg" imageanchor="1" style="clear: left; margin-bottom: 1em; margin-left: auto; margin-right: auto;"><img border="0" src="http://4.bp.blogspot.com/-HzTeZPygvKQ/Ua2D9njh8tI/AAAAAAAAB1E/uigx9G0N1jI/s200/N3.Choukai.Speed.Master.studyjapanese.net.jpg" height="200" width="141"></a></td></tr>
<tr><td class="tr-caption" style="text-align: center;"><i><span style="font-size: x-small;">日本語能力試験問題集<br>N3聴解<br>スピードマスター</span></i></td></tr>
</tbody></table>
<div style="text-align: left;">
</div>
<div style="text-align: justify; margin-left:40px;">
<div style="text-align: left;">
Dưới đây là tất cả những tài liệu luyện thi năng lực tiếng Nhật cấp độ N3. Gồm có :&nbsp;</div><br>
<div style="text-align: left;">
1. 日本語総まとめN3 文法 - Soumatome N3 Bunpou<br><br>
2. 日本語総まとめ N3 漢字 - Soumatome N3 Kanji<br><br>
3. 日本語総まとめ N3 語彙 - Soumatome N3 Goi<br><br>
4. 日本語総まとめ N3 聴解 - Soumatome N3 Choukai<br><br>
5. 日本語総まとめ N3 読解 - Soumatome N3 Dokkai<br><br>
6. 日本語能力試験N3[読解・言語知識] 対策問題・要点整理<br><br>
7. 日本語能力試験 模試と対策 N3 Textbook+Audio
<p style="margin-left:112px;">8. 耳から覚える日本語能力試験N3語彙 トレーニングTextbook+AudioCD
<p style="margin-left:112px;">9. 耳から覚える日本語能力試験 N3 文法 トレーニングTextbook+AudioCD
<p style="margin-left:112px;">10. 耳から覚える日本語能力試験 N3 聴解 トレーニングTextbook+AudioCD
<p style="margin-left:112px;">11. 日本語能力試験問題集 N3語彙 スピードマスター (TextBook + AudioCD)
<p style="margin-left:112px;">12. N3聴解 スピードマスター (TextBook + 2AudioCDs)
<p style="margin-left:112px;">13. N3文法 スピードマスター TextBook | N3 Speed master Goi, Choukai và Bunpou
<p style="margin-left:112px;">14. 日本語能力試験 N3 予想問題集 - Yosou Mondaishuu N3
<p style="margin-left:112px;">15.&nbsp;パターン徹底ドリル N3 -&nbsp;Pattern-Betsu Tettei Drill N3<br>
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