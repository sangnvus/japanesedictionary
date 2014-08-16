<?php
    //--- Giu gia tri cua form
    $test_id = array(
                        'name'        => 'test_id',
                        'id'          => 'test_id',
                        'size'        => '32',
                        'value'       => $info['test_id'],
                        'readonly'   => 'readonly',
                        'type'   => 'hidden'
                    );
    $test_title = array(
                        'name'        => 'test_title',
                        'id'          => 'test_title',
                        'size'        => '32',
                        'value'       => $info['test_title'],
                        'readonly'    => 'readonly'
                    );                         
    $test_category = array(
                        'name'        => 'test_category',
                        'id'          => 'test_category',
                        'size'        => '32',
                        'value'       => $info['test_category'],
                        'readonly'    => 'readonly'                        
                    );
    $test_level = array(
                        'name'        => 'test_level',
                        'id'          => 'test_level',
                        'size'        => '32',
                        'value'       => $info['test_level'],
                        'readonly'    => 'readonly'
                    );
    $test_content = array(
                        'name'        => 'test_content',
                        'id'          => 'test_content',
                        'cols'        => '25',
                        'rows'		=> '8',
                        'value'       => $info['test_content']
                    );                                                             
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Edit Test</title>
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
			<?php echo form_open_multipart('admin/test/editTest');?>
		        <table  border="0" cellpadding="10" id="table1">
				<tr align="left">
					<td width="40%"></td>
					<td width="50%"><?php echo form_input($test_id);?></td>
					<td width="10%"></td>
				</tr>
				<tr align="left">
					<td width="40%">Title:</td>
					<td width="50%"><?php echo form_input($test_title);?></td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr align="left">
					<td width="40%">Category:</td>
					<td width="50%">
						<select name="test_category" disabled>
		        			<option value="<?php echo $info['test_category'];?>"><?php echo $info['test_category'];?></option>
                    		<option value="Reading">Reading</option>
                    		<option value="Listening">Listening</option>
                    		<option value="Vocabulary">Vocabulary</option>
                    		<option value="Grammar">Grammar</option>
                    	</select>
                    	<input type="hidden" name="test_category" value="<?php echo $info['test_category'];?>">                    	
					</td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr align="left">
					<td width="40%">Level</td>
					<td width="50%">
						<select name="test_level" disabled>
		        			<option value="<?php echo $info['test_level'];?>"><?php echo $info['test_level'];?></option>
		        			<option value="N2">N2</option>
		        			<option value="N3">N3</option>
		        			<option value="N4">N4</option>
                    	</select>
                    	<input type="hidden" name="test_level" value="<?php echo $info['test_level'];?>">                    	
                    </td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<?php if ($info['test_category'] === "Listening") { ?>
					<tr align="left">
					<td width="40%">Content File :</td>
					<td width="50%"><audio controls><source src="<?php echo base_url();?>public/audio/<?php echo $info['test_content'];?>" type="audio/mpeg"></audio><br><?php echo $info['test_content']; ?><br>
					<input type="file" name="userfile" id="file">
					</td>
					<td width="10%"></td>
				<?php } else { ?>
					<tr align="left">
					<td width="40%">Content :</td>
					<td width="50%"><?php echo form_textarea($test_content);?></td>
					<td width="10%"></td>
				</tr>					
				<?php }
				 ?>				
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