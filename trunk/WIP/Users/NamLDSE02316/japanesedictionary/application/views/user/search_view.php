<div id="box-search">
<form action="<?php echo site_url('/Home/search/searchResults') ?>" method="GET">
	<input type="text" name="txtsearch" id="txtsearch" 
	value="<?php if(isset($keyword)){ echo $keyword;} ?>" maxlength="255" placeholder="Tìm kiếm">
	<select id="box-select" name="optionSearch" onchange="changePlaceholder()">
	<?php if (isset($optionSearch)) { ?>			
		<?php if ($optionSearch === "sentence") {?>
		<option value="sentence" <?php echo "selected"; ?>>Câu ví dụ</option>
		<?php }else {?>
		<option value="sentence">Câu ví dụ</option> 
		<?php } ?>
		<?php if ($optionSearch === "conversation") {?>
		<option value="conversation" <?php echo "selected"; ?>>Hội thoại</option>
		<?php }else {?>
		<option value="conversation">Hội thoại</option> 
		<?php } ?>
		<?php if ($optionSearch === "video") {?>
		<option value="video" <?php echo "selected"; ?>>Video</option>
		<?php }else {?>
		<option value="video">Video</option> 
		<?php } ?>	
		<?php if ($optionSearch === "grammar") {?>
		<option value="grammar" <?php echo "selected"; ?>>Ngữ pháp</option>
		<?php }else {?>
		<option value="grammar">Ngữ pháp</option> 
		<?php } ?>		
		<?php if ($optionSearch === "specialized") {?>
		<option value="specialized" <?php echo "selected"; ?>>Tiếng Nhật chuyên ngành</option>
		<?php }else {?>
		<option value="specialized">Tiếng Nhật chuyên ngành</option> 
		<?php } ?>							
		<?php }else {?>
		<option value="sentence">Câu ví dụ</option>
		<option value="conversation">Hội thoại</option>
		<option value="video">Video</option>
		<option value="grammar">Ngữ pháp</option>
		<option value="specialized">Tiếng Nhật chuyên ngành</option>
		<?php } ?>
	</select>
	<input type="submit" name="btnSearch" id="btnSearch" value="Search">
	</form>		
	<br>
	<br>
</div>	