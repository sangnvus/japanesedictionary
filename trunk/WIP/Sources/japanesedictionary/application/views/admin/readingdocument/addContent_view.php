<?php
    //--- Giu gia tri cua form
	$reading_id = array(
                        'name'        => 'reading_id',
                        'id'          => 'reading_id',
                        'size'        => '32',
                        'value'       => $info['reading_id'],
                        'readonly'   => 'readonly'
                    );
	$reading_title = array(
                        'name'        => 'reading_title',
                        'id'          => 'reading_title',
                        'size'        => '32',
                        'value'       => $info['reading_title'],
                        'readonly'   => 'readonly'
                    );
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
    $readingvocabulary_type = array(
                        'name'        => 'readingvocabulary_type',
                        'id'          => 'readingvocabulary_type',
                        'size'        => '32',
                    );              
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Admin Page</title>
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
		<h2>Add Content</h2>
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
					<td width="40%">ID :</td>
					<td width="50%"><?php echo form_input($reading_id);?></td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr>
					<td width="40%">Title :</td>
					<td width="50%"><?php echo form_input($reading_title);?></td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr>
					<td width="40%">Level:</td>
					<td width="50%">
						<select name="reading_level">
							<option value="<?php echo $info['reading_level'];?>"><?php echo $info['reading_level'];?></option>
						</select>
					</td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
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
		                    <option value="N">N</option>
		                    <option value="V">V</option>
		                    <option value="Adj">Adj</option>
		                    <option value="Adv">Adv</option>
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