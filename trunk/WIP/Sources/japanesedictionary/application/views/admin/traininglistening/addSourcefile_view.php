<?php
    //--- Giu gia tri cua form
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
                        'value'       => $info['lis_title'],
                        'readonly'    => 'readonly'
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
                        'rows'      => '8',
                        'value'       => set_value('sourcefile_question')
                    );
    $sourcefile_script = array(
                        'name'        => 'sourcefile_script',
                        'id'          => 'sourcefile_script',
                        'cols'        => '25',
                        'rows'      => '8',
                        'value'       => set_value('sourcefile_script')
                    );
    $sourcefile_meaning = array(
                        'name'        => 'sourcefile_meaning',
                        'id'          => 'sourcefile_meaning',
                        'cols'        => '25',
                        'rows'      => '8',
                        'value'       => set_value('sourcefile_meaning')
                    ); 
    $sourcefile_answer = array(
                        'name'        => 'sourcefile_answer',
                        'id'          => 'sourcefile_answer',
                        'cols'        => '25',
                        'rows'      => '8',
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
			<form name="addSourcefile" id="addNewAdmin" action="" method="post" enctype="multipart-formdata">		        		        
		        <label>Lis_id: </label><?php echo form_input($lis_id);?><font width="1%" style="color:red;">(*)</font><br /><br />
                <label>Title: </label><?php echo form_input($lis_title);?><font width="1%" style="color:red;">(*)</font><br /><br />		
			    <label>Level: </label><select name="lis_level">
                            <option value="<?php echo $info['lis_level'];?>"><?php echo $info['lis_level'];?></option> 
                        </select><font width="1%" style="color:red;">(*)</font><br /><br />	
		        <label>Sourcefile_id: </label><?php echo form_input($sourcefile_id);?><font width="1%" style="color:red;">(*)</font><br /><br />
                <label>Question: </label><?php echo form_textarea($sourcefile_question);?><font width="1%" style="color:red;">(*)</font><br /><br />
                <label>Script: </label><?php echo form_textarea($sourcefile_script);?><font width="1%" style="color:red;">(*)</font><br /><br />
                <label>Meaning: </label><?php echo form_textarea($sourcefile_meaning);?><font width="1%" style="color:red;">(*)</font><br /><br />
                <label>Answer: </label><?php echo form_textarea($sourcefile_answer);?><font width="1%" style="color:red;">(*)</font><br /><br />       
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