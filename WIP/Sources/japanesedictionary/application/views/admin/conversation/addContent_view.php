<?php
    //--- Giu gia tri cua form
	$c_id = array(
                        'name'        => 'c_id',
                        'id'          => 'c_id',
                        'size'        => '32',
                        'value'       => $info['c_id'],
                        'readonly'    => 'readonly'
                    );
	$c_title = array(
                        'name'        => 'c_title',
                        'id'          => 'c_title',
                        'size'        => '32',
                        'value'       => $info['c_title'],
                        'readonly'    => 'readonly'
                    );
	$c_image = array(
                        'name'        => 'c_image',
                        'id'          => 'c_image',
                        'size'        => '32',
                        'value'       => $info['c_image'],
                        'readonly'    => 'readonly'
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
                        'cols'        => '25',
                        'rows'         => '5',
                        'value'       => set_value('con_hiragana')
                    );
    $con_romaji = array(
                        'name'        => 'con_romaji',
                        'id'          => 'con_romaji',
                        'cols'        => '25',
                        'rows'         => '5',
                        'value'       => set_value('con_romaji')
                    );
                             
    $con_meaning = array(
                        'name'        => 'con_meaning',
                        'id'          => 'con_meaning',
                        'cols'        => '25',
                        'rows'         => '5',
                        'value'       => set_value('con_meaning')
                    ); 
    $con_file = array(
                        'name'        => 'con_file',
                        'id'          => 'con_file',
                        'size'        => '32',
                        'value'       => set_value('con_file')
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
		<h2>Add Content</h2>
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
			<form name="addContent" id="addNewAdmin" action="" method="post" enctype="multipart-formdata">		        		        
		        <table  border="0" cellpadding="10" id="table1">
				<tr align="left">
					<td width="40%">C_id: </td>
					<td width="50%"><?php echo form_input($c_id);?></td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr align="left">
					<td width="40%">Level:</td>
					<td width="50%">
						<select name="c_level">		                    
		                    <option value="<?php echo $info['c_level'];?>"><?php echo $info['c_level'];?></option>
		            	</select></td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr align="left">
					<td width="40%">C_title: </td>
					<td width="50%"><?php echo form_input($c_title);?></td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr align="left">
					<td width="40%">C_image: </td>
					<td width="50%"><?php echo form_input($c_image);?></td>
				</tr>
				<tr align="left">
					<td width="40%">Con_title: </td>
					<td width="50%"><?php echo form_input($con_title);?></td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr align="left">
					<td width="40%">Hiragana:</td>
					<td width="50%"><?php echo form_textarea($con_hiragana);?></td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr align="left">
					<td width="40%">Romaji: </td>
					<td width="50%"><?php echo form_textarea($con_romaji);?></td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr align="left">
					<td width="40%">Meaning: </td>
					<td width="50%"><?php echo form_textarea($con_meaning);?></td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr align="left">
					<td width="40%">File: </td>
					<td width="50%"><?php echo form_input($con_file);?></td>
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