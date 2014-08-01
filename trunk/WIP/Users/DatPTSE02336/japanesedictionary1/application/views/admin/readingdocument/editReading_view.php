<?php
    //--- Giu gia tri cua form
if (isset($info['readingvocabulary_id'])) {
	$reading_id = array(
                        'name'        => 'reading_id',
                        'id'          => 'reading_id',
                        'size'        => '32',
                        'value'       => $info['reading_id'],
                        'readonly'    => 'readonly'
                    );
	$reading_title = array(
                        'name'        => 'reading_title',
                        'id'          => 'reading_title',
                        'size'        => '32',
                        'value'       => $info['reading_title']
                    ); 
    $reading_level = array(
                        'name'        => 'reading_level',
                        'id'          => 'reading_level',
                        'size'        => '32',
                        'value'       => $info['reading_level']
                    );
    

    $readingvocabulary_id = array(
                        'name'        => 'readingvocabulary_id',
                        'id'          => 'readingvocabulary_id',
                        'size'        => '32',
                        'value'       => $info['readingvocabulary_id'],
                        'readonly'    => 'readonly'
                    );
    $readingvocabulary_hiragana = array(
                        'name'        => 'readingvocabulary_hiragana',
                        'id'          => 'readingvocabulary_hiragana',
                        'size'        => '32',
                        'value'       => $info['readingvocabulary_hiragana']
                    );
    $readingvocabulary_meaning = array(
                        'name'        => 'readingvocabulary_meaning',
                        'id'          => 'readingvocabulary_meaning',
                        'size'        => '32',
                        'value'       => $info['readingvocabulary_meaning']
                    );
    $readingvocabulary_kanji = array(
                        'name'        => 'readingvocabulary_kanji',
                        'id'          => 'readingvocabulary_kanji',
                        'size'        => '32',
                        'value'       => $info['readingvocabulary_kanji']
                    );
    $reading_type = array(
                        'name'        => 'reading_type',
                        'id'          => 'reading_type',
                        'size'        => '32',
                        'value'       => $info['reading_type']
                    ); 
} else {
	$reading_id = array(
                        'name'        => 'reading_id',
                        'id'          => 'reading_id',
                        'size'        => '32',
                        'value'       => $info['reading_id'],
                        'readonly'    => 'readonly'
                    );
    $reading_title = array(
                        'name'        => 'reading_title',
                        'id'          => 'reading_title',
                        'size'        => '32',
                        'value'       => $info['reading_title']
                    ); 
    $reading_level = array(
                        'name'        => 'reading_level',
                        'id'          => 'reading_level',
                        'size'        => '32',
                        'value'       => $info['reading_level']
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
    $reading_type = array(
                        'name'        => 'reading_type',
                        'id'          => 'reading_type',
                        'size'        => '32',
                        'value'       => 'vocabulary',
                        'readonly'    => 'readonly'
                    ); 
}

	                                                                              
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
        <?php 
            if (isset($info['readingvocabulary_id'])) { ?>
		      <h2>Edit Reading Vocabulary</h2>
        <?php } else {
             echo "<h2>Edit Reading</h2>";   
                     }
                     ?>  
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
			<form name="editReading" id="addNewAdmin" action="" method="post" enctype="multipart-formdata">							
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
                    <td width="50%"><?php echo form_input($reading_level);?></td>
                    <td width="10%"><font width="1%" style="color:red;">(*)</font></td>
                </tr>
                <?php 
                        if (isset($info['readingvocabulary_id'])) { ?>
                <tr>
                    <td width="40%">Readingvocabulary_id: </td>
                    <td width="50%"><?php echo form_input($readingvocabulary_id);?></td>
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
                    <td width="50%"><?php echo form_input($reading_type);?></td>
                    <td width="10%"></td>
                </tr>
                <?php } else {
                        }
                     ?>     
                <tr>
                    <td></td>
                    <td><input type="submit" name="ok" value="Edit" /></td>
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