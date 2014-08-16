<?php
    //--- Giu gia tri cua form
	$lis_id = array(
                        'name'        => 'lis_id',
                        'id'          => 'lis_id',
                        'size'        => '32',
                        'value'       => $info['lis_id'],
                        'readonly'    => 'readonly',
                        'type'        => 'hidden'
                    );
    $lis_title = array(
                        'name'        => 'lis_title',
                        'id'          => 'lis_title',
                        'size'        => '32',
                        'value'       => $info['lis_title'],
                        'readonly'    => 'readonly',
                    );                        
    $sourcefile_file = array(
                        'name'        => 'sourcefile_file',
                        'id'          => 'sourcefile_file',
                        'size'        => '32',
                        'value'       => set_value('sourcefile_file'),
                    );
    $sourcefile_question = array(
                        'name'        => 'sourcefile_question',
                        'id'          => 'sourcefile_question',
                        'cols'        => '25',
                        'rows'        => '8',
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
	<title>Add Content Listening</title>
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
			<?php echo form_open_multipart('admin/traininglistening/addSourcefile');?>
                <table border="0" cellpadding="10" id="table1">
                <tr align="left">
                    <td width="40%">Title: </td>
                    <td width="50%"><?php echo form_input($lis_title);?></td>
                    <td width="10%"><font width="1%" style="color:red;">(*)</font></td>
                </tr>
                <tr align="left">
                    <td width="40%">Sourcefile: </td>
                    <td width="50%">
                    <?php if(isset($error_file) && !is_null($error_file)){
                        echo "<font width='1%' style='color:#FF0066;'>".$error_file."</font><br>";
                    }else{ echo "No file<br>";
                    }
                    ?><input type="file" name="userfile" id="file"></td>  
                    <td width="10%"><font width="1%" style="color:red;">(*)</font></td>
                </tr>
                <tr align="left">
                    <td width="40%">Question: </td>
                    <td width="50%"><?php echo form_textarea($sourcefile_question);?></td>
                    <td width="10%"><font width="1%" style="color:red;">(*)</font></td>
                </tr>
                <tr align="left">
                    <td width="40%">Script: </td>
                    <td width="50%"><?php echo form_textarea($sourcefile_script);?></td>
                    <td width="10%"><font width="1%" style="color:red;">(*)</font></td>
                </tr>
                <tr align="left">
                    <td width="40%">Meaning: </td>
                    <td width="50%"><?php echo form_textarea($sourcefile_meaning);?></td>
                    <td width="10%"><font width="1%" style="color:red;">(*)</font></td>
                </tr>
                <tr align="left">
                    <td width="40%">Answer: </td>
                    <td width="50%"><?php echo form_textarea($sourcefile_answer);?></td>
                    <td width="10%"><font width="1%" style="color:red;">(*)</font></td>
                </tr>
                <tr align="left">
                    <td width="40%">&nbsp;</td>
                    <td width="50%"><input type="submit" name="ok" value="Add" /></td>
                    <td width="10%"></td>
                </tr>
                </table>                		        
                <?php echo form_input($lis_id);?>                
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