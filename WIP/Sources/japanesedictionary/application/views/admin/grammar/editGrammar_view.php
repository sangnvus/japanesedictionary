<?php
    //--- Giu gia tri cua form
	$g_id = array(
	                        'name'        => 'g_id',
	                        'id'          => 'g_id',
	                        'size'        => '32',
	                        'value'       => $info['g_id'],
	                        'readonly'    => 'readonly',
	                        'type' => 'hidden'
	                    );
	$g_hiragana = array(
                        'name'        => 'g_hiragana',
                        'id'          => 'g_hiragana',
                        'size'        => '32',
                        'value'       => $info['g_hiragana'],
                    );
	$g_romaji = array(
                        'name'        => 'g_romaji',
                        'id'          => 'g_romaji',
                        'size'        => '32',
                        'value'       => $info['g_romaji'],
                    );
	$g_meaning = array(
                        'name'        => 'g_meaning',
                        'id'          => 'g_meaning',
                        'size'        => '32',
                        'value'       => $info['g_meaning']
                    );
	$g_use = array(
                        'name'        => 'g_use',
                        'id'          => 'g_use',
						'cols' => '25',
						'rows' => '10',
                        'value'       => $info['g_use']
                    );
	$g_status = array(
                        'name'        => 'g_status',
                        'id'          => 'g_status',
                        'size'        => '32',
                        'value'       => $info['g_status']
                    ); 
    $g_lesson = array(
                        'name'        => 'g_lesson',
                        'id'          => 'g_lesson',
                        'size'        => '32',
                        'value'       => $info['g_lesson']
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
		<h2>Edit Grammar</h2>
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
			<form name="addGrammar" id="addNewAdmin" action="" method="post" enctype="multipart-formdata">		        		        		        
				<label></label><?php echo form_input($g_id);?><br />		
		        <label>Hiragana: </label><?php echo form_input($g_hiragana);?><font width="1%" style="color:red;">(*)</font><br /><br />		
		        <label>Romaji: </label><?php echo form_input($g_romaji);?><font width="1%" style="color:red;">(*)</font><br /><br />
		        <label>Level: </label>
		        	<select name="g_level">
		        			<option value="<?php echo $info['g_level'];?>"><?php echo $info['g_level'];?></option>                         
                            <option value="N1">N1</option>
                            <option value="N2">N2</option>
                            <option value="N3">N3</option>
                            <option value="N4">N4</option>
                            <option value="N5">N5</option>
                    </select><font width="1%" style="color:red;">(*)</font><br /><br />
		        <label>Meaning: </label><?php echo form_input($g_meaning);?><font width="1%" style="color:red;">(*)</font><br /><br />
		        <label>Use: </label><?php echo form_textarea($g_use);?><font width="1%" style="color:red;">(*)</font><br /><br />
		        <label>Lesson: </label><?php echo form_input($g_lesson);?><br /><br />
		        <label>&nbsp;</label> <input type="submit" name="ok" value="Edit" /><br />
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