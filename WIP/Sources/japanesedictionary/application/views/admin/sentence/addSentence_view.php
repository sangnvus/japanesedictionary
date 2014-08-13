<?php
    //--- Giu gia tri cua form
	$s_hiragana = array(
                        'name'        => 's_hiragana',
                        'id'          => 's_hiragana',
                        'size'        => '32',
                        'value'       => set_value('s_hiragana'),
                    );
	$s_romaji = array(
                        'name'        => 's_romaji',
                        'id'          => 's_romaji',
                        'size'        => '32',
                        'value'       => set_value('s_romaji'),
                    );
    $s_meaning = array(
                        'name'        => 's_meaning',
                        'id'          => 's_meaning',
                        'size'        => '32',
                        'value'       => set_value('s_meaning'),
                    ); 
    $s_kanji = array(
                        'name'        => 's_kanji',
                        'id'          => 's_kanji',
                        'size'        => '32',
                        'value'       => set_value('s_kanji'),
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
		<h2>Add Sentence</h2>
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
			<form name="addSentence" id="addNewAdmin" action="" method="post" enctype="multipart-formdata">		        		        		        
		        <label>Hiragana: </label><?php echo form_input($s_hiragana);?><font width="1%" style="color:red;">(*)</font><br /><br />		
		        <label>Romaji: </label><?php echo form_input($s_romaji);?><font width="1%" style="color:red;">(*)</font><br /><br />
		        <label>Meaning: </label><?php echo form_input($s_meaning);?><font width="1%" style="color:red;">(*)</font><br /><br />
		        <label>Kanji: </label><?php echo form_input($s_kanji);?><font width="1%" style="color:red;">(*)</font><br /><br>
		        <label>&nbsp;</label> <input type="submit" name="ok" value="Add" /><br />
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