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
					<?php if ($optionSearch === "sentence") { ?>											
					<!-- Search by Vocabulary-->
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
											<?php
												}
											?>	
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
									<?php									
										}
									 ?>
						</div>
					<!-- End Search by Vocabulary-->
					<?php }
					?>

					<?php if ($optionSearch === "grammar") {?>
					<!--Search by Grammar-->					
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
											<div>意味： <?php echo $row->g_meaning; ?></div>											
										</div>
									</div>
									</div>
								<?php
								}
								 ?>								
							</div>
						<?php }?>
					</div>
					<!--End Search by Grammar-->
					<?php }?>

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