<?php
    //--- Giu gia tri cua form
    $v_hiragana = array(
                        'name'        => 'v_hiragana',
                        'id'          => 'v_hiragana',
                        'size'        => '32',
                        'value'       => set_value('v_hiragana'),
                    );
                             
    $v_romaji = array(
                        'name'        => 'v_romaji',
                        'id'          => 'v_romaji',
                        'size'        => '32',
                        'value'       => set_value('v_romaji'),
                    );
               
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Add New Vocabulary</title>
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
				<h2>Add New Vocabulary</h2>
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
			<form name="addVocabulary" id="addNewAdmin" action="" method="post" enctype="multipart-formdata">		        		        
		        <label>Hiragana: </label><?php echo form_input($v_hiragana);?><font width="1%" style="color:red;">(*)</font><br />
		        <label>Romaji: </label><?php echo form_input($v_romaji);?><font width="1%" style="color:red;">(*)</font><br />		        		        		        
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