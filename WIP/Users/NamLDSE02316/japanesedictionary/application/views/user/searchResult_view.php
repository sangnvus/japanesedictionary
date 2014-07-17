<?php 
function getAudioLink($word) 
{
	$linkPattern = 'https://translate.google.com/translate_tts?ie=UTF-8&q={@word}&tl=ja&total=1&idx=0&textlen=5&client=t&prev=input';
	$link = str_replace('{@word}', urlencode($word), $linkPattern);
	return $link;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet" type="text/css" />
	<title></title>
</head>
<body>
<div id="container">
		<?php $this->load->view("user/top_view");?> 
	<div id="content">
		<?php $this->load->view("user/mainmenu_view");?>
		<div id="noidung">
			<center>
				<?php $this->load->view("user/search_view");?></center>
				<div id="main-content">
					<div id="left-content">																
					<!-- Search by Vocabulary-->
					<?php if ($optionSearch === "sentence") { ?>
						<div id="intro-content">
							<?php if ($vocab !== null) {?>
							<div id="head">
								<center><h1>Nghĩa của <i><?php echo $vocab->v_hiragana; ?></i></h1></center>
							</div>							
							<div id="search-result">
									<table width="100%" cellpadding="1" cellspacing="0">
										<tbody>
											<tr><td>&nbsp;Nhật - Việt</td></tr>
										</tbody>
									</table>									
									<div class="word_info">
										<span><b><font color="red"><?php echo $vocab->v_hiragana; ?></font></b></span>
									</div>
									<div class="word_meanings">
										<ol>
										<?php
											foreach ($meanings as $row){
											?>
											<li>
												【 <span><b><font color="red"><?php echo $row->m_kanji ?></font></b></span> 】 
												<span class="pos"><b>(<?php echo $row->m_category; ?>)</b></span>
												<span class="gloss"><?php echo $row->m_meaningvn; ?></span>
												<?php if ($row->sentences !== null && is_array($row->sentences)) { ?>
												<ul>
												<?php foreach ($row->sentences as $sentence) { ?>
													<li>
														<?php echo $sentence->s_kanji; ?>
														: <?php echo $sentence->s_meaning; ?>
													</li>
												<?php } ?>
												</ul>
												<?php } ?>
											</li>
											<?php } ?>	
										</ol>
										<div style="clear:both"></div>
									</div>	
									<!--end - word_meanings-->										
									</div>													
									<?php }
										else {?>
										<div id="error">
											Không có kết quả trong cơ sở dữ liệu!
										</div>
									<?php } ?>
						</div>
						<?php } ?>
					<!-- End Search by Vocabulary-->	
					<!-- Search by Conversation-->
					<?php if($optionSearch === "conversation"){ ?>
					<div id="intro-content">
						<?php if($conversationcontents !==null){ ?>
						<div id="head">
								<center><h1>Hội thoại liên quan ~<i><?php echo $keyword; ?></i>~</h1></center>
						</div>
						<div id="search-result">
							<?php foreach ($conversationcontents as $conversationcontent) { ?>														
							<div id="panel-conversation">
								<div id="conversation-list">
									<?php echo $conversationcontent->con_title; ?>
								</div>
								<div id="conversation-list-body">
									<div class="conversation-meaning">
										<ul>
											<li>
												<?php echo $conversationcontent->con_hiragana; ?><br><br>
												<?php echo $conversationcontent->con_meaning; ?>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
						<?php }else {?>
								<div id="error">
									Không có kết quả trong cơ sở dữ liệu!
								</div>
								<?php } ?>
					</div>
					<?php } ?>
					<!-- End Search by Conversation-->		
					<!--Search by Video-->		
						<?php if ($optionSearch === "video") {?>
						<div id="intro-content">
							<?php if ($videos !== null) {?>
								<div id="head">
									<center><h1>Kết quả cho ~<i><?php echo $keyword; ?></i>~</h1></center>
								</div>
								<div id="search-result">
								<ol>
									<?php foreach ($videos as $video) { ?>
									<li class="video-title">
										<b><?php echo $video->vi_title; ?></b><br/>
										<a href="<?php echo $video->vi_link; ?>"><?php echo $video->vi_link; ?></a>
									</li>
									<?php } ?>
								</ol>
								</div>
							<?php }
									else {?>
									<div id="error">
										Không có kết quả trong cơ sở dữ liệu!
									</div>
									<?php } ?>
						</div>
						<?php } ?>
					<!-- End Search by Video-->	
					<!-- Search by Grammar-->
					<?php if ($optionSearch === "grammar") {?>										
					<div id="intro-content">
						<?php if ($grammar !== null) {?>
							<div id="head">
								<center><h1>~<i><?php echo $keyword; ?></i>~</h1></center>
							</div>
							<div id="search-result">
								<?php 
								foreach ($grammar as $row) {
									?>
									<div id="panel-grammar">
									<div id="grammar-list">
										<?php echo $row->g_level; ?>:  <?php echo $row->g_hiragana; ?> 
									</div>
									<div id="grammar-list-body">
										<div class="grammar-meaning">
											<div class="imi">意味 (Ý nghĩa)： <?php echo $row->g_meaning; ?></div>
											<div class="rei">例 (Ví dụ)：</div>
											<div class="rei-sentence">
											<?php if ($row->sentences !== null && is_array($row->sentences)) { ?>
												<ol>
													<?php 
													foreach ($row->sentences as $sentence) {																											
													 ?>
													 <li><?php echo $sentence->s_hiragana; ?><br/>
													 	<?php echo $sentence->s_meaning; ?>
													 </li>
													 <?php } ?>
												</ol>
												<?php } ?>
											</div>	
											<div class="setsume">
												<b>説明 (Giải thích):</b><br/>
												<?php echo $row->g_use; ?>
											</div>						
										</div>
									</div>
									</div>
								<?php }?>								
							</div>
						<?php }
									else {?>
									<div id="error">
										Không có kết quả trong cơ sở dữ liệu!
									</div>
									<?php } ?>
					</div>
					<?php }?>
					<!-- End Search by Grammar-->	

					</div>
					<center><?php $this->load->view("user/popup_view");?></center>
				</div>
			<div style="clear:both"></div>
		</div>
	</div>
		<center><?php $this->load->view("user/footer_view");?></center>
</div>
	
</body>
</html>