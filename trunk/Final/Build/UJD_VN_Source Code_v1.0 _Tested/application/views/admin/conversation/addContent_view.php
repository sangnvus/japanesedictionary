<?php
    //--- Giu gia tri cua form
	$c_id = array(
                        'name'        => 'c_id',
                        'id'          => 'c_id',
                        'size'        => '32',
                        'value'       => $info['c_id'],
                        'readonly'    => 'readonly',
                       	'type' 		  => 'hidden'
                    );
	$c_title = array(
                        'name'        => 'c_title',
                        'id'          => 'c_title',
                        'size'        => '32',
                        'value'       => $info['c_title'],
                        'readonly'    => 'readonly',
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
	<title>Add Content Conversation</title>
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
			<?php echo form_open_multipart('admin/conversation/addContent');?>
		        <table  border="0" cellpadding="10" id="table1">
				<tr align="left">
					<td style="width:10%;text-align:right">Title: </td>
					<td style="width:10%"><?php echo form_input($c_title);?></td>
					<td style="width:10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr align="left">
					<td width="10%" style="text-align:right">Sub-Title: </td>
					<td width="10%"><?php echo form_input($con_title);?></td>
					<td width="10%" style="text-align:left"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr align="left">
					<td width="40%" style="text-align:right">Hiragana:</td>
					<td width="10%"><?php echo form_textarea($con_hiragana);?></td>
					<td width="10%" style="text-align:left"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr align="left">
					<td width="40%" style="text-align:right">Romaji: </td>
					<td width="10%"><?php echo form_textarea($con_romaji);?></td>
					<td width="10%" style="text-align:left"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr align="left">
					<td width="40%" style="text-align:right">Meaning: </td>
					<td width="10%"><?php echo form_textarea($con_meaning);?></td>
					<td width="10%" style="text-align:left"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr align="left">
                    <td width="40%" style="text-align:right">File: </td>
                    <td width="10%">
                    <?php if(isset($error_file) && !is_null($error_file)){
                        echo "<font width='1%' style='color:#FF0066;'>".$error_file."</font><br>";
                    }else{ echo "No file<br>";
                    }
                    ?><input type="file" name="userfile" id="file"></td>  
                    <td width="10%" style="text-align:left"><font width="1%" style="color:red;">(*)</font></td>
                </tr>   
		        <tr>
					<td></td>
					<td><input type="submit" name="ok" value="Add" /></td>
					<td></td>
				</tr>
					<tr align="left">
					<td style="width:10%"></td>
					<td style="width:60%"><?php echo form_input($c_id);?></td>
					<td style="width:10%"></td>
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