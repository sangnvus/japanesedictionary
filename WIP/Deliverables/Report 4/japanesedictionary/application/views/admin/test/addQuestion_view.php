<?php
    //--- Giu gia tri cua form
	$test_id = array(
                        'name'        => 'test_id',
                        'id'          => 'test_id',
                        'size'        => '32',
                        'value'       => $info['test_id'],
                        'readonly'    => 'readonly',
                    );
	$question_content = array(
                        'name'        => 'question_content',
                        'id'          => 'question_content',
                        'cols'        => '25',
                        'rows'		  => '5',
                        'value'       => set_value('question_content'),
                    );
	$answer1 = array(
	    'name'        => 'answer1',
	    'id'          => 'answer1',
	    'cols'        => '25',
	    'rows'		  => '5',
	    'value'       => set_value('answer1'),
	);  
	$answer2 = array(
	    'name'        => 'answer2',
	    'id'          => 'answer2',
	    'cols'        => '25',
	    'rows'		  => '5',
	    'value'       => set_value('answer2'),
	);
	$answer3 = array(
	    'name'        => 'answer3',
	    'id'          => 'answer3',
	    'cols'        => '25',
	    'rows'		  => '5',
	    'value'       => set_value('answer3'),
	);
	$answer4 = array(
	    'name'        => 'answer4',
	    'id'          => 'answer4',
	    'cols'        => '25',
	    'rows'		  => '5',
	    'value'       => set_value('answer4'),
	);             
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Add Question Page</title>
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
		<h2>Add Question</h2>
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
			<form name="addQuestion" id="addNewAdmin" action="" method="post" enctype="multipart-formdata">		        		        
		        <table  border="0" cellpadding="10" id="table1">
				<tr align="left">
					<td width="40%">Title Test:</td>
					<td width="50%"><?php echo form_input($test_id);?></td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr align="left">
					<td width="40%">Question:</td>
					<td width="50%"><?php echo form_textarea($question_content);?></td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr align="left">
					<td width="40%">Answer1:</td>
					<td width="50%"><?php echo form_textarea($answer1);?></td>
					<td>
						<select name="correctAnswer1">
							<option value=""></option>
							<option value="1">True</option>
							<option value="0">False</option>
						</select>
					</td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr align="left">
					<td width="40%">Answer2:</td>
					<td width="50%"><?php echo form_textarea($answer2);?></td>
					<td>
						<select name="correctAnswer2">
							<option value=""></option>
							<option value="1">True</option>
							<option value="0">False</option>
						</select>
					</td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr align="left">
					<td width="40%">Answer3:</td>
					<td width="50%"><?php echo form_textarea($answer3);?></td>
					<td>
						<select name="correctAnswer3">
							<option value=""></option>
							<option value="1">True</option>
							<option value="0">False</option>
						</select>
					</td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr align="left">
					<td width="40%">Answer4:</td>
					<td width="50%"><?php echo form_textarea($answer4);?></td>
					<td>
						<select name="correctAnswer4">
							<option value=""></option>
							<option value="1">True</option>
							<option value="0">False</option>
						</select>
					</td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="ok" value="Add" /></td>
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