<?php
    //--- Giu gia tri cua form
    if ($info !== null) {
        foreach ($info as $info) { 
	$reading_id = array(
                        'name'        => 'reading_id',
                        'id'          => 'reading_id',
                        'size'        => '32',
                        'value'       => $info['reading_id'],
                        'readonly'    => 'readonly',
                        'type'        => 'hidden'
                    );
    $reading_code = array(
                        'name'        => 'reading_code',
                        'id'          => 'reading_code',
                        'size'        => '32',
                        'value'       => $info['reading_code'],
                        'readonly'    => 'readonly'
                    );
    $reading_title = array(
                        'name'        => 'reading_title',
                        'id'          => 'reading_title',
                        'size'        => '32',
                        'value'       => $info['reading_title'],
                    ); 
    $reading_level = array(
                        'name'        => 'reading_level',
                        'id'          => 'reading_level',
                        'size'        => '32',
                        'value'       => $info['reading_level'],
                    ); 
    }}                                                                         
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Edit Reading Document</title>
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
            <h2>Edit ReadingDocument</h2>    
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
			<form name="editReading" id="addNewAdmin" action="" method="post" enctype="multipart-formdata">							
            <table  border="0" cellpadding="10" id="table1">
                <tr>
                    <td width="40%"></td>
                    <td width="50%"><?php echo form_input($reading_id);?></td>
                    <td width="10%"></td>
                </tr>
                <tr>
                    <td width="40%">Code</td>
                    <td width="50%"><?php echo form_input($reading_code);?></td>
                    <td width="10%"></td>
                </tr>
                <tr>
                    <td width="40%">Title</td>
                    <td width="50%"><?php echo form_input($reading_title);?></td>
                    <td width="10%"></td>
                </tr>
                <tr>
                    <td width="40%">Level:</td>
                    <td width="50%"><select name="reading_level">
                            <option value="<?php echo $info['reading_level'];?>"><?php echo $info['reading_level'];?></option>                        
                            <option value="N1">N1</option>
                            <option value="N2">N2</option>
                            <option value="N3">N3</option>
                            <option value="N4">N4</option>
                            <option value="N5">N5</option>
                    </select></td>
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