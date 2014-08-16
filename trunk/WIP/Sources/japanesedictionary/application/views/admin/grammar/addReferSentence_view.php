<?php
    //--- Giu gia tri cua form
	$g_id = array(
                        'name'        => 'g_id',
                        'id'          => 'g_id',
                        'size'        => '20',
                        'type'  => 'hidden',
                        'value' => $grammar['g_id']                        
                    );
	$g_hiragana = array(
                        'name'        => 'g_hiragana',
                        'id'          => 'g_hiragana',
                        'size'        => '40',
                        'value' => $grammar['g_hiragana'],
                        'readonly' => 'readonly'
                    );
	$g_meaning = array(
                        'name'        => 'g_meaning',
                        'id'          => 'g_meaning',
                        'size'        => '40',
                        'value' => $grammar['g_meaning'],
                        'readonly' => 'readonly'                        
                    );               
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Add Reference Sentence Grammar</title>
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
		<h2>Add Reference Sentence</h2>
		</div>
		<div id="table-vocabulary">
		<center>
			<div class="error">
		        <ul>
		            <?php
		                echo validation_errors('<li>','</li>');
		                if(isset($error) && $error!="" && !empty($error))
		                    echo $error;
		            ?>
		        </ul>
		    </div>
			<form name="addRefer" id="addNewAdmin" action="" method="post" enctype="multipart-formdata">		        		        
		        <label>Grammar: </label><?php echo form_input($g_hiragana);?><font width="1%" style="color:red;">(*)</font><br /><br />
		        <label>Meaning: </label><?php echo form_input($g_meaning);?><font width="1%" style="color:red;">(*)</font><br /><br />		
		        <?php echo form_input($g_id);?>
		        <label>Sentence: </label>
		        	<?php 
		        	if ($sentence !== null || $sentence !== "") {?>
		        	<select name="s_id" style="width:270px">
		        	<?php	
		        		foreach ($sentence as $row) {	
		        		foreach ($row as $row1){	        					        	
		        	?>
		        	<option value="<?php echo $row1['s_id']; ?>"><?php echo $row1['s_meaning']; ?></option>
		        	<?php  }
		        	} ?>
		        	</select>
		        	<?php }?>	        			        
		        <font width="1%" style="color:red;">(*)</font><br />
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