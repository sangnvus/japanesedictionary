<?php
    //--- Giu gia tri cua form
    $test_id = array(
                        'name'        => 'test_id',
                        'id'          => 'test_id',
                        'size'        => '32',
                        'value'       => $info['test_id'],
                        'readonly'   => 'readonly'
                    );
                             
    $test_category = array(
                        'name'        => 'test_category',
                        'id'          => 'test_category',
                        'size'        => '32',
                        'value'       => $info['test_category']
                    );
    $test_level = array(
                        'name'        => 'test_level',
                        'id'          => 'test_level',
                        'size'        => '32',
                        'value'       => $info['test_level']
                    );
    $test_content = array(
                        'name'        => 'test_content',
                        'id'          => 'test_content',
                        'cols'        => '25',
                        'rows'		=> '8',
                        'value'       => $info['test_content']
                    );
    if (isset($info['question_id'])) {
    		$question_id = array(
		                        'name'        => 'question_id',
		                        'id'          => 'question_id',
		                        'size'        => '32',
		                        'value'       => $info['question_id'],
		                        'readonly'    => 'readonly'
		                    );
		    $question_content = array(
		                        'name'        => 'question_content',
		                        'id'          => 'question_content',
		                        'cols'        => '25',
                        		'rows'		=> '8',
		                        'value'       => $info['question_content']
		                    ); 
        } else {
        	$question_id = array(
		                        'name'        => 'question_id',
		                        'id'          => 'question_id',
		                        'size'        => '32',
		                        'value'       => set_value('question_id')
		                    );
		    $question_content = array(
		                        'name'        => 'question_content',
		                        'id'          => 'question_content',
		                        'cols'        => '25',
                        		'rows'		=> '8',
		                        'value'       => set_value('question_content')
		                    ); 
        }
    if (isset($info['answer_id'])) {
    	$answer_content = array(
		                        'name'        => 'answer_content',
		                        'id'          => 'answer_content',
		                        'cols'        => '25',
                        		'rows'		=> '8',
		                        'value'       => $info['answer_content']
		                    );
    } else {
    	$answer_content = array(
		                        'name'        => 'answer_content',
		                        'id'          => 'answer_content',
		                        'cols'        => '25',
                        		'rows'		=> '8',
		                        'value'       => set_value('answer_content')
		                    );
    }
    
                                                                      
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Add New Test</title>
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
				<h2>Edit Test</h2>
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
			<form name="addTest" id="addNewAdmin" action="" method="post" enctype="multipart-formdata">		        		        
		        <table  border="0" cellpadding="10" id="table1">
				<tr align="left">
					<td width="40%">Test_id:</td>
					<td width="50%"><?php echo form_input($test_id);?></td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr align="left">
					<td width="40%">Category:</td>
					<td width="50%">
						<select name="test_category">
		        			<option value="<?php echo $info['test_category'];?>"><?php echo $info['test_category'];?></option>
                    		<option value="Reading">Reading</option>
                    		<option value="Listening">Listening</option>
                    		<option value="Vocabulary">Vocabulary</option>
                    		<option value="Grammar">Grammar</option>
                    	</select>
					</td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr align="left">
					<td width="40%">Level</td>
					<td width="50%">
						<select name="test_level">
		        			<option value="<?php echo $info['test_level'];?>"><?php echo $info['test_level'];?></option>
		        			<option value="N2">N2</option>
		        			<option value="N3">N3</option>
		        			<option value="N4">N4</option>
                    	</select>
                    </td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr align="left">
					<td width="40%">Test_Content :</td>
					<td width="50%"><?php echo form_textarea($test_content);?></td>
					<td width="10%"></td>
				</tr>
				<tr align="left">
					<td width="40%">Question_id:</td>
					<td width="50%"><?php echo form_input($question_id);?></td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr align="left">
					<td width="40%">Question_content:</td>
					<td width="50%"><?php echo form_textarea($question_content);?></td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr align="left">
					<td width="40%">Answer_content:</td>
					<td width="50%"><?php echo form_textarea($answer_content);?></td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr align="left">
					<td width="40%">Answer_correct:</td>
					<td width="50%">
						<select name="answer_correct">
							<option value="<?php echo $info['answer_correct'];?>"><?php echo $info['answer_correct'];?></option>
							<option value="0">0</option>
							<option value="1">1</option>
						</select>
					</td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="ok" value="Edit" /></td>
					<td></td>
				</tr>		
		    	</table>
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