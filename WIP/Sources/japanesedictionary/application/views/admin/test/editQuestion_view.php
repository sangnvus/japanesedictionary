<?php
    // Giu gia tri cua form
	$test_id = array(
                        'name'        => 'test_id',
                        'id'          => 'test_id',
                        'size'        => '32',
                        'value'       => $test['test_id'],
                        'readonly'    => 'readonly',
                    );
	$question_id = array(
						'name'        => 'question_id',
                        'id'          => 'question_id',
                        'size'        => '32',
                        'value'       => $question['question_id'],
                        'readonly'    => 'readonly',
                        'type'		  => 'hidden'
					);
	$question_content = array(
                        'name'        => 'question_content',
                        'id'          => 'question_content',
                        'cols'        => '25',
                        'rows'		  => '5',
                        'value'       => $question['question_content'],
                    );
    // $answer = array(
    // 					'name'        => 'answer',
    //                     'id'          => 'answer',
    //                     'cols'        => '25',
    //                     'rows'		  => '5',
    // 				);          
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
		<h2>Edit Question</h2>
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
		        <?php 
                	if (isset($test) && $test!=null) {                				
		                 ?>
				<tr align="left">
					<td width="40%">Title Test:</td>
					<td width="50%"><?php echo form_input($test_id);?></td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<?php }?>
				<?php 
		            if ($question!=null) {		                		 			
		                 ?>
		        <?php echo form_input($question_id);?>
				<tr align="left">
					<td width="40%">Question:</td>
					<td width="50%"><?php echo form_textarea($question_content);?></td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<?php } ?>
				<?php 
		                	if ($answer!=null) {
		                		$stt = 0;
		                		foreach ($answer as $row) {	
		                	    $stt++;   						
		                 ?>
		        <input type="hidden" value="<?php echo $row->answer_id;?>" name="answer_id">
				<tr align="left">
					<td width="40%">Answer<?php echo $stt; ?>:</td>
					<td width="50%"><textarea cols="25" rows="5" name="answer[<?php echo $row->answer_id; ?>]" value="<?php echo $row->answer_content;?>"><?php echo $row->answer_content;?></textarea></td>
					<?php if($row->answer_correct == 0 ) { ?>
					<td>
						<select name="correctAnswer[<?php echo $row->answer_id; ?>]">
							<option value="<?php echo $row->answer_correct;?>">False</option>
							<option value="1">True</option>
						</select>
					</td>
					<?php } else { ?>
					<td>
						<select name="correctAnswer[<?php echo $row->answer_id; ?>]">
							<option value="<?php echo $row->answer_correct;?>">True</option>
							<option value="0">False</option>
						</select>
					</td>
					<?php } ?>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<?php }} ?>
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