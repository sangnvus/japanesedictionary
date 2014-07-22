<?php
    //--- Giu gia tri cua form
if (isset($info['con_id'])) {
	$c_id = array(
                        'name'        => 'c_id',
                        'id'          => 'c_id',
                        'size'        => '32',
                        'value'       => $info['c_id'],
                        'readonly'    => 'readonly'
                    );
	$c_level = array(
                        'name'        => 'c_level',
                        'id'          => 'c_level',
                        'size'        => '32',
                        'value'       => $info['c_level']
                    ); 
    $c_title = array(
                        'name'        => 'c_title',
                        'id'          => 'c_title',
                        'size'        => '32',
                        'value'       => $info['c_title']
                    );

    $con_id = array(
                        'name'        => 'con_id',
                        'id'          => 'con_id',
                        'size'        => '32',
                        'value'       => $info['con_id'],
                        'readonly'    => 'readonly'
                    );
    $con_title = array(
                        'name'        => 'con_title',
                        'id'          => 'con_title',
                        'size'        => '32',
                        'value'       => $info['con_title']
                    );
    $con_hiragana = array(
                        'name'        => 'con_hiragana',
                        'id'          => 'con_hiragana',
                        'size'        => '32',
                        'value'       => $info['con_hiragana']
                    );
    $con_romaji = array(
                        'name'        => 'con_romaji',
                        'id'          => 'con_romaji',
                        'size'        => '32',
                        'value'       => $info['con_romaji']
                    ); 
    $con_meaning = array(
                        'name'        => 'con_meaning',
                        'id'          => 'con_meaning',
                        'size'        => '32',
                        'value'       => $info['con_meaning']
                    );
} else {
	$c_id = array(
                        'name'        => 'c_id',
                        'id'          => 'c_id',
                        'size'        => '32',
                        'value'       => $info['c_id']
                    );
	$c_level = array(
                        'name'        => 'c_level',
                        'id'          => 'c_level',
                        'size'        => '32',
                        'value'       => $info['c_level']
                    ); 
    $c_title = array(
                        'name'        => 'c_title',
                        'id'          => 'c_title',
                        'size'        => '32',
                        'value'       => $info['c_title']
                    );
    $con_id = array(
                        'name'        => 'con_id',
                        'id'          => 'con_id',
                        'size'        => '32',
                        'value'       => set_value('con_id')
                    );
    $con_title = array(
                        'name'        => 'con_title',
                        'id'          => 'con_title',
                        'size'        => '32',
                        'value'       => set_value('con_title')
                    );
    $con_hiragana = array(
                        'name'        => 'con_hiragana',
                        'id'          => 'con_hiragana',
                        'size'        => '32',
                        'value'       => set_value('con_hiragana')
                    );
    $con_romaji = array(
                        'name'        => 'con_romaji',
                        'id'          => 'con_romaji',
                        'size'        => '32',
                        'value'       => set_value('con_romaji')
                    ); 
    $con_meaning = array(
                        'name'        => 'con_meaning',
                        'id'          => 'con_meaning',
                        'size'        => '32',
                        'value'       => set_value('con_meaning')
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
		<h2>Edit Conversation</h2>
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
			<form name="addConversation" id="addConversation" action="" method="post" enctype="multipart-formdata">							
					<label>c_id: </label><?php echo form_input($c_id);?><br />		
			        <label>c_level: </label><?php echo form_input($c_level);?><br />
			        <label>c_title: </label><?php echo form_input($c_title);?><br />
			        <?php 
			        	if (isset($info['con_id'])) { ?>
							<label>con_id: </label><?php echo form_input($con_id);?><br />
			        	<?php } else {
                            
			        	}
			         ?>			        

			        <label>con_title: </label><?php echo form_input($con_title);?><br />
			        <label>con_hiragana: </label><?php echo form_input($con_hiragana);?><br />
			        <label>con_romaji: </label><?php echo form_input($con_romaji);?><br />
			        <label>con_meaning: </label><?php echo form_input($con_meaning);?><br />	
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