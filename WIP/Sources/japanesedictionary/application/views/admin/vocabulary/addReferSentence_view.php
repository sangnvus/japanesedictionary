<?php
    //--- Giu gia tri cua form
		$v_hiragana = array(
                        'name'        => 'v_hiragana',
                        'id'          => 'v_hiragana',
                        'size'        => '20',
                        'value'       => $vocabulary['v_hiragana']                        
                    );
		$m_meaningvn = array(
                        'name'        => 'm_meaningvn',
                        'id'          => 'm_meaningvn',
                        'size'        => '20',
                        'value'       => $vocabulary['m_meaningvn']                       
                    );	
        $m_id = array(
            'name'        => 'm_id',
            'id'          => 'm_id',
            'size'        => '20',
            'value'       => $vocabulary['m_id'],
            'type'        => 'hidden'                       
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
				<label>Vocabulary: </label><?php echo form_input($v_hiragana);?><font width="1%" style="color:red;">(*)</font><br />
		        <label>Meaning: </label><?php echo form_input($m_meaningvn);?><font width="1%" style="color:red;">(*)</font><br />
		        <?php echo form_input($m_id);?>
		        <label>Sentence: </label>
		        	<?php 
		        	if ($sentence !== null || $sentence !== "") {?>
		        	<select name="s_id" style="width:148px">
		        	<?php	
		        		foreach ($sentence as $row) {		        					        		
		        	?>
		        	<option value="<?php echo $row['s_id']; ?>"><?php echo $row['s_meaning']; ?></option>
		        	<?php  } ?>
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