<?php
    //--- Giu gia tri cua form
	$lis_id = array(
                        'name'        => 'lis_id',
                        'id'          => 'lis_id',
                        'size'        => '32',
                        'value'       => $info['lis_id'],
                        'readonly'    => 'readonly'
                    );
    $lis_level = array(
                        'name'        => 'lis_level',
                        'id'          => 'lis_level',
                        'size'        => '32',
                        'value'       => $info['lis_level']
                    ); 
    $sourcefile_id = array(
                        'name'        => 'sourcefile_id',
                        'id'          => 'sourcefile_id',
                        'size'        => '32',
                        'value'       => set_value('sourcefile_id')
                    );
    $sourcefile_question = array(
                        'name'        => 'sourcefile_question',
                        'id'          => 'sourcefile_question',
                        'size'        => '32',
                        'value'       => set_value('sourcefile_question')
                    );
    $sourcefile_script = array(
                        'name'        => 'sourcefile_script',
                        'id'          => 'sourcefile_script',
                        'size'        => '32',
                        'value'       => set_value('sourcefile_script')
                    );
    $sourcefile_meaning = array(
                        'name'        => 'sourcefile_meaning',
                        'id'          => 'sourcefile_meaning',
                        'size'        => '32',
                        'value'       => set_value('sourcefile_meaning')
                    ); 
    $sourcefile_answer = array(
                        'name'        => 'sourcefile_answer',
                        'id'          => 'sourcefile_answer',
                        'size'        => '32',
                        'value'       => set_value('sourcefile_answer')
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
		<h2>Add Sourcefile</h2>
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
			<form name="addSourcefile" id="addSourcefile" action="" method="post" enctype="multipart-formdata">		        		        
		        <label>lis_id: </label><?php echo form_input($lis_id);?><br />		
			    <label>lis_level: </label><?php echo form_input($lis_level);?><br />	
		        <label>sourcefile_id: </label><?php echo form_input($sourcefile_id);?><br />
                <label>sourcefile_question: </label><?php echo form_input($sourcefile_question);?><br />
                <label>sourcefile_script: </label><?php echo form_input($sourcefile_script);?><br />
                <label>sourcefile_meaning: </label><?php echo form_input($sourcefile_meaning);?><br />
                <label>sourcefile_answer: </label><?php echo form_input($sourcefile_answer);?><br />       
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