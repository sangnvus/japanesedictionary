<div class="item-wrap">
	<a href="<?php echo base_url();?>index.php/Home/home/introduct" class="item" id="gth"><span class="label">Giới thiệu</span></a>
</div>
<div class="item-wrap">
	<a href="<?php echo base_url();?>index.php/Home/home/keyboard" class="item" id="key"><span class="label">Bàn phím, Font chữ &amp; Software</span></a>
</div>
<div class="item-wrap">
	<a href="<?php echo base_url();?>index.php/Home/home/guide" class="item" id="huongdan"><span class="label">Hướng dẫn học</span></a>
</div>
<?php 
	$user = $this->facebook->getUser();
	if ($user) { ?>
		<div class="item-wrap">
			<?php echo '<a href="'.base_url().'index.php/Home/user/viewProfile/'.$user.'" class="item" id="user"><span class="label">Trang cá nhân</span></a>';?>
		</div>		
	<?php } else { ?>
		<div class="item-wrap">
			<?php echo '<a href="'.base_url().'index.php/Home/user/viewProfile/'.$this->my_auth->u_id.'" class="item" id="user"><span class="label">Trang cá nhân</span></a>';?>
		</div>		
	<?php }	
 ?> 
<div class="item-wrap">
	<a href="<?php echo base_url();?>index.php/Home/home/minanonihon" class="item" id="minna"><span class="label">Minna no nihongo</span></a>
</div>
<div class="item-wrap">
	<a href="<?php echo base_url();?>index.php/Home/home/manga" class="item" id="manga"><span class="label">Kanji de Manga</span></a>
</div>
<div class="item-wrap">
	<a href="<?php echo base_url();?>index.php/Home/home/communicatedNihon" class="item" id="kaiwa"><span class="label">Tiếng Nhật giao tiếp</span></a>
</div>
				