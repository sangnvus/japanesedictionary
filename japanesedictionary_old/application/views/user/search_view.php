<div id="box-search">
<form action="<?php echo site_url('/Home/search/searchResults') ?>" method="GET">
	<input type="text" name="txtsearch" id="txtsearch" 
	value="<?php if(isset($keyword)){ echo $keyword;} ?>" maxlength="255" placeholder="Tìm kiếm">
	<select id="box-select" name="optionSearch">
		<option value="sentence">Câu ví dụ</option>
		<option value="conversation">Hội thoại</option>
		<option value="video">Video</option>
		<option value="grammar">Ngữ pháp</option>
		<option value="specialized">Tiếng Nhật chuyên ngành</option>
	</select>
	<input type="submit" name="btnSearch" id="btnSearch" value="Search">
	</form>		
	<br>
	<br>
</div>	