<?php
    //--- Giu gia tri cua form
	if ($info !== null) {
		foreach ($info as $info) { 
	$reading_id = array(
                        'name'        => 'reading_id',
                        'id'          => 'reading_id',
                        'size'        => '32',
                        'value'       => $info['reading_id'],
                        'readonly'    => 'readonly',
                        'type'        => 'hidden'
                    );
	}}
	$readingvocabulary_hiragana = array(
                        'name'        => 'readingvocabulary_hiragana',
                        'id'          => 'readingvocabulary_hiragana',
                        'size'        => '32',
                        'value'       => set_value('readingvocabulary_hiragana')
                    );
	$readingvocabulary_meaning = array(
                        'name'        => 'readingvocabulary_meaning',
                        'id'          => 'readingvocabulary_meaning',
                        'size'        => '32',
                        'value'       => set_value('readingvocabulary_meaning')
                    );
    $readingvocabulary_kanji = array(
                        'name'        => 'readingvocabulary_kanji',
                        'id'          => 'readingvocabulary_kanji',
                        'size'        => '32',
                        'value'       => set_value('readingvocabulary_kanji')
                    );        
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Add Reading Vocabulary</title>
	<link href="<?php echo base_url();?>public/css/admin/style_homepage.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<!--header-->
	<?php $this->load->view("admin/header_view");?>
	<!-- end-header-->
	<div id="content">
	<!-- top menu-->
	<?php $this->load->view("admin/topmenu_view");?>
	<!--end top-menu-->
	<div id="giua">
		<?php $this->load->view("admin/leftcontent_view");?>
		<div id="main-content">
		<div id="title">
		<h2>Add Reading Vocabulary</h2>
		</div>
		<div id="table-vocabulary">
		<center>
			<div class="error">
		        <ul>
		            <?php
		                echo validation_errors('<li>','</li>');
		                if($error!="" && !empty($error))
		                    echo $error;
		            ?>
		        </ul>
		    </div>
			<form name="addContent" id="addNewAdmin" action="" method="post" enctype="multipart-formdata">		        		        
		        <table  border="0" cellpadding="10" id="table1">
				<tr align="left">
					<td width="40%"></td>
					<td width="50%"><?php echo form_input($reading_id);?></td>
					<td width="10%"></td>
				</tr>
				<tr>
					<td width="40%">Hiragana: </td>
					<td width="50%"><?php echo form_input($readingvocabulary_hiragana);?></td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr>
					<td width="40%">Meaning:</td>
					<td width="50%"><?php echo form_input($readingvocabulary_meaning);?></td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr>
					<td width="40%">Kanji:</td>
					<td width="50%"><?php echo form_input($readingvocabulary_kanji);?></td>
					<td width="10%"></td>
				</tr>		        		        		        		
				<tr>
					<td width="40%">Type:</td>
					<td width="50%">
						<select name="readingvocabulary_type">
							<option value=""></option>		                    
		                    <option value="Noun">Noun</option>
		                    <option value="Verb">Verb</option>
		                    <option value="Adjective">Adjective</option>
		                    <option value="Adverb">Adverb</option>
		            	</select>
					</td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="ok" value="Add" /></td>
					<td></td>
				</tr>
		    </table>
		    </form>
			</center>
		</div>
		</div>
	</div>
	<div style="clear:both"></div>
	</div>
	<div style="clear:both"></div>
	<div id="footer">Copyright © FPT University</div>
</body>
</html>