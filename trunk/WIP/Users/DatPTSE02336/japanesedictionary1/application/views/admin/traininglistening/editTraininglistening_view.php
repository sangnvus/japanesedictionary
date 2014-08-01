<?php
    //--- Giu gia tri cua form
if (isset($info['sourcefile_id'])) {
	$lis_id = array(
                        'name'        => 'lis_id',
                        'id'          => 'lis_id',
                        'size'        => '32',
                        'value'       => $info['lis_id'],
                        'readonly'    => 'readonly'
                    );
    $lis_title = array(
                        'name'        => 'lis_title',
                        'id'          => 'lis_title',
                        'size'        => '32',
                        'value'       => $info['lis_title']
                    );
    $sourcefile_id = array(
                        'name'        => 'sourcefile_id',
                        'id'          => 'sourcefile_id',
                        'size'        => '32',
                        'value'       => $info['sourcefile_id']
                    );

    $sourcefile_question = array(
                        'name'        => 'sourcefile_question',
                        'id'          => 'sourcefile_question',
                        'cols'        => '25',
                        'rows'        => '10',
                        'value'       => $info['sourcefile_question'],
                    );
    $sourcefile_script = array(
                        'name'        => 'sourcefile_script',
                        'id'          => 'sourcefile_script',
                        'cols'        => '25',
                        'rows'        => '10',
                        'value'       => $info['sourcefile_script']
                    );
    $sourcefile_meaning = array(
                        'name'        => 'sourcefile_meaning',
                        'id'          => 'sourcefile_meaning',
                        'cols'        => '25',
                        'rows'        => '10',
                        'value'       => $info['sourcefile_meaning']
                    );
    $sourcefile_answer = array(
                        'name'        => 'sourcefile_answer',
                        'id'          => 'sourcefile_answer',
                        'cols'        => '25',
                        'rows'        => '10',
                        'value'       => $info['sourcefile_answer']
                    ); 
} else {
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
    $lis_title = array(
                        'name'        => 'lis_title',
                        'id'          => 'lis_title',
                        'size'        => '32',
                        'value'       => $info['lis_title']
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
                        'cols'        => '25',
                        'rows'        => '10',
                        'value'       => set_value('sourcefile_question'),
                    );
    $sourcefile_script = array(
                        'name'        => 'sourcefile_script',
                        'id'          => 'sourcefile_script',
                        'cols'        => '25',
                        'rows'        => '10',
                        'value'       => set_value('sourcefile_script'),
                    );
    $sourcefile_meaning = array(
                        'name'        => 'sourcefile_meaning',
                        'id'          => 'sourcefile_meaning',
                        'cols'        => '25',
                        'rows'        => '10',
                        'value'       => set_value('sourcefile_meaning'),
                    ); 
    $sourcefile_answer = array(
                        'name'        => 'sourcefile_answer',
                        'id'          => 'sourcefile_answer',
                        'cols'        => '25',
                        'rows'        => '10',
                        'value'       => set_value('sourcefile_answer'),
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
		<h2>Edit TrainingListening</h2>
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
			<form name="addTraininglistening" id="addNewAdmin" action="" method="post" enctype="multipart-formdata">							
					<label>lis_id: </label><?php echo form_input($lis_id);?><font width="1%" style="color:red;">(*)</font><br /><br />
                    <label>lis_title: </label><?php echo form_input($lis_title);?><font width="1%" style="color:red;">(*)</font><br /><br />		
			        <label>lis_level: </label>
                        <select name="lis_level">                         
                            <option value="<?php echo $info['lis_level'];?>"><?php echo $info['lis_level'];?></option>
                            <option value="N2N3">N2N3</option>
                            <option value="N4N5">N4N5</option>
                        </select><font width="1%" style="color:red;">(*)</font><br /><br />
			        <?php 
			        	if (isset($info['sourcefile_id'])) { ?>
                            <label>sourcefile_id: </label><?php echo form_input($sourcefile_id);?><font width="1%" style="color:red;">(*)</font><br /><br />
                            <label>sourcefile_question: </label><?php echo form_textarea($sourcefile_question);?><font width="1%" style="color:red;">(*)</font><br /><br />
                            <label>sourcefile_script: </label><?php echo form_textarea($sourcefile_script);?><font width="1%" style="color:red;">(*)</font><br /><br />
                            <label>sourcefile_meaning: </label><?php echo form_textarea($sourcefile_meaning);?><font width="1%" style="color:red;">(*)</font><br /><br />
                            <label>sourcefile_answer: </label><?php echo form_textarea($sourcefile_answer);?><font width="1%" style="color:red;">(*)</font><br /><br />
			        	<?php } else {
                            
			        	}
			         ?>		        

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