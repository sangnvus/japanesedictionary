<?php
    //--- Giu gia tri cua form
	$g_hiragana = array(
                        'name'        => 'g_hiragana',
                        'id'          => 'g_hiragana',
                        'size'        => '32',
                        'value'       => set_value('g_hiragana'),
                    );
	$g_romaji = array(
                        'name'        => 'g_romaji',
                        'id'          => 'g_romaji',
                        'size'        => '32',
                        'value'       => set_value('g_romaji'),
                    );
	$g_level = array(
                        'name'        => 'g_level',
                        'id'          => 'g_level',
                        'size'        => '32',
                        'value'       => set_value('g_level'),
                    );
	$g_meaning = array(
                        'name'        => 'g_meaning',
                        'id'          => 'g_meaning',
                        'size'        => '32',
                        'value'       => set_value('g_meaning'),
                    );
	$g_use = array(
                        'name'        => 'g_use',
                        'id'          => 'g_use',
						'cols' => '25',
						'rows' => '10',
                        'value'       => set_value('g_use'),
                    );
	$g_status = array(
                        'name'        => 'g_status',
                        'id'          => 'g_status',
                        'size'        => '32',
                        'value'       => set_value('g_status'),
                    ); 
    $reading_id = array(
                        'name'        => 'reading_id',
                        'id'          => 'reading_id',
                        'size'        => '32',
                        'value'       => set_value('reading_id'),
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
		<h2>Add Grammar</h2>
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
			<form name="addGrammar" id="addGrammar" action="" method="post" enctype="multipart-formdata">		        		        		        
		        <label>g_hiragana: </label><?php echo form_input($g_hiragana);?><br />		
		        <label>g_romaji: </label><?php echo form_input($g_romaji);?><br />
		        <label>g_level: </label><?php echo form_input($g_level);?><br />
		        <label>g_meaning: </label><?php echo form_input($g_meaning);?><br />
		        <label>g_use: </label><?php echo form_textarea($g_use);?><br />
		        <label>g_status: </label><?php echo form_input($g_status);?><br />
		        <label>reading_id: </label><?php echo form_input($reading_id);?><br />
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